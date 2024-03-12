<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\User;
use app\lib\{Session, Db, Format};
use app\models\Model;
Session::init();

$user = new User ();

// $model = new Model ();

// $firstName = $user->db->conn->real_escape_string($_POST['firstname']);
// $lastName = $user->db->conn->real_escape_string($_POST['lastname']);
// $userName = $user->db->conn->real_escape_string($_POST['email']);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
     $user->setFormat(new Format($_POST));
     $errors = $user->fm->validate();
     $mail = $user->getMail();
     $user->setUserSession();
     $user->setDataBase(new Db);
     $checkedUser = "SELECT * FROM users WHERE mail = '$mail'";
     if (empty($errors))
     {
          // $user->setDataBase(new Db);
          // header('location: ./../public/register.php');
     }else
     {
          echo isset($errors['password']) ? $user->fm->getFirstError('password') . '<br>' : '';
          echo isset($errors['firstname']) ? $user->fm->getFirstError('firstname') : '';
          // header('location: ./../public/register.php');
          // exit ();
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





$users = $user->db->selectRecords($checkedUser);
$users->fetch_all(MYSQLI_ASSOC);

    echo '<pre>';
//     var_dump($result);
     foreach ($users as $row)
     {
          foreach ($row as $key => $value)
          {
               echo $value . '<br>';
          }

     }
     //     print_r(unserialize(Session::get('user')));
    echo '<pre>';