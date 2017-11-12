<?php
/* 目录服务 */
class CategoryService {
    /* 获取目录内容条数 */
    public function getSubListNumber($category){
        $mysql = new system\core\db\Mysql();
        $sql = "
            select 
                count(1)  as number
            from 
                vimkid_article AS a, 
                vimkid_article_info_".$GLOBALS['LANGUAGE']['nowLanguage']." AS b
            where 
                a.article_id = b.article_id and 
                a.status=1 and 
                a.subcategory='".$category."'";
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result[0]['number'];
    }

    /* 获取二级目录内容 */
    public function getSubCategoryList($category,$offset,$size){
        $mysql = new system\core\db\Mysql();
        $sql = "
            select 
                a.article_id,
                a.username,
                a.createtimeymd,
                b.seodescription,
                b.title
            from 
                vimkid_article AS a, 
                vimkid_article_info_".$GLOBALS['LANGUAGE']['nowLanguage']." AS b 
            where 
                a.article_id = b.article_id and a.status=1 and 
                a.subcategory='".$category."' "."
            order by 
                a.createtime desc
            limit 
                ".$offset.",".$size;
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result;
    }

    /* 获取一级目录内容列表*/
    public function getCategoryList($category,$offset,$size){
        $mysql = new system\core\db\Mysql();
        $sql = "
            select 
                a.article_id,
                a.username,
                a.createtimeymd,
                b.title,
                b.seodescription 
            from 
                vimkid_article AS a,
                vimkid_article_info_".$GLOBALS['LANGUAGE']['nowLanguage'] ." AS b  
            where 
                a.status=1 and 
                a.categoryname='".$category."' "."
            order by 
                a.createtime desc 
            limit ".$offset.",".$size;
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result;
    }


}
?>
