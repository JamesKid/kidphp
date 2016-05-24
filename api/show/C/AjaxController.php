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
		print_r($mysql);die;
		echo "cc";die;
	}
	/* 获取推荐内容 */
	public function getRecommendList(){
	}
}
?>
