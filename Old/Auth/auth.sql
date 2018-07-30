CREATE TABLE `auth` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user` varchar(255) NOT NULL,
  `token` varchar(100) NULL,
  PRIMARY KEY  (`id`)
);
