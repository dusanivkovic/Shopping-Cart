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
    $errors = $user->fm->validateLogin();
    $user->setUserSession();
    $user->setDataBase(new Db);

    if (empty($errors))
    {
    $mail = $user->getMail();
    $password = $user->getPassword();
    $checkedUser = "SELECT * FROM users WHERE mail = '$mail'";
    $userMail = $user->db->selectRecords($checkedUser);
    // header('location: ./../public/index.php');
    
    }
    echo '<pre>';
    print_r($userMail);
    echo '</pre>';

}
