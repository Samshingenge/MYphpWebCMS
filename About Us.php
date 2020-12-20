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
      /* html{
        height: 100%;
      }
      body{
        margin: 0;
        min-height:100%;
        display: flex;
        flex-direction: column;
      } */
      section{
        width: 100vw;
        height: 100vh;
        padding: 50px;
        
      }

      /* footer{
        margin-top: auto;

      } */
   
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
<div class="container jumbotron py-4 mb-0">
<div class="row text-center ">
          <div class="col-lg-12" >
            <div class=""><h1>About</h1></div>
            
            <br>
            
            <h2>Freelancing</h2>
            <p>Got to know About me </p>
            <hr style="color: gray;height:0.5em;">
          </div>
  <!-- </div>
      <div class="row "> -->
    
          <div class="col-md-4">
            <div class="lead text-center">
            <img src="Images/Identity.jpg"  alt="Profile Photo" class="img-circle" width="220" height="250">
            </div>
          </div>
          <div class="col">
            <div>
                  <h6 style="color:orangered">Who am I?</h6>
                  <h3><b>I am Sam Natangwe Shingenge a FullStack Web and Mobile Developer </b></h3>
                  <p>I am software Developer based in Namibia South West Africa and I have been building applications websites for years, which bring companies ideas to life.
                    I help convert a vision and ideas into meaningful and software products.Having the ability transform requirements into useful software helps me prioritize 
                  task,iterate fast and deliver fast.Take look at my Portfolio work and let's see if can work together on the next projects</p>
                  <hr style="color: gray;height:0.5em;">
                  <button class="btn btn-primary">Download resume </button>
                  <button class="btn btn-warning"><a href="Project.php" class="text-white"> My work </a>  </button>
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
