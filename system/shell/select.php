<?php
$dbh = new PDO('mysql:host=localhost;dbname=vimkid', 'root', '123456');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
#$sql = "SELECT * FROM `vimkid_article` ";
$sql = "SELECT * FROM `vimkid_article` where article_title=vim最最基本使用";
$stmt = $dbh->prepare($sql);
$stmt->execute();
print_r( $stmt->fetchAll(PDO::FETCH_ASSOC));
?>
