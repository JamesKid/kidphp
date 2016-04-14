<?php
//require($_SERVER['DOCUMENT_ROOT'].'/system/core/PublicCore.php'); //引用配置文件
class PublicCore {
	public $config = array();
	public function __construct($config=array()){
		$this->config = Config::getConfig();  //获取配置
	}
}
