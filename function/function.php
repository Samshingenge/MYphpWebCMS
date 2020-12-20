<?php
 
//clean string Values
function clean($string){
    return htmlentities($string);
}
 
// Redirect User 
 function redirect($location){
     return header("location:($location)");
 }

 //Set Session Message
 function set_message($msg){
        if(!empty($msg)){
            $_SESSION['Message']=$msg;
        }
        else
        {
            $msg="";
        }
 }

      // Display Message Function
      function display_message(){
          if(isset($_SESSION['Message']))
          {
            echo $_SESSION['Message'];
            unset($_SESSION['Message']);
          }
      }
 
      //Generate Token
      function Token_Generator()
      {
          $token= $_SESSION['token']=md5(uniqid(mt_rand(),true));
          return $token;
      }

      //Send Email
      function send_email($email,$sub,$msg,$header)
      {
            return mail($email,$sub,$msg,$header);
      }

      //Error Function
      function Error_validation($Error)
      {
          return '<div class="alert alert-danger">'.$Error.'</div>';
      }

      //User Validation Function
      function user_validation(){ 
          if($_SERVER['REQUEST_METHOD']=='POST'){
            $FirstName = clean($_POST['FirstName']);
            $LastName = clean($_POST['LastName']);
            $UserName = clean($_POST['UserName']);
            $Email = clean($_POST['Email']);
            $Pass = clean($_POST['pass']);
            $CPass = clean($_POST['cpass']);
           
            $Error = [] ;
            $Max = 20;
            $Min = 02;

            //Check the firstname Characters
            if(strlen($FirstName)<$Min){
                $Error[] = "Your First name cannot be less than {$Min} Characters "; 
            }

            if(strlen($FirstName)>$Max){
                $Error[] = "Your First name cannot be  More than {$Max} Characters "; 
            }

            if(strlen($LastName)<$Min){
                $Error[] = "Your Last name cannot be less than {$Min} Characters "; 
            }

            if(strlen($LastName)>$Max){
                $Error[] = "Your Last name cannot be  more than {$Max} Characters "; 
            }

            if(!preg_match("/^[a-zA-Z,0-9]*$/",$UserName)){
                $Error[] = "User Name cannot accept those Characters "; 
                 
            }

            if(Email_Exists($Email))
            {
                $Error[] = "Email Already Registered ! ";  
            }

            if(User_Exists($UserName))
            {
                $Error[] = "User name Already Registered ! ";  
            }

            if($Pass!=$CPass)
            {
                $Error[] = "Password Not Matched ! ";  
            }

            if(!empty($Error)){

                foreach($Error as $Error)
                {
                    echo Error_validation($Error);
                }
            }
            else 
            {
                if(user_registration($FirstName,$LastName,$UserName,$Email,$Pass))
                {
                      set_message('<p class="bg-success text-center lead"> You Have Successfully Registered Please Check Your Activation Links</p>');
                    redirect_to("indexLog.php");
                    
                }
                else
                {
                    set_message('<p class="bg-danger text-center lead"> You Account Not  Registered Please Try Again </p>');
                    redirect_to("indexLog.php"); 
                    die();
                }
            }
          }
          
      }

      //Email Exists Function
      function Email_Exists($Email)
      {
          $sql = "SELECT * FROM users WHERE Email='$Email'";
          $result = Query($sql);
          if(fetch_data($result))
          {
              return true;
          }
          else
          {
              return false;
          }

      }

      //User Name exists

      function User_Exists($user)
      {
          $sql = "SELECT * FROM users WHERE UserName='$user'";
          $result = Query($sql);
          if(fetch_data($result))
          {
              return true;
          }
          else
          {
              return false;
          }

      }


      //User Registration Function
      function user_registration($FName,$LName,$UName,$Email,$Pass)
      {
            $FirstName = escape($FName);
            $LastName = escape($LName);
            $UserName = escape($UName);
            $Email = escape($Email);
            $Pass = escape($Pass);

            if(Email_Exists($Email))
            {
                return true;
            }
            else if(User_Exists($UserName))
            {
                return true;
            }
            else
            {
                $Password = md5($Pass);
                $Validation_code = md5($UserName + microtime());

                $sql = "INSERT INTO users (FirstName,LastName,UserName,Email,Password,Validation_code,Active)  VALUES('$FirstName ','$LastName','$UserName','$Email','$Password','$Validation_code','0')";
                $result = Query($sql);
                confirm($result);

                $subject = " Active Your Account ";
                $msg= " Please Click the Link Below to Active Your Account http://localhost/CMSpro/activate.php?Email=$Email&Code=$Validation_code";
                $header = " From No-Reply samblogshingenge@gmail.com";
                

                send_email($Email,$subject,$msg,$header);
                return true;
            }
      }

      //Activation Function
      function activation()
      {
          if($_SERVER['REQUEST_METHOD']=="GET")
          {
               $Email = $_GET['Email'];
               $Code = $_GET['Code'];

               $sql = " SELECT * FROM users WHERE Email='$Email' AND Validation_Code='$Code'";
               $result = Query($sql);
               confirm($result);

               if(fetch_data($result))
               {
                   $sqlquery = " Update users set Active='1', Validation_Code='0' WHERE Email='$Email' AND Validation_Code='$Code'";
                   $result2= Query($sqlquery);
                   confirm($result2);

                     set_message('<p class="bg-success text-center lead"> Your Account Successfully Activated </p>');
                     header('Location:loginLog.php');//Best practice to redirect message 
                     die();
               }
               else
               {
                     echo '<p class="bg-danger text-center lead"> Your Account is Not Activated </p>';
               }
          } 
      }

      //User Login Validation function
      function login_validation()
      {
          $Error = [];
          if($_SERVER['REQUEST_METHOD']=='POST')
          {
            $UserEmail = clean($_POST['UEmail']);
            $UserPass = clean($_POST['UPass']);
            $Remember = isset($_POST['remember']);
  
            if(empty($UserEmail))
            {
                $Error [] = " Please Enter Your Email ";
            }

            if(empty($UserPass))
            {
                $Error[] = " Please Enter Your Password ";
            }

            if(!empty($Error))
            {
                foreach($Error as $Error)
                {
                    echo Error_validation($Error);
                }
            }
            else
            {
                if(user_login($UserEmail,$UserPass,$Remember))
                {
                   //  redirect("admin.php");
                    header('Location:admin.php');  
                }
                else
                {
                    echo Error_validation("Please Enter Correct Email or Password");
                }

            }
          }
          
      }

      //User Login Function

      function user_login($UEmail,$UPass,$Remember)
      {
            $query = "SELECT * FROM users WHERE Email = '$UEmail' AND Active='1'";
            $result = Query($query);

            if($row=fetch_data($result))
            {
                $db_pass = $row['Password'];
                if(md5($UPass)==$db_pass)
                {
                    if($Remember == true)// Set cookies
                    {
                        setcookie('email',$UEmail,time() + 86400);//cookies for one day 
                    }
                    $_SESSION['Email']=$UEmail;//added from function logged_in
                    return true;
                }
                else
                {
                    return false;
                }
            }
      }
//*****************Up Working fine*************************** */
      //Logged in Function
      function logged_in()
      {
          if(isset($_SESSION['Email']) || isset($_COOKIE['email']))
          {
              return true;
          }
          else
          {
              return false;
          }
      }

      /////////////////////Recover Function////////////
      function recover_password()
      {
          if($_SERVER['REQUEST_METHOD'] == "POST")
          {
              if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token'])
              {
                    $Email = $_POST['UEmail'];

                    if(Email_Exists($Email))
                    {
                        $code = md5($Email+microtime());
                        setcookie('temp_code',$code,time()+300);

                        $sql = "UPDATE users SET Validation_Code='$code' WHERE Email='$Email'";
                         Query($sql); 

                        $Subject = " Please Reset the Password";
                        $Message= "Please Follow on Below Link to Reset the Password http://localhost/CMSPro/code.php?Email='$Email'&Code='$code'";
                        $header = "samblogshingenge@gmail.com";

                       
                       if(send_email($Email,$Subject,$Message,$header)) 
                       {
                            echo '<div class="alert alert-success"> Please check Your Email </div>';
                       }
                       else
                       {
                            echo Error_validation(" Couldn't Send an Email");
                       }
        
                        
                    }
                    else
                    {
                        echo Error_validation(" Email Not Found...");
                    }
              }
              else
              {
                  header('Location:indexLog.php');
              }
          }
      }

      //Validation Code Function to be continue starting 00:22:44
      function validation_code()
      {
            if(isset($_COOKIE['temp_code']))
            {
                if(isset($_GET['Email']) && !isset($_GET['Code']))
                {
                    header('Location:indexLog.php');
                }
                elseif(empty($_GET['Email']) && empty($_GET['Code']))
                {
                    header('Location:indexLog.php');
                }
                else
                {
                    if(isset($_POST['recover-code']))
                    {
                        $Code = $_POST['recover-code'];
                        $Email = $_GET['Email']; 

                        $query = "SELECT * FROM users WHERE Validation_Code='$Code' AND Email='$Email'";
                        $result = Query($query);

                        if(fetch_data($result))
                        {
                            setcookie('temp_code',$Code,time()+300);
                            header('Location:reset.php?Email=$Email&Code=$Code');
                        }
                        else
                        {
                            echo Error_validation("Query Failed");
                        }
                    }
                }
            }
            else
            {
                set_message('<div class="alert alert-danger"> Your Code Has Been Expired </div>');
                header('Location:recover.php');
            }
      }

      ////////////////Reset Password////////////////
      function reset_password()
      {
          if(isset($_COOKIE['temp_code']))
          {
                if(isset($_GET['Email']) && isset($_GET['Code']))
                {

                    if(isset($_SESSION['token']) && isset($_POST['token']))
                    {

                        if($_SESSION['token'] == $_POST['token']){

                            if($_POST['reset-pass'] === $_POST['reset-c-pass'])
                            {

                                $Password = md5($_POST['reset-pass']);
                                 $query2 = "UPDATE users SET Password= '".$Password."', Validation_code=0 WHERE Email='".$_GET['Email']."'";
                                $result = Query($query2);

                                if($result)
                                {
                                    set_message('<div class="alert alert-success"> Your Password Has Been Updated</div>');
                                    header('Location:loginLog.php');
                                }
                                else
                                {
                                    set_message('<div class="alert alert-danger"> Something went wrong </div>');
                                }

                            }
                            else
                            {
                                set_message('<div class="alert alert-danger"> Password Not Matched </div>');
                            }
                        }
                        
                    }
                   
                }
                else
                {
                    set_message('<div class="alert alert-danger"> Your Code or Email Has Not Matched </div>');
                }
          }
          else
          {
              set_message('<div class="alert alert-danger"> Your Time Period Has Been Expired </div>');
          }
      }
 ?>
