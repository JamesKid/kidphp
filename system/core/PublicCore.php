<?php
class PublicCore {
    public $mysqlRead;
    public $mysqlWrite;
    public function __construct($config=array()){
    }
    /* 根据ip获取地址 */
    public function getAddress($ip){
        /* 获取表 */
        $point = strpos($ip,'.');
        $table = substr($ip,0,$point);
        $getIpInfo = new system\core\db\Mysql('IP');
        $sql = "select ip_country,ip_city,ip_province from `".$table."` where inet_aton(ip_begin) < inet_aton('".$ip."') and inet_aton(ip_end)> inet_aton('".$ip."')";
        $getIpInfo = $getIpInfo->execute($sql);
        $result =  $getIpInfo->fetchAll(PDO::FETCH_ASSOC);
        return $result[0];
    }
    /* 获取Ip信息*/
    public function getIpInfo(){
        $ipInfo = new system\plugin\outer\GetIpInfo\GetIpInfo(); // 获取ip
        return $ipInfo;
    }
    /* 获取mysql读取 链接*/
    public function getMysqlRead(){
        $this->mysqlRead = new system\core\db\Mysql();
        return $this->mysqlRead;
    }
    /* 获取mysql写 链接*/
    public function getMysqlWrite(){
        $this->mysqlWrite = new system\core\db\Mysql('WRITE');
        return $this->mysqlWrite;
    }
    /* 获取转换的request uri*/
    public static function getRequestUriFetch(){
        $staticUrl = $_SERVER['REQUEST_URI']; // 获取静态地址
        $staticUrl = substr($staticUrl,1);
        $staticUrl = str_replace('/','_',$staticUrl);
        $staticUrl = str_replace('.html','',$staticUrl);
        $staticUrl = $staticUrl.'.html';
        $staticUrl = $_SERVER['DOCUMENT_ROOT'].'/system/page_cache/'.$GLOBALS['LANGUAGE']['nowLanguage'].'/'.$staticUrl;
        return $staticUrl;
    }
}
