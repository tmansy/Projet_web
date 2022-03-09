/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.20-MariaDB : Database - monprojet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`monprojet` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `monprojet`;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `detailed_descr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`id`,`title`,`price`,`img`,`descr`,`detailed_descr`) values 
(16,'Café',30,'public/img/articles/cafe.jpg','Ceci est un café','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies ipsum id vulputate faucibus. Nunc nibh lacus, imperdiet ac dapibus at, consectetur sed nisl. Proin fringilla, lorem sed faucibus pulvinar, nibh felis blandit urna, ac gravida nisi dolo'),
(21,'Iphone',400,'public/img/articles/iphone.jpeg','Ceci n\'est pas un Iphone','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ultricies ipsum id vulputate faucibus. Nunc nibh lacus, imperdiet ac dapibus at, consectetur sed nisl. Proin fringilla, lorem sed faucibus pulvinar, nibh felis blandit urna, ac gravida nisi dolo'),
(30,'Pc portable',2000,'public/img/articles/pc portable.png','Ceci est un pc portable','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in dignissim leo. Sed fermentum nisl convallis lacus dapibus fringilla. Pellentesque in interdum ante. Suspendisse ut mauris id magna sagittis pellentesque in vel tellus. Donec feugiat nisi si'),
(31,'Lit',1000,'public/img/articles/lit.jpg','Ceci est un lit','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus venenatis eget orci quis facilisis. Phasellus cursus nibh ac imperdiet porta. Cras elementum ex sit amet metus interdum, eget porttitor nisi tincidunt. Donec non bibendum metus, eget faucibu');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`login`,`password`,`mail`,`type`) values 
(1,'tmansy','$2y$10$EQyAz9GHxA8jctO4AA4/u.gTh43jgYNZHiSIvK1pHtMadghVKL51K','theo.mansy@gmail.com','admin'),
(2,'Elisa','$2y$10$3gCp3DKpIxxSFAGqUe5CeeGoX16MEL5rxD4KZpgXEWLe3gQcukTR.','elisa.genicot2@gmail.com','user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
