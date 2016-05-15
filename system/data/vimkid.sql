# Host: 192.168.1.107  (Version: 5.1.73-log)
# Date: 2016-05-15 23:23:21
# Generator: MySQL-Front 5.3  (Build 1.27)

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

DROP DATABASE IF EXISTS `vimkid`;
CREATE DATABASE `vimkid` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vimkid`;

#
# Source for table "vimkid_article"
#

DROP TABLE IF EXISTS `vimkid_article`;
CREATE TABLE `vimkid_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_type` int(2) NOT NULL DEFAULT '0' COMMENT '文章类型',
  `article_check` int(1) NOT NULL DEFAULT '0' COMMENT '审核 0未审核 1审核通过',
  `article_content` text COMMENT '文章内容',
  `article_link` varchar(180) DEFAULT NULL COMMENT '链接',
  `article_title` varchar(120) NOT NULL DEFAULT '' COMMENT '标题',
  `article_createtime` int(11) DEFAULT NULL COMMENT '创建时间',
  `article_createtimeymd` date DEFAULT NULL COMMENT '创建时间ymd',
  `article_updatetime` int(11) DEFAULT NULL COMMENT '更新时间',
  `article_updatetimeymd` date DEFAULT NULL COMMENT '更新时间ymd',
  `article_username` varchar(90) NOT NULL DEFAULT '' COMMENT '用户名',
  `article_userid` int(11) NOT NULL DEFAULT '1' COMMENT '用户id',
  `article_images` varchar(255) DEFAULT NULL COMMENT '文章图片',
  `article_visit` int(11) NOT NULL DEFAULT '0' COMMENT '访问量',
  `article_seotitle` varchar(90) DEFAULT NULL COMMENT 'seo标题',
  `article_seokeywords` varchar(120) DEFAULT NULL COMMENT 'seo关键字',
  `article_seodescription` varchar(180) DEFAULT NULL COMMENT 'seo描述',
  `article_recommend` int(1) DEFAULT '0' COMMENT '推荐位',
  `article_source` varchar(90) DEFAULT '0' COMMENT '来源',
  `article_status` int(1) NOT NULL DEFAULT '0' COMMENT '发布状态　0不发布 1:发布',
  `article_seosubtitle` varchar(90) DEFAULT NULL COMMENT 'seo副标题',
  `article_sort` int(11) DEFAULT '0' COMMENT '排序',
  `article_categoryid` int(4) DEFAULT '0' COMMENT '所属目录id',
  `article_bvarchar` varchar(30) DEFAULT NULL COMMENT 'varchar备用',
  `article_bint` int(11) DEFAULT NULL COMMENT 'int备用',
  `article_up` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `article_comment` int(3) NOT NULL DEFAULT '0' COMMENT '评论数',
  PRIMARY KEY (`article_id`),
  KEY `article_type` (`article_type`),
  KEY `article_createtime` (`article_createtime`),
  KEY `article_createtimeymd` (`article_createtimeymd`),
  KEY `article_visit` (`article_visit`),
  KEY `article_up` (`article_up`),
  KEY `article_status` (`article_status`),
  KEY `article_comment` (`article_comment`),
  KEY `article_categoryid` (`article_categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "vimkid_article"
#

/*!40000 ALTER TABLE `vimkid_article` DISABLE KEYS */;
INSERT INTO `vimkid_article` VALUES (1,1,1,'README\n===========================\n该文件用来测试和展示书写README的各种markdown语法。GitHub的markdown语法在标准的markdown语法基础上做了扩充，称之为`GitHub Flavored Markdown`。简称`GFM`，GFM在GitHub上有广泛应用，除了README文件外，issues和wiki均支持markdown语法。\n\n****\n###　　　　　　　　　　　　Author:Jelly\n###　　　　　　　　　 E-mail:879231132@qq.com\n\n===========================\n\n\n\n##<a name=\"index\"/>目录\n* [横线](#line)\n* [标题](#title)\n* [文本](#text)\n    * 普通文本\n    * 单行文本\n    * 多行文本\n    * 文字高亮\n* [链接](#link) \n    * 文字超链接\n        *  链接外部URL\n        *  链接本仓库里的URL\n    *  锚点\n    * [图片超链接](#piclink)\n* [图片](#pic)\n    * 来源于网络的图片\n    * GitHub仓库中的图片\n* [列表](#dot)\n    * 圆点列表\n    * 数字列表\n    * 复选框列表\n* [块引用](#blockquotes)\n* [代码](#code)\n* [表格](#table) \n* [表情](#emoji)\n\n<a name=\"line\"/>\n##***、---、___显示虚横线\n***\n---\n___\n\n\n\n<a name=\"title\"/>\n#一级标题\n##二级标题\n###三级标题\n####四级标题\n#####五级标题\n######六级标题\n\n\n##<a name=\"text\"/>显示文本\n###普通文本\n这是一段普通的文本\n####关于换行\n直接回车不能换行，<br>\n可以使用<br>。\n但是使用html标签就丧失了markdown的意义。  \n可以在上一行文本后面补两个空格，  \n这样下一行的文本就换行了。\n\n或者就是在两行文本直接加一个空行。\n\n也能实现换行效果，不过这个行间距有点大。\n###单行文本\n    Hello,大家好，我是果冻虾仁。\n###文本块\n    欢迎到访\n    很高兴见到您\n    祝您，早上好，中午好，下午好，晚安\n###部分文字高亮\nThank `You` . Please `Call` Me `Coder`\n####高亮功能更适合做一篇文章的tag\n例如:<br>\n`java` `网络编程` `Socket` `全双工`\n####删除线\n这是一个 ~~删除线~~\n####斜体\n*斜体1*\n\n_斜体2_\n####粗体\n**粗体1**\n\n__粗体2__\n\n####组合使用粗体、斜体和删除线\n***斜粗体1***\n\n___斜粗体2___\n\n***~~斜粗体删除线1~~***\n\n~~***斜粗体删除线2***~~\n\n##<a name=\"link\"/>链接\n###链接外部URL\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")   语法如下：\n```\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")\n```\n###链接的另一种写法\n[我的博客][id]  \n\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"   \n语法如下：\n```\n[我的博客][id]\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"\n```\n中括号[ ]里的id，可以是数字，字母等的组合。这两行可以不连着写，**一般把第二行的链接统一放在文章末尾**，id上下对应就行了。这样正文看起来会比较干净。\n\n###链接本仓库里的URL\n[Book](./Book)\n语法如下：\n```\n[Book](./Book)\n```\n如果文件要引用的文件不存在，则待点击的文本为红色。引用的文件存在存在则文本为蓝色。\n###锚点\n我们可以使用HTML的锚点标签（`#`）来设置锚点：[回到目录](#index)  \n但其实呢，每一个标题都是一个锚点，不需要用标签来指定，比如我们 [回到顶部](#TEST)\n不过不幸的是，由于对中文支持的不好，所以中文标题貌似是不能视作标签的。\n\n##<a name=\"pic\"/>显示图片\n###来源于网络的图片\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\")\n![](https://assets-cdn.github.com/images/modules/contact/goldstar.gif)\n\n###GitHub仓库中的图片\n![](https://github.com/guodongxiaren/ImageCache/raw/master/Logo/foryou.gif)\n###<a name=\"piclink\">给图片加上超链接\n####第一种\n\n[![head]](http://blog.csdn.net/guodongxiaren/article/details/23690801)\n[head]:https://github.com/guodongxiaren/ImageCache/raw/master/Logo/jianxin.jpg \"点击图片进入我的博客\"\n\n#### 第二种\n[![内容任意](http://www.baidu.com/img/bdlogo.gif \"百度logo\")](http://www.baidu.com)\n\n\n\n\n##<a name=\"dot\"/>列表\n###圆点列表\n* 昵称：果冻虾仁\n* 别名：隔壁老王\n* 英文名：Jelly\n\n###更多圆点\n* 编程语言\n    * 脚本语言\n        * Python\n\n###数字列表\n####一般效果\n就是在数字后面加一个点，再加一个空格。不过看起来起来可能不够明显。    \n面向对象的三个基本特征：\n\n1. 封装\n2. 继承\n3. 多态\n\n####数字列表自动排序\n也可以在第一行指定`1. `，而接下来的几行用星号`*`（或者继续用数字1. ）就可以了，它会自动显示成2、3、4……。    \n面向对象的七大原则：\n\n1. 开闭原则\n* 里氏转换原则\n* 依赖倒转原则\n* 接口隔离原则\n* 组合/聚合复用原则\n* “迪米特”法则\n* 单一直则原则\n\n####多级数字列表\n和圆点的列表一样，数字列表也有多级结构：  \n\n1. 这是一级的数字列表，数字1还是1\n   1. 这是二级的数字列表，阿拉伯数字在显示的时候变成了罗马数字\n      1. 这是三级的数字列表，数字在显示的时候变成了英文字母\n\t    1. 四级的数字列表显示效果，就不再变化了，依旧是英文字母\n\n### 复选框列表\n- [x] C\n- [x] C++\n- [x] Java\n- [x] Qt\n- [x] Android\n- [ ] C#\n- [ ] .NET\n\n您可以使用这个功能来标注某个项目各项任务的完成情况。\n##<a name=\"blockquotes\"/>块引用\n\n###常用于引用文本\n####文本摘自《深入理解计算机系统》P27\n　令人吃惊的是，在哪种字节顺序是合适的这个问题上，人们表现得非常情绪化。实际上术语“little endian”（小端）和“big endian”（大端）出自Jonathan Swift的《格利佛游记》一书，其中交战的两个派别无法就应该从哪一端打开一个半熟的鸡蛋达成一致。因此，争论沦为关于社会政治的争论。只要选择了一种规则并且始终如一的坚持，其实对于哪种字节排序的选择都是任意的。\n><b>“端”（endian）的起源</b><br>\n以下是Jonathan Swift在1726年关于大小端之争历史的描述：<br>\n“……下面我要告诉你的是，Lilliput和Blefuscu这两大强国在过去36个月里一直在苦战。战争开始是由于以下的原因：我们大家都认为，吃鸡蛋前，原始的方法是打破鸡蛋较大的一端，可是当今的皇帝的祖父小时候吃鸡蛋，一次按古法打鸡蛋时碰巧将一个手指弄破了，因此他的父亲，当时的皇帝，就下了一道敕令，命令全体臣民吃鸡蛋时打破较小的一端，违令者重罚。”\n\n###块引用有多级结构\n>数据结构\n>>树\n>>>二叉树\n>>>>平衡二叉树\n>>>>>满二叉树\n\n##<a name=\"code\"/>代码高亮\n```Java\npublic static void main(String[]args){} //Java\n```\n```c\nint main(int argc, char *argv[]) //C\n```\n```Bash\necho \"hello GitHub\"#Bash\n```\n```javascript\ndocument.getElementById(\"myH1\").innerHTML=\"Welcome to my Homepage\"; //javascipt\n```\n```cpp\nstring &operator+(const string& A,const string& B) //cpp\n```\n##<a name=\"table\"/>显示表格\n表头1  | 表头2\n------------- | -------------\nContent Cell  | Content Cell\nContent Cell  | Content Cell\n\n| 表头1  | 表头2|\n| ------------- | ------------- |\n| Content Cell  | Content Cell  |\n| Content Cell  | Content Cell  |\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | Display the help window.|\n| Close     | Closes a window     |\n\n表格中也可以使用普通文本的删除线，斜体等效果\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | ~~Display the~~ help window.|\n| Close     | _Closes_ a window     |\n\n表格可以指定对齐方式\n\n| 左对齐 | 居中  | 右对齐 |\n| :------------ |:---------------:| -----:|\n| col 3 is      | some wordy text | $1600 |\n| col 2 is      | centered        |   $12 |\n| zebra stripes | are neat        |    $1 |\n\n表格中嵌入图片\n\n| 图片 | 描述 |\n| ---- | ---- |\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\") | baidu\n\n##<a name=\"emoji\"/>添加表情\nGithub的Markdown语法支持添加emoji表情，输入不同的符号码（两个冒号包围的字符）可以显示出不同的表情。\n\n比如`:blush:`，可以显示:blush:。\n\n具体每一个表情的符号码，可以查询GitHub的官方网页[http://www.emoji-cheat-sheet.com](http://www.emoji-cheat-sheet.com)。\n\n但是这个网页每次都打开**奇慢**。。所以我整理到了本repo中，大家可以直接在此查看[emoji](./emoji.md)。','content','title',1463279075,'2016-05-15',1463279075,'2016-05-15','vimkid',1,'',0,'seotitle','keywords','description',0,'vimkid website',1,'seosubtitle',0,1,NULL,NULL,0,0),(10,1,1,'README\n===========================\n该文件用来测试和展示书写README的各种markdown语法。GitHub的markdown语法在标准的markdown语法基础上做了扩充，称之为`GitHub Flavored Markdown`。简称`GFM`，GFM在GitHub上有广泛应用，除了README文件外，issues和wiki均支持markdown语法。\n\n****\n###　　　　　　　　　　　　Author:Jelly\n###　　　　　　　　　 E-mail:879231132@qq.com\n\n===========================\n\n\n\n##<a name=\"index\"/>目录\n* [横线](#line)\n* [标题](#title)\n* [文本](#text)\n    * 普通文本\n    * 单行文本\n    * 多行文本\n    * 文字高亮\n* [链接](#link) \n    * 文字超链接\n        *  链接外部URL\n        *  链接本仓库里的URL\n    *  锚点\n    * [图片超链接](#piclink)\n* [图片](#pic)\n    * 来源于网络的图片\n    * GitHub仓库中的图片\n* [列表](#dot)\n    * 圆点列表\n    * 数字列表\n    * 复选框列表\n* [块引用](#blockquotes)\n* [代码](#code)\n* [表格](#table) \n* [表情](#emoji)\n\n<a name=\"line\"/>\n##***、---、___显示虚横线\n***\n---\n___\n\n\n\n<a name=\"title\"/>\n#一级标题\n##二级标题\n###三级标题\n####四级标题\n#####五级标题\n######六级标题\n\n\n##<a name=\"text\"/>显示文本\n###普通文本\n这是一段普通的文本\n####关于换行\n直接回车不能换行，<br>\n可以使用<br>。\n但是使用html标签就丧失了markdown的意义。  \n可以在上一行文本后面补两个空格，  \n这样下一行的文本就换行了。\n\n或者就是在两行文本直接加一个空行。\n\n也能实现换行效果，不过这个行间距有点大。\n###单行文本\n    Hello,大家好，我是果冻虾仁。\n###文本块\n    欢迎到访\n    很高兴见到您\n    祝您，早上好，中午好，下午好，晚安\n###部分文字高亮\nThank `You` . Please `Call` Me `Coder`\n####高亮功能更适合做一篇文章的tag\n例如:<br>\n`java` `网络编程` `Socket` `全双工`\n####删除线\n这是一个 ~~删除线~~\n####斜体\n*斜体1*\n\n_斜体2_\n####粗体\n**粗体1**\n\n__粗体2__\n\n####组合使用粗体、斜体和删除线\n***斜粗体1***\n\n___斜粗体2___\n\n***~~斜粗体删除线1~~***\n\n~~***斜粗体删除线2***~~\n\n##<a name=\"link\"/>链接\n###链接外部URL\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")   语法如下：\n```\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")\n```\n###链接的另一种写法\n[我的博客][id]  \n\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"   \n语法如下：\n```\n[我的博客][id]\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"\n```\n中括号[ ]里的id，可以是数字，字母等的组合。这两行可以不连着写，**一般把第二行的链接统一放在文章末尾**，id上下对应就行了。这样正文看起来会比较干净。\n\n###链接本仓库里的URL\n[Book](./Book)\n语法如下：\n```\n[Book](./Book)\n```\n如果文件要引用的文件不存在，则待点击的文本为红色。引用的文件存在存在则文本为蓝色。\n###锚点\n我们可以使用HTML的锚点标签（`#`）来设置锚点：[回到目录](#index)  \n但其实呢，每一个标题都是一个锚点，不需要用标签来指定，比如我们 [回到顶部](#TEST)\n不过不幸的是，由于对中文支持的不好，所以中文标题貌似是不能视作标签的。\n\n##<a name=\"pic\"/>显示图片\n###来源于网络的图片\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\")\n![](https://assets-cdn.github.com/images/modules/contact/goldstar.gif)\n\n###GitHub仓库中的图片\n![](https://github.com/guodongxiaren/ImageCache/raw/master/Logo/foryou.gif)\n###<a name=\"piclink\">给图片加上超链接\n####第一种\n\n[![head]](http://blog.csdn.net/guodongxiaren/article/details/23690801)\n[head]:https://github.com/guodongxiaren/ImageCache/raw/master/Logo/jianxin.jpg \"点击图片进入我的博客\"\n\n#### 第二种\n[![内容任意](http://www.baidu.com/img/bdlogo.gif \"百度logo\")](http://www.baidu.com)\n\n\n\n\n##<a name=\"dot\"/>列表\n###圆点列表\n* 昵称：果冻虾仁\n* 别名：隔壁老王\n* 英文名：Jelly\n\n###更多圆点\n* 编程语言\n    * 脚本语言\n        * Python\n\n###数字列表\n####一般效果\n就是在数字后面加一个点，再加一个空格。不过看起来起来可能不够明显。    \n面向对象的三个基本特征：\n\n1. 封装\n2. 继承\n3. 多态\n\n####数字列表自动排序\n也可以在第一行指定`1. `，而接下来的几行用星号`*`（或者继续用数字1. ）就可以了，它会自动显示成2、3、4……。    \n面向对象的七大原则：\n\n1. 开闭原则\n* 里氏转换原则\n* 依赖倒转原则\n* 接口隔离原则\n* 组合/聚合复用原则\n* “迪米特”法则\n* 单一直则原则\n\n####多级数字列表\n和圆点的列表一样，数字列表也有多级结构：  \n\n1. 这是一级的数字列表，数字1还是1\n   1. 这是二级的数字列表，阿拉伯数字在显示的时候变成了罗马数字\n      1. 这是三级的数字列表，数字在显示的时候变成了英文字母\n\t    1. 四级的数字列表显示效果，就不再变化了，依旧是英文字母\n\n### 复选框列表\n- [x] C\n- [x] C++\n- [x] Java\n- [x] Qt\n- [x] Android\n- [ ] C#\n- [ ] .NET\n\n您可以使用这个功能来标注某个项目各项任务的完成情况。\n##<a name=\"blockquotes\"/>块引用\n\n###常用于引用文本\n####文本摘自《深入理解计算机系统》P27\n　令人吃惊的是，在哪种字节顺序是合适的这个问题上，人们表现得非常情绪化。实际上术语“little endian”（小端）和“big endian”（大端）出自Jonathan Swift的《格利佛游记》一书，其中交战的两个派别无法就应该从哪一端打开一个半熟的鸡蛋达成一致。因此，争论沦为关于社会政治的争论。只要选择了一种规则并且始终如一的坚持，其实对于哪种字节排序的选择都是任意的。\n><b>“端”（endian）的起源</b><br>\n以下是Jonathan Swift在1726年关于大小端之争历史的描述：<br>\n“……下面我要告诉你的是，Lilliput和Blefuscu这两大强国在过去36个月里一直在苦战。战争开始是由于以下的原因：我们大家都认为，吃鸡蛋前，原始的方法是打破鸡蛋较大的一端，可是当今的皇帝的祖父小时候吃鸡蛋，一次按古法打鸡蛋时碰巧将一个手指弄破了，因此他的父亲，当时的皇帝，就下了一道敕令，命令全体臣民吃鸡蛋时打破较小的一端，违令者重罚。”\n\n###块引用有多级结构\n>数据结构\n>>树\n>>>二叉树\n>>>>平衡二叉树\n>>>>>满二叉树\n\n##<a name=\"code\"/>代码高亮\n```Java\npublic static void main(String[]args){} //Java\n```\n```c\nint main(int argc, char *argv[]) //C\n```\n```Bash\necho \"hello GitHub\"#Bash\n```\n```javascript\ndocument.getElementById(\"myH1\").innerHTML=\"Welcome to my Homepage\"; //javascipt\n```\n```cpp\nstring &operator+(const string& A,const string& B) //cpp\n```\n##<a name=\"table\"/>显示表格\n表头1  | 表头2\n------------- | -------------\nContent Cell  | Content Cell\nContent Cell  | Content Cell\n\n| 表头1  | 表头2|\n| ------------- | ------------- |\n| Content Cell  | Content Cell  |\n| Content Cell  | Content Cell  |\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | Display the help window.|\n| Close     | Closes a window     |\n\n表格中也可以使用普通文本的删除线，斜体等效果\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | ~~Display the~~ help window.|\n| Close     | _Closes_ a window     |\n\n表格可以指定对齐方式\n\n| 左对齐 | 居中  | 右对齐 |\n| :------------ |:---------------:| -----:|\n| col 3 is      | some wordy text | $1600 |\n| col 2 is      | centered        |   $12 |\n| zebra stripes | are neat        |    $1 |\n\n表格中嵌入图片\n\n| 图片 | 描述 |\n| ---- | ---- |\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\") | baidu\n\n##<a name=\"emoji\"/>添加表情\nGithub的Markdown语法支持添加emoji表情，输入不同的符号码（两个冒号包围的字符）可以显示出不同的表情。\n\n比如`:blush:`，可以显示:blush:。\n\n具体每一个表情的符号码，可以查询GitHub的官方网页[http://www.emoji-cheat-sheet.com](http://www.emoji-cheat-sheet.com)。\n\n但是这个网页每次都打开**奇慢**。。所以我整理到了本repo中，大家可以直接在此查看[emoji](./emoji.md)。','content','title',1463279628,'2016-05-15',1463279628,'2016-05-15','vimkid',1,'',0,'seotitle','keywords','description',0,'vimkid website',1,'seosubtitle',0,1,NULL,NULL,0,0),(11,1,1,'README\n===========================\n该文件用来测试和展示书写README的各种markdown语法。GitHub的markdown语法在标准的markdown语法基础上做了扩充，称之为`GitHub Flavored Markdown`。简称`GFM`，GFM在GitHub上有广泛应用，除了README文件外，issues和wiki均支持markdown语法。\n\n****\n###　　　　　　　　　　　　Author:Jelly\n###　　　　　　　　　 E-mail:879231132@qq.com\n\n===========================\n\n\n\n##<a name=\"index\"/>目录\n* [横线](#line)\n* [标题](#title)\n* [文本](#text)\n    * 普通文本\n    * 单行文本\n    * 多行文本\n    * 文字高亮\n* [链接](#link) \n    * 文字超链接\n        *  链接外部URL\n        *  链接本仓库里的URL\n    *  锚点\n    * [图片超链接](#piclink)\n* [图片](#pic)\n    * 来源于网络的图片\n    * GitHub仓库中的图片\n* [列表](#dot)\n    * 圆点列表\n    * 数字列表\n    * 复选框列表\n* [块引用](#blockquotes)\n* [代码](#code)\n* [表格](#table) \n* [表情](#emoji)\n\n<a name=\"line\"/>\n##***、---、___显示虚横线\n***\n---\n___\n\n\n\n<a name=\"title\"/>\n#一级标题\n##二级标题\n###三级标题\n####四级标题\n#####五级标题\n######六级标题\n\n\n##<a name=\"text\"/>显示文本\n###普通文本\n这是一段普通的文本\n####关于换行\n直接回车不能换行，<br>\n可以使用<br>。\n但是使用html标签就丧失了markdown的意义。  \n可以在上一行文本后面补两个空格，  \n这样下一行的文本就换行了。\n\n或者就是在两行文本直接加一个空行。\n\n也能实现换行效果，不过这个行间距有点大。\n###单行文本\n    Hello,大家好，我是果冻虾仁。\n###文本块\n    欢迎到访\n    很高兴见到您\n    祝您，早上好，中午好，下午好，晚安\n###部分文字高亮\nThank `You` . Please `Call` Me `Coder`\n####高亮功能更适合做一篇文章的tag\n例如:<br>\n`java` `网络编程` `Socket` `全双工`\n####删除线\n这是一个 ~~删除线~~\n####斜体\n*斜体1*\n\n_斜体2_\n####粗体\n**粗体1**\n\n__粗体2__\n\n####组合使用粗体、斜体和删除线\n***斜粗体1***\n\n___斜粗体2___\n\n***~~斜粗体删除线1~~***\n\n~~***斜粗体删除线2***~~\n\n##<a name=\"link\"/>链接\n###链接外部URL\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")   语法如下：\n```\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")\n```\n###链接的另一种写法\n[我的博客][id]  \n\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"   \n语法如下：\n```\n[我的博客][id]\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"\n```\n中括号[ ]里的id，可以是数字，字母等的组合。这两行可以不连着写，**一般把第二行的链接统一放在文章末尾**，id上下对应就行了。这样正文看起来会比较干净。\n\n###链接本仓库里的URL\n[Book](./Book)\n语法如下：\n```\n[Book](./Book)\n```\n如果文件要引用的文件不存在，则待点击的文本为红色。引用的文件存在存在则文本为蓝色。\n###锚点\n我们可以使用HTML的锚点标签（`#`）来设置锚点：[回到目录](#index)  \n但其实呢，每一个标题都是一个锚点，不需要用标签来指定，比如我们 [回到顶部](#TEST)\n不过不幸的是，由于对中文支持的不好，所以中文标题貌似是不能视作标签的。\n\n##<a name=\"pic\"/>显示图片\n###来源于网络的图片\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\")\n![](https://assets-cdn.github.com/images/modules/contact/goldstar.gif)\n\n###GitHub仓库中的图片\n![](https://github.com/guodongxiaren/ImageCache/raw/master/Logo/foryou.gif)\n###<a name=\"piclink\">给图片加上超链接\n####第一种\n\n[![head]](http://blog.csdn.net/guodongxiaren/article/details/23690801)\n[head]:https://github.com/guodongxiaren/ImageCache/raw/master/Logo/jianxin.jpg \"点击图片进入我的博客\"\n\n#### 第二种\n[![内容任意](http://www.baidu.com/img/bdlogo.gif \"百度logo\")](http://www.baidu.com)\n\n\n\n\n##<a name=\"dot\"/>列表\n###圆点列表\n* 昵称：果冻虾仁\n* 别名：隔壁老王\n* 英文名：Jelly\n\n###更多圆点\n* 编程语言\n    * 脚本语言\n        * Python\n\n###数字列表\n####一般效果\n就是在数字后面加一个点，再加一个空格。不过看起来起来可能不够明显。    \n面向对象的三个基本特征：\n\n1. 封装\n2. 继承\n3. 多态\n\n####数字列表自动排序\n也可以在第一行指定`1. `，而接下来的几行用星号`*`（或者继续用数字1. ）就可以了，它会自动显示成2、3、4……。    \n面向对象的七大原则：\n\n1. 开闭原则\n* 里氏转换原则\n* 依赖倒转原则\n* 接口隔离原则\n* 组合/聚合复用原则\n* “迪米特”法则\n* 单一直则原则\n\n####多级数字列表\n和圆点的列表一样，数字列表也有多级结构：  \n\n1. 这是一级的数字列表，数字1还是1\n   1. 这是二级的数字列表，阿拉伯数字在显示的时候变成了罗马数字\n      1. 这是三级的数字列表，数字在显示的时候变成了英文字母\n\t    1. 四级的数字列表显示效果，就不再变化了，依旧是英文字母\n\n### 复选框列表\n- [x] C\n- [x] C++\n- [x] Java\n- [x] Qt\n- [x] Android\n- [ ] C#\n- [ ] .NET\n\n您可以使用这个功能来标注某个项目各项任务的完成情况。\n##<a name=\"blockquotes\"/>块引用\n\n###常用于引用文本\n####文本摘自《深入理解计算机系统》P27\n　令人吃惊的是，在哪种字节顺序是合适的这个问题上，人们表现得非常情绪化。实际上术语“little endian”（小端）和“big endian”（大端）出自Jonathan Swift的《格利佛游记》一书，其中交战的两个派别无法就应该从哪一端打开一个半熟的鸡蛋达成一致。因此，争论沦为关于社会政治的争论。只要选择了一种规则并且始终如一的坚持，其实对于哪种字节排序的选择都是任意的。\n><b>“端”（endian）的起源</b><br>\n以下是Jonathan Swift在1726年关于大小端之争历史的描述：<br>\n“……下面我要告诉你的是，Lilliput和Blefuscu这两大强国在过去36个月里一直在苦战。战争开始是由于以下的原因：我们大家都认为，吃鸡蛋前，原始的方法是打破鸡蛋较大的一端，可是当今的皇帝的祖父小时候吃鸡蛋，一次按古法打鸡蛋时碰巧将一个手指弄破了，因此他的父亲，当时的皇帝，就下了一道敕令，命令全体臣民吃鸡蛋时打破较小的一端，违令者重罚。”\n\n###块引用有多级结构\n>数据结构\n>>树\n>>>二叉树\n>>>>平衡二叉树\n>>>>>满二叉树\n\n##<a name=\"code\"/>代码高亮\n```Java\npublic static void main(String[]args){} //Java\n```\n```c\nint main(int argc, char *argv[]) //C\n```\n```Bash\necho \"hello GitHub\"#Bash\n```\n```javascript\ndocument.getElementById(\"myH1\").innerHTML=\"Welcome to my Homepage\"; //javascipt\n```\n```cpp\nstring &operator+(const string& A,const string& B) //cpp\n```\n##<a name=\"table\"/>显示表格\n表头1  | 表头2\n------------- | -------------\nContent Cell  | Content Cell\nContent Cell  | Content Cell\n\n| 表头1  | 表头2|\n| ------------- | ------------- |\n| Content Cell  | Content Cell  |\n| Content Cell  | Content Cell  |\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | Display the help window.|\n| Close     | Closes a window     |\n\n表格中也可以使用普通文本的删除线，斜体等效果\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | ~~Display the~~ help window.|\n| Close     | _Closes_ a window     |\n\n表格可以指定对齐方式\n\n| 左对齐 | 居中  | 右对齐 |\n| :------------ |:---------------:| -----:|\n| col 3 is      | some wordy text | $1600 |\n| col 2 is      | centered        |   $12 |\n| zebra stripes | are neat        |    $1 |\n\n表格中嵌入图片\n\n| 图片 | 描述 |\n| ---- | ---- |\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\") | baidu\n\n##<a name=\"emoji\"/>添加表情\nGithub的Markdown语法支持添加emoji表情，输入不同的符号码（两个冒号包围的字符）可以显示出不同的表情。\n\n比如`:blush:`，可以显示:blush:。\n\n具体每一个表情的符号码，可以查询GitHub的官方网页[http://www.emoji-cheat-sheet.com](http://www.emoji-cheat-sheet.com)。\n\n但是这个网页每次都打开**奇慢**。。所以我整理到了本repo中，大家可以直接在此查看[emoji](./emoji.md)。','content','title',1463279630,'2016-05-15',1463279630,'2016-05-15','vimkid',1,'',0,'seotitle','keywords','description',0,'vimkid website',1,'seosubtitle',0,1,NULL,NULL,0,0),(12,1,1,'README\n===========================\n该文件用来测试和展示书写README的各种markdown语法。GitHub的markdown语法在标准的markdown语法基础上做了扩充，称之为`GitHub Flavored Markdown`。简称`GFM`，GFM在GitHub上有广泛应用，除了README文件外，issues和wiki均支持markdown语法。\n\n****\n###　　　　　　　　　　　　Author:Jelly\n###　　　　　　　　　 E-mail:879231132@qq.com\n\n===========================\n\n\n\n##<a name=\"index\"/>目录\n* [横线](#line)\n* [标题](#title)\n* [文本](#text)\n    * 普通文本\n    * 单行文本\n    * 多行文本\n    * 文字高亮\n* [链接](#link) \n    * 文字超链接\n        *  链接外部URL\n        *  链接本仓库里的URL\n    *  锚点\n    * [图片超链接](#piclink)\n* [图片](#pic)\n    * 来源于网络的图片\n    * GitHub仓库中的图片\n* [列表](#dot)\n    * 圆点列表\n    * 数字列表\n    * 复选框列表\n* [块引用](#blockquotes)\n* [代码](#code)\n* [表格](#table) \n* [表情](#emoji)\n\n<a name=\"line\"/>\n##***、---、___显示虚横线\n***\n---\n___\n\n\n\n<a name=\"title\"/>\n#一级标题\n##二级标题\n###三级标题\n####四级标题\n#####五级标题\n######六级标题\n\n\n##<a name=\"text\"/>显示文本\n###普通文本\n这是一段普通的文本\n####关于换行\n直接回车不能换行，<br>\n可以使用<br>。\n但是使用html标签就丧失了markdown的意义。  \n可以在上一行文本后面补两个空格，  \n这样下一行的文本就换行了。\n\n或者就是在两行文本直接加一个空行。\n\n也能实现换行效果，不过这个行间距有点大。\n###单行文本\n    Hello,大家好，我是果冻虾仁。\n###文本块\n    欢迎到访\n    很高兴见到您\n    祝您，早上好，中午好，下午好，晚安\n###部分文字高亮\nThank `You` . Please `Call` Me `Coder`\n####高亮功能更适合做一篇文章的tag\n例如:<br>\n`java` `网络编程` `Socket` `全双工`\n####删除线\n这是一个 ~~删除线~~\n####斜体\n*斜体1*\n\n_斜体2_\n####粗体\n**粗体1**\n\n__粗体2__\n\n####组合使用粗体、斜体和删除线\n***斜粗体1***\n\n___斜粗体2___\n\n***~~斜粗体删除线1~~***\n\n~~***斜粗体删除线2***~~\n\n##<a name=\"link\"/>链接\n###链接外部URL\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")   语法如下：\n```\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")\n```\n###链接的另一种写法\n[我的博客][id]  \n\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"   \n语法如下：\n```\n[我的博客][id]\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"\n```\n中括号[ ]里的id，可以是数字，字母等的组合。这两行可以不连着写，**一般把第二行的链接统一放在文章末尾**，id上下对应就行了。这样正文看起来会比较干净。\n\n###链接本仓库里的URL\n[Book](./Book)\n语法如下：\n```\n[Book](./Book)\n```\n如果文件要引用的文件不存在，则待点击的文本为红色。引用的文件存在存在则文本为蓝色。\n###锚点\n我们可以使用HTML的锚点标签（`#`）来设置锚点：[回到目录](#index)  \n但其实呢，每一个标题都是一个锚点，不需要用标签来指定，比如我们 [回到顶部](#TEST)\n不过不幸的是，由于对中文支持的不好，所以中文标题貌似是不能视作标签的。\n\n##<a name=\"pic\"/>显示图片\n###来源于网络的图片\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\")\n![](https://assets-cdn.github.com/images/modules/contact/goldstar.gif)\n\n###GitHub仓库中的图片\n![](https://github.com/guodongxiaren/ImageCache/raw/master/Logo/foryou.gif)\n###<a name=\"piclink\">给图片加上超链接\n####第一种\n\n[![head]](http://blog.csdn.net/guodongxiaren/article/details/23690801)\n[head]:https://github.com/guodongxiaren/ImageCache/raw/master/Logo/jianxin.jpg \"点击图片进入我的博客\"\n\n#### 第二种\n[![内容任意](http://www.baidu.com/img/bdlogo.gif \"百度logo\")](http://www.baidu.com)\n\n\n\n\n##<a name=\"dot\"/>列表\n###圆点列表\n* 昵称：果冻虾仁\n* 别名：隔壁老王\n* 英文名：Jelly\n\n###更多圆点\n* 编程语言\n    * 脚本语言\n        * Python\n\n###数字列表\n####一般效果\n就是在数字后面加一个点，再加一个空格。不过看起来起来可能不够明显。    \n面向对象的三个基本特征：\n\n1. 封装\n2. 继承\n3. 多态\n\n####数字列表自动排序\n也可以在第一行指定`1. `，而接下来的几行用星号`*`（或者继续用数字1. ）就可以了，它会自动显示成2、3、4……。    \n面向对象的七大原则：\n\n1. 开闭原则\n* 里氏转换原则\n* 依赖倒转原则\n* 接口隔离原则\n* 组合/聚合复用原则\n* “迪米特”法则\n* 单一直则原则\n\n####多级数字列表\n和圆点的列表一样，数字列表也有多级结构：  \n\n1. 这是一级的数字列表，数字1还是1\n   1. 这是二级的数字列表，阿拉伯数字在显示的时候变成了罗马数字\n      1. 这是三级的数字列表，数字在显示的时候变成了英文字母\n\t    1. 四级的数字列表显示效果，就不再变化了，依旧是英文字母\n\n### 复选框列表\n- [x] C\n- [x] C++\n- [x] Java\n- [x] Qt\n- [x] Android\n- [ ] C#\n- [ ] .NET\n\n您可以使用这个功能来标注某个项目各项任务的完成情况。\n##<a name=\"blockquotes\"/>块引用\n\n###常用于引用文本\n####文本摘自《深入理解计算机系统》P27\n　令人吃惊的是，在哪种字节顺序是合适的这个问题上，人们表现得非常情绪化。实际上术语“little endian”（小端）和“big endian”（大端）出自Jonathan Swift的《格利佛游记》一书，其中交战的两个派别无法就应该从哪一端打开一个半熟的鸡蛋达成一致。因此，争论沦为关于社会政治的争论。只要选择了一种规则并且始终如一的坚持，其实对于哪种字节排序的选择都是任意的。\n><b>“端”（endian）的起源</b><br>\n以下是Jonathan Swift在1726年关于大小端之争历史的描述：<br>\n“……下面我要告诉你的是，Lilliput和Blefuscu这两大强国在过去36个月里一直在苦战。战争开始是由于以下的原因：我们大家都认为，吃鸡蛋前，原始的方法是打破鸡蛋较大的一端，可是当今的皇帝的祖父小时候吃鸡蛋，一次按古法打鸡蛋时碰巧将一个手指弄破了，因此他的父亲，当时的皇帝，就下了一道敕令，命令全体臣民吃鸡蛋时打破较小的一端，违令者重罚。”\n\n###块引用有多级结构\n>数据结构\n>>树\n>>>二叉树\n>>>>平衡二叉树\n>>>>>满二叉树\n\n##<a name=\"code\"/>代码高亮\n```Java\npublic static void main(String[]args){} //Java\n```\n```c\nint main(int argc, char *argv[]) //C\n```\n```Bash\necho \"hello GitHub\"#Bash\n```\n```javascript\ndocument.getElementById(\"myH1\").innerHTML=\"Welcome to my Homepage\"; //javascipt\n```\n```cpp\nstring &operator+(const string& A,const string& B) //cpp\n```\n##<a name=\"table\"/>显示表格\n表头1  | 表头2\n------------- | -------------\nContent Cell  | Content Cell\nContent Cell  | Content Cell\n\n| 表头1  | 表头2|\n| ------------- | ------------- |\n| Content Cell  | Content Cell  |\n| Content Cell  | Content Cell  |\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | Display the help window.|\n| Close     | Closes a window     |\n\n表格中也可以使用普通文本的删除线，斜体等效果\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | ~~Display the~~ help window.|\n| Close     | _Closes_ a window     |\n\n表格可以指定对齐方式\n\n| 左对齐 | 居中  | 右对齐 |\n| :------------ |:---------------:| -----:|\n| col 3 is      | some wordy text | $1600 |\n| col 2 is      | centered        |   $12 |\n| zebra stripes | are neat        |    $1 |\n\n表格中嵌入图片\n\n| 图片 | 描述 |\n| ---- | ---- |\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\") | baidu\n\n##<a name=\"emoji\"/>添加表情\nGithub的Markdown语法支持添加emoji表情，输入不同的符号码（两个冒号包围的字符）可以显示出不同的表情。\n\n比如`:blush:`，可以显示:blush:。\n\n具体每一个表情的符号码，可以查询GitHub的官方网页[http://www.emoji-cheat-sheet.com](http://www.emoji-cheat-sheet.com)。\n\n但是这个网页每次都打开**奇慢**。。所以我整理到了本repo中，大家可以直接在此查看[emoji](./emoji.md)。','content','title',1463279631,'2016-05-15',1463279631,'2016-05-15','vimkid',1,'',0,'seotitle','keywords','description',0,'vimkid website',1,'seosubtitle',0,1,NULL,NULL,0,0),(13,1,1,'README\n===========================\n该文件用来测试和展示书写README的各种markdown语法。GitHub的markdown语法在标准的markdown语法基础上做了扩充，称之为`GitHub Flavored Markdown`。简称`GFM`，GFM在GitHub上有广泛应用，除了README文件外，issues和wiki均支持markdown语法。\n\n****\n###　　　　　　　　　　　　Author:Jelly\n###　　　　　　　　　 E-mail:879231132@qq.com\n\n===========================\n\n\n\n##<a name=\"index\"/>目录\n* [横线](#line)\n* [标题](#title)\n* [文本](#text)\n    * 普通文本\n    * 单行文本\n    * 多行文本\n    * 文字高亮\n* [链接](#link) \n    * 文字超链接\n        *  链接外部URL\n        *  链接本仓库里的URL\n    *  锚点\n    * [图片超链接](#piclink)\n* [图片](#pic)\n    * 来源于网络的图片\n    * GitHub仓库中的图片\n* [列表](#dot)\n    * 圆点列表\n    * 数字列表\n    * 复选框列表\n* [块引用](#blockquotes)\n* [代码](#code)\n* [表格](#table) \n* [表情](#emoji)\n\n<a name=\"line\"/>\n##***、---、___显示虚横线\n***\n---\n___\n\n\n\n<a name=\"title\"/>\n#一级标题\n##二级标题\n###三级标题\n####四级标题\n#####五级标题\n######六级标题\n\n\n##<a name=\"text\"/>显示文本\n###普通文本\n这是一段普通的文本\n####关于换行\n直接回车不能换行，<br>\n可以使用<br>。\n但是使用html标签就丧失了markdown的意义。  \n可以在上一行文本后面补两个空格，  \n这样下一行的文本就换行了。\n\n或者就是在两行文本直接加一个空行。\n\n也能实现换行效果，不过这个行间距有点大。\n###单行文本\n    Hello,大家好，我是果冻虾仁。\n###文本块\n    欢迎到访\n    很高兴见到您\n    祝您，早上好，中午好，下午好，晚安\n###部分文字高亮\nThank `You` . Please `Call` Me `Coder`\n####高亮功能更适合做一篇文章的tag\n例如:<br>\n`java` `网络编程` `Socket` `全双工`\n####删除线\n这是一个 ~~删除线~~\n####斜体\n*斜体1*\n\n_斜体2_\n####粗体\n**粗体1**\n\n__粗体2__\n\n####组合使用粗体、斜体和删除线\n***斜粗体1***\n\n___斜粗体2___\n\n***~~斜粗体删除线1~~***\n\n~~***斜粗体删除线2***~~\n\n##<a name=\"link\"/>链接\n###链接外部URL\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")   语法如下：\n```\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")\n```\n###链接的另一种写法\n[我的博客][id]  \n\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"   \n语法如下：\n```\n[我的博客][id]\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"\n```\n中括号[ ]里的id，可以是数字，字母等的组合。这两行可以不连着写，**一般把第二行的链接统一放在文章末尾**，id上下对应就行了。这样正文看起来会比较干净。\n\n###链接本仓库里的URL\n[Book](./Book)\n语法如下：\n```\n[Book](./Book)\n```\n如果文件要引用的文件不存在，则待点击的文本为红色。引用的文件存在存在则文本为蓝色。\n###锚点\n我们可以使用HTML的锚点标签（`#`）来设置锚点：[回到目录](#index)  \n但其实呢，每一个标题都是一个锚点，不需要用标签来指定，比如我们 [回到顶部](#TEST)\n不过不幸的是，由于对中文支持的不好，所以中文标题貌似是不能视作标签的。\n\n##<a name=\"pic\"/>显示图片\n###来源于网络的图片\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\")\n![](https://assets-cdn.github.com/images/modules/contact/goldstar.gif)\n\n###GitHub仓库中的图片\n![](https://github.com/guodongxiaren/ImageCache/raw/master/Logo/foryou.gif)\n###<a name=\"piclink\">给图片加上超链接\n####第一种\n\n[![head]](http://blog.csdn.net/guodongxiaren/article/details/23690801)\n[head]:https://github.com/guodongxiaren/ImageCache/raw/master/Logo/jianxin.jpg \"点击图片进入我的博客\"\n\n#### 第二种\n[![内容任意](http://www.baidu.com/img/bdlogo.gif \"百度logo\")](http://www.baidu.com)\n\n\n\n\n##<a name=\"dot\"/>列表\n###圆点列表\n* 昵称：果冻虾仁\n* 别名：隔壁老王\n* 英文名：Jelly\n\n###更多圆点\n* 编程语言\n    * 脚本语言\n        * Python\n\n###数字列表\n####一般效果\n就是在数字后面加一个点，再加一个空格。不过看起来起来可能不够明显。    \n面向对象的三个基本特征：\n\n1. 封装\n2. 继承\n3. 多态\n\n####数字列表自动排序\n也可以在第一行指定`1. `，而接下来的几行用星号`*`（或者继续用数字1. ）就可以了，它会自动显示成2、3、4……。    \n面向对象的七大原则：\n\n1. 开闭原则\n* 里氏转换原则\n* 依赖倒转原则\n* 接口隔离原则\n* 组合/聚合复用原则\n* “迪米特”法则\n* 单一直则原则\n\n####多级数字列表\n和圆点的列表一样，数字列表也有多级结构：  \n\n1. 这是一级的数字列表，数字1还是1\n   1. 这是二级的数字列表，阿拉伯数字在显示的时候变成了罗马数字\n      1. 这是三级的数字列表，数字在显示的时候变成了英文字母\n\t    1. 四级的数字列表显示效果，就不再变化了，依旧是英文字母\n\n### 复选框列表\n- [x] C\n- [x] C++\n- [x] Java\n- [x] Qt\n- [x] Android\n- [ ] C#\n- [ ] .NET\n\n您可以使用这个功能来标注某个项目各项任务的完成情况。\n##<a name=\"blockquotes\"/>块引用\n\n###常用于引用文本\n####文本摘自《深入理解计算机系统》P27\n　令人吃惊的是，在哪种字节顺序是合适的这个问题上，人们表现得非常情绪化。实际上术语“little endian”（小端）和“big endian”（大端）出自Jonathan Swift的《格利佛游记》一书，其中交战的两个派别无法就应该从哪一端打开一个半熟的鸡蛋达成一致。因此，争论沦为关于社会政治的争论。只要选择了一种规则并且始终如一的坚持，其实对于哪种字节排序的选择都是任意的。\n><b>“端”（endian）的起源</b><br>\n以下是Jonathan Swift在1726年关于大小端之争历史的描述：<br>\n“……下面我要告诉你的是，Lilliput和Blefuscu这两大强国在过去36个月里一直在苦战。战争开始是由于以下的原因：我们大家都认为，吃鸡蛋前，原始的方法是打破鸡蛋较大的一端，可是当今的皇帝的祖父小时候吃鸡蛋，一次按古法打鸡蛋时碰巧将一个手指弄破了，因此他的父亲，当时的皇帝，就下了一道敕令，命令全体臣民吃鸡蛋时打破较小的一端，违令者重罚。”\n\n###块引用有多级结构\n>数据结构\n>>树\n>>>二叉树\n>>>>平衡二叉树\n>>>>>满二叉树\n\n##<a name=\"code\"/>代码高亮\n```Java\npublic static void main(String[]args){} //Java\n```\n```c\nint main(int argc, char *argv[]) //C\n```\n```Bash\necho \"hello GitHub\"#Bash\n```\n```javascript\ndocument.getElementById(\"myH1\").innerHTML=\"Welcome to my Homepage\"; //javascipt\n```\n```cpp\nstring &operator+(const string& A,const string& B) //cpp\n```\n##<a name=\"table\"/>显示表格\n表头1  | 表头2\n------------- | -------------\nContent Cell  | Content Cell\nContent Cell  | Content Cell\n\n| 表头1  | 表头2|\n| ------------- | ------------- |\n| Content Cell  | Content Cell  |\n| Content Cell  | Content Cell  |\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | Display the help window.|\n| Close     | Closes a window     |\n\n表格中也可以使用普通文本的删除线，斜体等效果\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | ~~Display the~~ help window.|\n| Close     | _Closes_ a window     |\n\n表格可以指定对齐方式\n\n| 左对齐 | 居中  | 右对齐 |\n| :------------ |:---------------:| -----:|\n| col 3 is      | some wordy text | $1600 |\n| col 2 is      | centered        |   $12 |\n| zebra stripes | are neat        |    $1 |\n\n表格中嵌入图片\n\n| 图片 | 描述 |\n| ---- | ---- |\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\") | baidu\n\n##<a name=\"emoji\"/>添加表情\nGithub的Markdown语法支持添加emoji表情，输入不同的符号码（两个冒号包围的字符）可以显示出不同的表情。\n\n比如`:blush:`，可以显示:blush:。\n\n具体每一个表情的符号码，可以查询GitHub的官方网页[http://www.emoji-cheat-sheet.com](http://www.emoji-cheat-sheet.com)。\n\n但是这个网页每次都打开**奇慢**。。所以我整理到了本repo中，大家可以直接在此查看[emoji](./emoji.md)。','content','title',1463279632,'2016-05-15',1463279632,'2016-05-15','vimkid',1,'',0,'seotitle','keywords','description',0,'vimkid website',1,'seosubtitle',0,1,NULL,NULL,0,0),(14,1,1,'README\n===========================\n该文件用来测试和展示书写README的各种markdown语法。GitHub的markdown语法在标准的markdown语法基础上做了扩充，称之为`GitHub Flavored Markdown`。简称`GFM`，GFM在GitHub上有广泛应用，除了README文件外，issues和wiki均支持markdown语法。\n\n****\n###　　　　　　　　　　　　Author:Jelly\n###　　　　　　　　　 E-mail:879231132@qq.com\n\n===========================\n\n\n\n##<a name=\"index\"/>目录\n* [横线](#line)\n* [标题](#title)\n* [文本](#text)\n    * 普通文本\n    * 单行文本\n    * 多行文本\n    * 文字高亮\n* [链接](#link) \n    * 文字超链接\n        *  链接外部URL\n        *  链接本仓库里的URL\n    *  锚点\n    * [图片超链接](#piclink)\n* [图片](#pic)\n    * 来源于网络的图片\n    * GitHub仓库中的图片\n* [列表](#dot)\n    * 圆点列表\n    * 数字列表\n    * 复选框列表\n* [块引用](#blockquotes)\n* [代码](#code)\n* [表格](#table) \n* [表情](#emoji)\n\n<a name=\"line\"/>\n##***、---、___显示虚横线\n***\n---\n___\n\n\n\n<a name=\"title\"/>\n#一级标题\n##二级标题\n###三级标题\n####四级标题\n#####五级标题\n######六级标题\n\n\n##<a name=\"text\"/>显示文本\n###普通文本\n这是一段普通的文本\n####关于换行\n直接回车不能换行，<br>\n可以使用<br>。\n但是使用html标签就丧失了markdown的意义。  \n可以在上一行文本后面补两个空格，  \n这样下一行的文本就换行了。\n\n或者就是在两行文本直接加一个空行。\n\n也能实现换行效果，不过这个行间距有点大。\n###单行文本\n    Hello,大家好，我是果冻虾仁。\n###文本块\n    欢迎到访\n    很高兴见到您\n    祝您，早上好，中午好，下午好，晚安\n###部分文字高亮\nThank `You` . Please `Call` Me `Coder`\n####高亮功能更适合做一篇文章的tag\n例如:<br>\n`java` `网络编程` `Socket` `全双工`\n####删除线\n这是一个 ~~删除线~~\n####斜体\n*斜体1*\n\n_斜体2_\n####粗体\n**粗体1**\n\n__粗体2__\n\n####组合使用粗体、斜体和删除线\n***斜粗体1***\n\n___斜粗体2___\n\n***~~斜粗体删除线1~~***\n\n~~***斜粗体删除线2***~~\n\n##<a name=\"link\"/>链接\n###链接外部URL\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")   语法如下：\n```\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")\n```\n###链接的另一种写法\n[我的博客][id]  \n\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"   \n语法如下：\n```\n[我的博客][id]\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"\n```\n中括号[ ]里的id，可以是数字，字母等的组合。这两行可以不连着写，**一般把第二行的链接统一放在文章末尾**，id上下对应就行了。这样正文看起来会比较干净。\n\n###链接本仓库里的URL\n[Book](./Book)\n语法如下：\n```\n[Book](./Book)\n```\n如果文件要引用的文件不存在，则待点击的文本为红色。引用的文件存在存在则文本为蓝色。\n###锚点\n我们可以使用HTML的锚点标签（`#`）来设置锚点：[回到目录](#index)  \n但其实呢，每一个标题都是一个锚点，不需要用标签来指定，比如我们 [回到顶部](#TEST)\n不过不幸的是，由于对中文支持的不好，所以中文标题貌似是不能视作标签的。\n\n##<a name=\"pic\"/>显示图片\n###来源于网络的图片\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\")\n![](https://assets-cdn.github.com/images/modules/contact/goldstar.gif)\n\n###GitHub仓库中的图片\n![](https://github.com/guodongxiaren/ImageCache/raw/master/Logo/foryou.gif)\n###<a name=\"piclink\">给图片加上超链接\n####第一种\n\n[![head]](http://blog.csdn.net/guodongxiaren/article/details/23690801)\n[head]:https://github.com/guodongxiaren/ImageCache/raw/master/Logo/jianxin.jpg \"点击图片进入我的博客\"\n\n#### 第二种\n[![内容任意](http://www.baidu.com/img/bdlogo.gif \"百度logo\")](http://www.baidu.com)\n\n\n\n\n##<a name=\"dot\"/>列表\n###圆点列表\n* 昵称：果冻虾仁\n* 别名：隔壁老王\n* 英文名：Jelly\n\n###更多圆点\n* 编程语言\n    * 脚本语言\n        * Python\n\n###数字列表\n####一般效果\n就是在数字后面加一个点，再加一个空格。不过看起来起来可能不够明显。    \n面向对象的三个基本特征：\n\n1. 封装\n2. 继承\n3. 多态\n\n####数字列表自动排序\n也可以在第一行指定`1. `，而接下来的几行用星号`*`（或者继续用数字1. ）就可以了，它会自动显示成2、3、4……。    \n面向对象的七大原则：\n\n1. 开闭原则\n* 里氏转换原则\n* 依赖倒转原则\n* 接口隔离原则\n* 组合/聚合复用原则\n* “迪米特”法则\n* 单一直则原则\n\n####多级数字列表\n和圆点的列表一样，数字列表也有多级结构：  \n\n1. 这是一级的数字列表，数字1还是1\n   1. 这是二级的数字列表，阿拉伯数字在显示的时候变成了罗马数字\n      1. 这是三级的数字列表，数字在显示的时候变成了英文字母\n\t    1. 四级的数字列表显示效果，就不再变化了，依旧是英文字母\n\n### 复选框列表\n- [x] C\n- [x] C++\n- [x] Java\n- [x] Qt\n- [x] Android\n- [ ] C#\n- [ ] .NET\n\n您可以使用这个功能来标注某个项目各项任务的完成情况。\n##<a name=\"blockquotes\"/>块引用\n\n###常用于引用文本\n####文本摘自《深入理解计算机系统》P27\n　令人吃惊的是，在哪种字节顺序是合适的这个问题上，人们表现得非常情绪化。实际上术语“little endian”（小端）和“big endian”（大端）出自Jonathan Swift的《格利佛游记》一书，其中交战的两个派别无法就应该从哪一端打开一个半熟的鸡蛋达成一致。因此，争论沦为关于社会政治的争论。只要选择了一种规则并且始终如一的坚持，其实对于哪种字节排序的选择都是任意的。\n><b>“端”（endian）的起源</b><br>\n以下是Jonathan Swift在1726年关于大小端之争历史的描述：<br>\n“……下面我要告诉你的是，Lilliput和Blefuscu这两大强国在过去36个月里一直在苦战。战争开始是由于以下的原因：我们大家都认为，吃鸡蛋前，原始的方法是打破鸡蛋较大的一端，可是当今的皇帝的祖父小时候吃鸡蛋，一次按古法打鸡蛋时碰巧将一个手指弄破了，因此他的父亲，当时的皇帝，就下了一道敕令，命令全体臣民吃鸡蛋时打破较小的一端，违令者重罚。”\n\n###块引用有多级结构\n>数据结构\n>>树\n>>>二叉树\n>>>>平衡二叉树\n>>>>>满二叉树\n\n##<a name=\"code\"/>代码高亮\n```Java\npublic static void main(String[]args){} //Java\n```\n```c\nint main(int argc, char *argv[]) //C\n```\n```Bash\necho \"hello GitHub\"#Bash\n```\n```javascript\ndocument.getElementById(\"myH1\").innerHTML=\"Welcome to my Homepage\"; //javascipt\n```\n```cpp\nstring &operator+(const string& A,const string& B) //cpp\n```\n##<a name=\"table\"/>显示表格\n表头1  | 表头2\n------------- | -------------\nContent Cell  | Content Cell\nContent Cell  | Content Cell\n\n| 表头1  | 表头2|\n| ------------- | ------------- |\n| Content Cell  | Content Cell  |\n| Content Cell  | Content Cell  |\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | Display the help window.|\n| Close     | Closes a window     |\n\n表格中也可以使用普通文本的删除线，斜体等效果\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | ~~Display the~~ help window.|\n| Close     | _Closes_ a window     |\n\n表格可以指定对齐方式\n\n| 左对齐 | 居中  | 右对齐 |\n| :------------ |:---------------:| -----:|\n| col 3 is      | some wordy text | $1600 |\n| col 2 is      | centered        |   $12 |\n| zebra stripes | are neat        |    $1 |\n\n表格中嵌入图片\n\n| 图片 | 描述 |\n| ---- | ---- |\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\") | baidu\n\n##<a name=\"emoji\"/>添加表情\nGithub的Markdown语法支持添加emoji表情，输入不同的符号码（两个冒号包围的字符）可以显示出不同的表情。\n\n比如`:blush:`，可以显示:blush:。\n\n具体每一个表情的符号码，可以查询GitHub的官方网页[http://www.emoji-cheat-sheet.com](http://www.emoji-cheat-sheet.com)。\n\n但是这个网页每次都打开**奇慢**。。所以我整理到了本repo中，大家可以直接在此查看[emoji](./emoji.md)。','content','title',1463279635,'2016-05-15',1463279635,'2016-05-15','vimkid',1,'',0,'seotitle','keywords','description',0,'vimkid website',1,'seosubtitle',0,1,NULL,NULL,0,0),(15,1,1,'README\n===========================\n该文件用来测试和展示书写README的各种markdown语法。GitHub的markdown语法在标准的markdown语法基础上做了扩充，称之为`GitHub Flavored Markdown`。简称`GFM`，GFM在GitHub上有广泛应用，除了README文件外，issues和wiki均支持markdown语法。\n\n****\n###　　　　　　　　　　　　Author:Jelly\n###　　　　　　　　　 E-mail:879231132@qq.com\n\n===========================\n\n\n\n##<a name=\"index\"/>目录\n* [横线](#line)\n* [标题](#title)\n* [文本](#text)\n    * 普通文本\n    * 单行文本\n    * 多行文本\n    * 文字高亮\n* [链接](#link) \n    * 文字超链接\n        *  链接外部URL\n        *  链接本仓库里的URL\n    *  锚点\n    * [图片超链接](#piclink)\n* [图片](#pic)\n    * 来源于网络的图片\n    * GitHub仓库中的图片\n* [列表](#dot)\n    * 圆点列表\n    * 数字列表\n    * 复选框列表\n* [块引用](#blockquotes)\n* [代码](#code)\n* [表格](#table) \n* [表情](#emoji)\n\n<a name=\"line\"/>\n##***、---、___显示虚横线\n***\n---\n___\n\n\n\n<a name=\"title\"/>\n#一级标题\n##二级标题\n###三级标题\n####四级标题\n#####五级标题\n######六级标题\n\n\n##<a name=\"text\"/>显示文本\n###普通文本\n这是一段普通的文本\n####关于换行\n直接回车不能换行，<br>\n可以使用<br>。\n但是使用html标签就丧失了markdown的意义。  \n可以在上一行文本后面补两个空格，  \n这样下一行的文本就换行了。\n\n或者就是在两行文本直接加一个空行。\n\n也能实现换行效果，不过这个行间距有点大。\n###单行文本\n    Hello,大家好，我是果冻虾仁。\n###文本块\n    欢迎到访\n    很高兴见到您\n    祝您，早上好，中午好，下午好，晚安\n###部分文字高亮\nThank `You` . Please `Call` Me `Coder`\n####高亮功能更适合做一篇文章的tag\n例如:<br>\n`java` `网络编程` `Socket` `全双工`\n####删除线\n这是一个 ~~删除线~~\n####斜体\n*斜体1*\n\n_斜体2_\n####粗体\n**粗体1**\n\n__粗体2__\n\n####组合使用粗体、斜体和删除线\n***斜粗体1***\n\n___斜粗体2___\n\n***~~斜粗体删除线1~~***\n\n~~***斜粗体删除线2***~~\n\n##<a name=\"link\"/>链接\n###链接外部URL\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")   语法如下：\n```\n[我的博客](http://blog.csdn.net/guodongxiaren \"悬停显示\")\n```\n###链接的另一种写法\n[我的博客][id]  \n\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"   \n语法如下：\n```\n[我的博客][id]\n[id]:http://blog.csdn.net/guodongxiaren \"悬停显示\"\n```\n中括号[ ]里的id，可以是数字，字母等的组合。这两行可以不连着写，**一般把第二行的链接统一放在文章末尾**，id上下对应就行了。这样正文看起来会比较干净。\n\n###链接本仓库里的URL\n[Book](./Book)\n语法如下：\n```\n[Book](./Book)\n```\n如果文件要引用的文件不存在，则待点击的文本为红色。引用的文件存在存在则文本为蓝色。\n###锚点\n我们可以使用HTML的锚点标签（`#`）来设置锚点：[回到目录](#index)  \n但其实呢，每一个标题都是一个锚点，不需要用标签来指定，比如我们 [回到顶部](#TEST)\n不过不幸的是，由于对中文支持的不好，所以中文标题貌似是不能视作标签的。\n\n##<a name=\"pic\"/>显示图片\n###来源于网络的图片\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\")\n![](https://assets-cdn.github.com/images/modules/contact/goldstar.gif)\n\n###GitHub仓库中的图片\n![](https://github.com/guodongxiaren/ImageCache/raw/master/Logo/foryou.gif)\n###<a name=\"piclink\">给图片加上超链接\n####第一种\n\n[![head]](http://blog.csdn.net/guodongxiaren/article/details/23690801)\n[head]:https://github.com/guodongxiaren/ImageCache/raw/master/Logo/jianxin.jpg \"点击图片进入我的博客\"\n\n#### 第二种\n[![内容任意](http://www.baidu.com/img/bdlogo.gif \"百度logo\")](http://www.baidu.com)\n\n\n\n\n##<a name=\"dot\"/>列表\n###圆点列表\n* 昵称：果冻虾仁\n* 别名：隔壁老王\n* 英文名：Jelly\n\n###更多圆点\n* 编程语言\n    * 脚本语言\n        * Python\n\n###数字列表\n####一般效果\n就是在数字后面加一个点，再加一个空格。不过看起来起来可能不够明显。    \n面向对象的三个基本特征：\n\n1. 封装\n2. 继承\n3. 多态\n\n####数字列表自动排序\n也可以在第一行指定`1. `，而接下来的几行用星号`*`（或者继续用数字1. ）就可以了，它会自动显示成2、3、4……。    \n面向对象的七大原则：\n\n1. 开闭原则\n* 里氏转换原则\n* 依赖倒转原则\n* 接口隔离原则\n* 组合/聚合复用原则\n* “迪米特”法则\n* 单一直则原则\n\n####多级数字列表\n和圆点的列表一样，数字列表也有多级结构：  \n\n1. 这是一级的数字列表，数字1还是1\n   1. 这是二级的数字列表，阿拉伯数字在显示的时候变成了罗马数字\n      1. 这是三级的数字列表，数字在显示的时候变成了英文字母\n\t    1. 四级的数字列表显示效果，就不再变化了，依旧是英文字母\n\n### 复选框列表\n- [x] C\n- [x] C++\n- [x] Java\n- [x] Qt\n- [x] Android\n- [ ] C#\n- [ ] .NET\n\n您可以使用这个功能来标注某个项目各项任务的完成情况。\n##<a name=\"blockquotes\"/>块引用\n\n###常用于引用文本\n####文本摘自《深入理解计算机系统》P27\n　令人吃惊的是，在哪种字节顺序是合适的这个问题上，人们表现得非常情绪化。实际上术语“little endian”（小端）和“big endian”（大端）出自Jonathan Swift的《格利佛游记》一书，其中交战的两个派别无法就应该从哪一端打开一个半熟的鸡蛋达成一致。因此，争论沦为关于社会政治的争论。只要选择了一种规则并且始终如一的坚持，其实对于哪种字节排序的选择都是任意的。\n><b>“端”（endian）的起源</b><br>\n以下是Jonathan Swift在1726年关于大小端之争历史的描述：<br>\n“……下面我要告诉你的是，Lilliput和Blefuscu这两大强国在过去36个月里一直在苦战。战争开始是由于以下的原因：我们大家都认为，吃鸡蛋前，原始的方法是打破鸡蛋较大的一端，可是当今的皇帝的祖父小时候吃鸡蛋，一次按古法打鸡蛋时碰巧将一个手指弄破了，因此他的父亲，当时的皇帝，就下了一道敕令，命令全体臣民吃鸡蛋时打破较小的一端，违令者重罚。”\n\n###块引用有多级结构\n>数据结构\n>>树\n>>>二叉树\n>>>>平衡二叉树\n>>>>>满二叉树\n\n##<a name=\"code\"/>代码高亮\n```Java\npublic static void main(String[]args){} //Java\n```\n```c\nint main(int argc, char *argv[]) //C\n```\n```Bash\necho \"hello GitHub\"#Bash\n```\n```javascript\ndocument.getElementById(\"myH1\").innerHTML=\"Welcome to my Homepage\"; //javascipt\n```\n```cpp\nstring &operator+(const string& A,const string& B) //cpp\n```\n##<a name=\"table\"/>显示表格\n表头1  | 表头2\n------------- | -------------\nContent Cell  | Content Cell\nContent Cell  | Content Cell\n\n| 表头1  | 表头2|\n| ------------- | ------------- |\n| Content Cell  | Content Cell  |\n| Content Cell  | Content Cell  |\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | Display the help window.|\n| Close     | Closes a window     |\n\n表格中也可以使用普通文本的删除线，斜体等效果\n\n| 名字 | 描述          |\n| ------------- | ----------- |\n| Help      | ~~Display the~~ help window.|\n| Close     | _Closes_ a window     |\n\n表格可以指定对齐方式\n\n| 左对齐 | 居中  | 右对齐 |\n| :------------ |:---------------:| -----:|\n| col 3 is      | some wordy text | $1600 |\n| col 2 is      | centered        |   $12 |\n| zebra stripes | are neat        |    $1 |\n\n表格中嵌入图片\n\n| 图片 | 描述 |\n| ---- | ---- |\n![baidu](http://www.baidu.com/img/bdlogo.gif \"百度logo\") | baidu\n\n##<a name=\"emoji\"/>添加表情\nGithub的Markdown语法支持添加emoji表情，输入不同的符号码（两个冒号包围的字符）可以显示出不同的表情。\n\n比如`:blush:`，可以显示:blush:。\n\n具体每一个表情的符号码，可以查询GitHub的官方网页[http://www.emoji-cheat-sheet.com](http://www.emoji-cheat-sheet.com)。\n\n但是这个网页每次都打开**奇慢**。。所以我整理到了本repo中，大家可以直接在此查看[emoji](./emoji.md)。','content','title',1463279636,'2016-05-15',1463279636,'2016-05-15','vimkid',1,'',0,'seotitle','keywords','description',0,'vimkid website',1,'seosubtitle',0,1,NULL,NULL,0,0);
/*!40000 ALTER TABLE `vimkid_article` ENABLE KEYS */;

#
# Source for table "vimkid_category"
#

DROP TABLE IF EXISTS `vimkid_category`;
CREATE TABLE `vimkid_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_parentid` int(4) NOT NULL DEFAULT '0' COMMENT '父id',
  `category_name` varchar(90) NOT NULL DEFAULT '' COMMENT '目录名称',
  `category_times` int(11) DEFAULT '0' COMMENT '目录访问次数',
  `category_createtime` int(11) DEFAULT NULL COMMENT '目录创建时间',
  `category_createtimeymd` date DEFAULT NULL COMMENT '目录创建时间ymd',
  `category_userid` int(11) DEFAULT NULL COMMENT '创建用户id',
  `category_username` varchar(90) DEFAULT NULL COMMENT '创建用户名',
  `category_description` varchar(300) DEFAULT NULL COMMENT '目录描述',
  PRIMARY KEY (`category_id`),
  KEY `category_parentid` (`category_parentid`),
  KEY `category_times` (`category_times`),
  KEY `category_name` (`category_name`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

#
# Data for table "vimkid_category"
#

/*!40000 ALTER TABLE `vimkid_category` DISABLE KEYS */;
INSERT INTO `vimkid_category` VALUES (1,0,'vim',0,NULL,'2016-05-14',NULL,NULL,'vim是一个文本编辑器'),(101,1,'每周学习一个vim插件',0,NULL,'2016-01-14',NULL,NULL,'每周学习一个vim插件');
/*!40000 ALTER TABLE `vimkid_category` ENABLE KEYS */;

#
# Source for table "vimkid_message"
#

DROP TABLE IF EXISTS `vimkid_message`;
CREATE TABLE `vimkid_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_username` varchar(90) DEFAULT NULL,
  `message_userid` int(11) DEFAULT NULL,
  `message_ip` varchar(15) DEFAULT NULL,
  `message_ipv6` varchar(30) DEFAULT NULL,
  `message_source` int(1) DEFAULT NULL COMMENT '来源: 1pc 2 wap',
  `message_content` varchar(900) DEFAULT NULL COMMENT '留言内容',
  `message_title` varchar(90) DEFAULT NULL COMMENT '留言标题',
  `message_image` varchar(120) DEFAULT NULL COMMENT '留言图片',
  `message_createtime` int(11) DEFAULT '0',
  `message_createtimeymd` date DEFAULT NULL,
  `message_articleid` int(11) DEFAULT NULL,
  `message_touser` varchar(90) DEFAULT NULL,
  `message_email` varchar(90) DEFAULT NULL,
  `message_category` int(3) NOT NULL DEFAULT '0',
  `message_type` int(2) DEFAULT NULL COMMENT '1 article  2 problem 3 suggest',
  `message_bvarchar` varchar(30) DEFAULT NULL,
  `message_bint` int(11) DEFAULT NULL,
  PRIMARY KEY (`message_id`),
  KEY `message_category` (`message_category`),
  KEY `message_type` (`message_type`),
  KEY `message_createtime` (`message_createtime`),
  KEY `message_createtimeymd` (`message_createtimeymd`),
  KEY `message_source` (`message_source`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "vimkid_message"
#

/*!40000 ALTER TABLE `vimkid_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `vimkid_message` ENABLE KEYS */;

#
# Source for table "vimkid_tag"
#

DROP TABLE IF EXISTS `vimkid_tag`;
CREATE TABLE `vimkid_tag` (
  `tag_id` int(7) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(60) DEFAULT NULL COMMENT '标签名称',
  `tag_userid` int(11) DEFAULT NULL,
  `tag_username` varchar(90) DEFAULT NULL,
  `tag_categoryid` int(4) DEFAULT NULL,
  `tag_articleid` int(11) DEFAULT NULL,
  `tag_createtime` int(11) DEFAULT NULL,
  `tag_createtimeymd` date DEFAULT NULL,
  `tag_type` int(2) DEFAULT NULL,
  `tag_bvarchar` varchar(30) DEFAULT NULL,
  `tag_bint` int(11) DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  KEY `tag_createtime` (`tag_createtime`),
  KEY `tag_createtimeymd` (`tag_createtimeymd`),
  KEY `tag_type` (`tag_type`),
  KEY `tag_name` (`tag_name`),
  KEY `tag_categoryid` (`tag_categoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "vimkid_tag"
#

/*!40000 ALTER TABLE `vimkid_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `vimkid_tag` ENABLE KEYS */;

#
# Source for table "vimkid_tagtotal"
#

DROP TABLE IF EXISTS `vimkid_tagtotal`;
CREATE TABLE `vimkid_tagtotal` (
  `tagtotal_id` int(11) NOT NULL AUTO_INCREMENT,
  `tagtotal_visit` int(11) DEFAULT NULL,
  `tagtotal_name` varchar(90) DEFAULT NULL,
  `tagtotal_count` int(4) DEFAULT NULL,
  `tagtotal_categoryid` int(4) DEFAULT NULL,
  `tagtotal_type` int(2) DEFAULT NULL,
  `tagtotal_bvarchar` varchar(30) DEFAULT NULL,
  `tagtotal_bint` int(11) DEFAULT NULL,
  `tagtotal_updatetime` int(11) DEFAULT NULL,
  `tagtotal_updatetimeymd` date DEFAULT NULL,
  PRIMARY KEY (`tagtotal_id`),
  KEY `tagtotal_visit` (`tagtotal_visit`),
  KEY `tagtotal_type` (`tagtotal_type`),
  KEY `tagtotal_count` (`tagtotal_count`),
  KEY `tagtotal_categoryid` (`tagtotal_categoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "vimkid_tagtotal"
#

/*!40000 ALTER TABLE `vimkid_tagtotal` DISABLE KEYS */;
/*!40000 ALTER TABLE `vimkid_tagtotal` ENABLE KEYS */;

#
# Source for table "vimkid_visit"
#

DROP TABLE IF EXISTS `vimkid_visit`;
CREATE TABLE `vimkid_visit` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `visit_ip` varchar(15) DEFAULT NULL,
  `visit_ipv6` varchar(30) DEFAULT NULL,
  `visit_source` int(1) DEFAULT NULL,
  `visit_device` int(1) DEFAULT NULL,
  `visit_explorer` int(1) DEFAULT NULL,
  `visit_area` varchar(60) DEFAULT NULL,
  `visit_areaid` int(5) DEFAULT NULL COMMENT '省份id',
  `visit_createtime` int(11) DEFAULT NULL,
  `visit_createtimeymd` date DEFAULT NULL,
  `visit_type` int(2) DEFAULT NULL,
  `visit_categoryid` int(4) DEFAULT NULL,
  `visit_node` varchar(90) DEFAULT NULL,
  `visit_username` varchar(90) DEFAULT NULL,
  `visit_userid` int(11) DEFAULT NULL,
  `visit_bvarchar` varchar(30) DEFAULT NULL,
  `visit_bint` int(11) DEFAULT NULL,
  PRIMARY KEY (`visit_id`),
  KEY `visit_area` (`visit_area`),
  KEY `visit_node` (`visit_node`),
  KEY `visit_createtime` (`visit_createtime`),
  KEY `visit_createtimeymd` (`visit_createtimeymd`),
  KEY `visit_source` (`visit_source`),
  KEY `visit_device` (`visit_device`),
  KEY `visit_categoryid` (`visit_categoryid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "vimkid_visit"
#

/*!40000 ALTER TABLE `vimkid_visit` DISABLE KEYS */;
/*!40000 ALTER TABLE `vimkid_visit` ENABLE KEYS */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
