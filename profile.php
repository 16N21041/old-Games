<?php
    session_start();
    require_once "connection.php";
    if(!isset($_SESSION['email'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>old-Games</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic'
    rel='stylesheet' type='text/css'>
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  <!-- Theme CSS - Includes Bootstrap -->
  <link href="css/creative.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background: black; color: white;" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" style="color: white;" href="index.php">old-<span style="color: orangered;">Games</span></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="color: white;" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="color: white;" href="#services">Games</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="logout.php" style="color: orangered;">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">Welcome Back <?php echo '<span style="color: black;">'.$_SESSION['email'].'</span>'?></h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">In this hectic life, we all need to relax ourselves a little. So, what is the
            best way to relax rather than playing our favourite childhood games. So, lets get started palying.
          </p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Play Games!</a>
        </div>
      </div>
    </div>
  </section> -->
  <section class="page-section" id="services">
    <h2 class="text-center mt-0">Let's Play Games Now</h2>
    <hr class="divider my-4">
    <div class="fixed-size-container">
      <div class="fixed-size">
        <img src="img/snake.png" alt="Snake Game">
        <a href="snake.php">
          <div class="bt" style="font-family: 'Montserrat', sans-serif; font-weight: normal; padding-top: 10px;">
            <h5>Play</h5>
          </div>
        </a>
      </div>
      <div class="fixed-size">
        <img src="img/old-games.jpg" alt="Rock Paper Scissor">
        <a href="rps.php">
          <div class="bt" style="font-family: 'Montserrat', sans-serif; font-weight: normal; padding-top: 10px;">
            <h5>Play</h5>
          </div>
        </a>
      </div>
      <div class="fixed-size">
        <img src="img/tictactoe.jpg" alt="Tic Tac Toe" style="border: 2px solid black;">
        <a href="profile.php" style="text-decoration: none;">
          <div class="bt" style="font-family: 'Montserrat', sans-serif; font-weight: normal; padding-top: 10px;">
            <h5>Play</h5>
          </div>
        </a>
      </div>
    </div>
  </section>
  <section class="page-section bg-dark text-white">
    <div class="container text-center">
      <h2 class="mb-4">Got to go to work? Don't worry just click <span style="color: orangered;">logout</span> below</h2>
      <a class="btn btn-light btn-xl" href="logout.php">Logout</a>
    </div>
  </section>
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we
            will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+91 (730) 158-7683</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
          <a class="d-block" href="mailto:kjoshi.inbox@gmail.com">kjoshi.inbox@gmail.com</a>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - old-<span
          style="color: orangered;">Games.com</span></div>
    </div>
  </footer>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>
</body>

</html>
