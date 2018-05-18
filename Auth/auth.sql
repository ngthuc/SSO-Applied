CREATE TABLE `auth` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user` varchar(255) NOT NULL,
  `token` varchar(100) NULL,
  PRIMARY KEY  (`id`)
);

INSERT INTO `books` VALUES (1, 'admin', 'Kenny');
INSERT INTO `books` VALUES (2, 'user', 'Kenny');
INSERT INTO `books` VALUES (3, 'manager', 'Kenny');
