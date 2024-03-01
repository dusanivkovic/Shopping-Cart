CREATE TABLE users (
    user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(50) NOT NULL,
    lastname varchar(50) NOT NULL,
    mail varchar(50) NOT NULL,
    password varchar(50) NOT NULL
    )

INSERT INTO `users`(`user_id`, `firstname`, `lastname`, `mail`, `password`) VALUES ('1','Dusan','Ivkovic','dusan.ivkovic@skolers.org','12345678')