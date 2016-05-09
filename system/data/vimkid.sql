# Host: 192.168.1.106  (Version: 5.1.73-log)
# Date: 2016-05-08 10:39:02
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
  `article_type` int(2) DEFAULT NULL,
  `article_check` int(1) DEFAULT NULL,
  `article_content` text,
  `article_link` varchar(180) DEFAULT NULL,
  `article_title` varchar(120) DEFAULT NULL,
  `article_createtime` int(11) DEFAULT NULL,
  `article_createtimeymd` date DEFAULT NULL,
  `article_updatetime` int(11) DEFAULT NULL,
  `article_updatetimeymd` date DEFAULT NULL,
  `article_username` varchar(90) DEFAULT NULL,
  `article_userid` int(11) DEFAULT NULL,
  `article_images` varchar(300) DEFAULT NULL,
  `article_visit` int(11) DEFAULT NULL COMMENT '访问量',
  `article_seotitle` varchar(90) DEFAULT NULL,
  `article_seokeywords` varchar(120) DEFAULT NULL,
  `article_seodescription` varchar(180) DEFAULT NULL,
  `article_recommend` int(1) DEFAULT NULL COMMENT '推荐位',
  `article_source` int(1) DEFAULT NULL COMMENT '来源',
  `article_status` int(1) DEFAULT NULL COMMENT '发布状态',
  `article_seosubtitle` varchar(90) DEFAULT NULL,
  `article_sort` int(11) DEFAULT NULL COMMENT '排序',
  `article_category` int(3) DEFAULT NULL,
  `article_bvarchar` varchar(30) DEFAULT NULL,
  `article_bint` int(11) DEFAULT NULL,
  `article_up` int(11) DEFAULT NULL COMMENT '点赞',
  `article_message` int(3) DEFAULT NULL COMMENT '评论数',
  PRIMARY KEY (`article_id`),
  KEY `article_type` (`article_type`),
  KEY `article_createtime` (`article_createtime`),
  KEY `article_createtimeymd` (`article_createtimeymd`),
  KEY `article_visit` (`article_visit`),
  KEY `article_up` (`article_up`),
  KEY `article_message` (`article_message`),
  KEY `article_status` (`article_status`),
  KEY `article_category` (`article_category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "vimkid_article"
#

/*!40000 ALTER TABLE `vimkid_article` DISABLE KEYS */;
/*!40000 ALTER TABLE `vimkid_article` ENABLE KEYS */;

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
  `tag_category` int(3) DEFAULT NULL,
  `tag_articleid` int(11) DEFAULT NULL,
  `tag_createtime` int(11) DEFAULT NULL,
  `tag_createtimeymd` date DEFAULT NULL,
  `tag_type` int(2) DEFAULT NULL,
  `tag_bvarchar` varchar(30) DEFAULT NULL,
  `tag_bint` int(11) DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  KEY `tag_category` (`tag_category`),
  KEY `tag_createtime` (`tag_createtime`),
  KEY `tag_createtimeymd` (`tag_createtimeymd`),
  KEY `tag_type` (`tag_type`),
  KEY `tag_name` (`tag_name`)
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
  `tagtotal_category` int(3) DEFAULT NULL,
  `tagtotal_type` int(2) DEFAULT NULL,
  `tagtotal_bvarchar` varchar(30) DEFAULT NULL,
  `tagtotal_bint` int(11) DEFAULT NULL,
  `tagtotal_updatetime` int(11) DEFAULT NULL,
  `tagtotal_updatetimeymd` date DEFAULT NULL,
  PRIMARY KEY (`tagtotal_id`),
  KEY `tagtotal_visit` (`tagtotal_visit`),
  KEY `tagtotal_category` (`tagtotal_category`),
  KEY `tagtotal_type` (`tagtotal_type`),
  KEY `tagtotal_count` (`tagtotal_count`)
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
  `visit_category` int(3) DEFAULT NULL,
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
  KEY `visit_category` (`visit_category`),
  KEY `visit_source` (`visit_source`),
  KEY `visit_device` (`visit_device`)
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
