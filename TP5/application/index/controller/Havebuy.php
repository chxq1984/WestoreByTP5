<?php
namespace app\index\controller;
use think\Controller;
use think\Cookie;
use app\index\model\Havingbuy;
class Havebuy extends Controller
{
	public function index()
	{
		$username=Cookie::get('username');

		$lineNumber=count(Havingbuy::where('username',$username)->select());

		$this->assign('lineNumber',$lineNumber);
		return $this->fetch();
	}
	public function showPage()
	{
		$username=Cookie::get('username');

		$oneNumber=10;//一页的数量
		$page=$this->request->param('page');
		$lineNumber=count(Havingbuy::where('username',$username)->select());

		if($lineNumber<=$page*10)//最后一页
		{
			$oneNumber=$lineNumber%10;
			if($oneNumber==0)
				$oneNumber=10;
		}

		
		$goodslist=Havingbuy::order('buyingtime desc')->where('username',$username)->limit($page-1,$oneNumber)->select();
		$this->assign('goodslist',$goodslist);
		return view('showPage');
	}
}