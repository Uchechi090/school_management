<?php

   session_start();

   include("db/authentication.php");

   authenticate();

   $admin_id = $_SESSION['admin_id'];
   $admin_name = $_SESSION['admin_name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
    
        if(array_key_exists('uppword', $_POST))  {

            $error = array();

            if(empty($_POST['pword1']))  {

                $error[] = "*Please enter a New Password";
            } else {
                $pword1 = md5(mysqli_real_escape_string($db, $_POST['pword1']));
            }

            if(empty($_POST['pword2']))  {

                $error[] = "*Please Confirm Your Password";
            }  else{
                $pword2 = md5(mysqli_real_escape_string($db, $_POST['pword2']));
            }

            if($_POST['pword1']!=$_POST['pword2'])  {

                $error[] = "Passwords Entered do not Match";
            } else {
                $pword1=$pword2;
            }

            if(empty($error))  {

                $query = mysqli_query($db, "UPDATE admin SET password = '".$password."'  
                                                  WHERE admin_name ='".$admin_name."'
                                                  ") or die(mysqli_error($db));

                                    header("location:admin_login.php");
            }  else {

               foreach($error as $error)  {

                    echo  "<p style='color:red'>$error</p>";
                    
                }
            
            }
      
        }
    
    ?>
    
    <form action=""  method="POST">
      
      <fieldset style="width: 500px;">
   
         <legend>Change Password</legend>
         <p>New Password: <input type="password" name="pword1"/></p>
         <p>Confirm Password: <input type="password" name="pword2"/></p>
         <input type="submit" name="uppword"  value="Click to Change Password"/> 
   
      </fieldset>
   
   </form>

</body>
</html>