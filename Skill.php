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
      .boxDiv{
        min-height: 150px;
        padding-left: 20px;
        padding-top: 20px;
        background-color: white;
        font-weight: bold;
        color: gray;
      }

      
      
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
<div class="container jumbotron py-1 mb-6">
<div class="row">
<div class="text-heading">
<h1 class="col"><b>Skills</b></h1>
<p>I am creative problem solver. I build fullstack web and mobile applications.I use Java, C#,ASP.net,SQL,Xamarin,Php/Bootstrap-JavaScript/html-Css.I have highlighted my key 
  technical skills that I will bring to your project.
</p>
</div>
</div>
  <div class="row text-center ">

      <div class="col-lg-4 col-md-8">
      <div class="boxDiv">
      <img src="Images/java.png"  width="100" height="100" alt="">
        <h4><b>Java Development</b></h4>
        <p>I use java on daily basis to build database management system project.Java is more efficient match.
           See examples work implements Java in my projects section.
        </p>
      </div>  
    </div>
    
      <div class="col-lg-4 col-md-8"> 
      <div class="boxDiv">
      <img src="Images/c.png"  width="100" height="100" alt="">
      <h4><b>C# Development</b></h4>
        <p>I use C# to build website and mobile application.
        C# can be used to create almost anything but is particularly strong at building (UI) Windows desktop applications.
        </p>
      </div>
      </div>

      <div class="col-lg-4 col-md-8"> 
      <div class="boxDiv">
      <img src="Images/net_mvc.png"  width="100" height="100" alt="">
        <h4><b>Full Stack Dev</b></h4>
        <p>I have proven design patterns and frameworks to build websites.ASP.net and MVC fits the bill for most projects.Visit my projects to see my some dynamic example.
        </p>
      </div>
      </div>
    
  </div>
  <div class="row text-center">

  <div class="col-lg-4 col-md-8">
  <div class="boxDiv">
  <img src="Images/sql1.png" class="py-2" width="100" height="100" alt="">
        <h4><b>Database Development</b></h4>
        <p>Database Development is critical to most of my entire projects .I have build, established and importantly in SQL Development from Query, to design.
        </p>
  </div>
  </div>

      <div class="col-lg-4 col-md-8"> 
      <div class="boxDiv">
      <img src="Images/x.png" class="py-2"  width="100" height="100" alt="">
        <h4><b>Mobile Development</b></h4>
        <p>Xamarin is cross platform native mobile development platform. This allows me to create mobile applications that run on iSO and Android.
        </p>
      </div>
      </div>

      <div class="col-lg-4  col-md-8"> 
      <div class="boxDiv">
      <img src="Images/php_emblem.png" class="py-2"  width="100" height="100" alt="">
        <h4><b>Php Development</b></h4>
        <p>The look and feel are very important elements to any project. I utilise php and bootstrap to bring an attractive and responsive
          design to your web project.
        </p>
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
