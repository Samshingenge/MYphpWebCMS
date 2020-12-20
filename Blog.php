<?php require_once("Includes/DB.php");?>
<?php require_once("Includes/Functions.php");?>
<?php require_once("Includes/Sessions.php");?>

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
      <li class="nav-item">
          <a href="About Us.php" class="nav-link">About Us</a>
      </li>
      <li class="nav-item">
          <a href="Skill.php" class="nav-link">My Skill</a>
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
    //SQL query when search button is active
     if (isset($_GET["SearchButton"])) {
      $Search=$_GET["Search"];
      $sql = "SELECT * FROM posts
      WHERE datetime LIKE :search OR title LIKE :search OR category
      LIKE :search OR post LIKE :search";
      $stmt = $ConnectingDB->prepare($sql);
      $stmt->bindValue(':search','%'.$Search.'%');
      $stmt->execute();
      //Query when Pagination is Active i.e Blog.php?Page=1
    }elseif (isset($_GET["page"])) {
      $Page = $_GET["page"];
    //  $ShowPostFrom = 0;
    if ($Page==0||$Page<1) {
      $ShowPostFrom=0;
    }else{
      $ShowPostFrom=($Page*5)-5;
    }
      $sql = "SELECT * FROM posts ORDER BY id desc LIMIT $ShowPostFrom,5";
      $stmt=$ConnectingDB->query($sql);
    }
    elseif (isset($_GET["category"])) {
      $Category = $_GET["category"];
      $sql = "SELECT * FROM posts WHERE category='$Category' ORDER BY id desc";
      $stmt=$ConnectingDB->query($sql);
    }

    else {
      $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,3";
      $stmt = $ConnectingDB->query($sql);
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
          <span style="float:right;" class="badge badge-dark text-light">Comments
            <?php echo ApproveCommentsAccordingtoPost($PostId); ?>
           </span>

          <hr>
          <p class="card-text">
            <?php if (strlen($PostDescription)>150) {$PostDescription = substr($PostDescription,0,150)."...";} echo htmlentities($PostDescription);?></p>
          <a href="FullPost.php?id=<?php echo $PostId;?>" style="float:right;">
            <span class="btn btn-info">Read More >> </span>
          </a>
        </div>
      </div>
      <br>
    <?php  } ?>


    <!-- Pagination Start -->
<nav>
  <ul class="pagination pagination-lg">
    <!-- Creating a foward button -->
    <?php
    if (isset($Page)) {
      //if forward button click next jumt to next one mysqlnd_$Page_get_available
      if ($Page>1) {?>
     <li class="page-item">
     <a href="Blog.php?page=<?php echo $Page-1; ?>" class="page-link">&laquo;</a>
     </li>
     <?php } }?>
    <!-- Creating a foward button -->
<li>
<?php
global $ConnectingDB;
$sql = "SELECT COUNT(*) FROM posts";
$stmt=$ConnectingDB->query($sql);
$RowPagination=$stmt->fetch();
$TotalPosts = array_shift($RowPagination);
//echo $TotalPosts.("<br>");
$PostPagination = $TotalPosts/5;
$PostPagination=ceil($PostPagination);
// echo $PostPagination;
for ($i=1; $i <=$PostPagination ; $i++) {
  if (isset($Page)) {
    if ($i==$Page) {
  ?>
<li class="page-item active">
<a href="Blog.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
</li>
<?php
}else{?>
  <li class="page-item">
  <a href="Blog.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
  </li>

<?php }}}?>
<!-- Creating a foward button -->
<?php
if (isset($Page)&&!empty($Page)) {
  //if forward button click next jumt to next one mysqlnd_$Page_get_available
  if ($Page+1<= $PostPagination) {?>
 <li class="page-item">
 <a href="Blog.php?page=<?php echo $Page+1; ?>" class="page-link">&raquo;</a>
 </li>
 <?php } }?>
<!-- Creating a foward button -->
  </ul>
</nav>
<!-- ENDS of navabar back & forward buttons -->


    </div>
    <!-- Pagination ENDS -->
    <!-- the rest of the body in footer.php -->

<?php  require_once("footer.php");?>
