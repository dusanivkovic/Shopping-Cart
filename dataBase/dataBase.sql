CREATE TABLE users (
    user_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(50) NOT NULL,
    lastname varchar(50) NOT NULL,
    mail varchar(50) NOT NULL,
    password varchar(50) NOT NULL
    )

INSERT INTO `users`(`user_id`, `firstname`, `lastname`, `mail`, `password`) VALUES ('1','Dusan','Ivkovic','dusan.ivkovic@skolers.org','12345678')

CREATE TABLE `product` (
    product_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    price FLOAT NOT NULL,
    availableQuantity INT
    )

CREATE TABLE `cart` (
    item_id INT UNSIGNED,
    quantity int,
    product_id int,
    user_id int
    )

INSERT INTO `product`(`id`, `title`, `price`, `availableQuantity`) VALUES (
'Kempa Kempa GOLD Shorts, schwarz, XXS, 200319791',	'165',	'10',
'Kempa Kempa GOLD Shorts, schwarz, XXS, 200319801',	'138',	'10',
'Kempa WASSERFLASCHE 750 ml, transparent, 200120902', '138',	'10',
'Kempa KEMPA HANDBALLWAX 200 ml, 200158302',	'138',	'10',
'Kempa KEMPA HANDBALLWAXENTFERNER, 200158502', '138',	'10',
'Kempa CORE T-Shirt, kempa blau, XXL, 200215102',	'78',	'10',
'Kempa CORE T-Shirt, kempa blau, XXXL, 200215102',	'78',	'10'
)