<?php
    $m = "";
    session_start();
    require_once "connection.php";
    if(!isset($_SESSION['email'])){
        header("location: login.php");
    }
    $email = $_SESSION['email'];
    $sql = "select `firstname` from `users` where `email`='$email'";
    if($conn->query($sql) == true){
        $res = $conn->query($sql);
        if($res->num_rows == 1){
            $row = mysqli_fetch_array($res);
            $player = $row['firstname'];
        }
    }
    if(isset($_POST['submit'])){
      $comment_section = $_POST['comments'];
      if(isset($comment_section) && !empty($comment_section)){
        $query1 = "select `id`, `firstname`, `lastname`, `email` from `users` where `email` = '$email'";
        if($conn->query($query1) == true){
          $result1 = $conn->query($query1);
          if($result1->num_rows > 0){
            $row1 = mysqli_fetch_assoc($result1);
            $id = $row1['id'];
            $firstname = $row1['firstname'];
            $lastname = $row1['lastname'];
            $email = $row1['email'];
            $qry = "insert into comments ( firstname, lastname, email, comment, id) values ('$firstname', '$lastname', '$email', '$comment_section', '$id')";
            if($conn->query($qry) == true){
              $m = '<div id="popup" style="display: block;"><h4>Thanks for giving Feedback.</h4></div>';
            }
          }
        }
      }else{
      $m = '<div id="popup" style="display: block;"><h4>Please provide a valid Feedback.</h4></div>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rock Paper Scissors</title>
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="css/creative.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/rps.css">
</head>
<body>
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
  <?php echo $m;?>
    <div class="container" style="position: relative; top: 90px;">
        <header class="header">
            <h1>Rock Paper Scissors</h1>
            <button id="restart" class="restart-btn">Restart Game</button>
            <div id="score" class="score">
                <p><?php echo $player;?>: 0</p>
                <p>Computer: 0</p>
            </div>
        </header>
        <h2>Make Your Selection</h2>
        <div class="fixed-size-container" style="position: relative;">
          <div class="fixed-size">
            <i id="rock" class="choice fas fa-hand-rock fa-10x"></i>
          </div>
          <div class="fixed-size">
            <i id="paper" class="choice fas fa-hand-paper fa-10x"></i>
          </div>
          <div class="fixed-size">
            <i id="scissors" class="choice fas fa-hand-scissors fa-10x"></i>
          </div>
        </div>
    </div>
    <div class="modal">
        <div id="result" class="modal-content"></div>
    </div>
    <form action="rps.php" method="POST">
      <div class="fixed-size-container" style="position: relative; background: rgb(50,50,50); height: fit-content; color: #ddd; top: 100px;">
        <div class="container text-center">
          <h2 class="mb-4">Your Feedback will be really appreciated:</h2>
          <textarea name="comments" placeholder="Write comments here ....."></textarea><br>
          <button type="submit" name="submit" class="comment">Comment!</button>
        </div>
      </div>
    </form>
    <div class="fixed-size-container" style="position: relative; top: 50px; height: fit-content;">
        <div class="container">
          <div class="small text-center text-muted">Copyright &copy; 2019 - old-<span
          style="color: orangered;">Games.com</span></div>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
    <script>
      const choices = document.querySelectorAll('.choice');
      const score = document.getElementById('score');
      const result = document.getElementById('result');
      const restart = document.getElementById('restart');
      const modal = document.querySelector('.modal');
      const scoreboard = { //An object with multiple values.
        <?php echo $player;?>: 0,
        computer: 0
      };

      // Play game
      function play(e) {
        restart.style.display = 'inline-block'; //Styling the restart button.
        const playerChoice = e.target.id; //Fetching the id of the clicked choice.i.e., rock or paper or scissors.
        const computerChoice = getComputerChoice(); //Calling function that choses random choices.i.e., rock or paper or scissors.
        const winner = getWinner(playerChoice, computerChoice);
        showWinner(winner, computerChoice);
      }

      // Get computer choice
      function getComputerChoice() {
        const rand = Math.random();
        if (rand < 0.34) {
          return 'rock'; //id = rock is returned to the function.
        } else if (rand <= 0.67) {
          return 'paper'; //id = paper is returned to the function.
        } else {
          return 'scissors'; //id = scissors is returned to the function.
        } 
      }

      // Get winner
      function getWinner(p, c) {
        if (p === c) {
          return 'draw';
        } else if (p === 'rock') {
          if (c === 'paper') {
            return 'computer';
          } else {
            return '<?php echo $player;?>';
          }
        } else if (p === 'paper') {
          if (c === 'scissors') {
            return 'computer';
          } else {
            return '<?php echo $player;?>';
          }
        } else if (p === 'scissors') {
          if (c === 'rock') {
            return 'computer';
          } else {
            return '<?php echo $player;?>';
          }
        }
      }

      function showWinner(winner, computerChoice) {
        if (winner === '<?php echo $player;?>') {
          // Increasing player score
          scoreboard.<?php echo $player;?>++;
          result.innerHTML = `
            <h1 class="text-win">You Win</h1>
            <i class="fas fa-hand-${computerChoice} fa-10x"></i>
            <p>Computer Chose <strong>${computerChoice.charAt(0).toUpperCase() +
              computerChoice.slice(1)}</strong></p>
          `;
        } else if (winner === 'computer') {
          // Increasing computer score
          scoreboard.computer++;
          result.innerHTML = `
            <h1 class="text-lose">You Lose</h1>
            <i class="fas fa-hand-${computerChoice} fa-10x"></i>
            <p>Computer Chose <strong>${computerChoice.charAt(0).toUpperCase() +
              computerChoice.slice(1)}</strong></p>
          `;
        } else {
          result.innerHTML = `
            <h1>It's A Draw</h1>
            <i class="fas fa-hand-${computerChoice} fa-10x"></i>
            <p>Computer Chose <strong>${computerChoice.charAt(0).toUpperCase() +
              computerChoice.slice(1)}</strong></p>
          `;
        }
        // Show score
        score.innerHTML = `
          <p><?php echo $player;?>: ${scoreboard.<?php echo $player;?>}</p>
          <p>Computer: ${scoreboard.computer}</p>
          `;

        modal.style.display = 'block';
      }

      // Restart game
      function restartGame() {
        scoreboard.<?php echo $player;?> = 0;
        scoreboard.computer = 0;
        score.innerHTML = `
          <p><?php echo $player;?>: 0</p>
          <p>Computer: 0</p>
        `;
      }

      // Clear modal
      function clearModal(e) {
        if (e.target == modal) {
          modal.style.display = 'none';
        }
      }
      function clear_popup(){
         l = document.getElementById('popup');
         l.style.display="none";
      }

      // Event listeners
      choices.forEach(choice => choice.addEventListener('click', play));
      window.addEventListener('click', clearModal);
      restart.addEventListener('click', restartGame);
      window.addEventListener('click', clear_popup);
    </script>
</body>
</html>