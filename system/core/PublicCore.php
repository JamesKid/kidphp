<?php
//require($_SERVER['DOCUMENT_ROOT'].'/system/core/PublicCore.php'); //引用配置文件
class PublicCore {
	public $config = array();
	public function __construct($config=array()){
        $File = new Kidphp\KidphpFile\File();  // 调用composer 文件
        $env = $File->getLine($_SERVER['DOCUMENT_ROOT'].'/env.txt',1); // 
		include($_SERVER['DOCUMENT_ROOT'].'/conf/config_'.trim($env).'.php'); //引用配置文件
		$this->config = $config;  //获取配置
	}
}
