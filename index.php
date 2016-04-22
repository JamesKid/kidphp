<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *  
* ================================JamesKid==========================================
* @author		: VimKid  
* @title        : kidphp framework
* @description  : This program is free, you can redistribute it and  modify 
*				  it under the terms of the GNU General Public License 
*				  as published by the Free Software Foundation.
*				  
* @change		: 2016.04.14 13:52  add program
*				: 2016.04.19 16:52  add plugin 'CodeMirror' 'parsedown' 'PHPMarkdown'
*				: 2016.04.20 16:52  add kidphp plugin 'kidphp_check'
*  ==================================================================================
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
header("content-type:text/html; charset=utf-8");
@date_default_timezone_set('PRC');

ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);   //打开调试
error_reporting(E_ALL);  // 错误报告级别

require_once('system/core/Route.php'); //引用路由 
require_once('conf/Config.php'); //引用配置文件
$config = Config::getConfig();  //获取配置

$route = new Route;
$uri = $route->initRoute();  //初始化路由
 //引入文件
$classPath = 'api/'.$uri['api'].'/C/'.ucfirst($uri['class']).'Controller.php';

try {
	if (file_exists($classPath)) {
		require($classPath);
	} else {
		//echo "error";die;
		throw new Exception('file is not exists');
	}
} catch (Exception $e) {
	echo $e->getMessage();
}

$classRoute = $uri['class'].'Controller';
$classRoute = new $classRoute;

/* 回调方法 */
call_user_func_array(
	array($classRoute, $uri['function']),
	array()
);






