<?php
    session_start();
     
    include("db/authentication.php");
    authenticate();

    $error = '';

     $email = $_SESSION['student_email'];
    $student_id = $_SESSION['student_id'];
    $name = $_SESSION['student_name'];

     if (isset($_GET['news_id'])) {
        $news_id=$_GET['news_id'];
    
    }
    $select = mysqli_query($db, "SELECT * FROM newsletter WHERE news_id = '".$news_id."' ")  or  die(mysqli_error($db));

?>

<!Doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EM"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SMS | View Newsletter</title>

        <style type="text/css">
            *{
            align-items: center;
            margin:0;
            padding:0
        }

        body{
            background-color: rgba(255,0,0, 0.1);
                }

        #container {
  position: relative;
  min-height: 100vh;
  margin: 0px;
  overflow: hidden;
}

#container::after {
  content: "";
  background: url(../../img/ball.jpg);
  opacity: 0.5;
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
        .student_name{
            font-family:Arial;
            font-size:20px;
            font-weight: bold;
            margin-top: 0px;
            padding: 0 110.6px;
            color: #fff;
        }
        .header p{
            margin-right: 40px;
        }
        .header a{
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            margin-top:15px;
            margin-right: 40px;
            font-size: 18px;
            text-decoration: none;
            color: #fff;
        }
        #side1{
            width: 25.1%;
            float: left;}
         #side1 ul{list-style-type: none;
                text-align: center;
        }
        #side1 ul li{border: 1px solid #fff;
            background-color: rgba(25,25,112, 0.7)}
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
        #side2{
            width: 74.6%;
            float: right;
        }
        .header{
            height: 55px;
            background-color: rgba(25,25,112, 0.7);
        }
        .profile_image{
            height: 120px;
            width: 50%;
            margin: 45px auto;
        }
        .profile_image img{
            width: 90%;
        }
        .float_right{
            float: right;
        }
        .float_left{
            float: left;
        }
         #body{
            
            width: 80%;
            min-height: 50vh;
            line-height: 1em;
            margin: 30px auto;
            background-color: rgba(197, 179, 88, 0.3);
            padding: 5px;

        }
        #newsletter{
            
        }
        .newshead{
            
            color:#fff;
        font-family:Arial, Helvetica, sans-serif;
        font-size:20px;
        letter-spacing:2px;
        padding:10px;
        display:block;
        background-color: rgba(25,25,112,0.2);
        border:1px solid black;
        width: 50%;
        min-height: 20px;
        border-radius: 10px;
        font-style: bold;
        margin-top: 20px;
        margin-left: 20px
}
        .news_content, #comments{
           color:#000;
        font-family:Arial, Helvetica, sans-serif;
        font-size:18px;
        letter-spacing:2px;
        padding:10px;
        display:block;
        background-color: rgba(255,255,255,0.7);
        border:1px solid white;
        border-radius: 10px;
        margin-bottom: 20px;
        margin:0 20px 20px 20px;
        }
        #comments{
            width: 60%;
            float: right;
            clear: both;
         }
        textarea, input{
            margin:0 20px 20px 20px;
        }
        textarea{
            width: 95%;
        }

    </style>
</head>
<body>
    <?php
    
    
    if(array_key_exists('submit2', $_POST)) {
        $error = '';

         if (empty($_POST['comment'])) {
            $error= "PLEASE ENTER A COMMENT";
         }  else{
                $comment = mysqli_real_escape_string($db, $_POST['comment']);
            }


         if ($error === '')  {
                $insert = mysqli_query($db, "INSERT INTO comment
                                            VALUES(NULL,
                                            '".$comment."',
                                            '".$name."',
                                            '".$news_id."',
                                            NOW() ) ")
                                            or die(mysqli_error($db));
                $msg = "Comment Successfully Added";

            }  else  {
                $msg="Error Occured";
                }
    } 
?>
    <div id="container">
        <div class="header">
            <p class="student_name">Welcome <?php echo $name;?></p>
            <a href="student_logout.php" class="float_right">Logout</a></p></div>
        <div id="side1">
            <div class="profile_image" align="center"><img src="../../img/placeholder.png"></div>
            <ul>
                <li class="top"><a href="student_home.php"> Dashboard</a></li>
                <li class="top"><a href="view_result.php">Results</a></li>
                <li class="top"><a href="view_newsletter.php">Newsletters</a></li>
                <li class="top"><a href="student_logout.php">Logout</a></li>
            </ul>
        </div>
        <div id="side2">
                <div id="body">
                 
    
                

                    <div id="newsletter">
                
                        <?php
                        $result = mysqli_fetch_array($select);
                        $news_name = $result['news_name'];
                        $news_content = $result['news_content'];
                        echo '<a class="newshead" id="button2" href=newsletter.php?news_id='.$news_id.'> '.$news_name.'</a>';
                        echo "<p class='news_content'> $news_content </p>";
                        ?>
                    </div>
        <?php

        $query= mysqli_query($db, "SELECT * FROM comment WHERE news_id = '".$news_id."' ")or die(mysqli_error($db)) ;
        while
            ($query_result=mysqli_fetch_array($query)) {
                $comment=$query_result['comment'];
                $date=$query_result['date'];
                $username = $query_result['username']

            ?>
            <div id="comments">
            <?php
            echo '<p class="comment">'.$comment.'</p></br>';
                echo "<p class='date '> $date </p></br>";
                echo "<p class ='name '>$username</p>";
            ?>
            </div>
        <?php   
        }
?>

            

            <form action="" method="post" class="center">

                 <textarea  cols="100" name="comment" placeholder="Add a comment..."></textarea>
                 <input type="submit" name="submit2" value="Post A Comment" />

            </form>
                    </div>
        </div>
    </div>
</body>
</html>