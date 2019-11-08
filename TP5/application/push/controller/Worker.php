<?php
 
namespace app\push\controller;
 
use think\worker\Server;
use app\admin\model\Seconds;
use think\Db;
//处理通信业务
class Worker extends Server
{
    protected $socket = 'websocket://127.0.0.1:2346';
 	
	protected $socketAdmin;//只存储connection
	protected $socketCustomer=array();//以用户账户为索引存储connection
    /**
     * 收到信息
     * @param $connection
     * @param $data
     */
    public function onMessage($connection, $data)
    {
    	$dataList=explode('#',$data);
    	$flag=$dataList[0];
    	$message=$dataList[1];

    	if($flag=="Id")//用户类型判断
    	{
    		$this->addConnector($message,$connection);
    	}
    	else if($flag=="disAll")//优惠
    	{
    		$this->addDiscountAll($message);
    	}
    }
 
    /**
     * 当连接建立时触发的回调函数
     * @param $connection
     */
    public function onConnect($connection)
    {
 		
    }
 
    /**
     * 当连接断开时触发的回调函数
     * @param $connection
     */
    public function onClose($connection)
    {
        $position=array_search($connection,$this->socketCustomer);

        if($position)//为客户端断开连接
        {
        	unset($this->socketCustomer[$position]);
        }
        else//管理员断开连接
        {
        	$this->socketAdmin=0;
        }
    }
    /**
     * 当客户端的连接上发生错误时触发
     * @param $connection
     * @param $code
     * @param $msg
     */
    public function onError($connection, $code, $msg)
    {
        echo "error $code $msg\n";
    }
 
    /**
     * 每个进程启动
     * @param $worker
     */
    /*protected $processes = 4;//1进程*/
    public function onWorkerStart($worker)
    {   
        /*Timer::add(1,function(){

            $localtime=date("Y-m-d")." 00:00:00";
            $time=intval(strtotime($localtime))+24*60*60;
            $afterTime=date('Y-m-d H:i:s',$time);
            $command="select *from seconds where time between '".$localtime."' and '".$afterTime."'";
            $foundTime=Db::execute($command);
            
            if($foundTime)//今天有秒杀
            {
                $sec_flag=Secflag::where('id',1)->find();
                $sec_flag->flag=1;
                $sec_flag->save();
            }
            else//今天没有秒杀
            {
                $sec_flag=Secflag::where('id',1)->find();
                $sec_flag->flag=0;
                $sec_flag->save();
                sleep(60*60);//每1小时查一次
            }

            }); */
        
    }
    public function addConnector($id,$connection)//增加连接数
    {
    	if($id=="0")//管理员
    	{
    		$this->socketAdmin=$connection;
    	}
    	else//客户
    	{
    		$this->socketCustomer[$id]=$connection;
    	}
    }
    public function addDiscountAll($goodsname)//统一折扣通知
    {
    	foreach ($this->socketCustomer as $key => $value) {
    		$value->send("disAll#".$goodsname);
    	}
    }
}