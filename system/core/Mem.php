<?php
/* memcache缓存配置
 *  test    测试环境
 *  online  线上环境
 */
class Mem {
    /** 
     * 初始化方法
	 */
    protected $mem;
	public function __construct(){
		include($_SERVER['DOCUMENT_ROOT'].'/conf/Config.php'); //引用配置文件
		$memIp = $config['MEMERCACHE']['MASTER'][0]['IP'];       // 主memcache库 ip
		$memPort = $config['MEMERCACHE']['MASTER'][0]['PORT'];       // 主memcache库 ip
        $this->initMem($memIp,$memPort);
	}

    /* 初始化缓存 */
	public function initMem($memIp,$memPort){
        $mem = new Memcache;
        $mem->connect($memIp, $memPort);
        $this->mem = $mem; 
	}
	public function set($key,$text,$other,$time){
        $result = $this->mem->set($key, $text, $other, $time);
        return $result;
    }
	public function get($key){
        $result = $this->mem->get($key);
        return $result;
    }

}
