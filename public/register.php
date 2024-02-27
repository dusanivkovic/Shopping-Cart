<?php
include_once __DIR__ . '/../view/header.php';
require_once __DIR__ . '/../vendor/autoload.php';
use app\forms\Form;
use app\forms\TextInput;
$form = new Form('registerController.php');
$form->addElement(new TextInput('name', 'Name', 'name', 'Name'));
?>
<div class="container">
    <h3>Register</h3>
<?php 
    echo $form->render();
?>
</div>