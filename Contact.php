
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
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/proper.js"></script>
    <script src="js/tooltip.js"></script>

    <title>Sam.com</title>
    <style type="text/css" >
input[type="text"],input[type="email"],textarea{
	border: 1px solid dashed;
	background-color:rgb(221,216,212);
	width:700px;
	padding:.5em;
	font-size:1.5em;
}
.Error{
	color:red;
}
input[type="Submit"]{
	font-size:1.5em;
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
  <div class="col text-center">
<?php ?>

	 <h2>Send me email</h2>
	
	<form action="Contact.php" method="post">
		<div class="text-white" style="background-color: orange;">
		<?php
$NameError="";
$EmailError="";
$GenderError="";
$WebsiteError="";

	

	if(isset($_POST['Submit'])){ 
		if(empty($_POST["Name"])){
			$NameError="Name is Required";
	}
	else{
		$Name=Test_User_Input($_POST["Name"]); 
		if(!preg_match("/^[A-Za-z\. ]*$/",$Name)){
		$NameError="Only Letters and white space are allowed";
		}
	 }
	 if(empty($_POST["Email"])){
			$EmailError="Email is Required";
	}else{
		$Email=Test_User_Input($_POST["Email"]); 
		if(!preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Email)){
			$EmailError="Invalid Email Format";
		}
	 }
	 if(empty($_POST["Gender"])){
			$GenderError="Gender is Required";
	}else{
		$Gender=Test_User_Input($_POST["Gender"]); 
	 }
	 if(empty($_POST["Website"])){
			$WebsiteError="Website is Required";
	}else{
		$Website=Test_User_Input($_POST["Website"]); 
		if(!preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$Website)){
			
			$WebsiteError="Invalid Website Format";
		}
	 }
	 
	 if(!empty($_POST["Name"])&&!empty($_POST["Email"])&&!empty($_POST["Gender"])&&!empty($_POST["Website"])&&!empty($_POST["Comment"])){
		 if((preg_match("/^[A-Za-z\. ]*$/",$Name)==true)&&(preg_match("/[a-zA-Z0-9._-]{3,}@[a-zA-Z0-9._-]{3,}[.]{1}[a-zA-Z0-9._-]{2,}/",$Email)==true)&&(preg_match("/(https:|ftp:)\/\/+[a-zA-Z0-9.\-_\/?\$=&\#\~`!]+\.[a-zA-Z0-9.\-_\/?\$=&\#\~`!]*/",$Website)==true))
			 {	
				echo "<h2>Your Submit Information</h2> <br>";
				echo "Name:".ucwords ($_POST["Name"])."<br>";
				echo "Email: {$_POST["Email"]}<br>";
				echo "Gender: {$_POST["Gender"]}<br>";
				echo "Website: {$_POST["Website"]}<br>";
				echo "Comment: {$_POST["Comment"]}<br>"; 
				$emailTo="samblogshingenge@gmail.com";
				$subject="Contact Form";
				$body=" A Person name : ".$_POST["Name"]." With the Email : ".$_POST["Email"].
				" Have Gender : ".$_POST["Gender"]." Have a Website of : ".$_POST["Website"].
				" Add a Comment :: ".$_POST["Comment"];
				$Sender="From:samblogshingenge@gmail.com";
				//
		if(mail($emailTo,$subject,$body,$Sender)){
			echo "Mail sent successfully!";
		}else{
			echo "Mail not sent!";
		}
			}else{
					echo '<span class="Error">Please Complete and correct your Form again</span>';
			}
	
		}
	}
	function Test_User_Input($Data) {
		return $Data;
	}


?>
		</div>
		<legend>*Please Fill out the following Field.</legend>
		<fieldset>
		Name:<br>
	<input class="input" type="text" Name="Name" value="">
	<span class="Error">*<?php echo $NameError; ?></span><br><br>
	E-mail:<br>
	<input class="input" type="email" Name="Email" value="">
	<span class="Error">*<?php echo $EmailError?></span><br><br>
	Gender:<br>
	<input class="radio" type="radio" Name="Gender" value="Female">Female 
	<input class="radio" type="radio" Name="Gender" value="Male">Male
	<span class="Error">*<?php echo $GenderError; ?></span>
	<br>
	Website:<br>
	<input class="input" type="text" Name="Website" value="">
	<span class="Error">*<?php echo $WebsiteError; ?></span><br><br>
	Comment:<br>
	<textarea Name="Comment" rows="5" cols="25"></textarea>
	<br>
	<br>
	<input type="Submit" Name="Submit" value="Submit Your Information">
	
	</fieldset>
  </form>
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
