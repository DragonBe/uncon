drop table if exists `uncon`;
create table `uncon` (
  `unconId` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `twitter` VARCHAR(50) NULL,
  `title` VARCHAR(150) NOT NULL,
  `abstract` TEXT NULL,
  `votes` INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`unconId`),
  INDEX `uncon_vote_idx` (`votes`)
);

DROP TABLE IF EXISTS `session`;
CREATE TABLE `session` (
  `sessionId` char(32) NOT NULL,
  `savePath` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL DEFAULT '',
  `modified` int(10) unsigned DEFAULT NULL,
  `lifetime` int(10) unsigned DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`sessionId`,`savePath`,`name`)
);