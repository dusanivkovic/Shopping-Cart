<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\User;
use app\lib\{Session, Db};
// Session::init();
Session::set('name', $_POST['firstname']);

$user = new User(new Db, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);
$firstName = $user->db->conn->real_escape_string($_POST['firstname']);
$lastName = $user->db->conn->real_escape_string($_POST['lastname']);
$mail = $user->db->conn->real_escape_string($_POST['email']);
echo $firstName;
$querySlct = 'SELECT * FROM users';
$query = "INSERT INTO users (firstname, lastname, mail, password) VALUES ('$firstName', '$lastName', '$mail', '{$user->getPassword()}')";
$user->db->insertRecord($query);
// $user->db->selectRecords($querySlct);
    echo 
    '<pre>';
         print_r(mysqli_fetch_all($user->db->selectRecords($querySlct)));
    echo '<pre>';