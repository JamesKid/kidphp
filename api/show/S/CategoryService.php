<?php
/* 目录服务 */
class CategoryService {
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
	/* 获取目录内容条数 */
	public function getSubListNumber($category){
		$mysql = new system\core\db\Mysql();
		$sql = "select 
                count(1)  as number
			from vimkid_article 
			where article_status=1 
				and article_subcategoryname='".$category."'";
		$result = $mysql->execute($sql);
        $result = $result->fetchAll();
		return $result[0]['number'];
	}

	/* 获取二级目录内容条数 */
	public function getSubCategoryList($category){
		$mysql = new system\core\db\Mysql();
		$sql = "select 
                article_id,
                article_title,
                article_seodescription,
                article_username,
                article_createtimeymd
			from vimkid_article 
			where article_status=1 
                and article_subcategoryname='".$category."' "."
            order by article_createtime desc
            ";
		$result = $mysql->execute($sql);
        $result = $result->fetchAll();
		return $result;
	}

	/* 获取一级目录内容条数 */
	public function getCategoryList($category){
		$mysql = new system\core\db\Mysql();
		$sql = "select 
                article_id,
                article_title,
                article_seodescription,
                article_username,
                article_createtimeymd
			from vimkid_article 
			where article_status=1 
                and article_categoryname='".$category."' "."
            order by article_createtime desc
            ";
		$result = $mysql->execute($sql);
        $result = $result->fetchAll();
		return $result;
	}

	/* 获取最新内容*/
	public function getNew(){
		$mysql = new system\core\db\Mysql();
		$sql = "select 
                article_id,
                article_title,
                article_seodescription,
                article_username,
                article_createtimeymd
			from vimkid_article 
			where article_status=1 
            order by article_createtime desc
            ";
		$result = $mysql->execute($sql);
        $result = $result->fetchAll();
		return $result;
	}

}
?>
