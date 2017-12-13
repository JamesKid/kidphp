
<?php
/* 
 * kidphp配置模块
 */
class Config{

    public function __construct($env){
        $this->initConfig($env);
    }

    // 项目基本配置
    public function initConfig($env){
        header("content-type:text/html; charset=utf-8"); // 设置编码
        @date_default_timezone_set('PRC'); // 设置时区
        $env = trim($env); // 获取当前环境 test: 测试环境 online: 线上环境
        require_once($_SERVER['DOCUMENT_ROOT'].'/conf/config_'.trim($env).'.php'); //引用配置文件
        require_once($_SERVER['DOCUMENT_ROOT'].'/conf/config_language.php'); //引用配置文件
        require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'); //引用vendor配置
    }
}
