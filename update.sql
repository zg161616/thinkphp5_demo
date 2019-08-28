17:41 2019/8/28/周三
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE IF NOT EXISTS `think_user` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nickname` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_time` int(11) UNSIGNED NOT NULL,
  `update_time` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `think_profile`;
CREATE TABLE IF NOT EXISTS `think_profile` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `truename` varchar(25) NOT NULL,
  `birthday` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `think_book`;
CREATE TABLE IF NOT EXISTS `think_book` (
  `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `publish_time` int(11) UNSIGNED DEFAULT NULL,
  `create_time` int(11) UNSIGNED NOT NULL,
  `update_time` int(11) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;