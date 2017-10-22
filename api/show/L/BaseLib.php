<?php
/* 一些常用库方法 */
class BaseLib {
    /* 获取ArticleId */
    public static function fetchArticleId($articleArray){
        $result = '';
        foreach( $articleArray as $k => $v ){
            $result = $result.$v['article_id'].',';
        }
        $result = substr($result,0,strlen($result)-1);
        return $result;
    }
}

