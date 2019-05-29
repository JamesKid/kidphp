<?php
/*  
 * des: 统计类(支持html5流式布局)
 * web: http://echarts.baidu.com 
 *        http://www.hcharts.cn/demo/index.php   
 *
 */

use system\core\db;
class EchartsController {

    /** 
     * @params categoryid
     * @params
     * 
     */
    public function getRandList(){
        $mysql = new system\core\db\Mysql();
        $count = $mysql->getTableRows('article'); //获取表记录数量
        $randObject = new system\plugin\kidphp\kidphp_rand\Rand();
        $params = $randObject->noRepeatRand(1,$count,4);
        if(!$params['error']){
            $randInObject = new system\plugin\kidphp\kidphp_convert\Convert();
            $randIn = $randInObject->arrayToFormatString($params['data'],',');
            $sql = "select article_username,article_id,article_title,article_createtimeymd from vimkid_article where article_id IN (".$randIn.")";
            $result = $mysql->select($sql);
            $result = json_encode($result);
            echo $result;
        }else{
            echo $params['errorInfo'];
        }
    }
    /* 获取推荐内容 */
    public function getRecommendList(){
        echo "cc";
    }

}
?>
