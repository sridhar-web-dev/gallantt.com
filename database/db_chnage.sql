CREATE TABLE `boards` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `picture` VARCHAR(255) DEFAULT NULL,
    `designation` VARCHAR(255) DEFAULT NULL,
    `description` TEXT DEFAULT NULL,
    `order_index` INT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;