<?php

$arrUpdate = [
    "CREATE TABLE `blog` ("
    . "`id` INT NOT NULL AUTO_INCREMENT , "
    . "`name` VARCHAR(255) NOT NULL , "
    . "`description` TEXT NULL , "
    . "`ownerId` INT NOT NULL , "
    . "`createDate` DATETIME NOT NULL , "
    . "PRIMARY KEY (`id`), "
    . "UNIQUE (`name`)"
    . ") ENGINE = InnoDB;",
    "CREATE TABLE `blog_entry` ("
    . "`id` INT NOT NULL AUTO_INCREMENT , "
    . "`blogId` INT NOT NULL COMMENT 'id of blog (channel)' , "
    . "`subject` VARCHAR(255) NOT NULL COMMENT 'Title for blog entry' , "
    . "`content` MEDIUMTEXT NOT NULL COMMENT 'The actual blog entry content' , "
    . "`allowComments` TINYINT NOT NULL DEFAULT '0' COMMENT 'Allow comments' , "
    . "`pinned` TINYINT NOT NULL DEFAULT '0' COMMENT 'Pin Entry to top of blog' , "
    . "`tags` TEXT NOT NULL DEFAULT '[]' COMMENT 'Tags for searches' , "
    . "`createdBy` INT NOT NULL COMMENT 'UserId' , "
    . "`createDate` DATETIME NOT NULL COMMENT 'Created on' , "
    . "PRIMARY KEY (`id`), "
    . "INDEX (`blogId`)"
    . ") ENGINE = InnoDB;",
    "ALTER TABLE `blog_entry` ADD FOREIGN KEY (`blogId`) REFERENCES `blog`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;",
];