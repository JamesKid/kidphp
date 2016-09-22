<?php
class ArticleService {
	/** 文章服务
	 * 
	 */
	/* 添加阅读量 */
	public function addReading($articleId){
		$mysql = new system\core\db\Mysql('WRITE');
        $sql = "update vimkid_article set article_visit = article_visit+1 where article_id = $articleId";
        $result = $mysql->execute($sql);
	}
}
?>
