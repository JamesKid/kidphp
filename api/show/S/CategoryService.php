<?php
/* 目录服务 */
class CategoryService {
    /* 获取目录内容条数 */
    public function getSubListNumber($category){
        $mysql = new system\core\db\Mysql();
        $sql = "select count(1)  as number
            from vimkid_article AS a, vimkid_article_info_en AS b
            where a.article_id = b.article_id and a.article_status=1 
                and b.article_subcategoryname='".$category."'";
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result[0]['number'];
    }

    /* 获取二级目录内容条数 */
    public function getSubCategoryList($category,$offset,$size){
        $mysql = new system\core\db\Mysql();
        $sql = "select 
                a.article_id,
                a.article_username,
                a.article_createtimeymd,
                b.article_seodescription,
                b.article_title
            from vimkid_article AS a, vimkid_article_info_en AS b 
            where a.article_id = b.article_id and a.article_status=1 
                and b.article_subcategoryname='".$category."' "."
            order by a.article_createtime desc
            limit ".$offset.",".$size;
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result;
    }

    /* 获取一级目录内容列表*/
    public function getCategoryList($category,$offset,$size){
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
            limit ".$offset.",".$size;
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result;
    }


}
?>
