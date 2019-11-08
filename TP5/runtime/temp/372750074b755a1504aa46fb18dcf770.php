<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\index\collection.html";i:1572617622;s:62:"E:\WARMP\wamp64\www\TP5\application\index\view\index\head.html";i:1572867736;s:64:"E:\WARMP\wamp64\www\TP5\application\index\view\index\footer.html";i:1572574327;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" type="text/css" href="/TP5/public/static/Css/index/main.css">
  <link rel="stylesheet" type="text/css" href="/TP5/public/static/Css/index/layui.css">
  
  <!-- <link rel="stylesheet" type="text/css" href="/TP5/extend/layui/css/layui.css"> -->

  <script type="text/javascript" src="../res/layui/layui.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

  <script src="/TP5/extend/jquery/3.4.1/jquery.min.js"></script>
  <script src="/TP5/extend/jquery/cookie/jquery.cookie.js"></script>
 <!--  <script src="/TP5/extend/layui/layui.js"></script> -->
  <script src="/TP5/extend/layer/layer.js"></script>
  <script src="/TP5/extend/jquery/form/jquery.form.min.js"></script>
  <script src="/TP5/extend/jquery/validate/jquery.validate.min"></script>
  <script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>

</head>
<body>

  <div class="site-nav-bg">
    <div class="site-nav w1200">
     <!--  <p class="sn-back-home">
       <i class="layui-icon layui-icon-home"></i>
       <a href="#">首页</a>
     </p> -->
      <div class="sn-quick-menu">
        <div class="login"><a id="login-change" href="http://localhost/tp5/public/index.php/index/index/login">登录</a></div>
      </div>
    </div>
  </div>



  <div class="header">
    <div class="headerLayout w1200">
      <div class="headerCon">
        <h1 class="mallLogo">
          <a href="#" title="食品商城">
            <img src="/TP5/public/static/Images/index/logo.jpg">
          </a>
        </h1>
        <div class="mallSearch">

          <form action="search" method="POST" class="layui-form" novalidate>
            <input type="text" name="title" required  lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入需要的商品">
            <button class="layui-btn" lay-submit lay-filter="formDemo" style="margin-left: 2px">
                <i class="layui-icon layui-icon-search"></i>
            </button>
            <input type="hidden" name="" value="">
          </form>

        </div>
      </div>
    </div>
  </div>


  <div class="content content-nav-base  login-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="http://localhost/tp5/public/index.php/index/index/index" class="active">所有商品</a>
            <!-- <a href="about.html">关于我们</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content content-nav-base shopcart-content">
    <div class="banner-bg w1200">
      <h3>美食商城</h3>
      <p>收藏夹</p>
    </div>
    <div class="cart w1200">
      <div class="cart-table-th">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">
              <!-- <input class="check-all check" id="allCheckked" type="checkbox" value="true"> -->
            </div>
          <!-- <label>选择</label> -->
          </div>
        </div>
        <div class="th th-item">
          <div class="th-inner">
            商品
          </div>
        </div>
        <div class="th th-price">
          <div class="th-inner">
            单价
          </div>
        </div>
        <!-- <div class="th th-amount">
          <div class="th-inner">
            数量
          </div>
        </div> -->
        <div class="th th-sum">
          <div class="th-inner">
             &nbsp&nbsp
          </div>
        </div>
        <div class="th th-op">
          <div class="th-inner">
            操作
          </div>
        </div>  
      </div>
      <div class="OrderList" id="goodslist">
        
      </div>
      <div class="FloatBarHolder layui-clear">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">
              <!-- <input class="check-all check" id="" name="select-all" type="checkbox"  value="true"> -->
            </div>
            <!-- <label>&nbsp;&nbsp;已选<span class="Selected-pieces">0</span> 件</label>-->
          </div>
        </div>
        <div class="th batch-deletion">
          <!-- <span class="batch-dele-btn">批量删除</span> -->
        </div>
        <!-- <div class="th Settlement">
          <button class="layui-btn" id='buynow'>结算</button>
        </div>
        <div class="th total">
          <p>应付：<span class="pieces-total" id='endsumprice'>0</span></p>
        </div> -->
      </div>
    </div>
  </div>
<script>
	$(document).ready(function(){
		$('#goodslist').load('senddata.html',{goodsname:'0'});
    $('#login-change').attr('href','http://localhost/tp5/public/index.php/index/index/personcentral');
    $('#login-change').text('个人中心');
	})
</script>

  <div class="footer">
    <div class="ng-promise-box">
      <div class="ng-promise w1200">
        <p class="text">
          <a class="icon1" href="javascript:;" style="margin-left: 110px">看图品尝</a>
          <a class="icon2" href="javascript:;">全场免邮</a>
          <a class="icon3" style="margin-right: 0" href="javascript:;">100%品质保证</a>
        </p>
      </div>
    </div>
    <div class="mod_help w1200">                                     
      <p>
        <a href="javascript:;" style="margin-left: 60px">关于我们</a>
        <span>|</span>
        <a href="javascript:;">售后服务</a>
        <span>|</span>
        <a href="javascript:;">关于货源</a>
      </p>
    </div>
  </div>
</body>
</html>