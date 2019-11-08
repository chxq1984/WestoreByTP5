<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\index\register.html";i:1572883226;}*/ ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>注册</title>

        <!-- CSS -->
        <!-- <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500"> -->
        <link rel="stylesheet" href="/TP5/public/static/Css/index/register/bootstrap.min.css">
        <link rel="stylesheet" href="/TP5/public/static/Css/index/register/font-awesome.min.css">
		<link rel="stylesheet" href="/TP5/public/static/Css/index/register/form-elements.css">
        <link rel="stylesheet" href="/TP5/public/static/Css/index/register/style.css">

        <link rel="shortcut icon" href="/TP5/public/static/Images/index/register/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/TP5/public/static/Images/index/register/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/TP5/public/static/Images/index/register/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/TP5/public/static/Images/index/register/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/TP5/public/static/Images/index/register/apple-touch-icon-57-precomposed.png">

  <!-- <script src="/TP5/extend/jquery/3.4.1/jquery.min.js"></script>
  <script src="/TP5/extend/jquery/cookie/jquery.cookie.js"></script>
  <script src="/TP5/extend/layer/layer.js"></script> -->

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
  <script src="/TP5/extend/jquery/validate/jquery.validate.min"></script>
  <script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>

    </head>

    <body>

		<!-- Top menu -->
		<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Bootstrap Flat Registration Form Template</a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">

					</ul>
				</div>
			</div>
		</nav>

        <!-- Top content -->
        <div class="top-content">
        	<div class="copyrights">Collect from <a href="http://www.cssmoban.com/"  title="网站模板">网站模板</a></div>
            <div class="inner-bg">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-5 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>新用户</h3>
                            		<p>请填写以下信息</p>
                        		</div>
                        		<div class="form-top-right">
                        		<!--     <i class="fa fa-pencil"></i> -->
                        		</div>
                        		<div class="form-top-divider"></div>
                            </div>
                            <form class="form-bottom" id="check" action="">
			                   <!--  <form role="form" action="" method="post" class="registration-form"> -->
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-first-name">First name</label>
			                        	<input type="text" name="username" placeholder="用户名" class="form-first-name form-control" id="username" required >
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Last name</label>
			                        	<input type="text" name="account" placeholder="账号" class="form-last-name form-control" id="account" onkeyup="value=value.replace(/[^\d]/g,'')" required>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="email" name="email" placeholder="电子邮箱" class="form-email form-control" id="email" style="height: 50px" required>
			                        </div>
                                     <div class="form-group">
                                        <label class="sr-only" for="form-email">Email</label>
                                        <input type="password" name="password" placeholder="密码" class="form-email form-control" id="password" style="height: 50px" required>
                                    </div>
                                     <div class="form-group">
                                        <label class="sr-only" for="form-email">Email</label>
                                        <input type="password" name="tpassword" placeholder="确认密码" class="form-email form-control" id="tpassword" style="height: 50px" required>
                                    </div>

			                         <button type="submit" class="btn" id="registernow">立即注册</button>
			                    <!-- </form> -->
		                    </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <!-- <script src="/TP5/public/static/Js/index/register/jquery-1.11.1.min.js"></script> -->
        <script src="/TP5/public/static/Js/index/register/bootstrap.min.js"></script>
        <script src="/TP5/public/static/Js/index/register/jquery.backstretch.min.js"></script>
        <script src="/TP5/public/static/Js/index/register/retina-1.1.0.min.js"></script>
        <script src="/TP5/public/static/Js/index/register/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
<script>
$(document).ready(function(){

    
    //通过所有验证后触发此函数
    //https://www.runoob.com/jquery/jquery-plugin-validate.html 验证教程
    //2019/11/3 17:02 验证未完成
    $("#check").validate({     
 submitHandler: function(form) 
   {      
    
        var username=$('#username').val();
        var password=$('#password').val();
        var tpassword=$('#tpassword').val();
        var email=$('#email').val();
        var account=$('#account').val();

        if(username.indexOf(' ')>=0)
        {
            layer.msg('用户名不能包含空格！');
            return;
        }
        


        if(password!=tpassword)
        {
            layer.msg('两次密码输入不一致！');
            return;
        }

        if(password.length<6)
        {
            layer.msg('密码的长度至少为6位！');
            return;
        }

        if(account.length<7)
        {
            layer.msg('账号长度至少为7位！');
            return;
        }

        $.post('getinformation',{username:username,account:account,email:email,password:password},function(result){
            if(result=='1')
            {
            layer.msg('注册成功！');
            setTimeout(function(){
                window.location.replace("index");
            }, 3000);
            }
            else if(result=='2')
            {
                layer.msg('用户名已存在！');
            }
            else if(result=='3')
            {
                layer.msg('账号已存在！');
            }
        }) 

   }  
 });

    /*$('#registernow').click(function(){
        var username=$('#username').val();
        var password=$('#password').val();
        var tpassword=$('#tpassword').val();
        var email=$('#email').val();
        var account=$('#account').val();

        if(!(username&&password&&tpassword&&email&&account))
            return;
        if(username.indexOf(' ')>=0)
        {
            layer.msg('用户名不能包含空格！');
            return;
        }

        if(password!=tpassword)
        {
            layer.msg('两次密码输入不一致！');
            return;
        }
        $.post('getinformation',{username:username,account:account,email:email,password:password},function(result){
            if(result=='1')
            {
            layer.msg('注册成功！');
            setTimeout(function(){
                window.location.replace("index");
            }, 3000);
            }
        })
    })*/
})
</script>
    </body>
</html>