<?php

   session_start();

   include("db/authentication.php");

   authenticate();

   $name = $_SESSION['student_name'];
   $email = $_SESSION['student_email'];
   $password = $_SESSION['student_password'];
    $error='';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMS | Change Password</title>
    <style type="text/css">
      @charset "utf-8";
/*CSS Document*/
body{
   background-image: url(../../img/ball.jpg);
   background-attachment :fixed;
       background-repeat: no-repeat;
    background-size: 100%;

}

*{
  margin:0;
  padding:0;
}
.center{
  align-items: center;
  text-align: center;
}

.container{
      width:100%;
      margin:auto;

    }

#logo {float: left;
    vertical-align: center;
    font-size: 70px;
    font-family: ;
    margin: auto 30px;
    }

.clear{clear: both;}

.nav{ margin-bottom: 30px;
color: white;
background: #191970;
overflow: hidden;
height: 100px;}

    form{
  
  padding:25px;
  margin:30px auto 0 auto;width:60%;align-items: center;
  justify-content: center;
}
    
/*fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}*/
 legend{
  font-size: 30px;
  font-weight: bold;
  font-family: Helvetica, sans-serif;
  color: #fff;
 }
input{
  border-radius:5px;
  box-shadow: ;
  border:1px solid #CCC;
  background:#FFF;
  margin:10px auto;
  padding:6px;
  width:80%;
}

button {
   border-radius:5px;
  box-shadow: ;
  border:1px solid #CCC;
  background:#FFF;
  margin:10px auto;
  cursor:pointer;
  background:#191970;
  color:#ffF;
  padding: 20px;
  width: 90%;
  font-size:15px;
}

#error{
  height: 20px;
}
span{color: red;}

    </style>
</head>
<body>

    <?php
    
        if(array_key_exists('uppword', $_POST))  {

            $error = '';

            if(empty($_POST['pword1']) || empty($_POST['pword2']))  {

                $error = "Please Confirm Your Password";
            }  else{
                $pword1 = md5(mysqli_real_escape_string($db, $_POST['pword1']));
                $pword2 = mysqli_real_escape_string($db, $_POST['pword2']);
            }

            if($_POST['pword1']!==$_POST['pword2'])  {

                $error = "Passwords Entered do not Match";
            } else {
                ($_POST['pword1']===$_POST['pword2']);
            }

            if($error ==='')  {

                $query = mysqli_query($db, "UPDATE student SET password = '".$pword1."'  
                                                  WHERE email ='".$email."'
                                                  ") or die(mysqli_error($db));
                                    unset($_SESSION['student_name']);
                                    unset($_SESSION['student_email']);
                                    unset($_SESSION['student_password']);
                                    $msg = "Password Changed Successfully";
                                    header("location:student_login.php?msg=$msg");
            }  else {

               

                    
                    
                
            
            }
      
        }
    
    ?>
     <div class="container center">
   
     
     <div class="center">
    <form action=""  method="POST" class="center">
      
      <fieldset style="width: 500px;">
   
         <legend>Change Password</legend>
    <div id="error"><h3><?php if($error !== ''){echo "<span>*</span>$error";}?></h3></div>
         <input type="password" name="pword1" placeholder="New Password" />
         <input type="password" name="pword2" placeholder="Confirm New Password" />
         <input type="submit" name="uppword"  value="Click to Change Password"/> 
   
      </fieldset>
   
   </form>
</div>
</div>
</body>
</html>