<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  
* ================================JamesKid==========================================
* @author		: VimKid  
* @title        : kidphp framework
* @description  : This is a web frame edit by vimkid ,this program is free, and totaliy
*				  support php7! and you can redistribute it and  modify it under the 
*				  terms of the original BSD license.
*				  
* @change		: 2016.04.14 13:52  add program
*				: 2016.04.19 16:52  add plugin 'CodeMirror' 'parsedown' 'PHPMarkdown'
*				: 2016.04.20 16:52  add kidphp plugin 'kidphp_check'
*  ==================================================================================
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
class Kidphp{
	public function __construct(){
		header("content-type:text/html; charset=utf-8");
		@date_default_timezone_set('PRC');

		$this->configError();

		require_once('system/core/Route.php'); //引用路由 
		require_once('conf/Config.php'); //引用配置文件
		$config = Config::getConfig();  //获取配置

		$route = new Route;
		$uri = $route->initRoute();  //初始化路由
		 //引入Controller文件
		$classPath = 'api/'.$uri['api'].'/C/'.ucfirst($uri['class']).'Controller.php';
		$this->checkRoute($classPath,$uri);

		$classRoute = $uri['class'].'Controller';
		$classRoute = new $classRoute;
		$this->callFunction($classRoute,$uri);
		$this->__autoload();
	}

	/* 配置错误信息 */
	private function configError(){
		ini_set('display_errors',1);            //错误信息
		ini_set('display_startup_errors',1);   //打开调试
		error_reporting(E_ALL);  // 错误报告级别
	}

	/* 检查路由是否有效,无效返回404页面 */
	private function checkRoute($classPath,$uri){
		//检查是否有controller (class)
		if (file_exists($classPath)) {
			require($classPath);
		} else {
			include("404.html");//跳转到404页面
			exit();
		}
		//检查是否有function,get_class_methods方法需要require class进来才有效
		$functionList = get_class_methods($uri['class'].'Controller');

		foreach ($functionList as $value) {
			if (strtolower($value) == strtolower($uri['function'])) {
				return true;
				break;
			}else{
				include("404.html");//跳转到404页面
				exit();
			}
		} 
	}

	/* 回调函数方法 */
	private function callFunction($classRoute,$uri){
		call_user_func_array(
			array($classRoute, $uri['function']),
			array()
		);
	}

	/* 引入命名空间 */
	public function __autoload($classname){
		$classpath="./".$classname.'.php';
		if(file_exists($classpath)){
			require_once($classpath);
		}
		else{
			echo 'class file'.$classpath.'not found!';
		}
	}
	/*
	spl_autoload_register(function ($class) {
		if ($class) {
			$file = str_replace('\\', '/', $class);
			$file .= '.php';
			if (file_exists($file)) {
				include $file;
			}
		}
	});
	 */
}
$init = new Kidphp();





