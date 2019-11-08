<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\havebuy\index.html";i:1573128622;s:62:"E:\WARMP\wamp64\www\TP5\application\index\view\index\head.html";i:1572867736;s:64:"E:\WARMP\wamp64\www\TP5\application\index\view\index\footer.html";i:1572574327;}*/ ?>
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
      <p>已购商品</p>
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
            商品
          </div>
        </div>


        <div class="th th-price">
          <div class="th-inner">
            购买时间
          </div>
        </div>

        <div class="th th-sum">
          <div class="th-inner">
             &nbsp&nbsp
          </div>
        </div>

      </div>
      <div class="OrderList" id="goodslist">

      
       
      </div>
      <div class="FloatBarHolder layui-clear">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">

            </div>

          </div>
        </div>
        <div class="th batch-deletion">

        </div>

      </div>
    </div>
  </div>
<script>
	$(document).ready(function(){

    var totalCount=<?php echo $lineNumber; ?>;

    var page=1;
    var id="goods"+page;
    $("#goodslist").append("<div id='"+id+"'></div>");
    askDatas(page);
    page++;

    $('#login-change').attr('href','http://localhost/tp5/public/index.php/index/index/personcentral');
    $('#login-change').text('个人中心');

        var range = 5;             //距下边界长度/单位px
        var totalheight = 0; 
        var main = $("#goodslist");

        $(window).scroll(function(){
            var srollPos = $(window).scrollTop();    
            
            totalheight = parseFloat($(window).height()) + parseFloat(srollPos);
            if(($(document).height()-range) <= totalheight)
            {
                if(page*10>=totalCount+10)
                {
                  layer.msg('已全部加载');
                  return;
                }
                var id="goods"+page;
                main.append("<div id='"+id+"'></div>");
                askDatas(page);
                page++;
                setTimeout(function(){

                }, 5000);
            }
        });



})

function askDatas(page)
{
   $("#goods"+page).load("showPage",{page:page});
}

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