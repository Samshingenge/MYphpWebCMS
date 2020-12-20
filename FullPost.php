 <?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>
<?php $SearchQueryParameter = $_GET["id"];?>
<?php if (isset($_POST["Submit"])){
$Name = $_POST["CommenterName"];
$Email= $_POST["CommenterEmail"];
$Comment = $_POST["CommenterThoughts"];
$CurrentTime=time();
$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);

if (empty($Name)||empty($Email)||empty($Comment)) {
  $_SESSION["ErrorMessage"] = "All fields must be filled out ";
  Redirect_to("FullPost.php?id={$SearchQueryParameter}");
}elseif (strlen($Comment)>500) {
  $_SESSION["ErrorMessage"] = "Comment length should be less than 500 characters";
    Redirect_to("FullPost.php?id={$SearchQueryParameter}");
}else {
  $sql = "INSERT INTO comments(datetime,name,email,comment,approvedby,status,post_id)";//no chance for SQL Injection
  $sql.= "VALUES(:dateTime,:name,:email,:comment,'pending','OFF',:postIdFromURL)";//$PostIdFromURL
  $stmt = $ConnectingDB->prepare($sql);
  $stmt->bindValue(':dateTime',$DateTime);
  $stmt->bindValue(':name',$Name);
  $stmt->bindValue(':email',$Email);
  $stmt->bindValue(':comment',$Comment);
  $stmt->bindValue(':postIdFromURL',$SearchQueryParameter);
  $Execute=$stmt->execute();

  if($Execute){
    $_SESSION["SuccessMessage"]="Comment Submitted  Successfully";
    Redirect_to("FullPost.php?id={$SearchQueryParameter}");
  }else {
    $_SESSION["ErrorMessage"]="Something went wrong.Try Again";
    Redirect_to("FullPost.php?id={$SearchQueryParameter}");
  }
 }
}
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
    <link rel="stylesheet" href="Subscribe/style.css">
    <script src="js/bootstrapjquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/proper.js"></script>
    <script src="js/tooltip.js"></script>

    <title>Full Post Page</title>
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
      <li class="nav-item">
          <a href="#" class="nav-link">About Us</a>
      </li>
      <li class="nav-item">
          <a href="Skill.php" class="nav-link">My Skill</a>
      </li>
      <li class="nav-item">
          <a href="Projects.php" class="nav-link">Projects</a>
      </li>
      <li class="nav-item">
          <a href="Blog.php?page=1" class="nav-link">My Blog</a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">Contact Us</a>
      </li>
      <li class="nav-item">
          <a href="#" class="nav-link">Features</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <form class="form-inline d-none d-sm-block" action="Blog.php">
        <div class="form-group">
          <input class="form-control mr-2" type="text" name="Search" placeholder="Search here" value="">
          <button class="btn btn-primary" name="SearchButton">Go</button>
        </div>
      </form>
    </ul>
    </div>
  </div>
</nav>
<div style="height:10px; background:#27aae1;"></div>
<!--Navbar END-->
<!--Heading BEGINS-->
<div class="container">
  <div class="row">

  <div class="col-sm-8 ">
    <h1>The Complete Responsive CMS Blog</h1>
    <h1 class="lead">The Complete Blog by Using PHP by Sam N Shingenge</h1>
    <?php
    echo ErrorMessage();
    echo SuccessMessage();
    ?>
    <?php
    global $ConnectingDB;
     if (isset($_GET["SearchButton"])) {
      $Search=$_GET["Search"];
      $sql = "SELECT * FROM posts
      WHERE datetime LIKE :search OR title LIKE :search OR category
      LIKE :search OR post LIKE :search";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':search','%'.$Search.'%');
      $stmt->execute();
    }

    else {
      $PostIdFromURL = $_GET["id"];
      if (!isset($PostIdFromURL)) {
        $_SESSION["ErrorMessage"]="Bad Request!";
        Redirect_to("Blog.php");
      }
      $sql = "SELECT * FROM posts WHERE id='$PostIdFromURL'";
      $stmt = $ConnectingDB->query($sql);
      $Result=$stmt->rowcount();
      if ($Result!=1) {
        $_SESSION["ErrorMessage"]="Bad Request !";
        Redirect_to("Blog.php?page=1");
      }
    }

     while ($DataRows=$stmt->fetch()) {
       $PostId            =$DataRows["id"];
       $DateTime          =$DataRows["datetime"];
       $PostTitle         =$DataRows["title"];
       $Category          =$DataRows["category"];
       $Admin             =$DataRows["author"];
       $Image             =$DataRows["image"];
       $PostDescription   =$DataRows["post"];


     ?>
      <div class="card">
        <img src="uploads/<?php echo htmlentities($Image);?>" style="max-height:450px;" class="img-fluid card-img-top"/>
        <div class="card-body">
          <h4 class="card-title"><?php echo  htmlentities($PostTitle); ?></h4>
          <small class="text-muted">Category: <span class="text-dark"> <a href="Blog.php?category=<?php echo htmlentities($Category); ?>"> <?php echo htmlentities($Category); ?> </a></span> Written by <span class="text-dark"><a href="Profile.php?username=<?php echo htmlentities($Admin); ?>">
            <?php echo htmlentities($Admin);?></a>
          </span> On
            <span class="text-dark"><?php echo htmlentities($DateTime);?> </span></small>


          <hr>
          <p class="card-text">
            <?php echo nl2br($PostDescription);?></p>
        </div>
      </div>
    <?php  } ?>
<!--Comment Port Start-->

<!--Fetching existing comment Start-->
<span class="FieldInfo">Comments</span>
<br><br>
<?php
global $ConnectingDB;
$sql = "SELECT * FROM comments WHERE post_id='$SearchQueryParameter'
AND status='ON'";
$stmt = $ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch()) {
  $CommentDate = $DataRows['datetime'];
  $CommenterName = $DataRows['name'];
  $CommentContent= $DataRows['comment'];

?>
<div>

  <div class="media CommentBlock" style="background-color:#F6F7F9;">
    <img class="d-block img-fluid align-self-start" src="Images/comment.png" alt="">
    <div class="media-body ml-2">
    <h6 class="lead"><?php echo $CommenterName; ?></h6>
    <p class="small"><?php echo $CommentDate; ?></p>
    <p><?php echo $CommentContent; ?></p>
    </div>
  </div>
</div>
<hr>
<?php } ?>
<!--Fetching existing comment End-->
    <div class="">
<form class="" action="FullPost.php?id=<?php echo $SearchQueryParameter ?>" method="post">
  <div class="card mb-3">
    <div class="card-header">
      <h5 class="FieldInfo">Share your thoughts about this post</h5>
    </div>
    <div class="card-body">
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-user"></i></span>
          </div>
          <input class="form-control" type="text" name="CommenterName" placeholder="Name" value="">
        </div>
      </div>
      <div class="form-group">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
          </div>
          <input class="form-control" type="email" name="CommenterEmail" placeholder="Email" value="">
        </div>
      </div>
      <div class="form-group">
        <textarea name="CommenterThoughts" class="form-control" rows="6" cols="80"></textarea>
      </div>
      <div class="">
          <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>
    </div>
    <!--Comment Port End-->
  </div>
<!--MAIN side area END-->

<!-- the rest of the body in footer.php -->

<?php require_once("footer.php"); ?>
