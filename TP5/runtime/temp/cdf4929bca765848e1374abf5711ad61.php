<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\WARMP\wamp64\www\TP5\public/../application/admin\view\index\addgoods.html";i:1572867384;}*/ ?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>商品上架</title>

        <link rel="stylesheet" href="/TP5/public/static/Css/index/register/bootstrap.min.css">
        <link rel="stylesheet" href="/TP5/public/static/Css/index/register/font-awesome.min.css">
		<link rel="stylesheet" href="/TP5/public/static/Css/index/register/form-elements.css">
        <link rel="stylesheet" href="/TP5/public/static/Css/index/register/style.css">

        <link rel="shortcut icon" href="/TP5/public/static/Images/index/register/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/TP5/public/static/Images/index/register/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/TP5/public/static/Images/index/register/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/TP5/public/static/Images/index/register/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/TP5/public/static/Images/index/register/apple-touch-icon-57-precomposed.png">



  <link rel="stylesheet" type="text/css" href="/TP5/public/static/Css/index/main.css">
  <link rel="stylesheet" type="text/css" href="/TP5/public/static/Css/index/layui.css">
  
 


  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">

 <script src="/TP5/extend/jquery/3.4.1/jquery.min.js"></script>
  <script src="/TP5/extend/jquery/cookie/jquery.cookie.js"></script>
  <script src="/TP5/extend/layer/layer.js"></script>
  <script src="/TP5/extend/jquery/form/jquery.form.min.js"></script>

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
                        			<h3>上架商品</h3>
                            		<p>请填写以下信息</p>
                        		</div>
                        		<div class="form-top-right">
                        		<!--     <i class="fa fa-pencil"></i> -->
                        		</div>
                        		<div class="form-top-divider"></div>
                            </div>
                            <div class="form-bottom" id="form_add">
			                   <!--  <form role="form" action="" method="post" class="registration-form"> -->
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-first-name">First name</label>
			                        	
                                      
                                        <input type="text" name="form-first-name" placeholder="商品名称" class="form-first-name form-control" id="goodsname">

			                        </div>
                                   
<div class="form-group" style="font-size: 20px;color: white">
 <img src="/TP5/public/static/Images/index/food/鸡蛋糕.jpg" style="height: 200px;width: 200px;cursor:pointer" id="photo">
 &nbsp;&nbsp;点击上传商品图片

 <form method="POST" enctype="multipart/form-data" action="goodsphoto" id="upnewgoods">
 <input type="file" name="gsphoto" id="upfile"  style="display: none"/> 
 <input type="text" name="goodsname" id="gspname"  style="display: none"/>

 </form>

</div>

			                        <div class="form-group">
			                        	<label class="sr-only" for="form-last-name">Last name</label>
			                        	<input type="number" name="form-last-name" placeholder="销售单价" class="form-last-name form-control" id="price" style="height: 50px">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-email">Email</label>
			                        	<input type="number" name="form-email" placeholder="上架数量" class="form-email form-control" id="number" style="height: 50px">
			                        </div>
                                     
                                    
			                        <button type="submit" class="btn" id="registernow">确认上架</button>
			                    <!-- </form> -->
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="/TP5/public/static/Js/index/register/bootstrap.min.js"></script>
        <script src="/TP5/public/static/Js/index/register/jquery.backstretch.min.js"></script>
        <script src="/TP5/public/static/Js/index/register/retina-1.1.0.min.js"></script>
        <script src="/TP5/public/static/Js/index/register/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
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
   
    $("#registernow").click(function(){
        var goodsname=$("#goodsname").val();
        var price=$("#price").val();
        var number=$("#number").val();
        var jugement=0;
        if(!(goodsname&&price&&number&&$('#upfile').val()))
        {
            layer.msg('信息未填写完整！');
            return;
        }
        $('#upfile').val(''); 
        if(($('#gspname').val())!=goodsname)//判断名字是否更改
            jugement=1;
        $.post('solveaddgoods',{goodsname:goodsname,price:price,number:parseInt(number),jugement:jugement},function(data){
            if(data=='1')
            {
                layer.msg('商品已成功上架！');
            }
            else if(data=='0')
            {
                layer.msg('此商品已经上架！');
            }
        })
    })

    $("#photo").click(function(){
        if($("#goodsname").val()=='')
        {
            layer.msg("请先输入商品名称！");
            return;
        }
        $("#gspname").val($("#goodsname").val());
        $("#upfile").click();
    })

   $("#upfile").change(function(){

            if($(this).val=='')
            return;//图片为空则返回

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

            $('#upnewgoods').ajaxSubmit({
                type:'post',
                dataType:'json',
                success:function(result){
                if(result=='1')
                { 
                    var goodsname=$("#gspname").val();
                    var url="/TP5/public/static/Images/index/food/"+goodsname+".jpg?"+Math.random();
                    $('#photo').attr('src',url);
                }
                else if(result=='0')
                {
                    layer.msg('此商品已经上架！');
                    $('#upfile').val('');
                    return;
                }
                }, 
                error:function(){ 
                $('#upfile').val('');
                }
    })

})
   })
</script>
    </body>
</html>