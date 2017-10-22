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

    /* 合并两个数组的info */
    public static function mergeInfo($result1,$result2){
        $result = $result1;
        foreach( $result1 as $k => $v ){
            $result[$k] = array_merge($v,$result2[$k]);
        }
        return $result;
        
    }
}

