<?php
/* 安全模块 
 *
 */
//class Route extends PublicCore{
class Secure extends PublicCore{
	/** 初始化路由
	 */
	public function __construct(){
        parent::__construct();   // 调用父类构造方法,获取config 公共配置
        $this->checkUrl();
	}

    /* url地址安全检测 */
	public function checkUrl(){
        $requestUri = $_SERVER['REQUEST_URI'];
        $url = $requestUri;
        $url = str_replace('/', '', $url);
        $url = str_replace('?', '', $url);
        $url = str_replace('&', '', $url);
        $url = str_replace('.', '', $url);
        $url = str_replace('=', '', $url);
        $url = str_replace('%', '', $url);
        // 如果除了/ ? & = . 还有其他特殊字符，则重新跳转
        if(!$this->onlyLettersOrDigits($url) && $url!=''){
            // 将black.txt至为777 权限
            $ipInfo = $this->getIpInfo();
            $ip = $ipInfo->GetIpIn(); // 获取ip
		    $address = $this->getAddress($ip); // 获取地址
            $os = $ipInfo->GetOs();

            $content = date('Y-m-d H:i:s',time()).'  '
                .$ip.'  '
                .$os.'  '
                .$address['ip_country'].'.'.$address['ip_province'].'.'.$address['ip_province'].'   '
                .$requestUri.'  '
                ."\n";
            file_put_contents('/var/log/vimkid/black.txt',$content,FILE_APPEND); // 保存
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/tips.html');
            exit;
        }

	}

    /* 检测只包含数字或字母 */
	public static function onlyLettersOrDigits($string){
        if (ctype_alnum($string)) {
            return true; // 只包含数字或字母
        } else {
            return false;  // 有其他符号
        }
	}
}
