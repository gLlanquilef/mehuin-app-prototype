CREATE TABLE `ITEMS` (
`id` int NOT NULL AUTO_INCREMENT,
`name` longtext NULL,
`stock` int NULL,
`detail` longtext NULL,
`price` int NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `OWNER PROD` (
`id_owner` int NOT NULL,
`id_product` int NOT NULL,
INDEX `ind_owner` (`id_owner` ASC, `id_product` ASC)
);
CREATE TABLE `OWNERS` (
`id` int NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`id`) 
);
CREATE TABLE `PRINTS` (
`id` int NOT NULL AUTO_INCREMENT,
`id_user` int NOT NULL,
`urls` longtext NULL,
`details` longtext NULL,
`customer_name` longtext NOT NULL,
`queue_position` int NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `PROD_ITEMS` (
`id_item` int NULL,
`id_product` int NULL,
INDEX `ind_prod_item` (`id_item` ASC, `id_product` ASC)
);
CREATE TABLE `PRODUCTS` (
`id` int NOT NULL AUTO_INCREMENT,
`name` longtext NULL,
`description` longtext NULL,
`items_store` longtext NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `USERS_APP` (
`id` int NOT NULL AUTO_INCREMENT,
`name` longtext NOT NULL,
`gender` longtext NULL,
`address` longtext NULL,
`phone` longblob NULL,
`password` longtext NULL,
`mail` longtext NULL,
`type` longtext NULL,
PRIMARY KEY (`id`) 
);

ALTER TABLE `OWNER PROD` ADD CONSTRAINT `id_owner` FOREIGN KEY (`id_owner`) REFERENCES `OWNERS` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `OWNER PROD` ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `PRODUCTS` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `OWNERS` ADD CONSTRAINT `fk_user` FOREIGN KEY (`id`) REFERENCES `USERS_APP` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `PRINTS` ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `USERS_APP` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `PROD_ITEMS` ADD CONSTRAINT `id_prod_item` FOREIGN KEY (`id_product`) REFERENCES `PRODUCTS` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE `PROD_ITEMS` ADD CONSTRAINT `id_item_prod` FOREIGN KEY (`id_item`) REFERENCES `ITEMS` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

