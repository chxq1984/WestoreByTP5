<?php
namespace app\push\controller;
use think\Controller;
use think\worker\Server;
use Workerman\Lib\Timer;
use app\admin\model\Seconds;
use app\index\model\Goods;
use app\index\model\Havingbuy;
use app\index\model\Customer_shop;
use think\Db;
use Redis;

 //处理秒杀业务
class Index extends Server {
    protected $socket = '';
    protected $processes = 4;//1进程
    protected $port = '2369';//监听端口
 
    /**
     * 每个进程启动
     * @param $worker
     */
    public function onWorkerStart($worker){
        
        $redis=new Redis();
        $redis->connect('127.0.0.1',6379);
        $redis->set('startFlag',0);//未设置秒杀
        
        Timer::add(1,function()use($redis){

            $localtimeTotal=date("Y-m-d H:i:s");

            $localtime=substr($localtimeTotal, 0,10)." 00:00:00";

            if(substr($localtimeTotal,11,8)=="00:05:05")//删除昨天的秒杀信息
            {
                //时间意义：1.不影响正在进行的秒杀，删除的是昨天的信息，而昨天只能持续5分钟，最多为00:04：59就结束了，因此不会影响,处理信息预留了5秒
                //2.不会打破10分钟的规则，10分钟在设置时就已经限制，当昨天的商品信息删除后到了今天就无法对商品做出修改了，因此10分钟就保留了下来
                $deleData=Seconds::where('time','<=',$localtime)->delete();
            }

            $time=intval(strtotime($localtime))+24*60*60;
            $afterTime=date('Y-m-d H:i:s',$time);
            $command="select *from seconds where time between '".$localtime."' and '".$afterTime."' and time>='".$localtimeTotal."'";

            $foundTime=Db::query($command);
            $flagStart=$redis->get('startFlag');//1：已设置秒杀信息
            if($foundTime&&!(intval($flagStart)))//设置秒杀
            {
                $redis->del('goods');//清理缓存
                $redis->del('username');

                $redis->set('startFlag',1);
                $redis->set('flag',1);
                $redis->set('goodsname',$foundTime[0]['goodsname']);
                $redis->set('seprice',$foundTime[0]['seprice']);
                $redis->set('goodsnumber',$foundTime[0]['goodsnumber']);
                $redis->set('time',$foundTime[0]['time']);

                for($i=1;$i<=intval($redis->get('goodsnumber'));$i++)
                {
                    $redis->rPush('goods',$i);
                }

            }
            
            $nowTime=intval(strtotime($localtimeTotal));//当前时间的秒数
            $startTime=intval(strtotime($redis->get('time')));//开始时间的秒数
            $endTime=$startTime+5*60;//结束时间
            $extendTime=$endTime+10;//十秒的容差

            if(intval($flagStart)&&$nowTime>=$startTime&&$nowTime<=$endTime)
            {
                //秒杀进行中
                $remainNumber=$redis->lLen('goods');
                if($remainNumber==0)//已卖完
                {
                    $redis->set('startFlag',0);
                    $this->solveEnd($redis);
                }
            }
            $flagStart=$redis->get('startFlag');//0：已提前结束 1:商品未卖完，时间到
            if(intval($flagStart)&&$nowTime>$endTime&&$nowTime<=$extendTime)
            {
                //秒杀时间到
                $redis->set('startFlag',0);
                $this->solveEnd($redis);
            }           

            }); 
    }

    public function solveEnd($redis)//处理mysql事务
    {
        $goodsname=$redis->get('goodsname');
        $goodsprice=$redis->get('seprice');
        $hideGoods=Seconds::where('goodsname',$goodsname)->find();
        $hideGoods['ispass']=1;
        $hideGoods->save();//隐藏已完成的秒杀
        $usernumber=$redis->lLen('username');
        $remainGoods=intval($redis->get('goodsnumber'))-$usernumber;//剩余商品数
        if($remainGoods!=0)//还有商品没有卖出
        {
            $addNumber=Goods::where('goods_name',$goodsname)->find();
            $addNumber->remain_number+=$remainGoods;
            $addNumber->save();
        }
        for($i=0;$i<$usernumber;$i++)
        {
            $username=$redis->lPop('username');

            /*$goodsData=Goods::where('goods_name',$goodsname)->find();
            $goodsData->remain_number-=1;
            $goodsData->save();//直接扣除数量*/

            $cushop=Customer_shop::where('username',$username)->find();
            $cushop->balance-=$goodsprice;
            $cushop->save();//减少余额


            $habuy=new Havingbuy;
            $habuy->username=$username;
            $habuy->goodsname=$goodsname;
            $habuy->save();//增加购买信息
            
        }
        $setZero=Goods::where('goods_name',$goodsname)->find();//将seckeep置0
        $setZero->seckeep=0;
        $setZero->save();

    }   

            
}
