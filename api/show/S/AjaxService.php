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
            $sql = "
                select 
                    a.article_id,
                    a.username,
                    a.createtimeymd,
                    b.seodescription,
                    b.title
                from 
                    vimkid_article AS a, 
                    vimkid_article_info_".$GLOBALS['LANGUAGE']['nowLanguage'] ." AS b  
                where 
                    a.article_id = b.article_id 
                    and a.categoryid = 1 
                    and a.status = 1 
                    and a.article_id IN (".$randIn.")";
            $result = $mysql->execute($sql);
            $result = $result->fetchAll();
            $articleIds = BaseLib::fetchArticleId($result); // 获取过滤后的ids,逗号分隔
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
            $sql = "
                select 
                    article_id,
                    seokeywords 
                from 
                    vimkid_article_info_".$GLOBALS['LANGUAGE']['nowLanguage']."
                where 
                    article_id IN (".$randIn.")";
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
            $sql = "
                select 
                    username,
                    article_id,
                    title,
                    createtimeymd,
                    seodescription,
                    status = 1 
                from 
                    vimkid_article 
                where 
                    categoryid=1 and article_id IN (".$randIn.")";
            $result = $mysql->execute($sql);
            return $result;
        }else{
            return $params;
        }
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

    /* 最新vim文章 */
    public function getNewList(){
        $mysql = $this->mysqlRead;
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
                a.article_id = b.article_id 
                and categoryid=1 
                and a.status=1 
                and a.article_id 
            order by 
                a.createtime desc 
            limit 5";
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result;
    }

    /* 最新其他文章 */
    public function getOtherNewList(){
        $mysql = new system\core\db\Mysql();
        $sql = "
            select 
                username,
                article_id,
                title,
                createtimeymd,
                seodescription 
            from 
                vimkid_article 
            where categoryid=1 
                and status=1 
                and article_id 
                and categoryname != 'vim'
                and categoryname != 'news'
            order by 
                createtime desc 
            limit 5";
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result;
    }

    /* 站点新闻 */
    public function getNews(){
        $mysql = $this->mysqlRead;
        $sql = "
            select 
                a.article_id,
                a.username,
                a.createtimeymd,
                b.title,
                b.seodescription,
                c.content
            from 
                vimkid_article AS a,
                vimkid_article_info_".$GLOBALS['LANGUAGE']['nowLanguage']." AS b,
                vimkid_article_content_".$GLOBALS['LANGUAGE']['nowLanguage']." AS c 
            where 
                a.article_id = b.article_id and 
                a.article_id = c.article_id and 
                categoryname='news' 
            limit 0,1";
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result[0];
    }

    /* 获取最新内容*/
    public function getNew($offset,$size){
        $mysql = $this->mysqlRead;
        $sql = "
            select 
                a.article_id,
                a.username,
                a.createtimeymd,
                b.title,
                b.seodescription
            from 
                vimkid_article As a, 
                vimkid_article_info_".$GLOBALS['LANGUAGE']['nowLanguage']." AS b
            where 
                a.article_id = b.article_id and
                a.status=1 
            order by 
                a.createtime desc
            limit 
                ".$offset.",".$size;
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result;
    }

    /* 获取上线文章条数 */
    public function getNumber(){
        $mysql = new system\core\db\Mysql();
        $sql = "
            select 
                count(1)  as number
            from 
                vimkid_article 
            where 
                status=1";
        $result = $mysql->execute($sql);
        $result = $result->fetchAll();
        return $result[0]['number'];
    }
}
?>
