<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\{Cart, Model, Product, CartItem};
use app\lib\{Session, Db};
Session::init();
$model = new Model ();
$cart = unserialize((Session::get('cart'))) ?: new Cart();

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
// exit;

$productId = $_POST['productID'];
$quantity = $_POST['quantity'];
echo $quantity;
$query = "SELECT * FROM product WHERE product_id = $productId" ;
$db = $model->setDataBase(new Db);
$result = ($db->selectRecords($query));

if (!isset($_POST['productID']) || !isset($_POST['quantity']))
{
    include __DIR__ . '/../view/not_found.php';
    exit;
}

if ($result->num_rows > 0)
{
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $product = new Product($result[0]['product_id'], $result[0]['title'], $result[0]['price'], $result[0]['availableQuantity']);
    $product->addToCart($cart, $quantity);
    // $cart->addProduct($product, $Quantity);
    $cart->setCartItemSession();
    header('location: ./../public/index.php');
}
echo '<pre>';
print_r($cart);
echo '</pre>';
// Session::destroy();




// if (!$productId)
// {
//     include __DIR__ . '/../view/not_found.php';
//     exit;
// }
