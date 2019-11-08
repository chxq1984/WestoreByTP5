<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\index\personcentral.html";i:1572709985;s:62:"E:\WARMP\wamp64\www\TP5\application\index\view\index\head.html";i:1572867736;s:64:"E:\WARMP\wamp64\www\TP5\application\index\view\index\footer.html";i:1572574327;}*/ ?>
<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!-- <!DOCTYPE HTML>
<html>
<head>
<title>个人中心</title> -->
<!-- Custom Theme files -->
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
<link href="/TP5/public/static/Css/index/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Shaded Profile Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!-- font-awesome icons -->
<link href="/TP5/public/static/Css/index/font-awesome.css" rel="stylesheet"> 
<!-- </head> -->
<!-- <body> -->
<!--profile start here-->
<h1>个人信息</h1>
<div class="profile">
	<div class="wrap">
		<div class="profile-main">
			<div class="profile-pic wthree">

				<!-- <img src="/TP5/public/static/Images/index/p1.png" id="changeimage" style="cursor:pointer"> -->
				<img src="/TP5/public/static/Images/index/headphoto/<?php echo $username; ?>.jpg?<?php echo $randnumber; ?>" id="changeimage" style="cursor:pointer" onerror="this.src='/TP5/public/static/Images/index/headphoto/default.jpg'">

				<form method="POST" enctype="multipart/form-data" action="changeimage" id="photoform">
				<input type="file" name="headphoto" id="upfile" style="display: none" />
				</form>

				<h2><?php echo $username; ?></h2>
			</div>
			<div class="w3-message">
				<div class="wthree_tab_grid_sub">
					<div class="wthree_tab_grid_sub_left">
						<a href="../havebuy/index">
						<h5><?php echo $havebuy; ?></h5>
						<p>已购商品</p>
						</a>
					</div>
					<div class="wthree_tab_grid_sub_left">
						<a href="inmoneyshow.html"><h5><?php echo $balance; ?></h5>
						<p>余额</p></a>
					</div>
					<div class="wthree_tab_grid_sub_left">
						<a href="http://localhost/tp5/public/index.php/index/shopcar/index.html"><h5><?php echo $shopcar; ?></h5>
						<p>购物车</p></a>
					</div>
					<div class="clear"> </div>
				</div>
			</div>
			<div class="w3ls-touch">
				<div class="social">
					<ul>
						<!-- <li><a href="login">
							<i class="fa fa-google-plus" aria-hidden="true"
							style="background-color: rgb(166,266,43)">
							</i> 
							<p id="changeimage">更改头像</p>
							</a>
						</li> -->

						<li><a href="collection.html"><i class="fa fa-twitter" aria-hidden="true"></i> <p>收藏夹</p> </a> </li>
						<li><a href="login"><i class="fa fa-linkedin" aria-hidden="true"></i> <p id="outlogin">退出登录</p></a></li>
						<li><a href="javascript:;"><i class="fa fa-google-plus" aria-hidden="true"></i> <p id="deleaccount">注销账号</p></a></li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<script>

	//图片类型验证
function verificationPicFile(file) {
    var fileTypes = [".jpg", ".png"];
    var filePath = file.value;
    //当括号里面的值为0、空字符、false 、null 、undefined的时候就相当于false
    if(filePath){
        var isNext = false;
        var fileEnd = filePath.substring(filePath.indexOf("."));
        for (var i = 0; i < fileTypes.length; i++) {
            if (fileTypes[i] == fileEnd) {
                isNext = true;
                break;
            }
        }
        if (!isNext){
            /*alert('不接受此文件类型');
            file.value = "";*/
            return false;
        }
        else
            return true;
    }else {
        return false;
    }
}

//图片大小验证
function verificationPicFileBig(file) {
    var fileSize = 0;
    var fileMaxSize = 1024;//1M
    var filePath = file.value;
    if(filePath){
        fileSize =file.files[0].size;
        var size = fileSize / 1024;
        if (size > fileMaxSize) {
            layer.msg("文件大小不能大于1M！");
            return false;
        }else if (size <= 0) {
            layer.msg("文件大小不能为0M！");
            return false;
        }
        else
            return true;
    }else{
        return false;
    }
}

	$(document).ready(function(){

		$("#login-change").hide();
		/*$('#login-change').text('');*/

		$('#outlogin').click(function(){

			$.removeCookie('account',{ path: '/' });
			$.removeCookie('username',{ path: '/' });
			$.removeCookie('balance',{ path: '/' });
			$.removeCookie('password',{ path: '/' });

		})//退出登录

		$('#deleaccount').click(function(){

		layer.prompt({
	    formType: 1,
	    value: '',
	    title: '请输入密码'
	 }, function(value,index){
	    
	 	var correctPassword=$.cookie('password');
	 	if(value!=correctPassword)
	 	{
	 		layer.msg('密码错误！');
	 		return;
	 	}
	 	else
	 	{
	 		$.post('deleaccount');
	 		 window.location.replace("http://localhost/tp5/public/index.php/index/index/login");
	 	}

	    })

		})//注销账号
	
	    $('#changeimage').click(function(){
	    	$('#upfile').click();
	    })	
		
		$('#upfile').change(function(){
			if($(this).val=='')
				return;

			var ispicture=verificationPicFile(this);//判断文件格式
            if(!ispicture)
            {
                layer.msg('请上传jpg或png格式的文件！');
                $('#upfile').val('');
                return;
            }
            var isMaxEnough=verificationPicFileBig(this);//判断文件大小
            if(!isMaxEnough)
            {
                $('#upfile').val('');
                return;
            }

			$('#photoform').ajaxSubmit({
				type:'post',
				dataType:'json',
				success:function(result){
				if(result=='1')
				{ 
					var url="/TP5/public/static/Images/index/headphoto/<?php echo $username; ?>.jpg?"+Math.random();
					var url=$('#changeimage').attr('src',url);
         			$('#upfile').val(''); 
         			layer.msg('头像更换成功！');
         		}
       			}, 
       			error:function(){ 
        	 	$('#upfile').val(''); 
				}
			})
	})
	})//更换头像
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