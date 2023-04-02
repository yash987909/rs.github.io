<!doctype html>
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
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

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
  <header id="header" class="header fixed-top d-flex align-items-center " style="background-color: #baff00;">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>RS</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign Up</a></li>
          <!-- <li><a href="https://www.amazon.in/Apple-iPhone-128GB-Space-Black/dp/B0BDJ7P6NG/ref=sr_1_1">Iphone</a></li> -->
        </ul>
      </nav><!-- .navbar -->

      <?php
      session_start();
      if(isset($_SESSION['loggedin'])){
        if($_SESSION['loggedin']==true){
          echo '<div>
          <a class="btn-book-a-table dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            '.$_SESSION['firstname'].'
          </a>
  
          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="#">Change password</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
          </div>';
        }
      }  
      else{
          echo '<a class="btn-book-a-table" href="signup.php">Sign Up</a>
          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>';
      }

       
      ?>



    </div>
  </header><!-- End Header -->

  <section class="" style="background-color: #000000;">
    <div class="container py-5 h-100">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="">
          <div class="card" style="border-radius: 1rem;">
            <div class="">
              <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div> -->
              <div class="d-flex align-items-center">
                <div class="card-body text-black">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">About Our Website</span>
                    </div>
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h2 fw-bold mb-0">RS (Recommendation System)</span>
                    </div>

                    <h5 style="letter-spacing: 1px;">This website help us to get the price of similar product from different webiste like flipkart and reliance digital so that we can buy the product in cheap.</h5>
                    <h5 class="my-4" style="letter-spacing: 1px;">This website fetch the product price in realtime and display it to the page then you can buy the product directly from the ecommerce website</h5>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>