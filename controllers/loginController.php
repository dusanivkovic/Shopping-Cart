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
    $errors = $user->fm->validateLogin();
    $user->setUserSession();
    $user->setDataBase(new Db);

    if (empty($errors))
    {
        $mail = $user->getMail();
        $password = $user->getPassword();
        $query = "SELECT * FROM users WHERE mail = '$mail' AND password = '$password'";
        $result = $user->db->selectRecords($query);

        if ($result)
        {
            $currentUser = $result->fetch_assoc();
            Session::set('userName', $currentUser['firstname']);
            header('location: ./../public/index.php');
        }else
        {
            Session::set('mailError', 'User does not exist with this email address');
            header('location: ./../public/login.php');
            exit();
        }        
    }else
    {
        header('location: ./../public/login.php');
    }
}
