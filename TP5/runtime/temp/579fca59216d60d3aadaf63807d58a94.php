<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\shopcar\index.html";i:1572878025;s:62:"E:\WARMP\wamp64\www\TP5\application\index\view\index\head.html";i:1572867736;s:64:"E:\WARMP\wamp64\www\TP5\application\index\view\index\footer.html";i:1572574327;}*/ ?>
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
      <p>购物车</p>
    </div>
    <div class="cart w1200">
      <div class="cart-table-th">
        <div class="th th-chk">
          <div class="select-all">
            <div class="cart-checkbox">
              <!-- <input class="check-all check" id="allCheckked" type="checkbox" value="true"> -->
            </div>
          <label>选择</label>
          </div>
        </div>
        
        <div class="th th-item">
          <div class="th-inner">
            商品
          </div>
        </div>

        <div class="th th-item" style="margin-left: -150px">
          <div class="th-inner">
            原价
          </div>
        </div>

        <div class="th th-price" style="margin-left: -190px">
          <div class="th-inner">
            现价
          </div>
        </div>
        <div class="th th-amount">
          <div class="th-inner">
            数量
          </div>
        </div>
        <div class="th th-sum">
          <div class="th-inner">
            小计
          </div>
        </div>
        <div class="th th-op">
          <div class="th-inner">
            操作
          </div>
        </div>  
      </div>
      <div class="OrderList">
        <?php if(is_array($goodslist) || $goodslist instanceof \think\Collection || $goodslist instanceof \think\Paginator): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsline): $mod = ($i % 2 );++$i;?>
        <div class="order-content"><!-- 每一个的id为list-cont1  -->
          <ul class="item-content layui-clear">
            <li class="th th-chk">
              <div class="select-all">

                <div class="cart-checkbox" id="choose<?php echo $time; ?>">
                  <input class="CheckBoxShop check" id="" type="checkbox" num="all" name="select-all" value="true">
                </div>

              </div>
            </li>
            <li class="th th-item">
              <div class="item-cont">
                <a href="javascript:;"><img src=<?php echo getphotourl($goodsline['goodsname']); ?> alt="" id="changepage<?php echo $time; ?>"></a>
                <div class="text">
                  <div class="title" id='carname<?php echo $time; ?>'><?php echo $goodsline['goodsname']; ?></div>
                </div>
              </div>
            </li>

            <li class="th th-price" style="margin-left: -150px">
              <span class="th-su" id="preone<?php echo $time; ?>"><?php echo $goodsline['price']; ?></span> <!--原价-->
            </li>

            <li class="th th-price" style="margin-left: -50px">
              <span class="th-su" id="one<?php echo $time; ?>"><?php echo $goodsline['price']; ?></span> <!--单价-->
            </li>

            <li class="th th-amount">
              <div class="box-btn layui-clear" id="list-cont<?php echo $time; ?>">

                <div class="less layui-btn" id="less">-</div>
                <input class="Quantity-input" type="" name="" value="1" disabled="disabled" id="number">
                <div class="add layui-btn" id="add">+</div>

              </div>
            </li>
            <li class="th th-sum">
              <span class="sum" id="sum<?php echo $time++; ?>"><?php echo $goodsline['price']; ?></span><!--小计-->
            </li>
            <li class="th th-op">
             <a href="delegoods?goodsname=<?php echo $goodsline['goodsname']; ?>">删除</span> </a>
            </li>
          </ul>
        </div><?php endforeach; endif; else: echo "" ;endif; ?><!--   终点  -->
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
        <div class="th Settlement">
          <button class="layui-btn" id='buynow'>结算</button>
        </div>
        <div class="th total">
          <p>应付：<span class="pieces-total" id='endsumprice'>0</span></p>
        </div>
      </div>
    </div>
  </div>
<script>

  $('#login-change').attr('href','http://localhost/tp5/public/index.php/index/index/personcentral');
  $('#login-change').text('个人中心');


  var goodsDiscount='<?php echo $goodsDiscount; ?>';//统一折扣
  var discountList=goodsDiscount.split(',');
  var discountAddOne='<?php echo $goodsAddOne; ?>';//叠加折扣第一件折扣
  var addOneList=discountAddOne.split(',');

  for(var i=1;i<<?php echo $time; ?>;i++)//计算现价
  {
      var price=parseFloat($("#one"+i).text());
      var discount=parseFloat(discountList[i-1]);//统一折扣
      var addOne=parseFloat(addOneList[i-1]);//第一件折扣
      var aftrPrice=price*discount*addOne;
      $("#one"+i).text(aftrPrice.toFixed(2));
      $("#sum"+i).text(aftrPrice.toFixed(2));
  }

  var allDiscountData='<?php echo $allDiscountData; ?>';//叠加折扣
  var allDiscountList=allDiscountData.split('/');

  window.onload=function(){
    for(var i=1;i<<?php echo $time; ?>;i++)
  {

     var id="#list-cont"+i;
     $(id).on("click","div#less",{id:id,goodsid:i},function(s){

        var discounts=allDiscountList[s.data.goodsid-1].split(',');
        var disOne=parseFloat(discounts[0]);
        var disTwo=parseFloat(discounts[1]);
        var disThree=parseFloat(discounts[2]);
        var totalDiscount=parseFloat(discountList[s.data.goodsid-1]);

        var number=$(s.data.id).children("input#number").val();
        if(number<=1)
          return;
        number--;
        $(s.data.id).children("input#number").val(number);
        var onename='#one'+s.data.goodsid;
        var sumname='#sum'+s.data.goodsid;

        var prePrice=parseFloat($("#preone"+s.data.goodsid).text());//原价
        var afterPrice=solveDiscount(number,prePrice,disOne,disTwo,disThree,totalDiscount);

        $(onename).text(afterPrice.toFixed(2));//更新现价

        var oneprice=$(onename).text();
        var allprice=oneprice*number;
        $(sumname).text(allprice.toFixed(2));//小计
        
        var endprice=solveEndPrice();
        $('#endsumprice').text(endprice.toFixed(2));
     })//减号
     $(id).on("click","div#add",{id:id,goodsid:i},function(s){
        var number=$(s.data.id).children("input#number").val();
        number++;

        var discounts=allDiscountList[s.data.goodsid-1].split(',');
        var disOne=parseFloat(discounts[0]);
        var disTwo=parseFloat(discounts[1]);
        var disThree=parseFloat(discounts[2]);
        var totalDiscount=parseFloat(discountList[s.data.goodsid-1]);

        $(s.data.id).children("input#number").val(number);
        var onename='#one'+s.data.goodsid;
        var sumname='#sum'+s.data.goodsid;

        var prePrice=parseFloat($("#preone"+s.data.goodsid).text());//原价
        var afterPrice=solveDiscount(number,prePrice,disOne,disTwo,disThree,totalDiscount);
        $(onename).text(afterPrice.toFixed(2));//更新现价

        var oneprice=$(onename).text();
        var allprice=oneprice*number;

        

        $(sumname).text(allprice.toFixed(2));

        var endprice=solveEndPrice();
        $('#endsumprice').text(endprice.toFixed(2));
     })//加号
      $("#choose"+i).on("click","input",{id:i},function(s){
      var name='#choose'+s.data.id;
      var sumname='#sum'+s.data.id;
      var temallprice=parseFloat($('#endsumprice').text());//总价
      var temprice=parseFloat($(sumname).text());//小计
      if($(name).children('input').prop("checked") == true)
      {
        temallprice+=temprice;
      }
      else
      {
        temallprice-=temprice;
      }
       $('#endsumprice').text(temallprice.toFixed(2));
     })//应付

      $("#changepage"+i).click({id:i},function(s){
        
        var goodsname=$("#carname"+s.data.id).text();

        $.post('/tp5/public/index.php/index/index/isInSail',{'goodsname':goodsname},function(data){
        if(data==1)
        {
          window.location='http://localhost/tp5/public/index.php/index/index/ctbuying/goods_name/'+goodsname;
        }
        else
        {
          layer.msg('此商品暂时已经下架！');
        }
        })

      })

  }
  }

  $('#buynow').click(function(){
    var isNoChoose=1;
    for(var i=1;i<<?php echo $time; ?>;i++)//遍历购物车
    {
        var choosename='#choose'+i;
        if($(choosename).children('input').prop("checked") == true)
        {
            isNoChoose=0;
            break;
        }
    }
    if(isNoChoose)//什么都没有选择
    {
      layer.msg('您没有选择任何商品！');
      return;
    }

    layer.prompt({
    formType: 1,
    value: '',
    title: '请输入密码'
 }, function(value,index){
  layer.close(index);
   if($.cookie('password')==value)
   {
      var totalprice=parseFloat($('#endsumprice').text());
      if(totalprice>$.cookie('balance'))
      {
        layer.msg('余额不足！');
        return;
      }

      var buyinglist=new Array();
      for(var i=1;i<<?php echo $time; ?>;i++)//遍历购物车
      {
          var choosename='#choose'+i;
          if($(choosename).children('input').prop("checked") == true)
          {
              var goodsname=$('#carname'+i).text();
              var number=$('#list-cont'+i).children("input#number").val();
              var goodsprice=$('#sum'+i).text();

              var linedata=goodsname+','+number+','+goodsprice;
              buyinglist.push(linedata);
          }
      }
      $.ajax({
        url:'http://localhost/tp5/public/index.php/index/shopcar/buying',
        data:{"totalprice":totalprice,"buyinglist":buyinglist},
        type:"post",
        success:function(data){
          if(data=='1')
          layer.msg('购买成功！');
          else//购买数量不足
          {
             var wrong="";
             var flag=0;
             for(var i=0;i<data.length;i++)
             {
                if(data[i]=="0")//此商品购买失败
                {
                   var inforList=buyinglist[i].split(",");
                   wrong=wrong+inforList[0]+"数量不足"+"<br>";
                }
                else
                  flag=1;
             }
             if(flag)
              wrong=wrong+"其余商品购买成功！";
             layer.msg(wrong);
          }
          setTimeout(function(){window.location.reload();}, 2000);
          
        }
      });
   }
   else
      layer.msg('密码错误！');
 });
  })

  function solveDiscount(number,prePrice,disOne,disTwo,disThree,totalDiscount)
  {
    var afterPrice;
    if(number==1)
    {
       afterPrice=prePrice*totalDiscount*disOne;
    }
    else if(number==2)
    {
       if(disTwo!=1)
        afterPrice=prePrice*totalDiscount*disTwo;
       else
        afterPrice=prePrice*totalDiscount*disOne;
    }
    else if(number>=3)
    {
      if(disThree!=1)
      afterPrice=prePrice*totalDiscount*disThree;
      else if(disTwo!=1)
      afterPrice=prePrice*totalDiscount*disTwo;
      else
      afterPrice=prePrice*totalDiscount*disOne;
    } 
    return afterPrice;
  }

  function solveEndPrice()
  {
    var endprice=0;
    for(var i=1;i<<?php echo $time; ?>;i++)
    {
      if($("#choose"+i).children('input').prop("checked") == true)
      {
        var price=parseFloat($("#sum"+i).text());//小计
        endprice+=price;
      }
    }
    return endprice;
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