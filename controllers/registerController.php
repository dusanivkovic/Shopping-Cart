<?php
require_once './../vendor/autoload.php';

use app\lib\{Session, Db};
use app\models\User;
// Session::init();
Session::set('name', $_POST['firstname']);
$user = new User(new Db, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);

    echo 
    '<pre>' .
         $user->getFirstName() . '<br>' .Session::get('name') .
    '<pre>';