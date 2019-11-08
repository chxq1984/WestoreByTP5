<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\index\showsecskill.html";i:1572869486;s:62:"E:\WARMP\wamp64\www\TP5\application\index\view\index\head.html";i:1572867736;s:64:"E:\WARMP\wamp64\www\TP5\application\index\view\index\footer.html";i:1572574327;}*/ ?>
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

<style type="text/css">
  .button {
  background-color: #4CAF50; /* Green */
  border: none;    
    color: white;
  padding: 15px 50px;
  text-align: center;    
    text-decoration: none;
  display: inline-block;
  font-size: 20px;
}
</style>

  <div class="content content-nav-base commodity-content">
    <div class="commod-cont-wrap" style="background-image: url('/TP5/public/static/Images/index/logo5.jpg')">
      <div class="commod-cont w1200 layui-clear" style="margin-left: 150px;width: 100px">
        <div class="right-cont-wrap">
          <div class="right-cont">

             
            <br>
            


           <div class="cont-list layui-clear" id="list-cont" style="margin-left: 355px">
            
            <div class="item" style="background-color: rgba(255,255,255,0.4);border: none;">
             <div class="img">
            <!-- <a href="<?php echo url('index/ctbuying',['goods_name'=>$goodsname,'price'=>$seprice]); ?>"> -->
              <a href="javascript:;">
            <img src=<?php echo getphotourl($goodsname); ?>>
          </a>
         </div>
        <div class="text">
        <p class="title" style="margin-left: 110px"> <?php echo $goodsname; ?></p>
        <p class="price">
          <span style="color: black">秒杀价</span> <span class="pri">￥<?php echo $seprice; ?></span>
          <span class="nub" style="color: black">秒杀量 <span style="color: red"><?php echo $goodsnumber; ?></span></span>
        </p>
      </div>
        </div>

        </div>
            <div id="demo0" style="text-align: center;"></div>
            <div style="text-align:center"><button class="button" id="rightSec">立即秒杀</button></div>
          </div>
        </div>
      </div>
    </div>
  </div>

<script>

  $("#login-change").hide();

  var flag=0;//让setInterval只进行一次startBuying

  function getLocalTime(){
  var timestamp = Date.parse(new Date());
  return timestamp;
}
  
  function changeTime(times)//返回标准剩余秒数
  {
        var secondTime = parseInt(times);// 秒
        var minuteTime = 0;// 分
        var hourTime = 0;// 小时
        if(secondTime > 60) {
            //如果秒数大于60，将秒数转换成整数
            //获取分钟，除以60取整数，得到整数分钟
            minuteTime = parseInt(secondTime / 60);
            //获取秒数，秒数取佘，得到整数秒数
            secondTime = parseInt(secondTime % 60);
            //如果分钟大于60，将分钟转换成小时
            if(minuteTime > 60) {
                //获取小时，获取分钟除以60，得到整数小时
                hourTime = parseInt(minuteTime / 60);
                //获取小时后取佘的分，获取分钟除以60取佘的分
                minuteTime = parseInt(minuteTime % 60);
            }
        }
        var result = "" + parseInt(secondTime) + "秒";

        if(minuteTime > 0) {
            result = "" + parseInt(minuteTime) + "分" + result;
        }
        if(hourTime > 0) {
            result = "" + parseInt(hourTime) + "小时" + result;
        }
        return result;
  }

  function startBuying()//点击购买
  {   
      flag=1;//让此函数只进行一次
      $("#rightSec").click(function(){
        var username=$.cookie('username');
        $.post('solvesecs',{username:username},function(data){
          if(data=='1')
          {
            layer.msg('恭喜您秒杀成功！');
          }
          else
          {
            layer.msg('秒杀已结束！');

            window.location.replace("http://localhost/tp5/public/index.php/index/index/index");
          }
        })

      })
  }

  var preTime;//前一秒

  $(document).ready(function(){

    var startTime='<?php echo $time; ?>';//结束时间，标准格式
    var localtime=getLocalTime();

    var cgtime=new Date(startTime);
    var seconds=cgtime.getTime();//开始时间的毫秒级
    var sepatate=seconds-localtime;//剩余秒数
    preTime=sepatate/1000;

    remainSec=changeTime(sepatate/1000);//剩余时间

    if(preTime>0)
    {
      $("#rightSec").text(remainSec);
    }
    else
    {
      $("#rightSec").text('立即秒杀');
      $("#rightSec").css( 'cursor', 'pointer' );
      startBuying();
    }

  })

  setInterval(function(){

    preTime--;
    remainSec=changeTime(preTime);
    if(preTime>0)
    {
      $("#rightSec").text(remainSec);
    }
    else if(!flag)
    {
      $("#rightSec").text('立即秒杀');
      $("#rightSec").css( 'cursor', 'pointer' );
      startBuying();
    }


    },1000);



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