<?php
require('system/plugin/kidphp/kidphp_convert/Convert.php');
$test = array(
	'1'=>'ab',
	'2'=>'cb',
);
$beginTime=microtime(true);
for($i=0; $i<10000000; $i++){
	$objectConvert = new Convert();
	$result = $objectConvert->arrayToObject($test);
	//$result = Convert::arrayToObject($test);
}
$endTime=microtime(true);
$useTime=$endTime-$beginTime;
var_dump($result);
echo $useTime;

?>
