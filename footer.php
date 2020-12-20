<!-- Side Area start -->
  <div class="col-sm-4">
<div class="card mt-4">
  <div class="card-body">
    <img src="Images/start.jpg" class="d-block img-fliud ml-4" alt="">
    <div class="text-center">
      This book is very enermous and magnificent load of not beign you but success! order now...
      This book is very enermous and magnificent load of not beign you but success! order now...

    </div>
  </div>
</div>
<br>
<div class="card">
<div class="card-header bg-dark text-light">
<h2 class="lead">Sign Up !</h2>
</div>

<p style="background-color: #1c2a48; color:white;padding:10px;text-align:center;">Subscribe</p>
    
    <form method="POST" action="Blog.php">
    <?php

require_once("Subscribe/DB.php");
if(isset($_POST["Submit"])){
  if (!empty($_POST["SName"])&&!empty($_POST["SEmail"])) {
    $SName = $_POST["SName"];
    $SEmail = $_POST["SEmail"];
    
    global $ConnectingDBv;
    $sql1 = "INSERT INTO newsletter(name,email)
    VALUES(:namE,:emaiL)";
    $stmt1=$ConnectingDBv->prepare($sql1);
    $stmt1->bindValue('namE',$SName);
    $stmt1->bindValue('emaiL',$SEmail);
    
    $Execute = $stmt1->execute();
    if ($Execute) {
      echo '<span class="success">  Successfully added to news letters</span>';
    }
  }else {
    echo '<span class="FieldInfoHeading">Please add your Name or email</span>';
  }
}

?>

    <div class="container_news" style="color:black;">
    <input type="text" placeholder="Name" name="SName" required>
    <input type="text" placeholder="Email address" name="SEmail" required>
    
    </div>
    <div class="container_news">
    <input type="submit" name="Submit" value="Subscribe">
    </div>
    </form>

</div>
<br>
<div class="card">
  <div class="card-header bg-primary text-light">
    <h2 class="lead">Categories</h2>
    </div>
    <div class="card-body">
      <?php
      global $ConnectingDB;
      $sql = "SELECT * FROM category ORDER BY id desc";
      $stmt = $ConnectingDB->query($sql);
      while ($DataRows=$stmt->fetch()) {
        $CategoryId = $DataRows["id"];
        $CategoryName = $DataRows["title"];
        ?>
        <a href="Blog.php?category=<?php echo $CategoryName; ?>"><span class="heading"><?php echo $CategoryName;  ?></span></a><br>

    <?php  } ?>


  </div>

</div>
<br>
<div class="card">
  <div class="card-header bg-info text-white">
    <h2 class="lead"> Recent Posts</h2>
  </div>
  <div class="card-body">
    <?php
    global $ConnectingDB;
    $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
    $stmt = $ConnectingDB->query($sql);
    while ($DataRows=$stmt->fetch()) {
      $Id =$DataRows["id"];
      $Title =$DataRows["title"];
      $DateTime =$DataRows["datetime"];
      $Image =$DataRows["image"];



    ?>
    <div class="media">
      <img src="uploads/<?php echo htmlentities($Image); ?>"  class="d-block img-fluid align-self-start" width="90" height="94" alt="">
      <div class="media-body ml-2">
        <a href="FullPost.php?id=<?php echo htmlentities($Id) ; ?>" target="_blank"> <h6 class=" lead"><?php echo htmlentities($Title); ?></h6> </a>
        <p class="small"><?php echo htmlentities($DateTime); ?></p>
      </div>
    </div>
    <hr>
    <?php  } ?>
  </div>
</div>
  </div>
  <!-- side area ENDS -->
  </div>
</div>
<!--Heading ENDS-->
<br>
<!--FOOTER BEGINS-->
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
