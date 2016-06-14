<?php
$http = new swoole_http_server("127.0.0.1", 9501);
$http->on('request', function ($request, $response) {
	$ip = file_get_contents('https://www.l2.io/ip');
	//$response->end($ip.'hello');
	$response->end('hello');
});
$http->start();
?>
