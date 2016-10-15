<?php
$dbh = new PDO('mysql:host=localhost;dbname=vimkid', 'root', '123456');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
$id = 1;
/* 参数列表 */
$filename =  exec('ls  /var/www/article | grep '.$id.'_');
$content = file_get_contents('/var/www/article/'.$filename);
$sql = "UPDATE vimkid_article SET article_content='".$content."' where article_id=".$id;
$stmt = $dbh->prepare($sql);
$stmt->execute();
print_r($stmt);
?>
