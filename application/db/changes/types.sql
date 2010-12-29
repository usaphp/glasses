ALTER TABLE `products`
ADD COLUMN `type_id`  tinyint(2) UNSIGNED NULL AFTER `name`;

DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'eyeglasses');
INSERT INTO `types` VALUES ('2', 'sunglasses');

update products set type_id = 2;