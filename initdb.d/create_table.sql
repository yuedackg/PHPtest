CREATE DATABASE IF NOT EXISTS example_schema;
CREATE TABLE IF NOT EXISTS   `example_schema`.`m_users`(
	`user_id` INT not null auto_increment,
	`user_name` varchar(45) not null,
	`create_date` datetime null,
	`update` datetime null,
	primary key( `user_id`)
);

-- テストデータ　：運用時には削除のこと
INSERT ignore INTO  `example_schema`.`m_users` (`user_id`, `user_name`, `create_date`, `update`) VALUES (NULL, 'Taiki Katou', NULL, NULL);
INSERT ignore INTO  `example_schema`.`m_users` (`user_id`, `user_name`, `create_date`, `update`) VALUES (NULL, 'yoshihiro UEDA', NULL, NULL);
CREATE TABLE `example_schema`.`users` (`id` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , `email` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL , `password` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL , PRIMARY KEY (`id`), UNIQUE (`name`)) ENGINE = InnoDB CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;


