<?php
class ArticleService extends PublicCore{
	/** 文章服务
	 * 
	 */
    public $mysqlRead;
    public function __construct(){
        $this->mysqlRead = parent::getMysqlRead();
    }
	/* 添加阅读量 */
	public function addReading($articleId){
		//$mysql = new system\core\db\Mysql('WRITE');
		$mysql = $this->getMysqlWrite();
        $sql = "update vimkid_article set article_visit = article_visit+1 where article_id = $articleId";
        $result = $mysql->execute($sql);
	}

	/* 获取文章 */
	public function getArticleById($articleId){
        $mysql = $this->mysqlRead;
        $sql = "select * from vimkid_article where article_status = 1 and article_id =".$articleId;
        $result = $mysql->select($sql);
        return $result;
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
}
?>
