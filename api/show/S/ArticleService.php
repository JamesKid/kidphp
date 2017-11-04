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
        $mysql = $this->getMysqlWrite();
        $sql = "
            update 
                vimkid_article 
            set 
                visit = visit+1 where article_id = $articleId";
        $result = $mysql->execute($sql);
    }

    /* 获取访问量 */
    public function getVisited($articleId){
        $mysql = new system\core\db\Mysql();
        $sql = "
            select 
                visit 
            from 
                vimkid_article 
            where 
                article_id=".$articleId;
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result[0]['visit'];
    }

    /* 获取文章 */
    public function getArticleById($articleId){
        echo 'cc'die;
        $mysql = $this->mysqlRead;
        $sql = "
            select 
                * 
            from 
                vimkid_article 
            where 
                status = 1 and 
                article_id =".$articleId;
        $result = $mysql->select($sql);
        $sqlContent = "
            select 
                content 
            from 
                vimkid_content_".$GLOBALS['LANGUAGE']['nowLanguage']." 
            where 
                article_id =".$articleId;
        $resultContent = $mysql->select($sqlContent);
        $sqlInfo = "select * from vimkid_article_info_".$GLOBALS['LANGUAGE']['nowLanguage']
            ." where article_id =".$articleId;
        $resultInfo = $mysql->select($sqlInfo);

        $resultMerge = array_merge($result[0],$resultInfo[0],$resultContent[0]);
        return $resultMerge;
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
            $sql = "select article_id from vimkid_article where status = 1 and article_id IN (".$randIn.")";
            $idResult = $mysql->execute($sql);
            $idResult = $idResult->fetchAll();
            $articleIds = BaseLib::fetchArticleId($idResult);
            $sql2 = "select article_id,seokeywords from vimkid_article_info_".$GLOBALS['LANGUAGE']['nowLanguage']." where article_id IN (".$articleIds.")"; 
            $result = $mysql->execute($sql2);
            $result = $result->fetchAll();
            return $result;
        }else{
            return $params;
        }
    }

}
