<?php
require_once './../vendor/autoload.php';

use app\lib\{Session, Db};
use app\models\User;
// Session::init();
Session::set('name', $_POST['firstname']);
$user = new User(new Db, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
// $query = 'SELECT * FROM users';
$query = "INSERT INTO users ( user_id, firstname, lastname, mail, password) VALUES ('', '{$user->getFirstName()}', '{$user->getLastName()}', '{$user->getMail()}', '{$user->getPassword()}'";
$user->db->conn->insertRecord($query);

    echo 
    '<pre>';
         print_r($user);
    echo '<pre>';