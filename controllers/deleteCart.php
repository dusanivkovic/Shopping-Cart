<?php
require_once __DIR__ .'/../vendor/autoload.php';
use app\models\{Cart, Model, Product, CartItem};
use app\lib\{Session, Db};
$model = new Model ();
Session::init();
$cart = unserialize((Session::get('cart'))) ?: new Cart();
if (isset($_GET['productID']))
{
    $productId = $_GET['productID'];
    $cartItem = $cart->findCartItem($productId);
    $cart->removeProduct($cartItem->getProduct());
    $cart->setCartItemSession();
}
header('location: ./../public/index.php');
exit;
echo '<pre>';
var_dump($cart);
echo '</pre>';
//exit;
