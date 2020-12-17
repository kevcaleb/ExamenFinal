
-- -----------------------------------------------------
-- Table `games`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `games` (
  `game_id` BIGINT(13) UNSIGNED NOT NULL AUTO_INCREMENT,
  `game_name` VARCHAR(128) NULL,
  `game_type` CHAR(3) NULL,
  `game_brand` VARCHAR(45) NULL,
  `game_console` VARCHAR(45) NULL,
  `game_status` CHAR(3) NULL,
  PRIMARY KEY (`game_id`))
ENGINE = InnoDB;
