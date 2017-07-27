CREATE DATABASE `entwicklermagazin.api`;

CREATE USER 'em.api'@'localhost' IDENTIFIED WITH mysql_native_password;
GRANT USAGE ON *.* TO 'em.api'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
SET PASSWORD FOR 'em.api'@'localhost' = '*B2C7E000274C0ABD47648945CC4DAFF8202FEC96';
GRANT ALL PRIVILEGES ON `entwicklermagazin.api`.* TO 'em.api'@'localhost';

USE `entwicklermagazin.api`;

DROP TABLE IF EXISTS `customer`;

CREATE TABLE IF NOT EXISTS `customer` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `country` enum('de','ch','at') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `country`) VALUES
  (1, 'Sebastian', 'Kappel', 'de'),
  (2, 'Robert', 'Decker', 'de'),
  (3, 'Kerstin', 'Eisenberg', 'at'),
  (4, 'Johanna', 'Koertig', 'at'),
  (5, 'Eric', 'Lemann', 'ch'),
  (6, 'Andreas', 'Dresner', 'ch'),
  (7, 'Marie', 'Mehler', 'de');
