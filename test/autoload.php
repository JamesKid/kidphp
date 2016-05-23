<?php
use autoload\space2;
class myAutoLoad {
	public function __construct(){
		spl_autoload_register(array($this,'__autoload'));

	}
	function __autoload($class){
		/* 类目录路径 */
		/*
		$file = __DIR__.'/autoload/'.$class.'.php';
		 */
		//$class = strtolower( $class ); //转为小写
		$space = str_replace( '\\', DIRECTORY_SEPARATOR, $class ); 
		///print_r($class);die;调试类参数
		$file = __DIR__.'/'.$space.'.php';
		if(file_exists($file)){
			return require_once($file);
		}
	}
}
$init = new myAutoLoad();
$object = new autoload\space1\Mysql();
$object2 = new autoload\space2\Mysql();
$object2->getTest();
?>
