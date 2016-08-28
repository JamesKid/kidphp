<?php
$dbh = new PDO('mysql:host=localhost;dbname=vimkid', 'root', '123456');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
/* 参数列表 */
$type = 1;   # 类型
$check = 1;
$content = file_get_contents('/var/www/article/3_vim插件之MRU.md');
$link = "content";
$title = "vim插件之MRU.md";
$createtime = time();
$createtimeymd = date('Y-m-d',time());
$updatetime = time();
$updatetimeymd = date('Y-m-d',time());
$username = "vimkid";
$userid = "1";
$images = "";
$seotitle ="vim插件之MRU";
$seosubtitle = "vim插件之MRU";
$seokeywords ="MRU,MRU插件,vim插件";
$seodescription = "详细介绍vim MRU插件使用";
$recommend = 5;
$source = "vimkid website";
$status = 1;
$sort = "";
$categoryid = 1;
$start = 5;  # 推荐星级
$sql = "insert into vimkid_article ( 
	article_type, 
	article_check,
	article_content,
	article_link,
	article_title,
	article_createtime,
	article_createtimeymd,
	article_updatetime,
	article_updatetimeymd,
	article_username,
	article_userid,
	article_images,
	article_seotitle,
	article_seosubtitle,
	article_seokeywords,
	article_seodescription,
	article_recommend,
	article_source,
	article_status,
	article_sort,
	article_categoryid,
	article_start
) values (
	'$type',
	'$check',
	'$content',
	'$link',
	'$title',
	'$createtime',
	'$createtimeymd',
	'$updatetime',
	'$updatetimeymd',
	'$username',
	'$userid',
	'$images',
	'$seotitle',
	'$seosubtitle',
	'$seokeywords',
	'$seodescription',
	'$recommend',
	'$source',
	'$status',
	'$sort',
	'$categoryid',
	'$start'
)
";
$stmt = $dbh->prepare($sql);
$stmt->execute();
print_r($stmt);
?>
