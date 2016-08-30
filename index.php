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
		spl_autoload_register(array($this,'__autoload'));
		@date_default_timezone_set('PRC');
		$this->configError();
		//require_once('system/core/Route.php'); //引用路由 
		include($_SERVER['DOCUMENT_ROOT'].'/conf/Config.php'); //引用配置文件
		$route = new Route;
		$uri = $route->initRoute();  //初始化路由
		/* 引入Controller文件 */
		$classPath = 'api/'.$uri['api'].'/C/'.ucfirst($uri['class']).'Controller.php';
		/* 记录访客内部记录 */
		$check = new Visit($uri);
		/* 检查路由,不存在返回404 */
		$check = new Check;
		$result = $check->checkRoute($classPath,$uri);
		if($result ==false){
			include('404page.html');exit;
		}
		/* 引用路由 */
		$classRoute = $uri['class'].'Controller';
		$classRoute = new $classRoute;
		$this->callFunction($classRoute,$uri);
	}

	/* 配置错误信息 */
	private function configError(){
		ini_set('display_errors',1);            //错误信息
		ini_set('display_startup_errors',1);   //打开调试
		error_reporting(E_ALL);  // 错误报告级别
	}

	/* 检查路由是否有效,无效返回404页面 
	private function checkRoute($classPath,$uri){
		$sign = 0;
		//检查是否有controller (class)
		if (file_exists($classPath)) {
			require_once($classPath);
		} else {
			include("404.html");//跳转到404页面
			exit();
		}
		//检查是否有function,get_class_methods方法需要require class进来才有效
		$functionList = get_class_methods($uri['class'].'Controller');
		foreach ($functionList as $value) {
			if (strtolower($value) == strtolower($uri['function'])) {
				$sign = 1;
			}
		} 
		if($sign){
			return true;
		} else{
			include("404.html");//跳转到404页面
			exit();
		}
	}
	 */

	/* 回调函数方法 */
	private function callFunction($classRoute,$uri){
		call_user_func_array(
			array($classRoute, $uri['function']),
			array()
		);
	}

	/* 自动加载方法 */
	private function __autoload($class){
		/* 自动加载命名空间路径 */
		$space = str_replace( '\\', DIRECTORY_SEPARATOR, $class ); 
		$file = __DIR__.'/'.$space.'.php';
		if(file_exists($file)){
			return require_once($file);
		}
		/* 自动加载system/core 核心 */
		$coreFile = __DIR__.'/system/core/'.$class.'.php';
		if(file_exists($coreFile)){
			return require_once($coreFile);
		}
		/* 自动加载service */
			/* debug_backtrace()  用这个php自带函数获取api*/
		if(substr($space,-7)=='Service'){  //截取最后7个字符判断是否Service
			$trace = debug_backtrace();
			$serviceFile = __DIR__.'/api/'.$trace[3]['args'][1]['api'].'/S/'.$class.'.php';
			if(file_exists($serviceFile)){
				return require_once($serviceFile);
			}
		}
	}
}
$init = new Kidphp();
