<?php
$result = getVersion();
print_r($result);
function getVersion() {
	$version = array(
		'VERSION'=>'v1.0 Released',
		'UPDATETIME'=>'2016.4.14',
		'CONTRIBUTER'=>'vimkid',
		'HISTORY'=>array(
			'2016.4.14 15:00'=>'add program by vimkid',
			'2016.4.14 15:07'=>'add route by vimkid',
		)
	);
	return $version;
}
