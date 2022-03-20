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

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `book` */

insert  into `book`(`id`,`user_id`,`status_id`) values 
(1,3,2),
(2,2,2),
(3,5,2),
(4,4,2),
(5,6,2),
(6,1,2),
(7,1,2),
(8,2,3),
(9,1,2),
(10,1,3),
(11,8,1);

/*Table structure for table `book_item` */

DROP TABLE IF EXISTS `book_item`;

CREATE TABLE `book_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `book_item_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  CONSTRAINT `book_item_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

/*Data for the table `book_item` */

insert  into `book_item`(`id`,`book_id`,`item_id`,`price`,`quantite`) values 
(1,1,12,47,2),
(2,2,1,25,2),
(3,2,6,25,1),
(4,2,7,25,1),
(5,3,3,25,5),
(6,3,4,25,3),
(7,4,8,25,10),
(8,5,2,25,4),
(9,5,5,25,7),
(10,6,10,11,14),
(11,7,4,25,4),
(12,8,3,25,1),
(13,9,8,25,5),
(14,10,1,25,1),
(15,11,9,21,1);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `detailed_descr` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`id`,`title`,`price`,`img`,`descr`,`detailed_descr`) values 
(1,'Café en grains Colombie',25,'public/img/articles/cafe en grains colombie.jpg','Fruité et légèreté. Intensité 7/10','Ce café est produit au cœur de la Sierra Nevada, en bordure de la mer des Caraïbes. Reconnu par les Nations Unies comme Réserve de Biosphère, ce massif côtier le plus élevé du monde (5 800 m d’altitude) abrite l’un des écosystèmes les plus riches et mieux préservé du pays. C’est aussi le chef-lieu de plusieurs tribus amérindiennes (Arhuacos, Wiwa, Kogis et Kankuamos), peuples héritiers des mayas, qui se sont réfugiés dans les plus hautes vallées au moment de la colonie espagnole.'),
(2,'Café en grains Cremoso',25,'public/img/articles/cafe en grains cremoso.jpg','Doux et équilibré. Intensité 5/10','Parfait assemblage d’Arabicas d’Amérique du Sud avec une pointe de Robusta, CREMOSO est un expresso doux et velouté au corps fin et raffiné.\r\nCREMOSO est un café équilibré associant des douces notes de céréales animées par de subtiles notes fruitées, surmonté d’une mousse incroyablement onctueuse.\r\nLaissez-vous envoûter par un moment de dégustation intense.\r\n\r\n'),
(3,'Café en grains Brésil',25,'public/img/articles/cafe en grains bresil.jpg','Délicat et doux. Intensité 5/10','Nous avons sélectionné notre café de la gamme BRESIL dans la région de Minas Gerais au Brésil, sur des plantations à 950m au dessus du niveau de la mer.\r\nLes plantations sur les vallées volcaniques aux sols fertiles et riches en minéraux garantissent un café de qualité, doux, équilibré et sans acidité.\r\nLes cerises de café sont récoltées manuellement à maturité puis séchées au soleil avant d\'être dépulpées.'),
(4,'Café en grains Décaféiné',25,'public/img/articles/cafe en grains decafeine.jpg','Puissance et finesse. Intensité 7/10','Mélange somptueux d’Arabicas du Méxique, notre café DÉCAFÉINÉ présente de subtiles notes harmonieuses de cacao et de céréales grillées au corps dense et onctueux.\r\n\r\nUn mélange sublime riche en saveurs obtenu grâce à notre torréfaction artisanale lente et progressive.\r\n\r\nLes arômes sont soigneusement préservées lors du procédé naturel de décaféination, sans aucune substance chimique.'),
(5,'Café en grains Guatemala',25,'public/img/articles/cafe en grains guatemala.jpg','Délicat et doux. Intensité 6/10','Notre café GUATEMALA vous transportera sur les hautes plaines volcaniques du Guatemala, au coeur de la région Atitlan.\r\n\r\nIl se révèle par son corps intense et son caractère puissant, enveloppé par la douceur harmonique de ses notes gourmandes d\'amandes grillées et son acidité élégante.\r\n\r\nUn café exceptionnel, équilibré et gourmand, offrant une belle fraîcheur et longueur en bouche.'),
(6,'Café en grains Lungo',25,'public/img/articles/cafe en grains lungo.jpg','Equilibre parfait. Intensité 6/10','Mélange somptueux d\'Arabica et de Robusta d\'exception, Lungo est un café au goût intense et généreux, parfaitement équilibré.\r\n\r\nNotre gamme Lungo dévoile les saveurs délicates d\'un café onctueux sublimé par des notes céréales grillés\r\n\r\nLaissez vous emporter par son élégance.'),
(7,'Café en grains Moka',25,'public/img/articles/cafe en grains moka.png','Délicat et doux. Intensité 4/10','Notre gamme Moka est un mélange exclusif 100% Arabica de culture traditionnelle du sud de l\'Éthiopie.\r\n\r\nBerceau du café, l’Ethiopie est réputé pour ses cafés Arabica avec ses hauts plateaux volcaniques offrant au café un goût subtilement aromatique.\r\nNotre Torréfaction Artisanale progressive apportera à notre MOKA une crème naturellement délicate.'),
(8,'Café en grains Ristretto',25,'public/img/articles/cafe en grains ristretto.png','Intense et puissant. Intensité 10/10','La combinaison parfaite du Robusta et de l’Arabica permet d’exprimer toute la richesse aromatique de RISTRETTO.\r\nSa puissante amertume et ses notes boisées s’expriment dans une texture dense et soyeuse.\r\nNe manquez pas l\'expérience de ce café intense et profond au goût si puissant.'),
(9,'Pack Arabica',21,'public/img/articles/pack arabica.jpg','4 sachets de 250gr de cafés en grains','Pack Arabica unique composé de cafés en grains classés Grands Crus BIO: Pure origine et Blend 100% Arabica.\r\nContient 1 sachet de 250gr de Guatemala, Moka, Colombie et Brésil.'),
(10,'Pack Velours',11,'public/img/articles/pack velours.jpg','2 sachets de 250gr de café en grains','Notre pack coup de coeur à prix mini!\r\n2 sachets de grain 250g de notre Collection Grand Cru Bio. Contient 1 sachet de grain Ristretto de 250gr et 1 sachet de grain Cremoso de 250gr.'),
(11,'Pack Délice',21,'public/img/articles/pack delice.jpg','4 sachets de 150gr de café en grains','Pack Délice comprenant 1 sachet de 250gr de Cremoso, Guatemala, Moka et Lungo'),
(12,'Pack Saveurs',47,'public/img/articles/pack saveurs.jpg','8 sachets de 150gr de café en grains\r\n','Pack Saveurs complet afin de vous faire découvrir les 8 saveurs riches et variées de notre Collection de cafés Grand Crus Bio.\r\nChaque Grand Cru dévoilera des notes aromatiques spécifiques à ses origines et sa torréfaction: des saveurs variées, fleuries, gourmandes, intenses pour satisfaire toute la famille, à déguster selon vos envies.\r\nDes mélanges sublimes et riches en saveurs grâce à notre torréfaction artisanale lente et progressive.\r\n\r\nDécouvrez les arômes de chaque Grand Cru Green Coffee Monaco, grâce à notre sélection de 8 sachets de 250g, composé d\'un sachet Moka, d\'un sachet Cremoso, d\'un sachet Brésil, d\'un sachet Guatemala, d\'un sachet Colombie, d\'un sachet Lungo, d\'un sachet Décaféinié,  et d\'un sachet Ristretto.');

/*Table structure for table `status` */

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `status` */

insert  into `status`(`id`,`name`) values 
(1,'En attente'),
(2,'Acceptée'),
(3,'Refusée');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`login`,`password`,`mail`,`type`) values 
(1,'tmansy','$2y$10$EQyAz9GHxA8jctO4AA4/u.gTh43jgYNZHiSIvK1pHtMadghVKL51K','theo.mansy@gmail.com','admin'),
(2,'Elisa','$2y$10$3gCp3DKpIxxSFAGqUe5CeeGoX16MEL5rxD4KZpgXEWLe3gQcukTR.','elisa.genicot2@gmail.com','user'),
(3,'Isabelle','$2y$10$V81d89ltH9BQs/7.rzKaMO4FDvS5kJDfwE8ZiOHaaAkHMIXo4JcLW','isabelle.franquet@gmail.com','user'),
(4,'Olivier','$2y$10$0IfIfp17dGF4AJ/D2vvBlOI508IX8YfXEjwwPwlOsvbVos8DenRF.','olivier.mansy@gmail.com','user'),
(5,'Lison','$2y$10$jgL0hQW/GBtMtip6Ii0S0.PE17mTOvXu9KSKuIFwTcfOvcxsbbGYC','lison.mansy@gmail.com','user'),
(6,'zmansy','$2y$10$63Mp5d17F6oT63/BYRP53.VUraKgTN3UZSxitPhk2P4GYLen2q.yC','zoe.mansy@gmail.com','user'),
(8,'admin','$2y$10$FDxiX4M.9ykhuJoPhowf4O/1VDfWI.fKyP5pZmzjlFhI1h2NkuwtG','admin@gmail.com','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
