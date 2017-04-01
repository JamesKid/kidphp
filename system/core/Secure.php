<?php
/* 安全模块 
 *
 */
//class Route extends PublicCore{
class Secure {
	/** 初始化路由
	 */
	public $config = array();
	public function __construct(){
		include($_SERVER['DOCUMENT_ROOT'].'/conf/Config.php'); //引用配置文件
		$this->config = $config;
        $this->checkUrl();
	}

    /* url地址安全检测 */
	public function checkUrl(){
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace('/', '', $url);
        $url = str_replace('?', '', $url);
        $url = str_replace('&', '', $url);
        $url = str_replace('.', '', $url);
        $url = str_replace('=', '', $url);
        $url = str_replace('%', '', $url);
        // 如果除了/ ? & = . 还有其他特殊字符，则重新跳转
        if(!$this->onlyLettersOrDigits($url) && $url!=''){
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
