<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\User;
use app\lib\{Session, Db, Format};
use app\models\Model;
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
          $checkedUser = "SELECT * FROM users WHERE mail = '$mail'";
          $userMail = $user->db->selectRecords($checkedUser);
          if ($userMail)
          {
               Session::destroy();
               header('location: ./../public/login.php');
               exit();
          }else
          {
               $query = "INSERT INTO users (firstname, lastname, mail, password) VALUES ('$firstName', '$lastName', '$mail', '$password')";

               $user->db->insertRecord($query);
               header('location: ./../public/index.php');
               exit();
          }

     }else
     {
          echo isset($errors['password']) ? $user->fm->getFirstError('password') . '<br>' : '';
          echo isset($errors['firstname']) ? $user->fm->getFirstError('firstname') : '';
          header('location: ./../public/register.php');
          exit ();
     }
}


// echo '<pre>';
//      var_dump($user);
// echo '<pre>';
// exit();






// $users = $user->db->selectRecords($checkedUser);
// $users->fetch_all(MYSQLI_ASSOC);

//     echo '<pre>';

//      foreach ($users as $row)
//      {
//           foreach ($row as $key => $value)
//           {
//                echo $value . '<br>';
//           }

//      }

//     echo '<pre>';