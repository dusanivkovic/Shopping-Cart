<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\User;
use app\lib\{Session, Db, Format};
use app\models\Model;

$user = new User ();
// $model = new Model ();

// $firstName = $user->db->conn->real_escape_string($_POST['firstname']);
// $lastName = $user->db->conn->real_escape_string($_POST['lastname']);
// $mail = $user->db->conn->real_escape_string($_POST['email']);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     $user->setFormat(new Format($_POST));
     $errors = $user->fm->validate();
     if (empty($errors))
     {
          $user->setDataBase(new Db);
     }else
     {
          echo isset($errors['password']) ? $user->fm->getFirstError('password') . '<br>' : '';
          echo isset($errors['firstname']) ? $user->fm->getFirstError('firstname') : '';
          // header('location: ./../public/register.php');
     }
}


// echo '<pre>';
//      var_dump($user);
// echo '<pre>';
// exit();
$firstName = $user->getFirstName();
$lastName = $user->getLastName();
$mail = $user->getMail();
$password = $user->getPassword();
$query = "INSERT INTO users (firstname, lastname, mail, password) VALUES ('$firstName', '$lastName', '$mail', '$password')";

// $user->db->insertRecord($query);

Session::set('user', serialize($user));
$user->setUserSession();
//$querySlct = 'SELECT * FROM users';

// $user->db->selectRecords($querySlct);
    echo 
    '<pre>';
         print_r($user);
    echo '<pre>';