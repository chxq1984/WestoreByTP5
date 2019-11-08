<?php
namespace app\admin\controller;
header("Content-Type: text/html;charset=utf-8");
use think\Controller;
use app\index\model\Goods;
use think\Cookie;
use think\Request;
use app\admin\model\Keepdelegoods;
class Index extends Controller
{
	public function index()
	{
		return view();
	}
	public function sendgoods()
	{
		$goodsname=$this->request->param('goodsname');
		$delegoods=Goods::where('goods_name',$goodsname)->find();
		$keepdata=new Keepdelegoods;
		$keepdata->goodsname=$goodsname;
		$keepdata->score=$delegoods->score;
		$keepdata->salesnumber=$delegoods->sales_number;
		$keepdata->save();//保留数据
		$delegoods->delete();

		/*if(file_exists(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$goodsname.'.jpg'))
		unlink(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$goodsname.'.jpg');*/

		$this->assign('time',1);
		$goodsList=Goods::order('sales_number','desc')->select();
		$this->assign('goodsList',$goodsList);
		return view('showgoods');
	}
	public function showgoods()
	{
		$this->assign('time',1);
		$goodsList=Goods::order('sales_number','desc')->select();
		$this->assign('goodsList',$goodsList);
		return view();
	}
	public function addgoods()
	{
		return $this->fetch();
	}
	public function solveaddgoods()//处理增加的信息
	{
		$goodsname=$this->request->param('goodsname');

		$test=Goods::where('goods_name',$goodsname)->find();
		if($test)
		return '0';

		$price=$this->request->param('price');
		$number=$this->request->param('number');
		$jugement=$this->request->param('jugement');

		if($jugement)//商品名字改变
		{
			$prename=Cookie::get('goodsname');
			$name=iconv('utf-8','gbk',$prename);
			$image = \think\Image::open(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$name.'.jpg');
			unlink(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$name.'.jpg');
			$name=iconv('utf-8','gbk',$goodsname);
			$image->save(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$name.'.jpg');
			Cookie::delete('goodsname');

		}

		$keep=Keepdelegoods::where('goodsname',$goodsname)->find();
		$score=0;
		$sales_number=0;
		if($keep)//曾经上架过，则将信息重新取得
		{
			$score=$keep->score;
			$sales_number=$keep->salesnumber;
		}

		$insert=new Goods;
		$insert->goods_name=$goodsname;
		$insert->price=$price;
		$insert->remain_number=$number;
		$insert->score=$score;
		$insert->sales_number=$sales_number;

		$insert->save();
		if($keep)
		$keep->delete();
		return '1';
	}
	public function addoldgoods()//添加旧商品数量
	{
		//goodsname,addnumber,id
		$goodsname=$this->request->param('goodsname');
		$addnumber=$this->request->param('addnumber');
		$id=$this->request->param('id');
		$foundgoods=Goods::where('goods_name',$goodsname)->find();
		//获取数量并加上addnumber
		$numberSum=intval($foundgoods->remain_number)+intval($addnumber);
		$foundgoods->remain_number=$numberSum;
		$foundgoods->save();
		return $id.".".$numberSum;
	}
	public function goodsphoto()//上架商品时上传图片
	{
		$file=$this->request->file('gsphoto');
		$goodsname=$this->request->param('goodsname');
		Cookie::set('goodsname',$goodsname);//用于判断提交时名字是否相同
		$finding=Goods::where('goods_name',$goodsname)->find();
		if($finding)
		{
			return '0';
		}
		$name=iconv('utf-8','gbk',$goodsname);
		$file->move(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food',$name);

		$url=ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$name;
		/*if(file_exists($url.'.jpg'))
		$image = \think\Image::open(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$name.'.jpg');
		else if(file_exists($url.'.png'))
		{
			$image = \think\Image::open(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$name.'.png');
			unlink($url.'.png');
		}*/
		if(file_exists($url.'.png'))
		{
			$image = \think\Image::open(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$name.'.png');
			unlink($url.'.png');
		}
		else if(file_exists($url.'.jpg'))
		$image = \think\Image::open(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$name.'.jpg');

		$image->thumb(280,280,\think\Image::THUMB_CENTER)->save(ROOT_PATH.'public'.DS.'static'.DS.'Images'.DS.'index'.DS.'food'.DS.$name.'.jpg');
		return '1';
	}
	public function isInSeconds()//判断是否正在秒杀
	{
		$goodsname=$this->request->param('goodsname');
		$delegoods=Goods::where('goods_name',$goodsname)->find();

		$isInSec=$delegoods['seckeep'];
		if($isInSec!=0)//正在秒杀，无法删除
		{
			return '0';
		}
		else
			return '1';
	}
}
/*
  图片上传后改了名字再提交：
  用隐藏的input存储上传时使用的名字，即
  此时的图片名字，提交form时比对名字是否改变，
  若名字改变则将存储的图片改变为新名字*/