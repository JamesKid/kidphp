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
		$sql = "select * from vimkid_article limit 10";
		$result = $mysql->execute($sql);
		$result = json_encode($result);
		return $result;
	}
	/* 获取推荐内容 */
	public function getRecommendList(){
	}
}
?>
