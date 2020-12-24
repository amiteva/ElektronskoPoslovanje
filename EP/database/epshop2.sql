SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `cart`
(
    `cart_id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `user_id` int(11)                            NOT NULL,
    `item_id` int(11)                            NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `shop`.`cart`
(
    `cart_id` int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `userId`  int(11)             NULL     DEFAULT NULL,
    `status`  int(11)             NOT NULL DEFAULT 0, /*0-current, 1-paid, 2-cancelled(failed payment or cancelled order)*/
    `date`    DATETIME            NULL,
    KEY `idx_cart_user` (`userId`),
    CONSTRAINT `fk_cart_user` FOREIGN KEY (`userId`) REFERENCES `users` (`usersId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE `users`
(
    `usersId`    int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `cartId`     int(11)                            DEFAULT NULL,
    `usersName`  varchar(128)                       NOT NULL,
    `usersEmail` varchar(128) UNIQUE                NOT NULL,
    `usersUid`   varchar(128) UNIQUE                NOT NULL,
    `usersPwd`   varchar(128)                       NOT NULL,
    `userStatus` int(11)                            NOT NULL DEFAULT 1, /*0-innactive, 1-active*/
    `userRole`   int(11)                            NOT NULL, /*0-admin, 1-prodajalec, 2-stranka, 3-guest*/
    `street`     varchar(255)                       NOT NULL,
    `houseNo`    int(11)                            NOT NULL,
    `post`       varchar(255)                       NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `userRole`, street, houseNo, post) VALUES
(1, 'guest', 'none', 'Guest', 'none', 3, 'unknown', 0, 1000),
(2, 'Admin', 'admin@gmail.com', 'admin', '$2y$10$rjOaypIQknnY0oePKVHtC.lJtjGHbg7lqt1XNYbp8grJkrpC8UCZS', 0),
(3, 'Seller', 'seller@gmail.com', 'seller', '$2y$10$G.bD/RFCjX/LRronmZCZnOZ73G9DUjZzqhmMH/H4kW.pkDteib4cm', 1),
(4, 'Customer', 'customer@gmail.com', 'customer', '$2y$10$obIhVhlQuGlF4T2X6RP2CeIZpJpCKmhcOVINOP6humqjVx1qfuNle', 2);
