CREATE TABLE IF NOT EXISTS `mt_admin`(
  admin_id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY ,
  admin_number VARCHAR(32) NOT NULL ,
  admin_password VARCHAR(32) NOT NULL
);
DROP TABLE  mt_flower;
CREATE TABLE IF NOT EXISTS `mt_flower`(
  flower_id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY ,
  user_id INT,
  flower_name VARCHAR(32) NOT NULL ,
  flower_image_path VARCHAR(300) NOT NULL
);
DROP TABLE  mt_flower_device;
CREATE TABLE IF NOT EXISTS `mt_flower`(
  flower_device_id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY ,
  device_id INT NOT NULL ,
  flower_id VARCHAR(32) NOT NULL
);