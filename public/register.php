<?php
include_once __DIR__ . '/../view/header.php';
require_once __DIR__ . '/../vendor/autoload.php';

use app\forms\{Button, Form, inputField};
use app\lib\Format;
use app\lib\Session;
$form = new Form('./../controllers/registerController.php');
$form->addElement(new inputField('text', 'firstname', 'First name', 'firstName', 'First Name', '', 'col-md-6', ''));
$form->addElement(new inputField('text', 'lastname', 'Last name', 'lastName', 'Last Name', '', 'col-md-6', ''));
$form->addElement(new inputField('mail', 'email', 'Email', 'email', 'Email', '', 'col-12', ''));
$form->addElement(new inputField('password', 'password', 'Password', 'password', 'Password', '', 'col-12', ''));
$form->addElement(new inputField('password', 'confirmPassword', 'Confirm Password', 'confirmpassword', 'Password', '', 'col-12', ''));
$form->addElement(new Button('Submit'));
?>
<div class="container">
    <h3>Register</h3>
<?php 
    echo $form->render();
?>
</div>
<?php
include_once __DIR__ . '/../view/footer.php';