
CREATE DATABASE api_cache;

USE api_cache;

CREATE TABLE `images` (
	`image_id` INT(11) NOT NULL AUTO_INCREMENT,
  `original_size` VARCHAR(255) NOT NULL,
	`mobile_size` VARCHAR(255) NOT NULL,
	`tablet_size` VARCHAR(255) NOT NULL,
	`desktop_size` VARCHAR(255) NOT NULL,
  PRIMARY KEY (image_id)
);

/*
 Pour verifier que le script renvoie sur le lien adapté en fonction de votre device :
 -Inserer la requete dans la db
 - puis tester avec 'user.oc-static.com/filesf/60dsfsd01_7000/64f%6010.jpg'
 ex: localhost:8080/index.php///user.oc-static.com/filesf/60dsfsd01_7000/64f%6010.jpg
*/
INSERT INTO images (original_size,desktop-size,mobile_size,tablet_size) VALUES ("user.oc-static.com/filesf/60dsfsd01_7000/64f%6010.jpg","desk.jpg","mobile.jpg","tablet.jpg");