<?php
namespace app\index\model;
use think\Model;
class Customer_shop extends Model
{
	protected $data='customer_shop';
	public function havebuy()//与havingbuy关联
	{
		return $this->hasMany('havingbuy','username','username');
	}
	public function shopcar()//与shoppingcar关联
	{
		return $this->hasMany('shoppingcar','username','username');
	}
}