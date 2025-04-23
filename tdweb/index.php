<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
  session_start();
  $user = $_SESSION['user'] ?? null;
  require_once 'router.php';
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>webapp</title>


    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">WebApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php?controller=HomeController&method=index">Home</span></a>
            </li>


            <li  class="nav-item">
              <a class="nav-link" href="index.php?controller=EmployeeController&method=listAll">Employees</a>
            </li>
            <li  class="nav-item">
              <a  class="nav-link" href="index.php?controller=ProductController&method=listAll">Products</a>
            </li>
          </ul>


          <ul class="navbar-nav ms-auto">
            <?php if ($user): ?>
              <li class="nav-item">
                <span class="navbar-text text-white me-2">
                  Bonjour, <?= htmlspecialchars($user['username']) ?>
                </span>
              </li>
              <li class="nav-item">
                <a class="btn btn-outline-light" href="index.php?controller=LoginController&method=logout">Logout</a>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a class="btn btn-outline-light" href="index.php?controller=LoginController&method=index">Login</a>
              </li>
            <?php endif; ?>
          </ul>


          
        </div>
      </nav>
      <div>
        <?php 
          $router = new Router();
          $router->dispatch(); 
        ?>
      </div>
    </header>

    <!-- Begin page content -->
    <main role="main" class="container">
    </main>

    <footer class="footer">
      <div class="container">
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
