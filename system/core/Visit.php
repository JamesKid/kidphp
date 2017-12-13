<?php
class Visit extends PublicCore{ 
    /* 保存访客 */
    public function __construct($uri){
        /* 控制不能直接访问ajax接口 */
        $classPath='';
        $status=200;
        $api='';
        $class='';
        $function='';
        $url='';

        /*  正常访问 */
        $route = new Route;
        $uri = $route->initRoute($_SERVER['PHP_SELF']);  //获取uri
        $classPath = 'app/C/'.ucfirst($uri['class']).'Controller.php';
        $check = new Check;
        $statusSign = $check->checkRoute($classPath,$uri);
        $class = $uri['class'];
        $function = $uri['function'];
        $url = $_SERVER['REQUEST_URI'];
        $urlOld = $_SERVER['REQUEST_URI_OLD'];  // 添加原有请求url
        $language = $GLOBALS['LANGUAGE']['nowLanguage']; // 添加访问语言
        if(!$statusSign){
            $status=404;
        }
        $type=1; //0正常访问，１非法访问
        $mysql = $this->getMysqlRead();  // 访问写节点下的权限
        $ipInfo = $this->getIpInfo();
        $ip = $ipInfo->GetIpIn();
        // 排除本地ip
        if($ip == '127.0.0.1'){
            return false;
        }
        $address = $this->getAddress($ip);
        $ipv6='';
        $source='';
        $device='';
        $countryid='';
        $browser = $ipInfo->GetBrowser();
        $country=$address['ip_country'];
        $province=$address['ip_province'];
        $city=$address['ip_city'];
        $countryEnglish = '';
        $provinceEnglish = '';
        $cityEnglish = '';
        $createtime = time();
        $createtimeymd = date('Y-m-d H:i:s');
        $username='';
        $userid='';
        $system = $ipInfo->GetOs();
        $browserlang = $ipInfo->GetLang();
        $ismobile = $ipInfo->isMobile();
        $agent = $_SERVER['HTTP_USER_AGENT'];

        $sql = "insert into vimkid_visitin ( 
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
            visit_url_old,
            visit_language,
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
            '$urlOld',
            '$language',
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
}
