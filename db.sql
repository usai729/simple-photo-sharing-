CREATE DATABASE simple_img_posts;

USE simple_img_posts;

CREATE TABLE images (
	id INTEGER PRIMARY KEY AUTO_INCREMENT,
    image BLOB,
    imgDesc TEXT,
    device_name VARCHAR(1000)
);

ALTER TABLE images ADD COLUMN title VARCHAR(200) AFTER id;