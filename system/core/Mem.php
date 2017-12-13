<?php
/* memcache缓存配置
 * 这里只封装常用方法，更多方法请参考: http://php.net/manual/zh/book.memcached.php
 */
class Mem extends PublicCore{
    /** 
     * 初始化方法
     */
    public $mem;
    public function __construct(){
        $memIp = $GLOBALS['CONFIG']['MEMCACHE']['MASTER'][0]['IP'];       // 主memcache库 ip
        $memPort = $GLOBALS['CONFIG']['MEMCACHE']['MASTER'][0]['PORT'];       // 主memcache库 ip
        $this->initMem($memIp,$memPort); // 初始化缓存
    }
    /* 初始化缓存 */
    public function initMem($memIp,$memPort){
        $mem = new Memcache;
        $mem->connect($memIp, $memPort);
        $this->mem = $mem; 
    }
    /* 设置key */
    public function set($key,$text,$other,$time){
        $result = $this->mem->set($key, $text, $other, $time);
        return $result;
    }
    /* 获取key */
    public function get($key){
        $result = $this->mem->get($key);
        return $result;
    }
    /* 删除key */
    public function delete($key){
        $result = $this->mem->delete($key);
        return $result;
    }
}
