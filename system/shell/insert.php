<?php
$dbh = new PDO('mysql:host=localhost;dbname=vimkid', 'root', '123456');
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->exec('set names utf8');
/* 参数列表 */
$id = 10;
$status = 1;
$categoryname = 'math';
$subcategoryname = '趣味小算法';
$title = '程序计算三角形个数';
$seotitle ="程序计算三角形个数";
$seokeywords ="程序计算图形三角形个数,计算三角形个数";
$seodescription = "程序计算图形中三角形个数";
$check = 1;
$filename =  exec('ls  /var/www/article | grep '.$id.'_');
$content = file_get_contents('/var/www/article/'.$filename);
$createtimeymd = date('Y-m-d',time());
$link = "content";
$type = 0;   # 类型是否包含代码，0包含 1不包含
$createtime = time();
$updatetime = time();
$updatetimeymd = date('Y-m-d',time());
$username = "vimkid";
$userid = "1";
$images = "";
$visit = 0;
$recommend = 5;
$source = "vimkid website";
$seosubtitle = "程序计算三角形个数";
$sort = "";
$categoryid = 1;
$up = 0;
$comment = 0;
$start = 5;  # 推荐星级
$sql = "insert into vimkid_article ( 
	article_id, 
	article_status,
	article_categoryname,
	article_subcategoryname,
	article_title,
	article_seotitle,
	article_seokeywords,
	article_seodescription,
	article_check,
	article_content,
	article_createtimeymd,
	article_link,
	article_type, 
	article_createtime,
	article_updatetime,
	article_updatetimeymd,
	article_username,
	article_userid,
	article_images,
	article_visit,
	article_recommend,
	article_source,
	article_seosubtitle,
	article_sort,
	article_categoryid,
	article_up,
	article_comment,
	article_start
) values (
	'$id',
	'$status',
	'$categoryname',
	'$subcategoryname',
	'$title',
	'$seotitle',
	'$seokeywords',
	'$seodescription',
	'$check',
	'$content',
	'$createtimeymd',
	'$link',
	'$type',
	'$createtime',
	'$updatetime',
	'$updatetimeymd',
	'$username',
	'$userid',
	'$images',
	'$visit',
	'$recommend',
	'$source',
	'$seosubtitle',
	'$sort',
	'$categoryid',
	'$up',
	'$comment',
	'$start'
)
";
$stmt = $dbh->prepare($sql);
$stmt->execute();
?>
