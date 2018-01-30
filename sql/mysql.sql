#
# Structure table for `cellar_wine` 8
#

CREATE TABLE `cellar_wine` (
  `id`          INT(11)      NOT NULL  AUTO_INCREMENT,
  `name`        VARCHAR(45)  NOT NULL,
  `year`        VARCHAR(45)  NOT NULL,
  `grapes`      VARCHAR(45)  NOT NULL,
  `country`     VARCHAR(45)  NOT NULL,
  `region`      VARCHAR(45)  NOT NULL,
  `description` TEXT         NOT NULL,
  `picture`     VARCHAR(256) NOT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = MyISAM;
