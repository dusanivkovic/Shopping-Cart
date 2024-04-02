<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\{Cart, Model, Product, CartItem};
use app\lib\{Session, Db};
Session::init();
$model = new Model ();
$cart = unserialize((Session::get('cart'))) ?: new Cart();
$db = $model->setDataBase(new Db);

$curentUser = unserialize(Session::get('user')) ?? null;

if (isset($_GET['submit_cart']))
{
    if ($curentUser)
    {
        $userId = Session::get('userID');
        foreach ($cart->getCartItems() as $item)
        {
            $updatedQuantity = ($item->getProduct()->getAvailableQuantity() - $item->getQuantity());
            $queryRow []= " {$item->getProduct()->getProductId()} THEN {$updatedQuantity}";

            $inserts[]= "('', '{$item->getQuantity()}', '{$item->getProduct()->getProductId()}', '{$userId}', '{$curentUser->getMail()}')";
        }
        $query = "INSERT INTO `cart`(`item_id`, `quantity`, `product_id`, `user_id`, `mail`) VALUES". implode(', ', $inserts);
        $decreaseProductQuery = "UPDATE `product` 
        SET `availableQuantity` = CASE `product_id`
                    WHEN  " 
                    .implode("\n        WHEN", $queryRow)
                    ."\n        ELSE availableQuantity\n"
                    ."        END";

        $result = $db->insertRecord($query);
        $db->updateRecord($decreaseProductQuery);
        if ($result)
        {
            echo 'Success!';
            Session::set('successQuery', 'You have successfully sent your inquiry!');
            unset($_SESSION['cart']);
            header('location: ./../public/index.php');
            exit;
        }

    }else
    {
        Session::set('loginRequired', 'You must log in to continue shopping! ');
        header('location: ./../public/login.php');
        exit;
    }
}else
{
    $productId = ($_POST['productID'] ?? $_GET['productID']);
    $quantity = $_POST['quantity'] ?? $_GET['quantity'];
    $query = "SELECT * FROM product WHERE product_id = $productId" ;

    $result = ($db->selectRecords($query));
    
    
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
        header('location: ./../public/index.php');
    }
}

