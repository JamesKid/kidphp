<?php
//class Index extends AppPublic{
use system\core\db;
class AjaxController {

	/** 获取随机内容 
	 * @params categoryid
	 * @params
	 * 
	 */
	public function getRandList(){
		$mysql = new system\core\db\Mysql();
		$count = $mysql->getTableRows('article'); //获取表记录数量
		$randObject = new system\plugin\kidphp\kidphp_rand\Rand();
		$params = $randObject->noRepeatRand(1,$count,4);
		if(!$params['error']){
			$randInObject = new system\plugin\kidphp\kidphp_convert\Convert();
			$randIn = $randInObject->arrayToFormatString($params['data'],',');
			$sql = "select article_username,article_id,article_title,article_createtimeymd from vimkid_article where article_id IN (".$randIn.")";
			$result = $mysql->execute($sql);
			$result = json_encode($result);
			print_r($result);
		}else{
			print_r($params['errorInfo']);
		}
	}
	/* 获取推荐内容 */
	public function getRecommendList(){
		echo "cc";die;
	}

	/* 保存访客 */
	public function saveVisit(){
		echo "cc";die;
		/*
		$mysql = new system\core\db\Mysql();
		$ipInfo = new system\plugin\outer\GetIpInfo\GetIpInfo();
		$browser = $ipInfo->GetBrowser();
		$address = $ipInfo->Getaddress();
		$ip = $ipInfo->Getip();
		$country = $address[0][0];
		$province = $address[0][1];
		$city = $address[0][2];
		//print_r($ip);die;
		$sql = 'select * from vimkid_article limit1 ' ;
		$result = $mysql->execute($sql);
		//print_r($result);die;
		 */
	}
}
?>
