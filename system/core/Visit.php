<?php
class Visit{ 
	/* 保存访客 */
	public function save($uri){
		$mysql = new system\core\db\Mysql('WRITE');
		$ipInfo = new system\plugin\outer\GetIpInfo\GetIpInfo();
		$browser = $ipInfo->GetBrowser();
		$address = $ipInfo->Getaddress();
		print_r($address);die;
		$ip = $ipInfo->Getip();
		$country = $address[0][0];
		$province = $address[0][1];
		print_r($address);die;
		$city = isset($address[0][2])? $address[0][2]:'';
		//print_r($ip);die;
		$sql = 'select * from vimkid_article limit1 ' ;
		$result = $mysql->execute($sql);
		//print_r($result);die;
	}
}
