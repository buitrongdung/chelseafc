/*
SQLyog Enterprise - MySQL GUI v6.15
MySQL - 5.5.5-10.1.21-MariaDB : Database - chelseafc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `chelseafc`;

USE `chelseafc`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` varchar(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double NOT NULL,
  `id_categories` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `alias` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`image`,`price`,`id_categories`,`created_at`,`alias`,`description`,`size`) values ('1','Clothing',NULL,0,0,'2017-04-05 00:37:29','clothing',NULL,NULL),('2','Keepsake',NULL,0,0,'2017-04-05 01:01:31','keepsake',NULL,NULL),('3','Shoe',NULL,0,0,'2017-04-05 01:01:35','shoe',NULL,NULL),('4','Backpack',NULL,0,0,'2017-04-05 01:02:20','backpack',NULL,NULL),('6','Accessories',NULL,0,0,'2017-04-06 00:44:08','accessories',NULL,NULL),('6d1f2f51c','Chelsea Club Logo Polo - Navy','19349_chelsea-club-logo-polo---navy_01_l.jpg',29.4,1,'2017-04-06 23:31:48','chelsea-club-logo-polo-navy','Product Code:  PCNPOLONY\r\n\r\nChelsea Club Logo Polo - Navy\r\n\r\nMaterial:Cotton\r\nDesigned & printed in Hong Kong\r\n* Please allow an extra 3-5 working days for delivery.','X'),('6d3524976','Chelsea Home Authentic adizero Jersey 2016/17','18580_chelsea-home-authentic-adizero-jersey-2016-17_05_l.jpg',70.45,1,'2017-04-06 14:00:15','chelsea-home-authentic-adizero-jersey-201617','Product Code:  AI6651\r\n\r\nChelsea Home Authentic adizero Jersey 2016/17\r\n\r\nProduct Code: AI6651\r\n\r\nChelsea Home Authentic adizero Jersey 2016/17\r\n\r\nExperience 100% authenticity with the official Chelsea Home adizero Shirt 2016-17.\r\n\r\nThis authentic Chelsea','M'),('a6c60ae47a','Chelsea Barclays Premier League Winners 2015 Cap - Royal','15456_chelsea-barclays-premier-league-winners-2015-cap---royal_05_s.jpg',5,6,'2017-04-06 23:25:14','chelsea-barclays-premier-league-winners-2015-cap-royal','Product Code:  CC15-5206\r\nChelsea Barclays Premier League Winners 2015 Cap - Royal','0'),('a6d0e8a897','Chelsea UEFA Champions Leaque Winner 2012 70mm Replica Trophy on Wooden Pedestal','15255_chelsea-uefa-champions-leaque-winner-2012-45mm-replica-trophy-on-wooden-pedestal_01_s.jpg',43.2,6,'2017-04-06 23:30:00','chelsea-uefa-champions-leaque-winner-2012-70mm-replica-trophy-on-wooden-pedestal','Product Code:  CC15-5189\r\n\r\nChelsea UEFA Champions Leaque Winner 2012 70mm Replica Trophy on Wooden Pedestal','0'),('ea6cb867c7','adidas Chelsea Scarf - Chelsea Blue','18661_adidas-chelsea-scarf---chelsea-blue_01_s.jpg',12,6,'2017-04-06 23:26:25','adidas-chelsea-scarf-chelsea-blue','Product Code:  AX6625\r\nadidas Chelsea Scarf - Chelsea Blue','0'),('ea6d296996','Chelsea Crest Tie Slide - Stainless Steel','17474_chelsea-crest-tie-slide---stainless-steel_05_s.jpg',36.8,6,'2017-04-06 23:32:57','chelsea-crest-tie-slide-stainless-steel','Product Code:  CC15-5305\r\n\r\nChelsea Crest Tie Slide - Stainless Steel\r\n\r\nStainless Steel Crest Tieslide - Supplied in Official Club Gift Box','0');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` text,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `password` text NOT NULL,
  `is_admin` tinyint(4) DEFAULT '0',
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(11) DEFAULT 'Không',
  `picture` varchar(255) DEFAULT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `oauth_provider` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2147483648 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`phone`,`address`,`created_at`,`password`,`is_admin`,`name`,`gender`,`picture`,`locale`,`first_name`,`last_name`,`link`,`oauth_provider`) values (1,'buitrongdung','buitrongdung@gmail.com\r\n',2147483647,'thaibinh','2017-03-14 00:37:38.222487','e10adc3949ba59abbe56e057f20f883e',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'hoanghai','hoanghai@gmail.com\r\n',33133531,'dong thap\r\n','2017-03-17 20:23:56.971374','e10adc3949ba59abbe56e057f20f883e',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2147483647,'','buitrongdungcfc@gmail.com',NULL,NULL,'2017-03-31 16:01:32.765322','',0,'BÃ¹i Trá»ng DÅ©ng','Không',NULL,NULL,'Trá»ng DÅ©ng','',NULL,'facebook');

/*Table structure for table `video` */

DROP TABLE IF EXISTS `video`;

CREATE TABLE `video` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `link` varchar(250) NOT NULL,
  `size` text,
  `type_video` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `video` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
