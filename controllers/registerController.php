<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\User;
use app\lib\{Session, Db, Format};

$user = new User();
// $firstName = $user->db->conn->real_escape_string($_POST['firstname']);
// $lastName = $user->db->conn->real_escape_string($_POST['lastname']);
// $mail = $user->db->conn->real_escape_string($_POST['email']);

$user->userValidation();
echo 
'<pre>';
     var_dump($user->fm->hasError('firstname'));
echo '<pre>';
// exit();
$firstName = $user->getFirstName();
$lastName = $user->getLastName();
$mail = $user->getMail();
$password = $user->getPassword();
// $query = "INSERT INTO users (firstname, lastname, mail, password) VALUES ('$firstName', '$lastName', '$mail', '$password')";

// $user->db->insertRecord($query);

Session::set('user', serialize($user));
$user->setUserSession();
//$querySlct = 'SELECT * FROM users';

// $user->db->selectRecords($querySlct);
    echo 
    '<pre>';
         var_dump(unserialize(Session::get('user'))->fm->hasError('password'));
    echo '<pre>';