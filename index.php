<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * 
* ================================JamesKid====================================
* @author		: VimKid  
* @title        : kidphp framework
* @description  : This program is free, you can redistribute it and  modify 
*				  it under the terms of the GNU General Public License 
*				  as published by the Free Software Foundation.
*				  
* @change		: 2016.4.14 13:52  add program
*  ===========================================================================
* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

//打开调试
ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);   

require_once('system/core/Route.php'); //引用路由 
require_once('conf/Config.php'); //引用配置文件
$config = Config::getConfig();  //获取配置

$route = new Route();
$uri = $route->initRoute();  //初始化路由
print_r($uri);die;




