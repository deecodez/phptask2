<?php session_start(); 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to BrainAcademy: We nuture future leader</title>

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-md navbar-dark fixed-top" id="banner">
	<div class="container">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php"><span>StartNg Hospital</span></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <?php if(!isset($_SESSION['loggedIn'])){ ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">Register</a>
      </li> 

      <?php }else{ ?>
        <li class="nav-item">
        <a class="nav-link" href="patient.php">Dashboard</a>
      </li> 
        <li class="nav-item">
        <a class="nav-link" href="reset.php">Reset Password</a>
      </li> 
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li> 
            <?php } ?>
	
    </ul>
  </div>
	</div>
</nav>
    
