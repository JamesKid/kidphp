<?php
class AjaxService {
	/** 获取随机内容 
	 * @params categoryid
	 * @params
	 * 
	 */
	/* 获取随机内容 */
	public function getRandList(){
		$mysql = new system\core\db\Mysql();
		$count = $mysql->getTableRows('article'); //获取表记录数量
		$randObject = new system\plugin\kidphp\kidphp_rand\Rand();
		$params = $randObject->noRepeatRand(1,$count,4);
		if(!$params['error']){
			$randInObject = new system\plugin\kidphp\kidphp_convert\Convert();
			$randIn = $randInObject->arrayToFormatString($params['data'],',');
			$sql = "select article_username,article_id,article_title,article_createtimeymd,article_seodescription from vimkid_article where article_id IN (".$randIn.")";
			$result = $mysql->execute($sql);
			//$result = json_encode($result);
			return $result;
		}else{
			return $params;
		}
	}
	/* 获取热门内容 */
	public function getHotList(){
		$mysql = new system\core\db\Mysql();
		$count = $mysql->getTableRows('article'); //获取表记录数量
		$randObject = new system\plugin\kidphp\kidphp_rand\Rand();
		$params = $randObject->noRepeatRand(1,$count,4);
		if(!$params['error']){
			$randInObject = new system\plugin\kidphp\kidphp_convert\Convert();
			$randIn = $randInObject->arrayToFormatString($params['data'],',');
			$sql = "select article_username,article_id,article_title,article_createtimeymd,article_seodescription from vimkid_article where article_id IN (".$randIn.")";
			$result = $mysql->execute($sql);
			//$result = json_encode($result);
			return $result;
		}else{
			return $params;
		}
	}
}
?>
