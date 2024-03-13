<?php
include_once __DIR__ . '/../view/header.php';
require_once __DIR__ . '/../vendor/autoload.php';

use app\forms\{Button, Form, inputField};
use app\lib\Session;
use app\models\{Model, User};

$model = new Model ();
$currentUser = unserialize(Session::get('user'));

if ($currentUser)
{
    foreach ($currentUser->fm->errors as $key => $value)
    {
        $model->addError($key, $value);# Set error into Model instance for Bootstrap validation
    }
}
echo '<pre>';
print_r($model);
echo '</pre>';


$form = new Form('./../controllers/loginController.php');
$form->addElement(new inputField('hidden', 'firstname', '', 'firstName', 'First Name', '', 'col-md-6', $model));
$form->addElement(new inputField('hidden', 'lastname', '', 'lastName', 'Last Name', '', 'col-md-6', $model));
$form->addElement(new inputField('mail', 'email', 'Email', 'email', 'Email', '', 'col-12', $model));
$form->addElement(new inputField('password', 'password', 'Password', 'password', 'Password', '', 'col-12', $model));

$form->addElement(new Button('Submit'));
?>
<div class="container">
    <h3>Register</h3>
<?php 
    echo $form->render();

    Session::destroy();
?>
</div>
<?php
include_once __DIR__ . '/../view/footer.php';