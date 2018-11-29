DROP TABLE IF EXISTS `#__seasonal`;

CREATE TABLE `#__seasonal` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`element` VARCHAR(25) NOT NULL,
	`published` tinyint(4) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;

INSERT INTO `#__seasonal` (`element`) VALUES
('Snow'),
('Music'),
('Fireworks'),
('Presents');
