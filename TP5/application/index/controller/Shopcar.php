<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Shoppingcar;
use app\index\model\Customer_shop;
use app\index\model\Havingbuy;
use app\index\model\Goods;
use app\index\model\Discounttotal;
use app\index\model\Discountadd;
use think\Cookie;
use think\Request;

class Shopcar extends Controller
{
	public function index()
	{
		$this->assign('time',1);
		$username=Cookie::get('username');
		$goodslist=Shoppingcar::where('username',$username)->select();
		$this->assign('goodslist',$goodslist);

		$lineCount=Shoppingcar::where('username',$username)->count();
		$goodsDiscount="";//统一折扣
		$addDiscountOne="";//叠加折扣第一件数据
		$allDiscountData="";//叠加数据
		for($i=0;$i<$lineCount;$i++)
		{
			$goodsline=$goodslist[$i];
			$goodsname=$goodsline['goodsname'];
			$data=Discounttotal::where('goodsname',$goodsname)->find();
			$addData=Discountadd::where('goodsname',$goodsname)->find();
			if(!$data)//没有统一折扣
			{
				$goodsDiscount=$goodsDiscount."1";
			}
			else
			{
				//有统一折扣
				$discount=$data['discount'];
				$goodsDiscount=$goodsDiscount.$discount;
			}
			if($i<$lineCount-1)
				$goodsDiscount=$goodsDiscount.",";

			if(!$addData)//没有叠加折扣
			{
				$allDiscountData=$allDiscountData."1,1,1";
				$addDiscountOne=$addDiscountOne."1";
			}
			else
			{
				$discount=$addData['dcount_one'];
				$addDiscountOne=$addDiscountOne.$discount;

				$addTwo=$addData['dcount_two'];
				$addThree=$addData['dcount_three'];
				$allDiscountData=$allDiscountData.$discount.','.$addTwo.','.$addThree;
			}
			if($i<$lineCount-1)
			{
				$addDiscountOne=$addDiscountOne.",";
				$allDiscountData=$allDiscountData."/";
			}
		}
		$this->assign('goodsDiscount',$goodsDiscount);
		$this->assign('goodsAddOne',$addDiscountOne);
		$this->assign('allDiscountData',$allDiscountData);
		return $this->fetch();	
	}
	public function delegoods()//删去购物车内商品
	{
		$goodsname=$this->request->param('goodsname');
		$result=Shoppingcar::where('goodsname',$goodsname)->find();
		$result->delete();
		$this->redirect('index');
	}
	public function addgoods()//增加购物车商品
	{
		$goodsname=$this->request->param('goodsname');
		$goodsDate=Goods::where('goods_name',$goodsname)->find();
		$price=$goodsDate['price'];
		$username=Cookie::get('username');

		$found=Shoppingcar::where(['username'=>$username,'goodsname'=>$goodsname])->find();
		if($found)//已在购物车中
		return '2';

		$insert=new Shoppingcar;
		$insert->username=$username;
		$insert->goodsname=$goodsname;
		$insert->price=$price;
		$insert->save();
		return '1';
	}
	public function buying()//购买商品
	{
		$buyinglist=$this->request->param('buyinglist/a');
		$username=Cookie::get('username');
		//$totalprice=$this->request->param('totalprice');
		/*$cushop=Customer_shop::where('username',$username)->find();
		$cushop->balance-=$totalprice;
		$cushop->save();*/
		$successTry="";
		$infactTry="";
		for($i=0;$i<count($buyinglist);$i++)
		{
			$infactTry=$infactTry.$this->solveBuying($buyinglist[$i],$username);
			$successTry=$successTry."1";
			//$buyingline=$buyinglist[$i];
			/*$buyingline= explode(',',$buyingline);
			$goodsname=$buyingline[0];
			$number=$buyingline[1];
			for($a=0;$a<$number;$a++)
			{
				$insert=new Havingbuy;
				$insert->username=$username;
				$insert->goodsname=$goodsname;
				$insert->save();
			}*/
		}
		if($infactTry==$successTry)//2019/10/25 0:09 bug:不一致时传输的数据有误
		return '1';
		else
		{
			return $infactTry;
		}
	}
	public function solveBuying($buyingline,$username)//处理buying()传递的信息
	{
		$buyingline= explode(',',$buyingline);
		$goodsname=$buyingline[0];
		$number=$buyingline[1];
		$price=$buyingline[2];

		try{

		Goods::startTrans();
		$goodsData=Goods::where('goods_name',$goodsname)->find();
		$goodsData->remain_number-=$number;
		$goodsData->sales_number+=$number;
		$a=$goodsData->save();//直接扣除数量
		if(!$a)
		{
			throw new \Exception("数量不足");
		}
		Goods::commit();

		$cushop=Customer_shop::where('username',$username)->find();
		$cushop->balance-=floatval($price);
		$cushop->save();//减少余额

		$deleshopcar=Shoppingcar::where('goodsname',$goodsname)->find();
		$deleshopcar->delete();

		for($a=0;$a<$number;$a++)
		{
			$insert=new Havingbuy;
			$insert->username=$username;
			$insert->goodsname=$goodsname;
			$insert->save();
		}
		return "1";
		}
		catch(\Exception $e)
		{
			Goods::rollback();//回滚
			return "0";
		}
	}
	
}