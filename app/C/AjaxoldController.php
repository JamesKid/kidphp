<?php
//use system\core\db;
class AjaxController {

    /** 获取随机内容 
     * @params categoryid
     * @params
     * 
     */
    public function getRandList(){
        $mysql = $this->mysqlRead;
        $count = $mysql->getTableRows('article'); //获取表记录数量
        $randObject = new system\plugin\kidphp\kidphp_rand\Rand();
        $params = $randObject->noRepeatRand(1,$count,4);
        if(!$params['error']){
            $randInObject = new system\plugin\kidphp\kidphp_convert\Convert();
            $randIn = $randInObject->arrayToFormatString($params['data'],',');
            $sql = "select username,article_id,title,createtimeymd from vimkid_article where article_id IN (".$randIn.")";
            $result = $mysql->select($sql);
            $result = json_encode($result);
            echo $result;
        }else{
            echo $params['errorInfo'];
        }
    }

    /* 获取推荐内容 */
    public function getRecommendList(){
    }

    public function test(){
        echo 'test'; // ab -kc 100 -n 1000  响应 760/second
    }


    /* 保存访客 */
    /*
    public function vimkid(){
        // 控制不能直接访问ajax接口
        $classPath='';
        $status=200;
        $api='';
        $class='';
        $function='';
        $url='';
        if(isset($_SERVER['HTTP_REFERER'])){
            //  正常访问 
            $route = new Route;
            $uri = $route->initRoute($_SERVER['HTTP_REFERER']);  //获取uri
            $classPath = 'api/'.$uri['api'].'/C/'.ucfirst($uri['class']).'Controller.php';
            $check = new Check;
            $statusSign = $check->checkRoute($classPath,$uri);
            $api = $uri['api'];
            $class = $uri['class'];
            $function = $uri['function'];
            $url = $_SERVER['HTTP_REFERER'];
            if(!$statusSign){
                $status=404;
            }else {
                $status=200;
            }
            $type=1; //0正常访问，１非法访问

        }else {
            //  记录非法访问
            echo "I want you ~~~~ ,baby!";
            $type=0;
        }

        $mysql = new system\core\db\Mysql('WRITE');
        $ipInfo = new system\plugin\outer\GetIpInfo\GetIpInfo();
        $address = $ipInfo->Getaddress();

        $ip = $ipInfo->Getip();
        $ipv6='';
        $source='';
        $device='';
        $countryid='';
        $browser = $ipInfo->GetBrowser();
        $country = isset($address[0][0]) ? $address[0][0]: '';
        $province = isset($address[0][1]) ? $address[0][1]: '';
        $city = isset($address[0][2]) ? $address[0][2]: '';
        $countryEnglish = $address[1]['country'];
        $provinceEnglish = $address[1]['stateprov'];
        $cityEnglish = $address[1]['city'];
        $createtime = time();
        $createtimeymd = date('Y-m-d H:i:s');
        $username='';
        $userid='';
        $system = $ipInfo->GetOs();
        $browserlang = $ipInfo->GetLang();
        $ismobile = $ipInfo->isMobile();
        $agent = $_SERVER['HTTP_USER_AGENT'];

        $sql = "insert into vimkid_visit ( 
            visit_ip,
            visit_ipv6,
            visit_source,
            visit_device,
            visit_browser,
            visit_country,
            visit_countryid,
            visit_createtime,
            visit_createtimeymd,
            visit_type,
            visit_username,
            visit_userid,
            visit_province,
            visit_city,
            visit_system,
            visit_browserlang,
            visit_url,
            visit_api,
            visit_class,
            visit_function,
            visit_ismobile,
            visit_status,
            visit_country_english,
            visit_province_english,
            visit_city_english,
            visit_agent
        ) values (
            '$ip',
            '$ipv6',
            '$source',
            '$device',
            '$browser',
            '$country',
            '$countryid',
            '$createtime',
            '$createtimeymd',
            '$type',
            '$username',
            '$userid',
            '$province',
            '$city',
            '$system',
            '$browserlang',
            '$url',
            '$api',
            '$class',
            '$function',
            '$ismobile',
            '$status',
            '$countryEnglish',
            '$provinceEnglish',
            '$cityEnglish',
            '$agent'
        )
        ";
        $result = $mysql->execute($sql);
    }
     */
}
?>
