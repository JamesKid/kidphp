<?php
$dbh = new PDO('mysql:host=localhost;dbname=vimkid', 'root', '123456');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
/* 参数列表 */
$content = file_get_contents('/var/www/article/1_vimkid网站发布啦.md');
//$content = file_get_contents('/var/www/article/3_vim插件之MRU.md');
$title = "vimkid网站发布啦";
//$title = "vim插件之MRU";
$sql = "UPDATE vimkid_article SET article_content='".$content."' where article_title='".$title."'";
$stmt = $dbh->prepare($sql);
#$stmt->execute($sql);
$stmt->execute();
print_r($stmt);
?>
