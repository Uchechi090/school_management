<?php
    session_start();
    include("db/authentication.php");
    authenticate();
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $teacher_id = $_SESSION['teacher_id'];

    $query = mysqli_query($db, "SELECT * FROM result WHERE teacher_id  = '".$teacher_id."' ")  or  die(mysqli_error($db));
?>
<!Doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EM"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>SMS | View Results</title>

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
            
            width: 90%;
            min-height: 50vh;
            line-height: 1em;
            margin: 80px auto;
            background-color: rgba(197, 179, 88, 0.3);
            padding: 40px 0;

        }
        .wrapper {
        margin-left: 100px;

      display: grid;
      grid-template-columns: repeat(5, 1fr);
      grid-gap: 10px;
      grid-auto-rows: minmax(40px, auto);
}
.one{
    grid-column: 1;
    grid-row: 1;
}
.two{
    grid-column: 2;
    grid-row: 1;
}
.three{
    grid-column: 3;
    grid-row: 1;
}
.four{
    grid-column: 4;
    grid-row: 1;
}

.name{
    grid-column: 1;
    grid-row: 1;
}
.subject{
    grid-column: 2;
    grid-row: 1;
}
.grade{
    grid-column: 3;
    grid-row: 1;
}

.level{
    grid-column: 4;
    grid-row: 1;
}

    </style>
</head>
<body>
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
                 <div>
    
        <?php while($result = mysqli_fetch_array($query)){ ?>

        <div id="post" class="center">
                <div id="post" class="center wrapper">
                        <div class="one">Name</div>
                        <div class="two">Subject</div>
                        <div class="three">Grade</div>
                        <div class="four">Level</div>
                         </div>
             
                <?php

                    while($result = mysqli_fetch_array($query)){ 
                    $select = mysqli_query($db, "SELECT * FROM student WHERE student_id ='".$result['student_id']."'")or die(mysqli_error($db));?>
                    <div  class=" wrapper">
                        <?php

                    
                    while($res = mysqli_fetch_array($select)){ ?>
                    <div class="name"><?php echo $res['first_name'].' '.$res['middle_name'].' '.$res['last_name'] ?></div>
                    <div class="subject"><?php echo $result['subject']?></div>
                    <div class="grade"><?php echo $result['grade'] ?></div>
                    <div class="level"><?php echo $result['level'] ?></div>
                    
                            <?php } ?>
                  
                   </div>
                            <?php } ?>
                             <?php } ?>
                
                <form action="add_result.php" method="post" class="center" align="center">
         <input type="submit" name="postbtn" value="Add Result" />

    </form>
        </div>

        

    </div>
            </div>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>