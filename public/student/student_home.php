<?php
    session_start();
     
    include("db/authentication.php");
    authenticate();

    $error = '';

    $email = $_SESSION['student_email'];
    $student_id = $_SESSION['student_id'];
    $name = $_SESSION['student_name'];
?>

<!Doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EM"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SMS | Student Home</title>

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
		#student_details{
			width: 400px;
			height: 400px;
			border:20px ridge;
			border-style: ;
			border-color: rgba(255, 6, 4, 0.7);
			border-radius: 50%;
			margin: 100px auto;
		}
		#student_details h2{
			margin-top:170px;
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


	</style>
</head>
<body>
	<div id="container">
		<div class="header">
			<p class="student_name float_left">Welcome <?php echo $name;?></p>
			<a href="student_logout.php" class="float_right logout">Logout</a></p></div>
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
				<div id="student_details" align="center">
					<h2>Student Dashboard</h2>
					<h4>Welcome, <?php echo $name ?>, Love to have you back</h4>
				</div>
			</div>
		</div>
	</div>
</body>
</html>