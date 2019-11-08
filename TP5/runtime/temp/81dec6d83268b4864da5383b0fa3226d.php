<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\index\senddata.html";i:1572619565;}*/ ?>
<?php if(is_array($goodslist) || $goodslist instanceof \think\Collection || $goodslist instanceof \think\Paginator): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsline): $mod = ($i % 2 );++$i;?>
        <div class="order-content"><!-- 每一个的id为list-cont1  -->
          <ul class="item-content layui-clear">
            <li class="th th-chk">
              <div class="select-all">

               <!--  <div class="cart-checkbox" id="choose">
                 <input class="CheckBoxShop check" id="" type="checkbox" num="all" name="select-all" value="true">
               </div> -->

              </div>
            </li>
            <li class="th th-item">
              <div class="item-cont">
                <a href="javascript:;"><img src=<?php echo getphotourl($goodsline['goodsname']); ?> alt="" id="goodschange<?php echo $time; ?>"></a>
                <div class="text">
                  <div class="title" id='carname<?php echo $time; ?>'><?php echo $goodsline['goodsname']; ?></div>
                </div>
              </div>
            </li>
            <li class="th th-price">
              <span class="th-su" id="one"><?php echo $goodsline['price']; ?></span> <!--单价-->
            </li>
           <li class="th th-amount">
             <div class="box-btn layui-clear" id="list-cont">
           
               <!-- <div class="less layui-btn" id="less"></div>
               <input class="Quantity-input" type="" name="" value="1" disabled="disabled" id="number">
               <div class="add layui-btn" id="add"></div> -->
           &nbsp;&nbsp;&nbsp;&nbsp;
             </div>
           </li> 
            
            <li class="th th-op">
             <a>
              <span id='dele<?php echo $time++; ?>'>删除</span> </a>
            </li>
          </ul>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <script>
          for(var i=1;i<<?php echo $time; ?>;i++)
          {
            /*$('#dele'+i).click(function(){
              var goodsname=$('#carname').text();
              layer.msg(goodsname);
              $('#goodslist').load('senddata.html',{goodsname:goodsname},function(data){});
            })*/

            $("#goodschange"+i).click({id:i},function(s){
              var goodsname=$('#carname'+s.data.id).text();

              $.post('isInSail',{'goodsname':goodsname},function(data){
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

            $('#dele'+i).on('click',{id:i},function(s){
              var goodsname=$('#carname'+s.data.id).text();
              
              $('#goodslist').load('senddata.html',{goodsname:goodsname},function(data){layer.msg('删除成功！');});
            })
          }
        </script>

