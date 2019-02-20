<?php
class JiekouController {
    public function index(){
    }

    public function getIp(){
        $ip = $this->getIpFunction();
        echo $ip;
    }
    public function getParams()
    {
        
        $ret = array();
        $params = $_POST;
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                $ret[$key] = $value;
            }
            ksort($ret); //方便进行签名设置
        }
        //$ret = $this->getret(); //获取所有传参
        if (isset($ret['appId'])) unset($ret['appId']);
        if (isset($ret['signature'])) unset($ret['signature']);

        if (!empty($ret)) {
            $srcStr = '';
            foreach ($ret as $key => $value) {
                $srcStr .= $key . "=" . $value . "&";
            }
            $srcStr .= '62940de5b73411e898d190b11c2371a5';
            $signStr = md5($srcStr);
            if ($_POST['signature'] != $signStr) {
                $result = array(
                    'result'=>true,
                );
                echo json_encode($result,true);
            }
        } else {
            $result = array(
                'result'=>false,
            );
            echo json_encode($result,true);
        }
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

    /** 
     * 获客是否存在新评论
     */
    public function getComments(){
    }
}
?>
