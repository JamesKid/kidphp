<?php
class Visit{ 
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
		$classPath = 'api/'.$uri['api'].'/C/'.ucfirst($uri['class']).'Controller.php';
		$check = new Check;
		$statusSign = $check->checkRoute($classPath,$uri);
		$api = $uri['api'];
		$class = $uri['class'];
		$function = $uri['function'];
		if(isset($_SERVER['HTTP_REFERER']) && $class=='Ajax'){
			die;
		}
		$url = $_SERVER['PHP_SELF'];
		if($statusSign==false){
			$status=404;
		}else {
			$status=200;
		}
		$type=1; //0正常访问，１非法访问

		$mysql = new system\core\db\Mysql('WRITE');
		$ipInfo = new system\plugin\outer\GetIpInfo\GetIpInfo();
		$ip = $ipInfo->GetIpIn();
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
	public function getAddress($ip){
		/* 获取表 */
		$point = strpos($ip,'.');
		$table = substr($ip,0,$point);
		$getIpInfo = new system\core\db\Mysql('IP');
		$sql = "select ip_country,ip_city,ip_province from `".$table."` where inet_aton(ip_begin) < inet_aton('".$ip."') and inet_aton(ip_end)> inet_aton('".$ip."')";
		$getIpInfo = $getIpInfo->execute($sql);
		$result =  $getIpInfo->fetchAll(PDO::FETCH_ASSOC);
		return $result[0];
	}
}