<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\User;
use app\lib\{Session, Db, Format};

$user = new User();
// $firstName = $user->db->conn->real_escape_string($_POST['firstname']);
// $lastName = $user->db->conn->real_escape_string($_POST['lastname']);
// $mail = $user->db->conn->real_escape_string($_POST['email']);
// $firstName = $_POST['firstname'];
// $lastName = $_POST['lastname'];
// $mail = $_POST['email'];
// $password = $_POST['password'];
// $query = "INSERT INTO users (firstname, lastname, mail, password) VALUES ('$firstName', '$lastName', '$mail', '$password')";
$user->userRegistration();
$user->db->insertRecord($query);
Session::set('name', $_POST['firstname']);
$querySlct = 'SELECT * FROM users';

// $user->db->selectRecords($querySlct);
    echo 
    '<pre>';
         print_r($user);
    echo '<pre>';