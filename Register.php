<?php require_once("function/config.php");?>

<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
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
    <style media="screen">
    .heading{
      font-family: Bitter,Georgia,"Times New Roman",Times,serif;
      font-weight: bold;
      color: #005E90;
    }
    .heading:hover{
      color: #0090DB;
    }

    </style>
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
     <a href="loginLog.php"><button class="btn btn-danger mr-1"> Login </button></a>
     <a href="Register.php"><button class="btn btn-success"> Register </button></a>
    
    </div> 
  </div>
</nav>
<div style="height:10px; background:#27aae1;"></div>
<!--Navbar END-->
<!--Heading BEGINS-->

<div class="container">
<div class="row">
  <div class="col-sm-8">
<div class="card bg-light mt-5 py-2">

 <div class="card-title" >
     <h2 class="text-center  mt-2"> Registration Form</h2>
    <hr style="color: gray;height:1em;width:224px">
 </div>
 <div class="card-body">
   <?php user_validation();?>
     <form method="post">
     <input type="text" name="FirstName" placeholder="First Name" class="form-control py-2 mb-2" required>
     <input type="text" name="LastName" placeholder="Last Name" class="form-control py-2 mb-2" required>     
     <input type="text" name="UserName" placeholder="User Name" class="form-control py-2 mb-2" required>
    <input type="email" name="Email" placeholder="Email" class="form-control py-2 mb-2" required>
    <input type="password" name="pass" placeholder="Password" class="form-control py-2 mb-2" required>
    <input type="password" name="cpass" placeholder="Confirm Password" class="form-control py-2 mb-2" required>
    <button class="btn btn-success float-right" > Register Now</button>
     </form>
</div>
</div>
  </div>

    <!-- the rest of the body in footer.php -->

<?php  require_once("footer.php");?>
