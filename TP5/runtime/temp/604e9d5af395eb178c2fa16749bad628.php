<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"E:\WARMP\wamp64\www\TP5\public/../application/admin\view\sailmethod\index.html";i:1572092659;s:62:"E:\WARMP\wamp64\www\TP5\application\admin\view\index\head.html";i:1572618399;s:64:"E:\WARMP\wamp64\www\TP5\application\admin\view\index\footer.html";i:1572574301;}*/ ?>
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

</head>
<body>

 <!--  <div class="site-nav-bg">
   <div class="site-nav w1200">
     <p class="sn-back-home">
       <i class="layui-icon layui-icon-home"></i>
       <a href="#">首页</a>
     </p>
     <div class="sn-quick-menu">
      <div class="login"><a id="login-change" href="http://localhost/tp5/public/index.php/index/index/login">登录</a></div>
     </div>
   </div>
 </div> -->



  <div class="header">
    <div class="headerLayout w1200">
      <div class="headerCon">
        <h1 class="mallLogo">
          <a href="index" title="食品商城">
            <img src="/TP5/public/static/Images/index/logo.jpg">
          </a>
        </h1>
        <div class="mallSearch">

         <!--  <form action="search" method="POST" class="layui-form" novalidate>
           <input type="text" name="title" required  lay-verify="required" autocomplete="off" class="layui-input" placeholder="请输入需要的商品">
           <button class="layui-btn" lay-submit lay-filter="formDemo">
               <i class="layui-icon layui-icon-search"></i>
           </button>
           <input type="hidden" name="" value="">
         </form> -->

        </div>
      </div>
    </div>
  </div>


  <div class="content content-nav-base  login-content">
    <div class="main-nav">
      <div class="inner-cont0">
        <div class="inner-cont1 w1200">
          <div class="inner-cont2">
            <a href="http://localhost/tp5/public/index.php/admin/index/index" class="active">商品列表</a>
             <a href="../Sailmethod/index" style="color: rgb(207,178,246);">促销管理</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content content-nav-base shopcart-content">
    <div class="banner-bg w1200">
      <h3>美食商城</h3>
      <p>促销方案</p>
    </div>
    <div class="cart w1200">
      <div class="cart-table-th">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">
            </div>
          </div>
        </div>
        <div class="th th-item">
          <div class="th-inner">
            促销类别
          </div>
        </div>
        <div class="th th-price">
          <div class="th-inner">
            具体方案
          </div>
        </div>
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
        
		 <div class="order-content" style="height: 30px">
          <ul class="item-content layui-clear">
            <li class="th th-chk">
              <div class="select-all">
              </div>
            </li>
            <li class="th th-item">
              <div class="item-cont">
               
                <img src="" style="visibility:hidden">
                <div class="text">
                  <div class="title" id='carname'>折扣</div>
                </div>
              </div>
            </li>
            <li class="th th-price">
              <span class="th-su" id="one">统一折扣</span> <!--单价-->
            </li>
           <li class="th th-amount">
             <div class="box-btn layui-clear" id="list-cont">
           &nbsp;&nbsp;&nbsp;&nbsp;
             </div>
           </li> 
            <li class="th th-op">
             <a href="discountTotal">
              <span id='dele'>管理</span> </a>
            </li>
          </ul>
        </div>

        <div class="order-content" style="height: 30px">
          <ul class="item-content layui-clear">
            <li class="th th-chk">
              <div class="select-all">
              </div>
            </li>
            <li class="th th-item">
              <div class="item-cont">
               
                <img src="" style="visibility:hidden">
                <div class="text">
                  <div class="title" id='carname'>折扣</div>
                </div>
              </div>
            </li>
            <li class="th th-price">
              <span class="th-su" id="one">叠加折扣</span> <!--单价-->
            </li>
           <li class="th th-amount">
             <div class="box-btn layui-clear" id="list-cont">
           &nbsp;&nbsp;&nbsp;&nbsp;
             </div>
           </li> 
            <li class="th th-op">
             <a href="discountadd">
              <span id='dele'>管理</span> </a>
            </li>
          </ul>
        </div>

        <div class="order-content" style="height: 30px">
          <ul class="item-content layui-clear">
            <li class="th th-chk">
              <div class="select-all">
              </div>
            </li>
            <li class="th th-item">
              <div class="item-cont">
               
                <img src="" style="visibility:hidden">
                <div class="text">
                  <div class="title" id='carname'>秒杀</div>
                </div>
              </div>
            </li>
            <li class="th th-price">
              <span class="th-su" id="one">定点秒杀</span> <!--单价-->
            </li>
           <li class="th th-amount">
             <div class="box-btn layui-clear" id="list-cont">
           &nbsp;&nbsp;&nbsp;&nbsp;
             </div>
           </li> 
            <li class="th th-op">
             <a href="seconds">
              <span id='dele'>管理</span> </a>
            </li>
          </ul>
        </div>

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