# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Database: contractors
# Generation Time: 2016-07-27 10:47:57 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table chase
# ------------------------------------------------------------

DROP TABLE IF EXISTS `chase`;

CREATE TABLE `chase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `chase_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `chase` WRITE;
/*!40000 ALTER TABLE `chase` DISABLE KEYS */;

INSERT INTO `chase` (`id`, `user_id`, `chase_date`)
VALUES
	(13,2,'2016-07-27 12:27:20');

/*!40000 ALTER TABLE `chase` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT '0',
  `approved` datetime DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `contact_position` varchar(255) DEFAULT NULL,
  `contact_tel` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `company_HSO` varchar(255) DEFAULT NULL,
  `company_scope` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;

INSERT INTO `company` (`id`, `company_name`, `type_id`, `approved`, `company_address`, `contact_name`, `contact_position`, `contact_tel`, `contact_email`, `company_HSO`, `company_scope`)
VALUES
	(2,'DBCA Electrical and Gas',1,'2016-07-27 12:34:45','address here','contact name','contact position','tel','email@email.com','HSO name','scope of work');

/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table company_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company_type`;

CREATE TABLE `company_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `company_type` WRITE;
/*!40000 ALTER TABLE `company_type` DISABLE KEYS */;

INSERT INTO `company_type` (`id`, `type_name`)
VALUES
	(1,'Contractor');

/*!40000 ALTER TABLE `company_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table compliance
# ------------------------------------------------------------

DROP TABLE IF EXISTS `compliance`;

CREATE TABLE `compliance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agreed_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `compliance` WRITE;
/*!40000 ALTER TABLE `compliance` DISABLE KEYS */;

INSERT INTO `compliance` (`id`, `document_id`, `user_id`, `agreed_date`)
VALUES
	(34,6,2,'2016-07-27 12:25:21');

/*!40000 ALTER TABLE `compliance` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table document
# ------------------------------------------------------------

DROP TABLE IF EXISTS `document`;

CREATE TABLE `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `section_id` int(11) NOT NULL,
  `document_href` varchar(255) DEFAULT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `document` WRITE;
/*!40000 ALTER TABLE `document` DISABLE KEYS */;

INSERT INTO `document` (`id`, `type_id`, `section_id`, `document_href`, `document_name`)
VALUES
	(1,0,4,'http://www.cheltenhamladiescollege.org','Cheltenham Ladies College Website'),
	(2,0,3,'/Public/documents/InformationSheetMar2016.pdf','Outside Providers and Contractors Information Sheet'),
	(6,0,3,'/Public/documents/evidenceRequired.pdf','Types of Evidence Required');

/*!40000 ALTER TABLE `document` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table evidence
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evidence`;

CREATE TABLE `evidence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evidence_href` varchar(255) DEFAULT NULL,
  `expires` datetime NOT NULL,
  `archived` tinyint(1) DEFAULT '0',
  `evidence_type_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `evidence_name` varchar(255) DEFAULT NULL,
  `date_uploaded` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `evidence` WRITE;
/*!40000 ALTER TABLE `evidence` DISABLE KEYS */;

INSERT INTO `evidence` (`id`, `evidence_href`, `expires`, `archived`, `evidence_type_id`, `company_id`, `evidence_name`, `date_uploaded`)
VALUES
	(6,'/Uploads/2-769ea9f9b9.png','2016-07-22 11:02:42',1,1,2,'second test','2016-07-22 11:02:42'),
	(7,'/Uploads/2-7ebfe23eee.jpg','2016-08-25 11:07:46',1,5,2,'test','2016-07-22 11:07:46'),
	(8,'/Uploads/2-40d4498f52.jpg','2016-07-22 11:08:21',1,1,2,'third docu','2016-07-22 11:08:21'),
	(9,'/Uploads/2-90e3156f8d.jpg','2016-07-17 00:00:00',1,1,2,'datetest','2016-07-22 11:17:35'),
	(10,'/Uploads/2-a9857ca5.jpg','2016-07-27 00:00:00',1,7,2,'eoiughjkdf sajhfg sdjhfgas ','2016-07-26 17:04:33'),
	(11,'/Uploads/2-d3df1f98f.jpg','2016-07-28 00:00:00',1,7,2,'test','2016-07-27 12:28:44'),
	(12,'/Uploads/2-421da6880e.png','2016-07-31 00:00:00',0,5,2,'insurance new','2016-07-27 12:31:50');

/*!40000 ALTER TABLE `evidence` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table evidence_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evidence_type`;

CREATE TABLE `evidence_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evidence_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `evidence_type` WRITE;
/*!40000 ALTER TABLE `evidence_type` DISABLE KEYS */;

INSERT INTO `evidence_type` (`id`, `evidence_name`)
VALUES
	(1,'Public liability certificate'),
	(2,'Qualification'),
	(3,'Professional membership'),
	(4,'DBS Check'),
	(5,'Insurance'),
	(6,'Health and safety document'),
	(7,'References'),
	(8,'Proof of buisness'),
	(9,'Employers liability certificate'),
	(10,'Risk assessment'),
	(11,'Training certificates');

/*!40000 ALTER TABLE `evidence_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table section
# ------------------------------------------------------------

DROP TABLE IF EXISTS `section`;

CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `type`;

CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;

INSERT INTO `type` (`id`, `type_name`)
VALUES
	(1,'all');

/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `companyid` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pwhash` varchar(255) DEFAULT NULL,
  `friendly_name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `reset_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `companyid`, `email`, `pwhash`, `friendly_name`, `active`, `reset_token`)
VALUES
	(2,2,'jim@jim.com','$2y$10$h1sP9B2ujSPh2cXwel2gUuvS/m5A58.ZNgPIoD7yqIAj.t/He.I9K','jim',1,NULL);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
