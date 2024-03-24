<?php
    use app\lib\{Db, Session};
    use app\models\Model;
    $cart = unserialize(Session::get('cart'));
?>
    <div id="cart" class="fixed-bottom bg-info rounded-5 p-2" role="button" tabindex="0" style="width:7%"><?php echo $cart ? $cart->getTotalQuantity() : '0' ?><i class="bi bi-cart"></i></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../assets/main.js"></script>
    </body>
</html>