<?php
// require_once __DIR__ . '/../../vendor/autoload.php';
use app\lib\{Db};
use app\models\{Model, Product};
$query = 'SELECT * FROM product';
$model = new Model ();

$db = $model->setDataBase(new Db);
$result = ($db->selectRecords($query))->fetch_all(MYSQLI_ASSOC);

// foreach ($result as $row)
// {
//   echo '<pre>' . print_r($row['title']) . '<br>' .'</pre>';
// }

?>
<?php foreach ($result as $product): ?>

<div class="card col-md-4 g-2 " >
  <img src="./../public/img/bg2.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $product['title']; ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-info border-1">Price: <?php echo $product['price'] ?></li>
    <input type="hidden" name="" value="<?php echo $product['product_id'] ?>">
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">Add to Cart</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
<?php endforeach ?>