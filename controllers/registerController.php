<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\User;
use app\lib\{Session, Db, Format};
// use app\models\Model;
Session::init();

$user = new User ();


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     $user->setFormat(new Format($_POST));
     $errors = $user->fm->validate();
     $user->setUserSession();
     $user->setDataBase(new Db);

     if (empty($errors))
     {
          $firstName = $user->getFirstName();
          $lastName = $user->getLastName();
          $mail = $user->getMail();
          $password = $user->getPassword();
          $query = "SELECT * FROM users WHERE mail = '$mail'";
          $result = $user->db->selectRecords($query);
          if ($result)
          {
               Session::destroy();
               header('location: ./../public/login.php');
               exit();
          }else
          {
               $query = "INSERT INTO users (firstname, lastname, mail, password) VALUES ('$firstName', '$lastName', '$mail', '$password')";
               $user->db->insertRecord($query);
               Session::set('userName', $firstName);
               header('location: ./../public/index.php');
               exit();
          }

     }else
     {
          header('location: ./../public/register.php');
          exit ();
     }
}

