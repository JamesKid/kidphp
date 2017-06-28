<?php
class AjaxService extends PublicCore {
	/* 获取随机内容 */
    public $mysqlRead;
    public function __construct(){
        $this->mysqlRead = parent::getMysqlRead();
    }
	public function getRandList(){
		$mysql = $this->mysqlRead;
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
		$mysql = $this->mysqlRead;
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
		$mysql = $this->mysqlRead;
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
		$mysql = $this->mysqlRead;
		$sql = "select 
				article_username,
				article_id,
				article_title,
				article_createtimeymd,
				article_seodescription,
				article_content
			from vimkid_article 
			where article_categoryname='news'
			limit 0,1";
		$result = $mysql->execute($sql);
		return $result;
	}

	/* 获取最新内容*/
	public function getNew($offset,$size){
		$mysql = $this->mysqlRead;
		$sql = "select 
                article_id,
                article_title,
                article_seodescription,
                article_username,
                article_createtimeymd
			from vimkid_article 
			where article_status=1 
            order by article_createtime desc
            limit ".$offset.",".$size;
		$result = $mysql->execute($sql);
        $result = $result->fetchAll();
		return $result;
	}

	/* 获取上线文章条数 */
	public function getNumber(){
		$mysql = new system\core\db\Mysql();
		$sql = "select 
                count(1)  as number
			from vimkid_article 
			where article_status=1";
		$result = $mysql->execute($sql);
        $result = $result->fetchAll();
		return $result[0]['number'];
	}
}
?>
