CREATE  TABLE IF NOT EXISTS `cruge_user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `regdate` BIGINT NULL ,
  `actdate` BIGINT NULL ,
  `logondate` BIGINT NULL ,
  `username` VARCHAR(64) NULL ,
  `email` VARCHAR(45) NULL ,
  `password` VARCHAR(64) NULL COMMENT 'Hashed password' ,
  `authkey` VARCHAR(100) NULL COMMENT 'llave de autentificacion' ,
  `state` INT(11) NULL DEFAULT 0 ,
  `friendly_name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

CREATE INDEX cruge_user_username_x ON cruge_user(username);
CREATE INDEX cruge_user_email_x ON cruge_user(email);
CREATE INDEX cruge_user_authkey_x ON cruge_user(authkey);
