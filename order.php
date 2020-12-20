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
<div class="container-fluid jumbotron py-4">
  <div class="col text-center">
<img src="Images/Asp.net.Mvc.png" width="200" height="80" alt="">
  </div>
  
  <div class="row " style="padding-top: 100px;">
    
    <div class="col-md-4" style="padding-top: 40px;">
      <div class="lead text-center">
      <img src="Images/4.jpg" width="250" height="150">
      </div>
    </div>
    <div class="col" style="padding-top: 40px;">
      
      <h3><b>Customer Order </b></h3>
      <p>Customer Order system software ordering and searching items available in the stock.This database was build with <b>ASP.NET MVC</b>. A role base on stocking system
        was implemented to create permission base on role.The role of Admin.Project Manager restrict what the user
         can see and do.<br>
        The system was build with <b>ASP.NET MVC</b> and hosted on Azure Cloud.
      </p>
      <hr style="color: gray;height:0.5em;">
      <button class="btn btn-warning">Visit the Project</button>
      
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
