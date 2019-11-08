<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\index\details.html";i:1572877720;s:62:"E:\WARMP\wamp64\www\TP5\application\index\view\index\head.html";i:1572867736;s:64:"E:\WARMP\wamp64\www\TP5\application\index\view\index\footer.html";i:1572574327;}*/ ?>
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
  <!-- 参考价默认加50元 -->

  <div class="content content-nav-base datails-content">
    <div class="data-cont-wrap w1200">
      <div class="crumb">
        <!-- <a href="javascript:;">首页</a>
        <span>></span> -->
        <a href="javascript:;">所有商品</a>
        <span>></span>
        <a href="javascript:;">产品详情</a>
      </div>
      <div class="product-intro layui-clear">
        <div class="preview-wrap">
          <a href="javascript:;"><img src=<?php echo getphotourl($goods_name); ?>></a>
        </div>
        <div class="itemInfo-wrap">
          <div class="itemInfo">
            <div class="title">
              <h4><?php echo $goods_name; ?> </h4>
              <span id="collect"><i class="layui-icon layui-icon-rate-solid"></i>收藏</span>
            </div>
            <div class="summary">
              <p class="reference">
                <span>参考价</span>
                <del>￥<?php echo $price+10; ?></del>
                <span style="margin-left: 100px">剩余量</span>
                <span id="remain_number"><?php echo $remain_number; ?></span>
              </p>
              <p class="activity"><span>活动价</span><strong class="price"><i>￥</i></strong>
              <strong class="price" id="goodsprice" style="font-size: 20px"><?php echo $price; ?></strong></p>
              
              <p class="activity"><span>结算&nbsp;&nbsp;&nbsp;&nbsp;</span><strong class="price"><i>￥</i></strong>
              <strong class="price" id="buyprice"><?php echo $price; ?></strong></p>

            </div>
            <div class="choose-attrs">
              <div class="number layui-clear">
                <span class="title">数&nbsp;&nbsp;&nbsp;&nbsp;量</span>
                <!-- <input type="text" name="number"  style="width:18px;" id="goodsnumber" value="1"> -->
               

                <li class="th th-amount">
                <div class="box-btn layui-clear" id="list-cont">

                <div class="less layui-btn" id="less" style="background-color: rgb(220,220,220)">-</div>
                <input class="Quantity-input" type="" name="" value="1" disabled="disabled" id="number" style="height: 33px;width: 40px;background-color: rgb(228,228,228);border: none;text-align: center;">
                <div class="add layui-btn" id="add" style="background-color: rgb(220,220,220)">+</div>

                </div>
                </li>
                

                </div>
            </div>
            <div class="choose-btns">
              <button class="layui-btn layui-btn-primary purchase-btn" id='buynow'>立刻购买</button>
              <button class="layui-btn  layui-btn-danger car-btn" id="addtocar"><i class="layui-icon layui-icon-cart-simple"></i>加入购物车</button>  
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
//disall disone distwo disthree

  $(document).ready(function(){

     if($.cookie("account"))
     {
        $('#login-change').attr('href','http://localhost/tp5/public/index.php/index/index/personcentral');
        $('#login-change').text('个人中心');
     }


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
          /*url='index/ctbuying/goods_name/'+dataList[1];*/
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

    var disall=<?php echo $disall; ?>;
    var disone=<?php echo $disone; ?>;
    var distwo=<?php echo $distwo; ?>;
    var disthree=<?php echo $disthree; ?>;

    var sailmethod="";
    if(disall!=-1)
    {
      var price=$('#goodsprice').text()*disall;
      $("#goodsprice").text(price);
      $("#buyprice").text(price);

      sailmethod+="此商品享受统一"+disall*10+"折优惠"+"</br>";
    }
    if(disone!=-1)
    {
      var price=$('#goodsprice').text()*disone;
      $("#goodsprice").text(price);
      $("#buyprice").text(price);
    }
    if(disone!=-1)
    {
      if(disall!=-1)
      {
        sailmethod+="同时";
      }
      disone*=10;
      sailmethod+="此商品享受叠加优惠</br>第一件"+disone+"折"+"</br>";
      if(distwo!=1)
      {
        distwo*=10;
        sailmethod+="第二件"+distwo+"折"+"</br>";
        if(disthree!=1)
        {
          disthree*=10;
          sailmethod+="第三件"+disthree+"折"+"</br>";
        }
      } 
    }
    if(sailmethod)
    {
      layer.alert(sailmethod);
    }


  })

  $('#buynow').click(function(){
    layer.prompt({
    formType: 1,
    value: '',
    title: '请输入密码'
 }, function(value,index){
  layer.close(index);
   if($.cookie('password')==value)
   {
      var totalprice=parseFloat($('#buyprice').text());
      if(totalprice>$.cookie('balance'))
      {
        layer.msg('余额不足！');
        return;
      }
      $.post('http://localhost/tp5/public/index.php/index/index/buying',
      {
        goodsname:$('h4').text(),
        totalprice:totalprice,
        number:$("#number").val()
      },
      function(data){
        var message=data.split(',');
        var flag=message[0];
        var number=message[1];
        if(flag=='1')
          layer.msg('购买成功！');
        else if(flag=='0')
          layer.msg('您慢了一步，商品数量不足！');
        $("#remain_number").text(number);
      })
   }
   else
      layer.msg('密码错误！');
 });
  })

$('#addtocar').click(function(){
    $.post('http://localhost/tp5/public/index.php/index/shopcar/addgoods',
    {
      goodsname:$('h4').text(),
      price:$('#goodsprice').text()
    },
    function(data){
      if(data=='1')
        layer.msg('添加成功！');
      else if(data=='2')
      {
        layer.msg('此商品已添加至购物车！');
      }
    })})

$('#collect').click(function(){
  $.post('http://localhost/tp5/public/index.php/index/index/addcollect',{goodsname:$('h4').text(),price:$('#goodsprice').text()},function(data){
    if(data=='1')
      layer.msg('已添加至收藏夹!');
  })
})

$("#add").click(function(){

  var remains=parseInt($("#remain_number").text());
  var number=$("#number").val();

  if(parseInt(number)+1>remains)
    return;

  number++;

  var disall=<?php echo $disall; ?>;
  var disone=<?php echo $disone; ?>;
  var distwo=<?php echo $distwo; ?>;
  var disthree=<?php echo $disthree; ?>;

  var price=<?php echo $price; ?>;
  var oneprice=solveDiscount(price,disone,distwo,disthree,disall,number);
  $("#goodsprice").text(oneprice.toFixed(2));

  var endprice=(number*oneprice).toFixed(2);
  $("#buyprice").text(endprice);
  $("#number").val(number);
})

$("#less").click(function(){
  var number=$("#number").val();
  if(number<=1)
    return;
  number--;
  
  var disall=<?php echo $disall; ?>;
  var disone=<?php echo $disone; ?>;
  var distwo=<?php echo $distwo; ?>;
  var disthree=<?php echo $disthree; ?>;

  var price=<?php echo $price; ?>;
  var oneprice=solveDiscount(price,disone,distwo,disthree,disall,number);
  $("#goodsprice").text(oneprice.toFixed(2));

  var endprice=(number*oneprice).toFixed(2);

  $("#buyprice").text(endprice);
  $("#number").val(number);
})

function solveDiscount(prePrice,disOne,disTwo,disThree,disTol,number)
{
  if(disOne==-1)
    disOne=1;
  if(disTwo==-1)
    disTwo=1;
  if(disThree==-1)
    disThree=1;
  if(disTol==-1)
    disTol=1;
  var afterPrice=0;
  afterPrice=prePrice*disTol;
  if(number==1)
    afterPrice*=disOne;
  else if(number==2)
  {
    if(disTwo!=1)
      afterPrice*=disTwo;
    else
      afterPrice*=disOne;
  }
  else if(number>=3)
  {
    if(disThree!=1)
      afterPrice*=disThree;
    else if(disTwo!=1)
      afterPrice*=disTwo;
    else
      afterPrice*=disOne;
  }
  return afterPrice;
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