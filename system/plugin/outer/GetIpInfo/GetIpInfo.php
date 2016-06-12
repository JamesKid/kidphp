<?php
// 作用取得客户端的ip、地理信息、浏览器、本地真实IP
// create to time:2011-12-16 
// name:wendi
// qq:512244752
//此文档编码类型:utf-8
//程序使用：
//include("XXX.php") //引入类
// $gifo = new get_gust_info();//实例化
// $gifo->GetBrowser(); //获得访客浏览器类型
// $gifo->GetLang();  //获得访客浏览器语言
// $gifo->GetOs();   //获取访客操作系统
// $gifo->Getip();   //获得访客真实ip
// $gifo->get_onlineip();   //获得本地真实IP
// $gifo->Getaddress($ip); //参数 $ip 是可选的，默认返回一个二维数组包含当前访客所在地的相关信息
// 
class get_gust_info { 
	////获得访客浏览器类型
	function GetBrowser(){
		if(!empty($_SERVER['HTTP_USER_AGENT'])){
			$br = $_SERVER['HTTP_USER_AGENT'];
			if (preg_match('/MSIE/i',$br)) {    
				$br = 'MSIE';
			}elseif (preg_match('/Firefox/i',$br)) {
				$br = 'Firefox';
			}elseif (preg_match('/Chrome/i',$br)) {
				$br = 'Chrome';
			}elseif (preg_match('/Safari/i',$br)) {
				$br = 'Safari';
			}elseif (preg_match('/Opera/i',$br)) {
				$br = 'Opera';
			}else {
				$br = 'Other';
			}
			return $br;
		}else{return "获取浏览器信息失败！";} 
	}
	////获得访客浏览器语言
	function GetLang(){
		if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])){
			$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
			$lang = substr($lang,0,5);
			if(preg_match("/zh-cn/i",$lang)){
				$lang = "简体中文";
			}elseif(preg_match("/zh/i",$lang)){
				$lang = "繁体中文";
			}else{
				$lang = "English";
			}
			return $lang;
		}else{return "获取浏览器语言失败！";}
	}
	////获取访客操作系统
	function GetOs(){
		if(!empty($_SERVER['HTTP_USER_AGENT'])){
			$OS = $_SERVER['HTTP_USER_AGENT'];
			if (preg_match('/win/i',$OS)) {
				$OS = 'Windows';
			}elseif (preg_match('/mac/i',$OS)) {
				$OS = 'MAC';
			}elseif (preg_match('/linux/i',$OS)) {
				$OS = 'Linux';
			}elseif (preg_match('/unix/i',$OS)) {
				$OS = 'Unix';
			}elseif (preg_match('/bsd/i',$OS)) {
				$OS = 'BSD';
			}else {
				$OS = 'Other';
			}
			return $OS;  
		}else{return "获取访客操作系统信息失败！";}   
	}
	////获得访客真实ip
	function Getip(){
		$ip='';
		$ips='';
		$count='';
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){   
			$ip = $_SERVER["HTTP_CLIENT_IP"];
		}
		if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){ //获取代理ip
			$ips = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
		}
		if($ip){
			$ips = array_unshift($ips,$ip); 
		}
		if($ips){
			$count = count($ips);
			for($i=0;$i<$count;$i++){   
				if(!preg_match("/^(10|172\.16|192\.168)\./i",$ips[$i])){//排除局域网ip
					$ip = $ips[$i];
					break;    
				}  
			}  
		}  
		$tip = $ip ? $ip : $_SERVER['REMOTE_ADDR']; 
		if($tip=="127.0.0.1"){ //获得本地真实IP
			return $this->get_onlineip();   
		}else{
			return $tip; 
		}
	}
	////获得本地真实IP
	function get_onlineip() {
		//$site="http://www.ip138.com/ip2city.asp";
		$site = "https://www.l2.io/ip";
		$mip = file_get_contents($site);
		//$mip = '';
		if($this->checkIpv($mip)){
			/*preg_match("/\[.*\]/",$mip,$sip);
			$p = array("/\[/","/\]/");
			return preg_replace($p,"",$sip[0]);
			 */
			return $mip;
		}else{
			/* 写入日志到log *** */
			file_put_contents('/var/log/php',"\n".date('Y-m-d H:i:s')." get IP api site ".$site." have problem",FILE_APPEND);
			return "获取本地IP失败！";
		}
	}

	/** 检查正常ip 要求php版本大于5.2
	 */
	function checkIpv($ip){
		if(filter_var($ip, FILTER_VALIDATE_IP)) {
			return true;
		}
		else {
			return false;
		}
	}
	////根据ip获得访客所在地地名
	function Getaddress($ip=''){
		if(empty($ip)){
			$ip = $this->Getip();    
		}
		$ipadd = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip=".$ip);//根据新浪api接口获取
		if($ipadd){
			$charset = iconv("gbk","utf-8",$ipadd);   
			preg_match_all("/[\x{4e00}-\x{9fa5}]+/u",$charset,$ipadds);
			return $ipadds;   //返回一个二维数组
		}else{return "addree is none";}  
	} 
}
$gifo = new get_gust_info();
echo "你的ip:".$gifo->Getip();
echo "<br/>所在地：";
print_r($gifo->Getaddress());
echo "<br/>浏览器类型：".$gifo->GetBrowser();
echo "<br/>浏览器语言：".$gifo->GetLang();
echo "<br/>操作系统：".$gifo->GetOs();
?>
