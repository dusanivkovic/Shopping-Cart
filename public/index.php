<?php

use app\lib\Session;

include __DIR__ .'/../view/header.php' ;

?>
    <h1>Hello, world!</h1>
    <div class="container">
        <div class="row justify-content-between">
            <?php include __DIR__ .'/../view/product.php' ?>
        </div>
    </div>
    

<?php include __DIR__ .'/../view/footer.php' ?>
