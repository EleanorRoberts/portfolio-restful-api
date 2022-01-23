# ************************************************************
# Sequel Ace SQL dump
# Version 20025
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.36)
# Database: CV
# Generation Time: 2022-01-23 15:11:59 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table about_me
# ------------------------------------------------------------

DROP TABLE IF EXISTS `about_me`;

CREATE TABLE `about_me` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `about_me` WRITE;
/*!40000 ALTER TABLE `about_me` DISABLE KEYS */;

INSERT INTO `about_me` (`id`, `name`, `description`, `deleted`)
VALUES
	(1,'about-me','I am a friendly and passionate software developer, looking for a challenging and innovative career in the exciting world of tech. I have just completed EyUp Skills coding academy – a sixteen week programming bootcamp run in partnership with the award-winning iO Academy – and graduated in mid-December. My aptitude for technology and computers originally stemmed from my adoration of gaming, and my gentle obsession over logic puzzles and my time with iO Academy has allowed me to fully explore and reignite my enthusiasm.',0),
	(2,'io-academy','I recently enjoyed studying software development at iO Academy, which includes the creation of many projects both individually and in a scrum team. Please visit my projects to learn more!',0),
	(4,'testing','test',1);

/*!40000 ALTER TABLE `about_me` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table education
# ------------------------------------------------------------

DROP TABLE IF EXISTS `education`;

CREATE TABLE `education` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `level` varchar(100) DEFAULT NULL,
  `institution` varchar(50) DEFAULT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `education` WRITE;
/*!40000 ALTER TABLE `education` DISABLE KEYS */;

INSERT INTO `education` (`id`, `level`, `institution`, `grade`, `start_date`, `end_date`, `deleted`)
VALUES
	(1,'A Levels','High Storrs School',NULL,'2010-09-01','2012-05-01',0),
	(2,'BSc Forensic Science','University of West London','First Class Honours','2015-09-01','2018-05-01',0),
	(3,'test','testing','potato','2020-12-12','2020-12-12',1);

/*!40000 ALTER TABLE `education` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table hobbies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `hobbies`;

CREATE TABLE `hobbies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `hobbies` WRITE;
/*!40000 ALTER TABLE `hobbies` DISABLE KEYS */;

INSERT INTO `hobbies` (`id`, `name`, `deleted`)
VALUES
	(1,'Puppy cuddling',0),
	(2,'Board games',0),
	(3,'Video games',0),
	(4,'Singing',0),
	(5,'Piano',0),
	(6,'Crosswords',0),
	(7,'Logic puzzles',0),
	(8,'potato',1);

/*!40000 ALTER TABLE `hobbies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table other_certifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `other_certifications`;

CREATE TABLE `other_certifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `certifier` varchar(100) DEFAULT NULL,
  `date_achieved` date DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `other_certifications` WRITE;
/*!40000 ALTER TABLE `other_certifications` DISABLE KEYS */;

INSERT INTO `other_certifications` (`id`, `name`, `certifier`, `date_achieved`, `deleted`)
VALUES
	(1,'Scrum Master Certification','Scrum Alliance','2021-09-01',0),
	(2,'Piano Grade 5','ABRSM','2013-04-01',0),
	(3,'Singing Grade 4','Trinity College Longon','2013-06-01',0),
	(4,'potato',NULL,NULL,1);

/*!40000 ALTER TABLE `other_certifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `github_link` varchar(200) DEFAULT NULL,
  `live_version` varchar(200) DEFAULT NULL,
  `image_url` varchar(200) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`id`, `name`, `about`, `github_link`, `live_version`, `image_url`, `deleted`)
VALUES
	(1,'Dinosaur Listing App','Fetching information from a MySQL database containing Dinosaurs and related information, we created an PHP OOP application to view the collection. This included designing an OOP architecture, then utilising Bootstrap UI and SASS to modify the front-end of the application. In particular, I worked on the code implementing a ‘More info’ page for each dinosaur, including functionality, Bootstrap UI and the related unit testing in PHPUnit for this page.','https://github.com/iO-Academy/2021-aug-dinos-listing','https://dev.io-academy.uk/projects/2021-aug/2021-aug-dinos-listing/',NULL,0),
	(2,'iO Aptitude Test','In this project we began to rebuild the aptitude test application, an existing legacy project, using JavaScript and React, which will be used in the future to test possible applicants for iO Academy. This project utilised a pre-built RESTful API as well as Bootstrap UI.','https://github.com/iO-Academy/aptitude-test-react',NULL,NULL,0),
	(3,'Capybara Canvas','For our first team project at the academy we built a paint application using vanilla JS and HTML canvas. It was a great introduction into working in a scrum team, and we were greatly pleased with the functionality we managed to achieve.','https://github.com/iO-Academy/2021-aug-jsPaint','https://dev.io-academy.uk/projects/2021-aug/2021-aug-jsPaint/',NULL,0),
	(4,'Academy Portal','The Academy Portal is an iO resource built and improved by past students. For this project week, we took on a mixture of bug-fixes and feature updates, including most notable the creation of a new multi-page form for an application process directly linked to portal. ','https://github.com/iO-Academy/AcademyPortal',NULL,NULL,1),
	(5,'Team Generator','After the academy, I created an application to generates teams. You can enter as many names and the number of teams as you’d like, and the application will randomly create teams for you. Using Sass and Bootstrap for the front-end styling of the page, and typescript to validate input fields and manage the logic required to randomise the name selection.','https://github.com/EleanorRoberts/teamPicker','https://2021-eleanorr.dev.io-academy.uk/team-generator/','https://shots.plesk.com/?url=http%3A%2F%2Fteam-generator.2021-eleanorr.dev.io-academy.uk%2F&product=Plesk%2F18.0.40&type=jpeg&width=1600&height=1200&scale=1&delay=0&cache=3600&sign=bd054cd978ad7e45107',0),
	(6,'Aging on Planets','This fun application was built using a previously created SVG I made, and utilised typescript to calculate what a user inputted age would be in other planetary years.','https://github.com/EleanorRoberts/agingOnPlanets','https://2021-eleanorr.dev.io-academy.uk/aging-on-planets/','https://shots.plesk.com/?url=http%3A%2F%2Faging-on-planets.2021-eleanorr.dev.io-academy.uk%2F&product=Plesk%2F18.0.40&type=jpeg&width=1600&height=1200&scale=1&delay=0&cache=3600&sign=48ec68afeb62d044d',0),
	(8,'Canine Compass','In our final iO Academy project we created a dog walk mapping application, built with a vanilla JavaScript frontend and a node API backend paired with a MongoDB database.','https://github.com/iO-Academy/2021-aug-map-my-dog-walk-fe/blob/main/JS/locator.js, https://github.com/iO-Academy/2021-aug-map-my-dog-walk',NULL,NULL,0);

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table work_experience
# ------------------------------------------------------------

DROP TABLE IF EXISTS `work_experience`;

CREATE TABLE `work_experience` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(50) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `about` varchar(500) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `work_experience` WRITE;
/*!40000 ALTER TABLE `work_experience` DISABLE KEYS */;

INSERT INTO `work_experience` (`id`, `company`, `position`, `start_date`, `leave_date`, `about`, `deleted`)
VALUES
	(1,'Celgene/BMS, Uxbridge, UK','Risk Management Operations Specialist','2019-05-01','2020-10-01','I dealt with many aspects of the electronic Risk Management System including data entry and analysis, correct documentation, medical terminology and being a point of contact for healthcare professionals. As a team, we organised and implemented multiple retrospective risk assessment outreaches, and I created the first version of a quality check process which was introduced to monitor the quality of outsourced work, and aided in the creation of the related documentation.',0),
	(2,'The Lord Nelson, Brentford, UK','Supervisor/Bartender','2016-10-01','2019-05-01','As a supervisor in this pub, I continued to develop my skills in customer service, time management, teamwork and individual skill sets. This role included managing and monitoring inventory, overseeing of bar staff and table service, communicating and cooperating regularly and concisely with the kitchen staff, and helped me greatly build on my ability to fit cohesively into a team.',0),
	(3,'The Doctor’s Orders, Sheffield, UK','Bartender/Waitress','2015-06-01','2016-09-01',NULL,0),
	(4,'Twinkl Ltd, Sheffield, UK','Customer Service/Administrator','2014-08-01','2015-06-01',NULL,0),
	(5,'Various Companies (Whilst Travelling)','Door to Door Telesales/Waitress/Fruit Harvester/Rainforest Reforestation','2013-08-01','2014-07-01',NULL,0),
	(6,'The Stags Head, Sheffield, UK','Bartender/Waitress','2012-04-01','2013-08-01',NULL,0),
	(8,'test','the code','2020-12-12',NULL,NULL,1);

/*!40000 ALTER TABLE `work_experience` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
