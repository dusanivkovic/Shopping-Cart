<?php
// require_once __DIR__ . '/../../vendor/autoload.php';
use app\lib\{Db, Session};
use app\models\{Model, Product, Cart};
$query = 'SELECT * FROM product';
$model = new Model ();
$cart = unserialize(Session::get('cart'));

$db = $model->setDataBase(new Db);
$result = ($db->selectRecords($query))->fetch_all(MYSQLI_ASSOC);

?>
<?php foreach ($result as $row): 
  $product = new Product ($row['product_id'], $row['title'], $row['price'], $row['availableQuantity']);
?>

<div class="card col-md-4 g-2 " >
  <img src="./../public/img/bg2.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $product->getProductTitle(); ?></h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item bg-info border-1">Price: <?php echo $product->getProductPrice() ?></li>
  </ul>
  <div class="card-body">
    <form id="quantity" action="./../controllers/cart.php" method="post">
      <div class="input-group mb-3">
        <input name="quantity" type="hidden" class="form-control" placeholder="" value="1" min="0">
        <input type="hidden" name="productID" value="<?php echo $product->getProductId()?>">
        <button  class="btn btn-outline-info card-link" type="submit" id="button-addon2">Add to Cart</button>
      </div>
    </form>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>
<?php endforeach ?>

    <!-- echo '<pre>';
    print_r($value->getQuantity());
    print_r($value->getProduct()->getProductTitle());
    echo '</pre>'; -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">My Cart</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th><?php echo 'Product' ?></th>
              <th><?php echo 'Quantity' ?></th>
            </tr>
          </thead>
          <tbody>
          <?php if ($cart) : ?>  
          <?php foreach ($cart as $row) : ?>
            <?php foreach ($row as $key => $cartItem ) : ?> 
              <tr class="table-active">
                <td>
                  <span><?php echo $cartItem->getProduct()->getProductTitle() ?></span>
                  <a href="./../controllers/deleteCart.php?productID=<?php echo $cartItem->getProduct()->getProductId() ?>" class="btn btn-outline-danger card-link">Delete</a>
                </td>
                <td>
                  <form action="./../controllers/cart.php" method="get">
                    <div id="edit-cart" class="input-group mb-3">
                      <input id="quantity" name="quantity" type="number" class="form-control" placeholder="" value="<?php echo $cartItem->getQuantity() ?>" min="0">
                      <input type="hidden" name="productID" value="<?php echo $cartItem->getProduct()->getProductId() ?>">
                      <button class="btn btn-outline-info card-link" type="submit" id="button-addon2">Save</button>
                    </div>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          <?php endforeach ?>
          <?php endif ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="./../controllers/cart.php?submit_cart<?php echo ''#$cartItem->getProduct()->getProductId()?>" class="btn btn-primary" type="button">Submit</a>
      </div>
    </div>
  </div>
</div>
