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
			'2016.4.14 19:00'=>'add program by vimkid',
			'2016.4.14 19:07'=>'add route by vimkid',
			'2016.4.14 18:19'=>'add config by vimkid',
			'2016.4.14 18:19'=>'add config by vimkid',
			'2016.4.19 19:19'=>'add Views ',
		)
	);
	return $version;
}
