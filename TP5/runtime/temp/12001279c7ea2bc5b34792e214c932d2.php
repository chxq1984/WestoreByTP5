<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"E:\WARMP\wamp64\www\TP5\public/../application/index\view\havebuy\showPage.html";i:1573122715;}*/ ?>
<?php if(is_array($goodslist) || $goodslist instanceof \think\Collection || $goodslist instanceof \think\Paginator): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsline): $mod = ($i % 2 );++$i;?>
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
                  <div class="title" id='carname'><?php echo $goodsline['goodsname']; ?></div>
                </div>
              </div>
            </li>
            <li class="th th-price">
              <span class="th-su" id="one"><?php echo $goodsline['buyingtime']; ?></span> <!--单价-->
            </li>
           <li class="th th-amount">
             <div class="box-btn layui-clear" id="list-cont">
           &nbsp;&nbsp;&nbsp;&nbsp;
             </div>
           </li> 
          </ul>
        </div>
<?php endforeach; endif; else: echo "" ;endif; ?>