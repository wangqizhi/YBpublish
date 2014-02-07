# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 192.168.56.102 (MySQL 5.6.15)
# Database: yb_system
# Generation Time: 2014-02-07 15:39:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table yb_dir_power
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yb_dir_power`;

CREATE TABLE `yb_dir_power` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `dir_name` varchar(255) NOT NULL DEFAULT '',
  `power_group` varchar(255) NOT NULL DEFAULT '',
  `real_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yb_dir_power` WRITE;
/*!40000 ALTER TABLE `yb_dir_power` DISABLE KEYS */;

INSERT INTO `yb_dir_power` (`id`, `dir_name`, `power_group`, `real_path`)
VALUES
	(1,'123','System','fda'),
	(2,'123','Dev','test');

/*!40000 ALTER TABLE `yb_dir_power` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yb_group
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yb_group`;

CREATE TABLE `yb_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(255) NOT NULL DEFAULT '',
  `power` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `groupname` (`groupname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yb_group` WRITE;
/*!40000 ALTER TABLE `yb_group` DISABLE KEYS */;

INSERT INTO `yb_group` (`id`, `groupname`, `power`)
VALUES
	(1,'Dev','test-'),
	(2,'System','412342314-航空港接口-'),
	(3,'Admin','choose_index-'),
	(4,'test','test-'),
	(5,'nologin',NULL);

/*!40000 ALTER TABLE `yb_group` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yb_module
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yb_module`;

CREATE TABLE `yb_module` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL DEFAULT '',
  `show_name` varchar(255) NOT NULL DEFAULT '',
  `level` varchar(255) NOT NULL DEFAULT '',
  `href` varchar(255) NOT NULL DEFAULT '',
  `parent` varchar(255) NOT NULL DEFAULT '',
  `important` int(11) NOT NULL,
  `power_group` varchar(255) DEFAULT NULL,
  `serial` int(11) NOT NULL,
  `has_child` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yb_module` WRITE;
/*!40000 ALTER TABLE `yb_module` DISABLE KEYS */;

INSERT INTO `yb_module` (`id`, `module_name`, `show_name`, `level`, `href`, `parent`, `important`, `power_group`, `serial`, `has_child`)
VALUES
	(1,'messages','Messages','1','/','0',0,'Root-',1,0),
	(2,'systems','Systems','1','#','0',0,'Root',2,1),
	(3,'aboutus','AboutUs','1','/ybindex/ybsystem_aboutus','0',0,'Root',3,0),
	(5,'publish_system','Publish_System','2','/ybpublish','systems',0,'Root',1,0),
	(6,'case_system','Case_System','2','#','systems',0,'Root',2,0),
	(7,'admin','Admin','2','/admin','systems',1,'Root',1,0),
	(8,'manageuser','Manage User ','admin','/admin/manage/manageuser','0',0,'Root',1,0),
	(9,'managegroup','Manage Group','admin','/admin/manage/managegroup','0',0,'Root',2,0),
	(10,'managepower','Manage Power','admin','/admin/manage/managepower','0',0,'Root',3,0),
	(11,'managemodule','Manage Module','admin','/admin/manage/managemodule','0',0,'Root',4,0);

/*!40000 ALTER TABLE `yb_module` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yb_power
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yb_power`;

CREATE TABLE `yb_power` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `powername` varchar(255) NOT NULL DEFAULT '',
  `powerurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yb_power` WRITE;
/*!40000 ALTER TABLE `yb_power` DISABLE KEYS */;

INSERT INTO `yb_power` (`id`, `powername`, `powerurl`)
VALUES
	(1,'123','default_controller'),
	(2,'choose_index','ybindex/choose_index'),
	(3,'test','default_controller'),
	(4,'choose_index','usedemo'),
	(5,'choose_index','usedemo/(:any)'),
	(6,'choose_index','admin/(:any)'),
	(7,'choose_index','admin'),
	(8,'test','ybpublish/mkflow');

/*!40000 ALTER TABLE `yb_power` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yb_publish_flow
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yb_publish_flow`;

CREATE TABLE `yb_publish_flow` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `flow_name` varchar(255) DEFAULT NULL,
  `flow_rule` varchar(255) DEFAULT NULL,
  `share_who` varchar(255) DEFAULT NULL,
  `creater` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yb_publish_flow` WRITE;
/*!40000 ALTER TABLE `yb_publish_flow` DISABLE KEYS */;

INSERT INTO `yb_publish_flow` (`id`, `flow_name`, `flow_rule`, `share_who`, `creater`)
VALUES
	(1,'','','','10000179');

/*!40000 ALTER TABLE `yb_publish_flow` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yb_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yb_user`;

CREATE TABLE `yb_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(255) NOT NULL DEFAULT '',
  `passwd` char(255) NOT NULL DEFAULT '',
  `nick` varchar(255) NOT NULL DEFAULT '',
  `group` varchar(255) DEFAULT '',
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `loginout_time` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yb_user` WRITE;
/*!40000 ALTER TABLE `yb_user` DISABLE KEYS */;

INSERT INTO `yb_user` (`id`, `username`, `passwd`, `nick`, `group`, `create_time`, `loginout_time`)
VALUES
	(1,'10000','c4ca4238a0b923820dcc509a6f75849b','test','','2014-02-01 23:31:57','2014-02-01 23:31:57'),
	(2,'10000179','c4ca4238a0b923820dcc509a6f75849b','wqz','Root','2014-02-01 23:48:48','2014-02-01 23:48:48'),
	(3,'1','c4ca4238a0b923820dcc509a6f75849b','test2','test','2014-02-03 12:43:02','2014-02-03 12:43:02'),
	(4,'2','c4ca4238a0b923820dcc509a6f75849b','2','','2014-02-03 19:59:24','2014-02-03 19:59:24');

/*!40000 ALTER TABLE `yb_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
