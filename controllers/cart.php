<?php
require_once __DIR__ .'/../vendor/autoload.php';

use app\models\{Model, Product};
use app\lib\{Session, Db};
$model = new Model ();
$productId = $_GET['product'];
$query = "SELECT * FROM product WHERE product_id = $productId" ;
$db = $model->setDataBase(new Db);
$result = ($db->selectRecords($query))->fetch_all(MYSQLI_ASSOC);
foreach ($result as $product)
{
    print_r($product);
}

if (!isset($_GET['product']))
{
    include __DIR__ . '/../view/not_found.php';
    exit;
}

$product;

// if (!$productId)
// {
//     include __DIR__ . '/../view/not_found.php';
//     exit;
// }

$query = "SELECT * FROM product";