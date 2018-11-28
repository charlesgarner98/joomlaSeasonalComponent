DROP TABLE IF EXISTS `#__snow`;

CREATE TABLE `#__snow` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`element` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '1',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

INSERT INTO `#__snow` (`element`) VALUES
('Snow'),
('Music'),
