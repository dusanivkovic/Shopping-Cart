<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\{Cart, Model, Product, CartItem};
use app\lib\{Session, Db};
Session::init();
$model = new Model ();
$cart = unserialize((Session::get('cart'))) ?: new Cart();


// exit;
if (isset($_GET['submit_cart']))
{
    $curentUser = unserialize(Session::get('user')) ?? null;
    if ($curentUser)
    {
        $query;
    }else
    {
        Session::set('loginRequired', 'You must log in to continue shopping! ');
        header('location: ./../public/login.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // $productId = $_POST['productID'];
    // $quantity = $_POST['quantity'];

}
$productId = $_POST['productID'] ?? $_GET['productID'];
$quantity = $_POST['quantity'] ?? $_GET['quantity'];

$query = "SELECT * FROM product WHERE product_id = $productId" ;
$db = $model->setDataBase(new Db);
$result = ($db->selectRecords($query));

// if (!isset($_POST['productID']) || !isset($_POST['quantity']))
// {
//     include __DIR__ . '/../view/not_found.php';
//     exit;
// }

if ($result->num_rows > 0)
{
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $product = new Product($result[0]['product_id'], $result[0]['title'], $result[0]['price'], $result[0]['availableQuantity']);
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $product->addToCart($cart, $quantity);
    }else{
        $cart->setItemsQuantity($quantity, $productId);
    }

    // $cart->addProduct($product, $quantity);
    $cart->setCartItemSession();
    // header('location: ./../public/index.php');
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
