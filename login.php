<?php
session_start();
$error = "";
require_once "connection.php";
if(isset($_POST['submit'])){
  $email = strip_tags(mysqli_real_escape_string($conn, $_POST['email']));
  $password = strip_tags(mysqli_real_escape_string($conn, md5($_POST['password'])));
  if(isset($email) && isset($password)){
    $sql = "select * from `users` where `email` = '$email' and `password` = md5('$password')";
    if($conn->query($sql) == true){
      $res = $conn->query($sql);
      if($res->num_rows == 1){ 
        $_SESSION['email'] = $email;
        header("location: profile.php");
      }else{
        $error = "Invalid Email or Password!";
      }
    }else{
      $error = "Unexpected Error Occurred!";
    }
  }
}
?>

<!--Login Form Here-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>old-Games</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
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
            <a class="nav-link js-scroll-trigger" style="color: white;" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" style="color: white;" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="signup.php" style="color: orangered;">Signup</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<div class="container" style="position: relative; top: 80px;">
<hr>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <form method="POST" action="login.php">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" class="form-control" placeholder="Enter password" type="password">
                </div>                                      
                <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-primary btn-block"> Login </button>
                </div>  
                <div class="form-group">
                    <center><h5 style="color: red;"><?php echo $error; ?></h5><cemter> 
                </div>        
                <p class="text-center">Don't have an account? <a href="signup.php">Signup</a> </p>                                                                 
            </form>
        </article>
    </div>
</div>
  <section class="page-section bg-primary" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">We've got the games that you need :)</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4">In this hectic life, we all need to relax ourselves a little. So, what is the
            best way to relax rather than playing our favourite childhood games. So, lets get started palying.
          </p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="login.php">Login First</a>
        </div>
      </div>
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
  <script src="js/creative.min.js"></script>
</body>
</html>