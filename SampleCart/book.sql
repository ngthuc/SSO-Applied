CREATE TABLE `books` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  PRIMARY KEY  (`id`)
);

INSERT INTO `books` VALUES (1, 'PHP Can Ban', 'Kenny', 115);
INSERT INTO `books` VALUES (2, 'PHP Nang Cao', 'Kenny', 150);
INSERT INTO `books` VALUES (3, 'PHP Framework', 'Kenny', 300);
INSERT INTO `books` VALUES (4, 'Joomla Can Ban', 'Kenny', 100);
