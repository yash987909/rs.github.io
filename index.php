<?php

session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
{
  header("location: login.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Recommendation System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet"> -->
  <!-- <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet"> -->
  <!-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


  <!-- =======================================================
  * Template Name: Yummy
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background-color: #000000;">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center" style="background-color: #baff00;">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="mx-5">RS</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign Up</a></li>
        </ul>
      </nav><!-- .navbar -->
      <?php
      if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin']==true){
          echo '<div>
          <a class="btn-book-a-table dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            '.$_SESSION['firstname'].'
          </a>
  
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="index.php">Home</a>
            <a class="dropdown-item" href="about.php">About</a>
            <a class="dropdown-item" href="login.php">Login</a>
            <a class="dropdown-item" href="signup.php">Sign Up</a>
            <a class="dropdown-item" href="changepassword.php">Change password</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
          </div>';
        }
      }  
      else{
          echo '<a class="btn-book-a-table" href="login.php">login</a>
          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>';
      }

       
      ?>
      
      
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <section id="search" >
    <form action="" method="post">
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <form class="form-inline">
            <div class="input-group">
              <input type="text" class="form-control rounded-4 mx-2 py-2" name="search" placeholder="Search...">
              <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-primary rounded-4 py-2">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</form>
</section>

<?php
  include('config.php');
  include('fetch.php');

  if(isset($_POST['submit'])){
    $str=mysqli_real_escape_string($conn,$_POST['search']);
    $sql="select * from product_table_links where product_name like '%$str%' or product_category like '%$str%'";
    $res =  mysqli_query($conn,$sql);
    if(mysqli_num_rows($res)>0){
      while ($row = $res->fetch_assoc()) {
        $arr = flipkart_fetch($row["flipkart_link"]);
        $reliance_price = reliance_fetch($row["reliance_link"]);
        $reliance_url = $row["reliance_link"];
    
        echo '<section class="d-flex justify-content-center align-items-center h-100 py-3">
        <div class="card mx-3 rounded-4" style="width: 20rem;">
        <h4 class="card-title bg-dark text-white mw-100 text-center rounded-4 py-2"><b>(Flipkart)</b></h4>
          <img src="'.$arr[3].'" class="card-img-top px-4 py-4" alt="...">
          <div class="card-body">
            <h4 class="card-title"><b>'.$arr[1].'</b></h4>
            <h5 class="card-title">'.$arr[2].'</h5>
            <a href="'.$arr[0].'" target="_blank"  class="btn btn-primary">Buy Now</a>
          </div>
        </div>
        <div class="card mx-3 rounded-4" style="width: 20rem;">
        <h4 class="card-title bg-dark text-white mw-100 text-center rounded-4 py-2" style=""><b>(Reliance Digital)</b></h4>
          <img src="'.$arr[3].'" class="card-img-top px-4 py-4" alt="...">
          <div class="card-body">
            <h4 class="card-title"><b>'.$arr[1].'</b></h4>
            <h5 class="card-title">'.$reliance_price.'</h5>
            <a href="'.$reliance_url.'" target="_blank"  class="btn btn-primary">Buy Now</a>
          </div>
        </div>
      </section>';
      }
    }
  }
  else{
    $query = "SELECT * FROM product_table_links";
    $result = $conn->query($query);
  
    while ($row = $result->fetch_assoc()) {
      $arr = flipkart_fetch($row["flipkart_link"]);
      $reliance_price = reliance_fetch($row["reliance_link"]);
      $reliance_url = $row["reliance_link"];
  
      echo '<section class="d-flex justify-content-center align-items-center h-100 py-3">
      <div class="card mx-3 rounded-4" style="width: 20rem;">
      <h4 class="card-title bg-dark text-white mw-100 text-center rounded-4 py-2"><b>(Flipkart)</b></h4>
        <img src="'.$arr[3].'" class="card-img-top px-4 py-4" alt="...">
        <div class="card-body">
          <h4 class="card-title"><b>'.$arr[1].'</b></h4>
          <h5 class="card-title">'.$arr[2].'</h5>
          <a href="'.$arr[0].'" target="_blank"  class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      <div class="card mx-3 rounded-4" style="width: 20rem;">
      <h4 class="card-title bg-dark text-white mw-100 text-center rounded-4 py-2" style=""><b>(Reliance Digital)</b></h4>
        <img src="'.$arr[3].'" class="card-img-top px-4 py-4" alt="...">
        <div class="card-body">
          <h4 class="card-title"><b>'.$arr[1].'</b></h4>
          <h5 class="card-title">'.$reliance_price.'</h5>
          <a href="'.$reliance_url.'" target="_blank"  class="btn btn-primary">Buy Now</a>
        </div>
      </div>
    </section>';
    }
  }

?>

<!-- product display card  -->





  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- <script src="assets/vendor/aos/aos.js"></script> -->
  <!-- <script src="assets/vendor/glightbox/js/glightbox.min.js"></script> -->
  <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script> -->
  <!-- <script src="assets/vendor/swiper/swiper-bundle.min.js"></script> -->
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  </body>

</html>