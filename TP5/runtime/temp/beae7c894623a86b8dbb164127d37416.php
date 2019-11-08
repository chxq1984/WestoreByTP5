<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"E:\WARMP\wamp64\www\TP5\public/../application/admin\view\index\showgoods.html";i:1572704582;}*/ ?>
  <?php if(is_array($goodsList) || $goodsList instanceof \think\Collection || $goodsList instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsline): $mod = ($i % 2 );++$i;?>
        <div class="order-content"><!-- 每一个的id为list-cont1  -->
          <ul class="item-content layui-clear">
            <li class="th th-chk">
              <div class="select-all">
              </div>
            </li>
            <li class="th th-item">
              <div class="item-cont">
                <a href="javascript:;" ><img src=<?php echo getphotourl($goodsline['goods_name']); ?> alt="" id="addgoods<?php echo $time; ?>"></a>
                <div class="text">
                  <div class="title" id='gname<?php echo $time; ?>'><?php echo $goodsline['goods_name']; ?></div>
                </div>
              </div>
            </li>
            <li class="th th-price">
              <span class="th-su" id="gprice<?php echo $time; ?>"><?php echo $goodsline['price']; ?></span> 
            </li>
            <li class="th th-amount" id="gremain<?php echo $time; ?>">
              <?php echo $goodsline['remain_number']; ?>
            </li>
            <li class="th th-sum">
              <span class="sum" id="gsalesnumber<?php echo $time; ?>"><?php echo $goodsline['sales_number']; ?></span><!--总价-->
            </li>


            <li class="th th-op">
             <span id="gdown<?php echo $time++; ?>">下架</span>
            </li>
          </ul>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>

<script>
  
$(document).ready(function(){

  for(var i=1;i<<?php echo $time; ?>;i++)
  {
    var name='#gdown'+i;
    $(name).on('click',{id:i},function(s){
      var goodsname=$('#gname'+s.data.id).text();

      $.post('isInSeconds',{goodsname:goodsname},function(data){
        if(data=='0')
        {
          layer.msg('商品在秒杀列表内，请先将商品移出秒杀列表！');
        }
        else
        {
          $("#goodslist").load("sendgoods",{goodsname:goodsname});
          layer.msg('商品下架成功！');
        }

      })

    })

    var name2='#addgoods'+i;
    $(name2).on('click',{id:i},function(s){
      var goodsname=$('#gname'+s.data.id).text();
      
    layer.prompt({
    formType: 3,
    value: '',
    title: '请输入添加的商品数量'
 }, function(value,index){
    if(!(value>='0'&&value<='9'))
    {
      layer.msg("请输入数字！");
      return;
    }
    $.post("addoldgoods",{goodsname:goodsname,addnumber:value,id:s.data.id},
      function(data){
        //返回数据格式：id.number
          temp=data.split('.');
          id=temp[0];
          number=temp[1];
          layer.msg('商品增加成功！');
          $('#gremain'+id).text(number);
      })
    layer.close(index);
    })

    })
  }
})

</script>