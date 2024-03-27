<?php
include_once __DIR__ . '/../view/header.php';
require_once __DIR__ . '/../vendor/autoload.php';

use app\forms\{Button, Form, inputField};
use app\lib\Session;
use app\models\{Model, User};

$model = new Model ();
$currentUser = unserialize(Session::get('user'));

$model->setErrors($currentUser);

$form = new Form('./../controllers/loginController.php');

$form->addElement(new inputField('mail', 'email', 'Email', 'email', 'Email', '', 'col-12', $model));
$form->addElement(new inputField('password', 'password', 'Password', 'password', 'Password', '', 'col-12', $model));

$form->addElement(new Button('Submit'));
?>
<div class="container">
    <h3>Log In</h3>
<?php echo $form->render(); ?>
    <div id="" class="is-invalid">
        <p>
        <?php 
            echo Session::get('mailError') ?: '' ;
            echo Session::get('loginRequired') ?: '' ;

            Session::destroy();
        ?>
        </p>
    </div>


</div>
<?php
include_once __DIR__ . '/../view/footer.php';