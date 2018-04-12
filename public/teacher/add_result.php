<?php
    session_start();
    include("db/authentication.php");
    authenticate();
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $teacher_id = $_SESSION['teacher_id'];

     $query = mysqli_query($db, "SELECT * FROM result")  or  die(mysqli_error($db));
     $error ='';
     $msg = '';
     $success = '';
?>
<!Doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EM"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SMS | Add Results</title>

        <style type="text/css">
            *{
            align-items: center;
            margin:0;
            padding:0
        }

        #container {
  position: relative;
  min-height: 100vh;
  margin: 0px;
  overflow: hidden;
}

#container::after {
  content: "";
  background: url(../../img/splashing.jpeg);
  opacity: 0.3;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
  z-index: -1; 
  min-height: 100vh;  
  margin: 0px;
   background-repeat: no-repeat;
    background-position: 50% 0;
    -ms-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    background-size: cover;
}
.header p{
            margin-right: 40px;
        }
        .header a{
            
            margin-top:15px;
            margin-right: 40px;
            text-decoration: none;
            color: #fff;
        }
.header{
            height: 55px;
            background-color: rgba(25,25,112, 0.7);
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            color:#fff;
            font-size: 18px;
        }
#side1{
            width: 25.1%;
            float: left;}
         #side1 ul{list-style-type: none;
                text-align: center;
        }
        #side1 ul li{border: 1px solid #fff;
            background-color: #191970;}
        #side1 ul li a{
            padding: 20px 30px;
            color: #fff;
            font-family:Arial;
            font-size:18px;
            display:block;
            letter-spacing: 2px;
            text-decoration: none

        }
        #side1 ul li a:hover{color:#191970;
            background-color: #fff;
            text-decoration: none;
        }
        #side1{
            width: 25.1%;
            float: left;}
        #side2{
            width: 74.6%;
            float: right;
        }
        .float_right{
            float: right;
        }
        .float_left{
            float: left;
        }
        .top{
            height: 55px;
        }
        .profile_image{
            height: 120px;
            width: 50%;
            margin: 47px auto;
        }
        .profile_image img{
            width: 90%;
        }
         #body{
            
            width: 80%;
            min-height: 50vh;
            line-height: 1em;
            margin: 100px auto;
            background-color: rgba(197, 179, 88, 0.3);
            padding: 50px;

        }
         form{
            width: 70%;
            height: auto;
            margin: 30px auto;
            padding: 150px auto;
            background-color: rgba(197, 179, 88, 0.3);
            padding: 20px;
            border-top-left-radius: 10px;
            border-bottom-right-radius: 10px;
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;

        }
        fieldset{
            border: medium none !important;
            padding:3px;
            width: 95%;
            margin: 3px auto;
        }
        .input{
            border-radius:5px;
            box-shadow: ;
            border:1px solid #CCC;
            background:#FFF;
            margin:auto;
            padding:6px;
            width:95%;
        }
        
        textarea {
              height:50px;
              max-width:100%;
              resize:none;
            }

    </style>
</head>
<body>
    
    <?php
        if(array_key_exists('add_result', $_POST)){
                $error='';
                $success = '';
            if(empty($_POST['firstname']) || empty($_POST['middlename']) || empty($_POST['lastname']) || empty($_POST['subject']) || empty($_POST['level']) || empty($_POST['grade'])){
                $error = "Fill all fields.";
            }else{
                $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
                $middlename = mysqli_real_escape_string($db, $_POST['middlename']);
                $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
                $subject = mysqli_real_escape_string($db, $_POST['subject']);
                $grade = mysqli_real_escape_string($db, $_POST['grade']);
                $level = mysqli_real_escape_string($db, $_POST['level']);
            }
            if(!$error){
                $select = mysqli_query($db, "SELECT * FROM student WHERE first_name ='".$firstname."' and last_name ='".$lastname."' ")or die(mysqli_error($db));
                $res = mysqli_fetch_array($select);
                $student_id = $res['student_id'];

                $query = mysqli_query($db, "INSERT INTO result VALUES(NULL, '".$subject."', '".$grade."', '".$level."', '".$student_id."', '".$teacher_id."') ") or die(mysqli_error($db));

                
                $success = "Result Successfully Added";
            }
        }

    ?>

   <div id="container">
        <div class="header">
            <h3 class="float_left">Welcome, <span><?php echo $name;?></span></h3>
            <div class="float_right">
            <p><?php echo $email;?></p>
            <a  href="teacher_login">Logout</a>
            </div>
        </div>
        <div id="side1">
            <div class="profile_image" align="center"><img src="../../img/placeholder.png"></div>
            <ul>
                <li class="top"><a href="teacher_home.php"> Dashboard</a></li>
                <li class="top"><a href="view_student.php">Students</a></li>
                <li class="top"><a href="add_result.php">Add Results</a></li>
                <li class="top"><a href="view_results.php">View Results</a></li>
                <li class="top"><a href="view_newsletter.php">Newsletters</a></li>
                <li class="top"><a href="teacher_logout.php">Logout</a></li>
            </ul>
            
        </div>

        <div id="side2">
            <div id="body">
                 
                    <form action="" method="post">
                        <div><h3><?php echo $success;?></h3></div> 
                        <div id="error"><p><?php echo $error;?></p></div>
                        <fieldset>
                        <input type="text" name="firstname" placeholder="Firstname" class="input" />
                        </fieldset>

                        <fieldset>
                        <input type="text" name="middlename" placeholder="Middlename" class="input"/>
                        </fieldset>

                        <fieldset>
                        <input type="text" name="lastname" placeholder="Lastname" class="input"/>
                        </fieldset>

                        <fieldset>
                        <input type="text" name="subject" placeholder="Subject" class="input"/>
                        </fieldset>

                        <fieldset>
                        <input type="number" name="grade" placeholder="Grade" class="input"/>
                        </fieldset>

                        <fieldset>
                        <input type="number" name="level" placeholder="Level" class="input"/>
                        </fieldset>

                        <fieldset>
                        <input type="submit" name="add_result" value="Add Result"/>
                        </fieldset>
                    </form>

                

   
            </div>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>