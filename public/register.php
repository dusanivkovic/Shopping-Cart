<?php
include_once __DIR__ . '/../view/header.php';
require_once __DIR__ . '/../vendor/autoload.php';

use app\forms\{Button, Form, inputField};
use app\lib\Session;
use app\models\{Model, User};
$model = new Model();
$usr = unserialize(Session::get('user'));


if ($usr)
{
    foreach ($usr->fm->errors as $key => $value)
    {
        $model->addError($key, $value);
    }
}
echo '<pre>';
var_dump($model);
echo '</pre>';


// use app\lib\Format;
// use app\lib\Session;
$form = new Form('./../controllers/registerController.php');
$form->addElement(new inputField('text', 'firstname', 'First name', 'firstName', 'First Name', '', 'col-md-6', $model));
$form->addElement(new inputField('text', 'lastname', 'Last name', 'lastName', 'Last Name', '', 'col-md-6', $model));
$form->addElement(new inputField('mail', 'email', 'Email', 'email', 'Email', '', 'col-12', $model));
$form->addElement(new inputField('password', 'password', 'Password', 'password', 'Password', '', 'col-12', $model));
$form->addElement(new inputField('password', 'confirmPassword', 'Confirm Password', 'confirmpassword', 'Password', '', 'col-12', $model));
$form->addElement(new Button('Submit'));
?>
<div class="container">
    <h3>Register</h3>
<?php 
    echo $form->render();
    echo '<pre>';
     print_r($form);
    echo '</pre>';
    Session::destroy();
?>
</div>
<?php
include_once __DIR__ . '/../view/footer.php';