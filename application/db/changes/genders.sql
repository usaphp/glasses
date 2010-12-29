CREATE TABLE `genders`(
`id`  tinyint(2) UNSIGNED NULL AUTO_INCREMENT ,
`name`  varchar(20) NULL ,
PRIMARY KEY (`id`)
)
;

INSERT INTO `genders` VALUES (1, 'men');
INSERT INTO `genders` VALUES (2, 'women');
INSERT INTO `genders` VALUES (3, 'unisex');
INSERT INTO `genders` VALUES (4, 'kids');

ALTER TABLE `products`
ADD COLUMN `gender_id`  tinyint(2) NULL AFTER `brand_id`;

UPDATE products set gender_id = 1;