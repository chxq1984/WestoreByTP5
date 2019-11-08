<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:73:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\index\index.html";i:1572616648;s:62:"E:\WARMP\wamp64\www\TP5\application\index\view\index\head.html";i:1572867736;s:64:"E:\WARMP\wamp64\www\TP5\application\index\view\index\footer.html";i:1572574327;}*/ ?>
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
  .pagination{text-align:center;margin-top:20px;margin-bottom: 20px;}
  .pagination li{margin:0px 10px; border:1px solid #e6e6e6;padding: 3px 8px;display: inline-block;}
  .pagination .active{background-color: #dd1a20;color: #fff;}
  .pagination .disabled{color:#aaa;}
  </style>
  
<div class="category-banner">
              <div class="w1200"><a href="javascript:;" id="changeSec">
                 <img src="/TP5/public/static/Images/index/noSecond.jpg" id="bigLogo" style="margin-top: 33px">
              </a> </div>
</div> 

  <div class="content content-nav-base commodity-content">
    <div class="commod-cont-wrap">
      <div class="commod-cont w1200 layui-clear" style="margin-left: 150px;width: 100px;">
        <div class="right-cont-wrap">
          <div class="right-cont">

             
            <br>
            <!-- <div class="sort layui-clear">
              <a class="active" href="javascript:;" event = 'volume' id='salesnumber'>销量</a>
              <a href="javascript:;" event = 'price' id='price'>价格</a>
            </div> -->


           <div class="cont-list layui-clear" id="list-cont">
            <?php if(is_array($goodsList) || $goodsList instanceof \think\Collection || $goodsList instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>
              <div class="item">
                <div class="img">
                  <a href="<?php echo url('index/ctbuying',['goods_name'=>$goods['goods_name'],'price'=>$goods['price']]); ?>"><img src=<?php echo getphotourl($goods['goods_name']); ?>></a>
                </div>
                <div class="text">
                  <p class="title"> <?php echo $goods['goods_name']; ?></p>
                  <p class="price">
                    <span class="pri">￥<?php echo $goods['price']; ?></span>
                    <span class="nub"><?php echo $goods['sales_number']; ?>付款</span>
                  </p>
                </div>
              </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
           </div>
           
            <?php echo $goodsList->render(); ?>


            <div id="demo0" style="text-align: center;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
  $(document).ready(function(){

    $.get('http://localhost/tp5/public/index.php/index/index/solvewhichway',function(data){
      if(data=='0')
      {
        return;
      }
      else
      {
        $("#changeSec").attr('href','http://localhost/tp5/public/index.php/index/index/showsecskill');
        $("#bigLogo").attr("src","/TP5/public/static/Images/index/startSec.jpg"); 
      }
    })

    if($.cookie("account"))
    {
      $('#login-change').attr('href','http://localhost/tp5/public/index.php/index/index/personcentral');
      $('#login-change').text('个人中心');

      ws = new WebSocket("ws://127.0.0.1:2346");
      ws.onopen = function() {
        console.log("连接成功");
        var sendId="Id#"+$.cookie("account");//代表用户
        ws.send(sendId);
      };

      ws.onmessage = function(e) {
        var data=e.data;
        console.log(data);

        var dataList=data.split('#');
        if(dataList[0]=="disAll")
        {
          /*alert(dataList[1]+"已加入折扣，快去看看吧！");*/
          layer.open({
                        content: dataList[1]+"已加入折扣，快去看看吧！",
                        btn: ['前往', '等会儿再去'],
                        yes: function(index, layero) {
                            /*$.post("index/ctbuying",{
                              goods_name:dataList[1]
                        })*/

                          window.location='http://localhost/tp5/public/index.php/index/index/ctbuying/goods_name/'+dataList[1];
                        },
                        btn2: function(index, layero) {
 
                        }
                        ,
                        cancel: function() {
                            //右上角关闭回调
                        }
                    });
        }
      };

    }
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