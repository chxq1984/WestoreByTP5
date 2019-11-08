<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Db;
use think\Cookie;
use think\File;
use Redis;
use app\index\model\Customer_login;
use app\index\model\Goods;
use app\index\model\Havingbuy;
use app\index\model\Customer_shop;
use app\index\model\Collection;
use app\admin\model\Seconds;
use app\index\model\Discountadd;
use app\index\model\Discounttotal;
class Index extends Controller
{

	protected $redis;

	public function _initialize()
	{
		$this->redis=new Redis();
		$this->redis->connect('127.0.0.1',6379);
	}

	public function index()
	{
		$goodsList=Goods::order('price')->paginate(9);
		$this->assign('goodsList',$goodsList);
		return $this->fetch();
	}
	public function login()
	{
		return $this->fetch();
	}
	public function ctmain()//跳转至主界面
	{
		$account=$this->request->param('account');
		$password=$this->request->param('password');
		$result=Customer_login::where(['account'=>$account,'password'=>$password])->find();
		if($result)
		{
			$info=$result->toArray();
			$data=Customer_shop::where('username',$info['username'])->find();
			$balance=$data['balance'];
			Cookie::set('account',$account,3600);
			Cookie::set('password',$password,3600);
			Cookie::set('username',$info['username'],3600);
			Cookie::set('balance',$balance,3600);
			$this->redirect('http://localhost/tp5/public/index.php/index/index/index');
		}
		else
		{
			$this->error('账号或密码错误','login');
		}
	}
	public function ctbuying()//跳转至购买详情页
	{//传入参数：商品名称，价格(改：不用)，由index.html 21行传入
		//goods_name,price

		if(!Cookie::get('account'))
		{
			$this->redirect('http://localhost/tp5/public/index.php/index/index/login');
		}

		$goodsInfo=input();
		$disall=-1;
		$disone=-1;
		$distwo=-1;
		$disthree=-1;
		$discount=-1;

		$goodsname=$goodsInfo['goods_name'];
		/*$goodsprice=$goodsInfo['price'];*/
		$found=Goods::where('goods_name',$goodsname)->find();

		$goodsprice=$found['price'];
		if($found->discount_all==1)//参与了统一折扣
		{
			$data=Discounttotal::where('goodsname',$goodsname)->find();
			$discount=$data->discount;
			
		}
		if($found->discount_add==1)//参与了叠加折扣
		{
			$data=Discountadd::where('goodsname',$goodsname)->find();
			$disone=$data->dcount_one;
			$distwo=$data->dcount_two;
			$disthree=$data->dcount_three;
		}
		$this->assign('remain_number',$found->remain_number);
		$this->assign('disall',$discount);
		$this->assign('disone',$disone);
		$this->assign('distwo',$distwo);
		$this->assign('disthree',$disthree);
		$this->assign('goods_name',$goodsInfo['goods_name']);
		/*$this->assign('price',$goodsInfo['price']);*/
		$this->assign('price',$goodsprice);
		/*return $this->fetch('details');*/
		return view('details');
	}
	public function personcentral()//个人中心
	{
		if(!Cookie::get('account'))
		{
			$this->redirect('http://localhost/tp5/public/index.php/index/index/login');
		}

		srand(time());
		$randnumber=rand();
		$this->assign('randnumber',$randnumber);//增加后缀防止缓存干扰
		$username=Cookie::get('username');
		$this->assign('username',$username);//用户名
		$cushop=Customer_shop::where(['username'=>$username])->find();
		$habuy=$cushop->havebuy()->select();
		$this->assign('havebuy',count($habuy));//购买数量
		$this->assign('balance',$cushop['balance']);
		$shcar=$cushop->shopcar()->select();
		$this->assign('shopcar',count($shcar));//购物车
		return $this->fetch();
	}
	public function inmoneyshow()//充值界面
	{

		if(!Cookie::get('account'))
		{
			$this->redirect('http://localhost/tp5/public/index.php/index/index/login');
		}

		return $this->fetch();
	}
	public function inmoney()//充值完成跳转
	{
		$price=$this->request->param('price');
		$password=$this->request->param('password');
		$username=Cookie::get('username');
		if(Customer_login::where(['username'=>$username,'password'=>$password])->find())
		{
			$data=Customer_shop::where('username',$username)->find();

			if($data->balance+$price>500000)
			{
				$this->error("为安全起见，总金额不能超过50万元！",'inmoneyshow');
				return;
			}

			$data->balance+=$price;
			if($data->save())
			{
				Cookie::delete('balance');
				Cookie::set('balance',$data->balance,3600);
				$this->success("充值完成！",'personcentral');

			}
		}
		$this->error("充值失败！",'inmoneyshow');
	}
	public function buying()//购买物品
	{

		if(!Cookie::get('account'))
		{
			$this->redirect('http://localhost/tp5/public/index.php/index/index/login');
		}

		$goodsname=$this->request->param('goodsname');
		$number=intval($this->request->param('number'));
		$username=Cookie::get('username');
		$totalprice=$this->request->param('totalprice');

		try{
		Goods::startTrans();//开启事务
		$goodsData=Goods::where('goods_name',$goodsname)->find();
		$goodsData->remain_number-=$number;
		$goodsData->sales_number+=$number;
		$a=$goodsData->save();//直接扣除数量
		if(!$a)
		{
			throw new \Exception("数量不足");
		}
		$cushop=Customer_shop::where('username',$username)->find();
		$cushop->balance-=$totalprice;
		$cushop->save();//减少余额
		for($a=0;$a<$number;$a++)
		{
			$habuy=new Havingbuy;
			$habuy->username=$username;
			$habuy->goodsname=$goodsname;
			$habuy->save();
		}//增加购买信息
		Goods::commit();
		$numberCure=$this->renumber($goodsname);
		return "1,".$numberCure;
		}
		catch(\Exception $e)
		{
			Goods::rollback();//回滚
			$numberCure=$this->renumber($goodsname);
			return "0,".$numberCure;
		}
	}
	public function collection()//收藏夹
	{

		if(!Cookie::get('account'))
		{
			$this->redirect('http://localhost/tp5/public/index.php/index/index/login');
		}
		
		return $this->fetch();
	}
	public function senddata()//传输收藏夹数据
	{
		$time=1;
		$this->assign('time',$time);
		$username=Cookie::get('username');
		$data=$this->request->param('goodsname');
		
		if($data=='0')//返回全数据
		{
			$collect=Collection::where('username',$username)->select();
			$this->assign('goodslist',$collect);
		}//删除数据
		else
		{
			$positon=Collection::where('goodsname',$data)->find();
			$positon->delete();
			$collect=Collection::where('username',$username)->select();
			$this->assign('goodslist',$collect);
		}
		return view();
	}
	public function addcollect()
	{
		$goodsname=$this->request->param('goodsname');
		$price=$this->request->param('price');
		$username=Cookie::get('username');
		$find=Collection::where(['username'=>$username,'goodsname'=>$goodsname])->find();
		if(!$find)
		{
			$insert=new Collection;
			$insert->goodsname=$goodsname;
			$insert->price=$price;
			$insert->username=$username;
			$insert->save();
		}
		return '1';
	}
	public function register()//注册页面
	{
		return view();
	}
	public function getinformation()//获取注册信息
	{
		$data=$this->request->param();
		$username=$data['username'];
		$password=$data['password'];
		$email=$data['email'];
		$account=$data['account'];

		$found=Customer_login::where('username',$username)->find();
		if($found)
			return '2';
		else
		{
			$found=Customer_login::where('account',$account)->find();
			if($found)
				return '3';
		}

		$insert=new Customer_login;
		$insert->username=$username;
		$insert->account=$account;
		$insert->password=$password;
		$insert->email=$email;
		$insert->save();//写入customer_login

		$data=Customer_login::where('username',$username)->find();
		$id=$data->ID;//获取外键关联id

		$insert=new Customer_shop;
		$insert->username=$username;
		$insert->balance=0;
		$insert->flag_id=$id;
		$insert->save();//写入customer_shop

		Cookie::set('account',$account,3600);
		Cookie::set('password',$password,3600);
		Cookie::set('username',$username,3600);
		Cookie::set('balance',0,3600);
		return '1';
	}
	public function deleaccount()//注销账号
	{
		$username=Cookie::get('username');
		$data=Customer_login::where('username',$username);
		$data->delete();
		Cookie::delete('username');
		Cookie::delete('balance');
		Cookie::delete('password');
		Cookie::delete('account');
	}
	public function changeimage()//更换头像
	{
		$isPng=0;
		$username=Cookie::get('username');
		$name=iconv('utf-8','gbk',Cookie::get('username'));
		$url=ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'headphoto'.DS.$name;

		if(file_exists($url.'.jpg'))
		unlink($url.'.jpg');//删除原头像
		if(file_exists($url.'.png'))
		unlink($url.'.png');

		$file=$this->request->file('headphoto');

		$info=$file->rule(function($file){
			return iconv('utf-8','gbk',Cookie::get('username'));
		})->move(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'headphoto');

		$url=ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'headphoto'.DS.$name;

		if(file_exists($url.'.jpg'))
		$image = \think\Image::open($url.'.jpg');
		else if(file_exists($url.'.png'))
		{
			$isPng=1;
			$image=\think\Image::open($url.'.png');
		}

		$image->thumb(170,170,\think\Image::THUMB_CENTER)->save(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'headphoto'.DS.$name.'.jpg');

		if($isPng)
		{
			unset($info);
			unlink(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'headphoto'.DS.$name.'.png');
		}
		return '1';
	}
	public function search()//搜索
	{
		$data=$this->request->param('title');
		$search='%'.$data.'%';
		$where['goods_name'] = ['like',$search];
		$goodsList= Goods::where($where)->order('price')->paginate(9);
		
		$this->assign('goodsList',$goodsList);
		return $this->fetch('index');

	}
	public function renumber($goodsname)//返回当前商品数量
	{
		$data=Goods::where('goods_name',$goodsname)->find();
		$number=$data['remain_number'];
		return $number;
	}
	public function solvewhichway()//判断是否进入秒杀页面
	{
		$sec_flag=$this->redis->get('startFlag');
		if($sec_flag=='1')
			return '1';
		else
			return '0';
	}
	public function showsecskill()//进入秒杀页面
	{

		if(!Cookie::get('account'))
		{
			$this->redirect('http://localhost/tp5/public/index.php/index/index/login');
		}

		$goodsname=$this->redis->get('goodsname');
		$seprice=$this->redis->get('seprice');
		$goodsnumber=$this->redis->get('goodsnumber');
		$time=$this->redis->get('time');


		$this->assign('goodsname',$goodsname);
		$this->assign('seprice',$seprice);
		$this->assign('goodsnumber',$goodsnumber);
		$this->assign('time',$time);

		return view();
	}
	public function solvesecs()//解决秒杀业务
	{
		$flag=$this->solvewhichway();
		if(!$flag)
			return '0';
		$username=$this->request->param('username');
		if($this->redis->lPop('goods'))
		{
			$this->redis->lPush('username',$username);
			return '1';
		}
		else
		{
			return '0';
		}

	}
	public function isInSail()//判断是否能够进入详情页
	{
		$goodsname=$this->request->param('goodsname');
		$found=Goods::where('goods_name',$goodsname)->find();
		if(!$found)
			return '0';
		else
			return '1';
	}
}