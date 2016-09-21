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
$result = getVersion();
print_r($result);
function getVersion() {
	$version = array(
		'VERSION'=>'v1.0 Released',
		'UPDATETIME'=>'2016.4.14',
		'CONTRIBUTER'=>'vimkid',
		'HISTORY'=>array(
			'2016.04.14 19:00'=>'add program by vimkid',
			'2016.04.14 19:07'=>'add route by vimkid',
			'2016.04.14 18:19'=>'add config by vimkid',
			'2016.04.14 18:19'=>'add config by vimkid',
			'2016.04.19 19:19'=>'add Views ',
			'2016.05.27 19:19'=>'add autoload',
			'2016.05.28 19:19'=>'add sitemap',
			'2016.05.29 19:19'=>'add nginx rewrite and nginx config',
			'2016.06.01 19:19'=>'add debug_backtrace()函数回溯取到api,然后自动加载Service!',
		)
	);
	return $version;
}
/* 待加功能
 *
 * 1. 阅读量，发布时间，更新时间
 * 2. mysql主从，mysql mongodb数据同步
 * 3. git钩子自动推送代码
 * 4. 标签设计
 * 5. 中英版设计
 * 6. composer 机制引入
 * 7. 单元测试
 * 8. 统计chart图
 * 9. 站点安全检测脚本机制
 *
 */
