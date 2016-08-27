j<?php
$dbh = new PDO('mysql:host=localhost;dbname=vimkid', 'root', '123456');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
/* 参数列表 */
$content = file_get_contents('/var/www/article/2_vim最最基本的使用.md');
$title = "vim最最基本的使用";
$sql = "update vimkid_article set article_content=".$content." where article_title=".$title;
$stmt = $dbh->prepare($sql);
$stmt->execute($sql);
print_r($stmt);
?>
