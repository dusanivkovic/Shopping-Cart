<?php
include_once __DIR__ . '/../view/header.php';
require_once __DIR__ . '/../vendor/autoload.php';
use app\forms\Form;
use app\forms\TextInput;
$form = new Form('registerController.php');
$form->addElement(new TextInput('text', 'firstname', 'First name', 'firstName', 'First Name', '', 'col-md-6'));
$form->addElement(new TextInput('text', 'lastname', 'Last name', 'lastName', 'Last Name', '', 'col-md-6'));
$form->addElement(new TextInput('mail', 'email', 'Email', 'email', 'Email', '', 'col-12'));
$form->addElement(new TextInput('password', 'password', 'Password', 'password', 'Password', '', 'col-12'));
?>
<div class="container">
    <h3>Register</h3>
<?php 
    echo $form->render();
?>
</div>
<?php
include_once __DIR__ . '/../view/footer.php';