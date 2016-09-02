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
			$sql = "select article_username,article_id,article_title,article_createtimeymd,article_seodescription from vimkid_article where article_categoryid = 1 and article_id IN (".$randIn.")";
			$result = $mysql->execute($sql);
			//$result = json_encode($result);
			return $result;
		}else{
			return $params;
		}
	}
	/* 最热文章 */
	public function getHotList(){
		$mysql = new system\core\db\Mysql();
		$count = $mysql->getTableRows('article'); //获取表记录数量
		$randObject = new system\plugin\kidphp\kidphp_rand\Rand();
		$params = $randObject->noRepeatRand(1,$count,4);
		if(!$params['error']){
			$randInObject = new system\plugin\kidphp\kidphp_convert\Convert();
			$randIn = $randInObject->arrayToFormatString($params['data'],',');
			$sql = "select article_username,article_id,article_title,article_createtimeymd,article_seodescription from vimkid_article where article_categoryid=1 and article_id IN (".$randIn.")";
			$result = $mysql->execute($sql);
			//$result = json_encode($result);
			return $result;
		}else{
			return $params;
		}
	}

	/* 最新文章 */
	public function getNewList(){
		$mysql = new system\core\db\Mysql();
		$sql = "select 
				article_username,
				article_id,
				article_title,
				article_createtimeymd,
				article_seodescription 
			from vimkid_article 
			where article_categoryid=1 
				and article_status=1 
				and article_id 
			order by article_createtime desc 
			limit 5";
		$result = $mysql->execute($sql);
		//$result = json_encode($result);
		return $result;
	}
}
?>
