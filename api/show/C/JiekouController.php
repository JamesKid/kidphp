<?php
class JiekouController {
	public function index(){
		$type = isset($_GET['type'])? $_GET['type']: '';
		$number = isset($_GET['number'])? $_GET['number']: '';
		$result = array(
			'name' => 'wendy',
			'age' => 18,
			'type' => $type,
			'number' => $number
		);
		$result = json_encode($result,true);
		print_r($result);
	}

	public function getIp(){
        $ip = $this->getIpFunction();
		echo $ip;
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
