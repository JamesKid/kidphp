<?php
/* memcache缓存配置
 * 这里只封装常用方法，更多方法请参考: http://php.net/manual/zh/book.memcached.php
 */
class Mem extends PublicCore{
    /** 
     * 初始化方法
     */
    public $memcached;
    public function __construct(){
        $memcachedIp = $GLOBALS['CONFIG']['MEMCACHED']['MASTER'][0]['IP'];       // 主memcache库 ip
        $memcachedPort = $GLOBALS['CONFIG']['MEMCACHED']['MASTER'][0]['PORT'];       // 主memcache库 ip
        $this->initMem($memcachedIp,$memcachedPort); // 初始化缓存
    }
    /* 初始化缓存 */
    public function initMem($memcachedIp,$memcachedPort){
        $memcached = new Memcached;
        $memcached->addServer($memcachedIp, $memcachedPort);
        $this->memcached = $memcached; 
    }
    /* 设置key */
    public function set($key,$text,$time){
        $result = $this->memcached->set($key, $text,$time);
        return $result;
    }
    /* 获取key */
    public function get($key){
        $result = $this->memcached->get($key);
        return $result;
    }
    /* 删除key */
    public function delete($key){
        $result = $this->memcached->delete($key);
        return $result;
    }
}
