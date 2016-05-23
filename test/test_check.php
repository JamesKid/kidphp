<?php
require('../system/plugin/kidphp_check/Check.php');
$ip = '192.168.2.999';
$objectCheck = new Check();
$result = $objectCheck->checkIpv($ip);
print_r($result);

?>
