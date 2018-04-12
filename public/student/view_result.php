<?php
    session_start();
     
    include("db/authentication.php");
    authenticate();

    $error = '';

     $email = $_SESSION['student_email'];
    $student_id = $_SESSION['student_id'];
    $name = $_SESSION['student_name'];

     $query = mysqli_query($db, "SELECT * FROM result")  or  die(mysqli_error($db));
?>


<!Doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EM"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SMS | Student Results</title>

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
		.wrapper {
		margin-left: 120px;

	  display: grid;
	  grid-template-columns: repeat(3, 1fr);
	  grid-gap: 2px;
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
.subject{
	grid-column: 1;
	grid-row: 1;
}
.grade{
	grid-column: 2;
	grid-row: 1;
}
.lecturer{
	grid-column: 3;
	grid-row: 1;
}

	</style>
</head>
<body>
	<div id="container">
		<div class="header">
			 <p class="student_name float_left">Welcome <?php echo $name;?></p>
			<a href="student_logout.php" class="float_right">Logout</a></div>
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
				<div>
    				   <div id="post" class="center wrapper">
			        	<div class="one">Course</div>
			        	<div class="two">Grade</div>
			        	<div class="three">Lecturer</div>
						 </div>
			        <?php while($res = mysqli_fetch_array($query)){ ?>

			     	<div  class=" wrapper">
						<div class="subject"><?php echo $res['subject']?></div>
						<div class="grade"><?php echo $res['grade'] ?></div>
						
			            
			                
			                <?php
			                $select = mysqli_query($db, "SELECT * FROM teacher WHERE teacher_id = '".$res['teacher_id']."' ")  or  die(mysqli_error($db));
			                	while($result = mysqli_fetch_array($select)){ ?>
			            <div class="lecturer"><?php echo $result['last_name'].' '.$result['first_name']?></div>
			                
			                	
			                <?php } ?>
			            

			        </div>

			        <?php } ?>

    			</div>

			</div>
		</div>
	</div>
</body>
</html>