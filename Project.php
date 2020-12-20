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

    <title>Sam.com</title>
    <style>
      
      .container1{
        width: 100vw;
        height: 100vh;
        
        
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
    <ul class="navbar-nav ml-auto"  >

      <li class="nav-item">
          <a href="Home.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item">
          <a href="About Us.php" class="nav-link">About Us</a>
      </li>
      <li class="nav-item">
          <a href="Skill.php" class="nav-link">My Skills</a>
      </li>
      <li class="nav-item">
          <a href="Project.php" class="nav-link">Projects</a>
      </li>
      <li class="nav-item">
          <a href="Blog.php?page=1" class="nav-link">My Blog</a>
      </li>
      <li class="nav-item">
          <a href="Contact.php" class="nav-link">Contact Us</a>
      </li>
      
    </ul>

    </div>
  </div>
</nav>
<div style="height:10px; background:#27aae1;"></div>
<!--Navbar END-->
<!--Heading BEGINS-->

<!--Heading ENDS-->
<div class="container jumbotron py-5">
<div class="row">
<div class="text-heading">
<h1 class="col"><b>Projects</b></h1>
<p>Showcasing complete functional projects demonstrates what can I bring to your projects . I build this this projects from the ground up to  demonstrate skill font 
  technical skills that I will bring to your project.
</p>
</div>
</div>
  <div class="row">
<!-- CARD PROJECT 1 -->
      <div class="col-md-4 col-sm-8">
      <div class="card text-center">
      <div class="card-block">
        <img src="Images/data.jpg" alt="" class="img-fluid">
      <div class="card-title">
      <h1>Database</h1>
      </div>
      <div class="card-text">
      This a database design for a retail design for keeping items and searching with unique Id.
      </div>
      <a style="margin-top: 10px;margin-bottom:10px;" href="Data.php" class="btn btn-warning">View</a>
      </div>
      </div>  
    </div>
    
    <div class="col-md-4 col-sm-8">
      <div class="card text-center">
      <div class="card-block">
        <img src="Images/4.jpg" alt="" class="img-fluid">
      <div class="card-title">
      <h1>Customer Order</h1>
      </div>
      <div class="card-text">
      This a Customer Order software System is build order of products.With robust selection.
      </div>
      <a style="margin-top: 10px;margin-bottom:10px;" href="order.php" class="btn btn-success">View</a>
      </div>
      </div>  
    </div>

    <div class="col-md-4 col-sm-8">
      <div class="card text-center">
      <div class="card-block">
        <img src="Images/food.png" alt="" class="img-fluid">
      <div class="card-title">
      <h1>Food Deliver</h1>
      </div>
      <div class="card-text">
      This is a mobile food delivering software.Select various of food and drink to be deliver.
      </div>
      <a style="margin-top: 10px;margin-bottom:10px;" href="food.php" class="btn btn-success">View</a>
      </div>
      </div>  
    </div>

  </div>
</div>

<!--FOOTER BEGINS-->
<div style="height:10px; background:#27aae1;"></div>
<footer class="bg-dark text-white">
<div class="container">
  <div class="row">
    <div class="col">
      <p class="lead text-center">Theme By | Sam | <span id="year"></span>&copy; --All right Reserved</p>
    </div>
  </div>
</div>
</footer>
<div style="height:10px; background:#27aae1;"></div>
<!--FOOTER ENDS-->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body >
</html>
