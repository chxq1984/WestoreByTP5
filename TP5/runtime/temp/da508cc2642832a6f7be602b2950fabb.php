<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"E:\WARMP\wamp64\www\TP5\public/../application/admin\view\sailmethod\discountadd.html";i:1572867212;s:62:"E:\WARMP\wamp64\www\TP5\application\admin\view\index\head.html";i:1572618399;s:64:"E:\WARMP\wamp64\www\TP5\application\admin\view\index\footer.html";i:1572574301;}*/ ?>
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

  <style type="text/css">
    .tl-price-input{
    width: 100%;
    border: 1px solid #ccc;
    padding: 7px 0;
    background: #F4F4F7;
    border-radius: 3px;
    padding-left:5px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s}

    .tl-price-input:focus{
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
    }
  </style>

  <div class="content content-nav-base shopcart-content">
    <div class="banner-bg w1200">
      <h3>美食商城</h3>
      <p>叠加折扣</p>
    </div>
    <div class="cart w1200">
      <div class="cart-table-th">
        <div class="th th-item">
          <div class="th-inner">
            商品
          </div>
        </div>
        <div class="th th-price">
          <div class="th-inner">
            原价
          </div>
        </div>
        <div class="th th-amount">
          <div class="th-inner">
            第一件折扣
          </div>
        </div>
        <div class="th th-sum">
          <div class="th-inner">
             第二件折扣
          </div>
        </div>
        <div class="th th-op">
          <div class="th-inner">
            第三件折扣
          </div>
        </div>  

      <div class="th th-op">
          <div class="th-inner">
            操作
          </div>
        </div> 

      </div>
      <div class="OrderList" id="goodslist">
        
       <?php if(is_array($goodsList) || $goodsList instanceof \think\Collection || $goodsList instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsline): $mod = ($i % 2 );++$i;?>
        <div class="order-content"><!-- 每一个的id为list-cont1  -->
          <ul class="item-content layui-clear">
            <li class="th th-chk">
              <div class="select-all">

              </div>
            </li>
             <li class="th th-item">
              <div class="item-cont">
                <a href="javascript:;"><img src=<?php echo getphotourl($goodsline['goodsname']); ?> alt=""></a>
                <div class="text">
                  <div class="title" id='gsname<?php echo $time; ?>'><?php echo $goodsline['goodsname']; ?></div>
                </div>
              </div>

            </li> 
            <li class="th th-price" style="margin-left: -115px">
              <span class="th-su" id="gsprice<?php echo $time; ?>"><?php echo $goodsline['price']; ?></span>
            </li>
          
           <li class="th th-price">
              <span class="th-su" id="disone<?php echo $time; ?>">
               <div style="color: black"><?php echo $goodsline['dcount_one']; ?></div>
               &nbsp;
                <div style="color: red;"><?php echo $goodsline['price']*$goodsline['dcount_one']; ?><div>
              </span>
            </li>

            <li class="th th-price">
              <span class="th-su" id="distwo<?php echo $time; ?>">
                <div style="color: black"><?php echo $goodsline['dcount_two']; ?></div>&nbsp;
                 <div style="color: red;"><?php echo $goodsline['price']*$goodsline['dcount_two']; ?></div>
              </span>
            </li>

            <li class="th th-price" style="margin-left: -50px">
              <span class="th-su" id="disthree<?php echo $time; ?>">
                <div style="color: black"><?php echo $goodsline['dcount_three']; ?></div>&nbsp;
                <div style="color: red;"><?php echo $goodsline['price']*$goodsline['dcount_three']; ?></div>
              </span>
            </li>
            
            <li class="th th-op" style="margin-left: -50px">
             <a>
              <span id='change<?php echo $time++; ?>'>管理</span> </a>
            </li>
          </ul>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>

      </div>

<div id="test" style="display: none;">
<form>
<li style="list-style: none;width: 242px;height: 38px;float: left;margin:20px 20px 10px 20px"><input type="number" name="one" class="tl-price-input" placeholder="第一件折扣" id="one" ></li>

<li style="list-style: none;width: 242px;height: 38px;float: left;margin:0px 20px 10px 20px"><input type="number" name="two" class="tl-price-input" placeholder="第二件折扣" id="two" ></li>

<li style="list-style: none;width: 242px;height: 38px;float: left;margin:0px 20px 20px 20px"><input type="number" name="three" class="tl-price-input" placeholder="第三件折扣" id="three" ></li>

</form>
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
        <div class="th Settlement">
          <button class="layui-btn" id='addcount'>增加</button>
        </div>
        <div class="th total">
         <span></span>
        </div> 
      </div>
    </div>
  </div>

<script>
  
  

  $(document).ready(function(){
    

    ws = new WebSocket("ws://127.0.0.1:2346");
    ws.onopen = function() {
        console.log("连接成功");
        var sendId="Id#0";//代表管理员
        ws.send(sendId);
    };

    $("#addcount").click(function(){
    layer.prompt({
    formType: 3,
    value: '',
    title: '请输入添加的商品名称'
 }, function(value,index){
    $.post("addwind",{goodsname:value},
      function(data){
        if(data=='1')
        {
          layer.msg('添加完成！');

          var sendData="disAll#"+value;
          ws.send(sendData);
          
          layer.close(index);
          setTimeout(function(){window.location.reload();
},2000); 
        }
        else if(data=='0')
        {
          layer.msg('不存在此商品！');
          return;
        }
        else if(data=='2')
        {
          layer.msg('已添加此商品！');
          return;
        }})
    })
})

    for(var i=1;i<<?php echo $time; ?>;i++)
    {
      var name='#change'+i;
      $(name).click({id:i},function(s){

      var goodsname=$('#gsname'+s.data.id).text();

    layer.open({
    type: 1,
    title: '请输入叠加折扣信息',   //标题
    area: ['300px', '280px'],   //宽高
    shade: 0.4,   //遮罩透明度
    content: $("#test"),//支持获取DOM元素
    btn: ['确定', '取消'], //按钮组
    scrollbar: false ,
    yes: function(index){
        var one=$('#one').val();
        var two=$('#two').val();
        var three=$('#three').val();

        if(!(parseFloat(one)>0&&parseFloat(one)<=1&&parseFloat(two)>0&&parseFloat(two)<=1&&parseFloat(three)>0&&parseFloat(three)<=1))
        {
          layer.msg('请输入小数或1！')
          return;
        }
        
        $.post('solvedisadd',{one:one,two:two,three:three,goodsname:goodsname},function(data){
          if(data=='1')
          {
            layer.msg('修改完成！');
            parent.location.reload();
          }
          else if(data=='2')
          {
            layer.msg('已将此商品移出！');
            parent.location.reload();
          }
        })
        }
        });

    })
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
