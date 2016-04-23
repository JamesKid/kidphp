<?php
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
