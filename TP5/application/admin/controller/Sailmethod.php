<?php
namespace app\admin\controller;
use think\Controller;
use app\index\model\Discounttotal;
use app\index\model\Discountadd;
use app\index\model\Goods;
use app\admin\model\Seconds;
use think\Cookie;
use Redis;
use think\Db;
class Sailmethod extends Controller
{
//http://localhost/tp5/public/index.php/admin/sailmethod/index

	protected $redis;

	public function _initialize()
	{
		$this->redis=new Redis();
        $this->redis->connect('127.0.0.1',6379);
	}

	public function index()
	{
		return view();
	}
	public function discounttotal()//统一折扣
	{
		$this->assign('time',1);
		$goodsList=Discounttotal::order('discount')->paginate(9);
		$this->assign('goodsList',$goodsList);
		return view('discountTotal');
	}
	public function discountadd()//叠加折扣
	{
		$goodsList=Discountadd::order('price')->paginate(9);
		$this->assign('goodsList',$goodsList);
		$this->assign('time',1);
		return $this->fetch();
	}
	public function addtotal()//增加统一折扣的商品
	{
		$goodsname=$this->request->param('goodsname');
		$data=Goods::where('goods_name',$goodsname)->find();
		if(!$data)
			return '0';
		$data->discount_all=1;
		$data->save();

		$datatem=Discounttotal::where('goodsname',$goodsname)->find();
		if($datatem)
			return '2';//已存在

		$price=$data->price;

		$insert=new Discounttotal;
		$insert->goodsname=$goodsname;
		$insert->discount=0.9;
		$insert->price=$price;
		$insert->save();
		return '1';
	}
	public function solvediscount()//处理折扣信息
	{
		$goodsname=$this->request->param('goodsname');
		$discount=$this->request->param('discount');

		$found=Discounttotal::where('goodsname',$goodsname)->find();

		if($discount=='1')
		{
			$found->delete();
			$cancel=Goods::where('goods_name',$goodsname)->find();
			$cancel->discount_all=0;
			$cancel->save();
			return '2';
		}

		$found->discount=$discount;
		$found->save();

		Cookie::delete('gsNameDis');
		return '1';
	}
	public function addwind()//增加叠加促销的商品
	{
		$goodsname=$this->request->param('goodsname');
		$data=Goods::where('goods_name',$goodsname)->find();
		if(!$data)
			return '0';
		$data->discount_add=1;
		$data->save();

		$datatem=Discountadd::where('goodsname',$goodsname)->find();
		if($datatem)
			return '2';//已存在

		$price=$data->price;

		$insert=new Discountadd;
		$insert->goodsname=$goodsname;
		$insert->price=$price;
		$insert->save();
		return '1';
	}
	public function solvedisadd()//处理叠加折扣信息
	{
		$one=$this->request->param('one');
		$two=$this->request->param('two');
		$three=$this->request->param('three');
		$goodsname=$this->request->param('goodsname');

		$insert=Discountadd::where('goodsname',$goodsname)->find();
		if($one==1&&$two==1&&$three==1)//删除
		{
			$insert->delete();
			$cancel=Goods::where('goods_name',$goodsname)->find();
			$cancel->discount_add=0;
			$cancel->save();
			return '2';
		}

		$foundGs=Goods::where('goods_name',$goodsname)->find();
		$price=$foundGs->price;

		$insert->goodsname=$goodsname;
		$insert->dcount_one=$one;
		$insert->dcount_two=$two;
		$insert->dcount_three=$three;
		$insert->price=$price;
		$insert->save();

		return '1';
	}
	public function seconds()//秒杀管理
	{
		$data=Seconds::order('time')->where('ispass',0)->select();//查找未过期商品
		$this->assign('goodsList',$data);
		$this->assign('time',1);
		return $this->fetch();
	}
	public function changeSecond()//更新秒杀
	{
		$goodsname=$this->request->param('goodsname');

		$isBegin=$this->redis->get('startFlag');
		if($isBegin==1&&$goodsname==$this->redis->get('goodsname'))
		{
			return '8';//秒杀进行中
		}

		$price=$this->request->param('seprice');
		$number=$this->request->param('senumber');
		$time=$this->request->param('setime');
		
		$foundSec=Seconds::where('goodsname',$goodsname)->find();
		$pretime=$foundSec['time'];


		$flag=$this->ischangeToday($pretime);
		if($flag)//当天不可修改
			return '6';

		$flagGoodsEnough=$this->isGoodsEnough($goodsname,intval($number));
		if($flagGoodsEnough=='0')//数量不足
		{
			return '7';
		}

		$jugeTime=$this->timeEnough($time,$pretime);
		if($jugeTime=='0')//时间不合法
			return '3'; 
		else if($jugeTime=='5')
			return '5';

		$found=Seconds::where('goodsname',$goodsname)->find();

		if($number<=0)
		{
			$found->delete();
			return '2';
		}
		$found->seprice=$price;
		$found->goodsnumber=$number;
		$found->time=$time;
		$found->save();
		return '1';
	}
	public function addSecond()//增加秒杀商品
	{
		$goodsname=$this->request->param('goodsname');

		$foundGoods=Goods::where('goods_name',$goodsname)->find();
		if(!$foundGoods)
			return '0';

		$foundSec=Seconds::where('goodsname',$goodsname)->find();
		if($foundSec)
			return '2';

		$goodsnumber=intval($foundGoods['remain_number']);//商品数量
		if($goodsnumber<1)//数量不足
		{	
			return '3';
		}

		try
		{
			Goods::startTrans();//开启事务
			$foundGoods->remain_number-=1;
			$a=$foundGoods->save();//直接扣除数量
			if(!$a)
			{
				throw new \Exception("数量不足");
			}
			$foundGoods->seckeep=1;
			$foundGoods->save();
			Goods::commit();
		}
		catch(\Exception $e)
		{
			Goods::rollback();//回滚
			return '3';//数量不足
		}

		$addTime=$this->caculateTime();
		$addEnd;
		if($addTime=='0')//没有数据默认加一天
		{
			$addEnd="+1 day";
		}
		else
		{
			$addEnd=$addTime;
		}

		$setTime=date("Y-m-d H:i:s",strtotime($addEnd));

		$insert=new Seconds;
		$insert->goodsname=$goodsname;
		$insert->time=$setTime;
		$insert->save();
		return '1';
	}
	public function caculateTime()//计算增加的天数
	{
		$dataAdd="";//格式：年份#月份#天

		$foundLastTime=Seconds::order('time desc')->select();

		if(!$foundLastTime)
			return '0';

		$lastTime=$foundLastTime[0]['time'];//最迟时间
		$lastDay=substr($lastTime,8,2);//最迟的号数
		$lastMonth=substr($lastTime,5,2);//最迟的月份
		$lastYear=substr($lastTime,0,4);//最迟的年份

		$localTime=date("Y-m-d H:i:s");
		$localDay=substr($localTime,8,2);//当前的号数
		$localMonth=substr($localTime,5,2);//当前的月份
		$localYear=substr($localTime,0,4);//当前的年份

		$addYear=strval(intval($lastYear)-intval($localYear));
		$addMonth=strval(abs(intval($lastMonth)-intval($localMonth)));
		$addDay;

		if(intval($lastMonth)>intval($localMonth))
		{
			$addMonth=intval($lastMonth)-intval($localMonth);
		}
		else
		{
			$addMonth=intval($localMonth)-intval($lastMonth);
			$addMonth*=-1;
		}

		if(intval($lastDay)>intval($localDay))
		{
			$addDay=intval($lastDay)-intval($localDay)+1;
		}
		else
		{
			$addDay=intval($localDay)-intval($lastDay)-1;
			$addDay*=-1;
		}


		if($addYear!='0')
		{
			$dataAdd=$dataAdd."+".$addYear." year";
		}
		if($addMonth!=0)
		{
			if($addYear!='0')
				$dataAdd=$dataAdd.",";
			if($addMonth>0)
			$dataAdd=$dataAdd."+".strval($addMonth)." month";
			else
			$dataAdd=$dataAdd.strval($addMonth)." month";
		}
		if($addDay!=0)
		{
			if(!($addYear=='0'&&$addMonth==0))
				$dataAdd=$dataAdd.",";
			if($addDay>0)
			$dataAdd=$dataAdd."+".$addDay." day";
			else
			$dataAdd=$dataAdd.strval($addDay)." day";
		}
		return $dataAdd;
	}
	public function timeEnough($changeTime,$beforeTime)//判断修改的时间是否合法
	{
		//规则：不能与其他商品在同一天且间隔时间不能小于10分钟
		$jugetime=substr($changeTime,0,10)." 00:00:00";
		$time=intval(strtotime($jugetime))+24*60*60;
		$afterTime=date('Y-m-d H:i:s',$time);

		/*$foundTime=Db::name('seconds')
    	->whereTime('time',[$jugetime,$afterTime])
    	->select();*/

    	$command="select *from seconds where time between '".$jugetime."' and '".$afterTime."' and time!='".$beforeTime."'";
 
    	$foundTime=Db::query($command);

		if($foundTime)
		{
			return '0';//不合法
		}
		else
		{
			$changeTime=str_replace("T"," ",$changeTime).":00";

			$time=intval(strtotime($changeTime))-10*60;
			$agoTime=date('Y-m-d H:i:s',$time);//确定前十分钟没有活动
			$command="select *from seconds where time between '".$agoTime."' and '".$changeTime."' and time!='".$beforeTime."'";
    		$foundTimeS=Db::query($command);
    		if($foundTimeS)
    		{
    			return '5';//不满足10分钟间隔，发生于23:50~00:00
    		}
			return '1';
		}
	}
	public function ischangeToday($startTime)//在秒杀当天无法对当前秒杀进行修改
	{
		$localTime=date("Y-m-d");
		$startTime=substr($startTime, 0,10);

		if($localTime==$startTime)
			return '1';
		else 
			return '0';
	}
	public function isGoodsEnough($goodsname,$aftGoodsNumber)//判断商品数量是否足够秒杀，若足够则将秒杀商品进行保存
	{
		/*$goodsname=$this->redis->get('goodsname');*/
		/*$preGoodsNumber=intval($this->redis->get('goodsnumber'));//原定秒杀数量*/
		$found=Seconds::where('goodsname',$goodsname)->find();
		$preGoodsNumber=intval($found['goodsnumber']);/*原定秒杀数量*/

		if($preGoodsNumber==$aftGoodsNumber)
			return '1';

		$found=Goods::where('goods_name',$goodsname)->find();
		$goodsnumber=intval($found['remain_number']);//商品去掉秒杀的数量
		$totalNumber=$goodsnumber+$preGoodsNumber;//商品总数量
		if($totalNumber<$aftGoodsNumber)//数量不足
		{
			return '0';
		}

		try
		{
			Goods::startTrans();//开启事务
			$found->remain_number=$totalNumber-$aftGoodsNumber;
			$a=$found->save();//直接扣除数量
			if(!$a)
			{
				throw new \Exception("数量不足");
			}
			$found->seckeep=$aftGoodsNumber;
			$found->save();
			Goods::commit();
		}
		catch(\Exception $e)
		{
			Goods::rollback();//回滚
			return '0';//数量不足
		}
	}

}