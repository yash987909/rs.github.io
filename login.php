<?php
session_start();

//already login
if (isset($_SESSION['emai'])) {
  header("location: index.php");
  exit;
}

require_once "config.php";
$email = $password = "";
$err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (empty(trim($_POST['email'])) || empty(trim($_POST['password']))) {
    $err = "Email or password is wrong!!";
  } else {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
  }

  if (empty($err)) {
    $sql = "SELECT User_ID,email,firstname,password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_email);
    $param_email = $email;
    //execute
    if (mysqli_stmt_execute($stmt)) {
      mysqli_stmt_store_result($stmt);
      if (mysqli_stmt_num_rows($stmt) == 1) {
        mysqli_stmt_bind_result($stmt, $User_ID, $email, $firstname, $hashed_password);
        if (mysqli_stmt_fetch($stmt)) {
          if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION["email"] = $email;
            $_SESSION["User_ID"] = $User_ID;
            $_SESSION["loggedin"] = true;
            $_SESSION["firstname"] = $firstname;

            //redirect to home
            header("location: index.php");
          }
          else{
            $err = "Wrong Email or Password. Please Try again";
          }
        }
      } else {
        $err = "Wrong Email or Password. Please Try again";
      }
    } else {
      $err = "Wrong Email or Password. Please Try again";
    }
  }
}

?>

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

<body>
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
          <li><a href="about.php">About</a></li>
          <li><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign Up</a></li>
          <!-- <li><a href="https://www.amazon.in/Apple-iPhone-128GB-Space-Black/dp/B0BDJ7P6NG/ref=sr_1_1">Iphone</a></li> -->
        </ul>
      </nav><!-- .navbar -->

      <?php
      if (isset($_SESSION['loggedin'])) {
        if ($_SESSION['loggedin'] == true) {
          echo '<div>
          <a class="btn-book-a-table dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ' . $_SESSION['firstname'] . '
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
      } else {
        echo '<a class="btn-book-a-table" href="signup.php">Sign Up</a>
          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>';
      }


      ?>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>



    </div>
  </header><!-- End Header -->

  <section class="" style="background-color: #000000;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <!-- <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div> -->
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="" method="post">

                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">RS</span>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                    <?php
                    if ($err) {
                      echo '
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        ' . $err . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }

                    ?>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example17">Email address</label>
                      <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" />
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form2Example27">Password</label>
                      <p>
                      <input type="password" name="password" id="password" class="form-control form-control-lg"/>
                      <i class="bi bi-eye-slash" id="togglePassword"></i>
                      </p>
                    </div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                    </div>

                    <!-- <a class="small text-muted" href="#!">Forgot password?</a> -->
                    <p class="mb-2 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="signup.php"
                        style="color: #393f81;">Register here</a></p>
                    Forgot Password? <a href="forgotpassword.php" style="color: #393f81;">Click here</a></p>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <!-- <script src="assets/vendor/aos/aos.js"></script> -->
  <!-- <script src="assets/vendor/glightbox/js/glightbox.min.js"></script> -->
  <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script> -->
  <!-- <script src="assets/vendor/swiper/swiper-bundle.min.js"></script> -->
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    const togglePassword = document
      .querySelector('#togglePassword');

    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', () => {

      // Toggle the type attribute using
      // getAttribure() method
      const type = password
        .getAttribute('type') === 'password' ?
        'text' : 'password';

      password.setAttribute('type', type);

      // Toggle the eye and bi-eye icon
      this.classList.toggle('bi-eye');
    });
  </script>

</body>

</html>