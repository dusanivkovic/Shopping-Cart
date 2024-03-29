<?php
require_once __DIR__ . '/../vendor/autoload.php';
use app\lib\Session;
Session::init();
// $user = unserialize(Session::get('user'));

if (isset($_GET['action']) && $_GET['action'] == 'logout')
  {
      Session::destroy();
      header('location: index.php');
      exit();
  }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">My Shop</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
            </ul>
        </div>
        <div class="d-flex">
          <span class="nav-item me-2">
            <?php echo !Session::get('userName') ? '<a class="nav-link" href="register.php">Register</a>' : 'Hello ' . Session::get('userName')  ?>
          </span>
          <span class="nav-item">
            <a class="nav-link" href="<?php echo !Session::get('userName') ? 'login.php' : 'index.php?action=logout' ?>"><?php echo !Session::get('userName') ? 'Sign In' : 'Sign Out' ?></a>
          </span>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </nav>