<?php
class AjaxService {
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
			return $result;
		}else{
			return $params;
		}
	}

	/* 获取标签 */
	public function getTags(){
		$mysql = new system\core\db\Mysql();
		$count = $mysql->getTableRows('article'); //获取表记录数量
		$randObject = new system\plugin\kidphp\kidphp_rand\Rand();
		$params = $randObject->noRepeatRand(1,$count,4);
		if(!$params['error']){
			$randInObject = new system\plugin\kidphp\kidphp_convert\Convert();
			$randIn = $randInObject->arrayToFormatString($params['data'],',');
			$sql = "select article_id,article_seokeywords from vimkid_article where article_status = 1 and article_id IN (".$randIn.")";
			$result = $mysql->execute($sql);
            $result = $result->fetchAll();
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
			return $result;
		}else{
			return $params;
		}
	}

	/* 最新vim文章 */
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
		return $result;
	}

	/* 最新其他文章 */
	public function getOtherNewList(){
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
				and article_categoryname != 'vim'
				and article_categoryname != 'news'
			order by article_createtime desc 
			limit 5";
		$result = $mysql->execute($sql);
		return $result;
	}

	/* 站点新闻 */
	public function getNews(){
		$mysql = new system\core\db\Mysql();
		$sql = "select 
				article_username,
				article_id,
				article_title,
				article_createtimeymd,
				article_seodescription,
				article_content
			from vimkid_article 
			where article_categoryname='news'
			limit 1";
		$result = $mysql->execute($sql);
		return $result;
	}
}
?>
