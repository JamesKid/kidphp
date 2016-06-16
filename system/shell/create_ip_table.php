<?php
/* 创建256个ip表 */
/* 这里只创建表，请自行创建库 */

/*  ip 查询语句 (inet_aton函数)
 *
 * use ip;
 * select * from `1` where inet_aton(ip_begin) < inet_aton('1.1.4.3') and inet_aton(ip_end)> inet_aton('1.1.4.3')
 *
 */
$dbh = new PDO('mysql:host=localhost;dbname=ip', 'root', '123456');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
for($i=1;$i<257;$i++){
	$sql = "
		CREATE TABLE `".$i."` (
			`ip_id` int(11) NOT NULL AUTO_INCREMENT,
			`ip_begin` varchar(30) DEFAULT NULL,
			`ip_end` varchar(30) DEFAULT NULL,
			`ip_country` varchar(60) DEFAULT NULL,
			`ip_province` varchar(60) DEFAULT NULL,
			`ip_city` varchar(60) DEFAULT NULL,
			PRIMARY KEY (`ip_id`),
		  UNIQUE KEY `ip_begin` (`ip_begin`),
		  UNIQUE KEY `ip_end` (`ip_end`),
		  KEY `ip_begin_end` (`ip_begin`,`ip_end`)
		  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
	";
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
}
?>

