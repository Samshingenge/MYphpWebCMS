<?php  require_once('function/config.php');?>
<?php
$sql = "SELECT * FROM users";
$query = Query($sql);
confirm($query);
$row = fetch_data($query);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X_UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/bootstrap.css">
    <link rel="stylesheet" href="Css/fonts.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="Css/style.css">
    <script src="js/bootstrapjquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/proper.js"></script>
    <script src="js/tooltip.js"></script>

    <title>Blog Page</title>
  
  </head>
  <body>
    <!--NAVBAR Start-->
<div style="height:10px; background:#27aae1;"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a href="#" class="navbar-brand"> SAMNSHINGENGE.COM</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
        <span class="navbar-toggler-icon">

        </span>
    </button>
      <div class="collapse navbar-collapse" id="navbarcollapseCMS">
    <ul class="navbar-nav mr-auto"  >

      <li class="nav-item">
          <a href="Home.php" class="nav-link">Home</a>
      </li>
      </li>
      <li class="nav-item">
          <a href="Skill.php" class="nav-link">Services</a>
      </li>
      <li class="nav-item">
          <a href="About Us.php" class="nav-link">About Us</a>
      </li>
      </ul>
      <u>
        <li> <a href="loginLog.php"><button class="btn btn-danger mr-1"> Login </button></a></li>
        <li><a href="Register.php"><button class="btn btn-success"> Register </button></a></li>
      </u>
    </div>
  </div>
</nav>
<div style="height:10px; background:#27aae1;"></div>
<!--Navbar END-->
<!--Heading BEGINS-->

<div class="container">
<div class="row">
  <div class="col-sm-8">
<div class="card bg-light mt-1">
  <?php display_message();?>
  <h1 class="text-center"> Page Register Index Page</h1>
</div>
  </div>

    <!-- the rest of the body in footer.php -->

<?php  require_once("footer.php");?>
