<?php
class JiekouController {
    public function index(){
    }

    public function getIp(){
        $ip = $this->getIpFunction();
        echo $ip;
    }

    /** 
     * 获取英语每日一句
     */
    public function getDailySentence(){
        header('Content-Type:text/html; charset=utf-8');
        $nowyear=date("Y");
        $nowmouth = date('m');
        $nowday = date('d');
        $date = mt_rand("2012",$nowyear)."-".mt_rand("1",$nowmouth)."-".mt_rand("1",$nowday);
        $content=file_get_contents('http://open.iciba.com/dsapi/?date='.$date);
        $arr=json_decode($content,true);
        print_r($arr); 
    }

    /** 
     * 获客户端口外网IP地址
     */
    public function getIpFunction(){
        $ip='未知IP';
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            return $this->is_ip($_SERVER['HTTP_CLIENT_IP'])?$_SERVER['HTTP_CLIENT_IP']:$ip;
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            return $this->is_ip($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$ip;
        }else{
            return $this->is_ip($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:$ip;
        }
    }
    public function is_ip($str){
        $ip=explode('.',$str);
        for($i=0;$i<count($ip);$i++){  
            if($ip[$i]>255){  
                return false;  
            }  
        }  
        return preg_match('/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}$/',$str);  
    }
}
?>
