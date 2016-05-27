<?php
use system\core\db;
class ArticleController {

	/** 获取随机内容 
	 * @params categoryid
	 * @params
	 * 
	 */
	public function test(){
		echo "cc";die;
	}
	public function detail(){
		$article_id=$_GET['article_id'];
		print_r($article_id);die;
		$mysql = new system\core\db\Mysql();
		$count = $mysql->getTableRows('article'); //获取表记录数量
		$randObject = new system\plugin\kidphp\kidphp_rand\Rand();
		$params = $randObject->noRepeatRand(1,$count,4);
		if(!$params['error']){
			$randInObject = new system\plugin\kidphp\kidphp_convert\Convert();
			$randIn = $randInObject->arrayToFormatString($params['data'],',');
			$sql = "select article_id,article_title,article_createtime from vimkid_article where article_id IN (".$randIn.")";
			$result = $mysql->execute($sql);
			$result = json_encode($result);
			print_r($result);
		}else{
			print_r($params['errorInfo']);
		}
	}
}
?>
