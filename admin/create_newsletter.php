<?php
	session_start();
	 $admin_id = $_SESSION['admin_id'] ;
     $admin_name = $_SESSION['admin_name'];
	include("db/db_config.php");

?>



<!Doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EM"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		 <title>SMS | Write A Newsletter</title>

        <style type="text/css">
            *{
            align-items: center;
            margin:0;
            padding:0
        }

        
        body{
            background-color: rgba(255, 6, 4, 0.1);
        }
        #admin_name {
            background-color: rgba(132,112,255, 0.3);
        }
        #side1{
            width: 25.1%;
            float: left;

        }
        #admin_name{
            background-color: ;
            font-family:Arial;
            font-size:32px;
            font-weight: bold;
            letter-spacing: 2px;
            text-align: center;
            margin-top: 0px;
            padding: 0 110.6px;

            height: 55px;
        }
        #admin_name p{
            text-align: center;
        }
        #side2{
            width: 74.6%;
            float: right;
        }

        .top{
            height: 55px;

        }
        #header{
            background-color: rgba(197, 179, 88, 0.8);
        }
        #header div{
            margin: 10px 20px 10px 0;
            font-family:Arial;
            font-size:20px;
        }
        #header a{
            font-family: Helvetica, sans-serif;
            font-weight: bold;
            margin-top:15px;
            margin-right: 40px;
            font-size: 18px;
            text-decoration: none;
        }
        .profile_image{
            height: 120px;
            width: 50%;
            margin: 40px auto;
            background-image: url("../img/placeholder.png");
        }
        .profile_image img{
            width: 80%;
        }
        .float_right{
            float: right;
        }
        .float_left{
            float: left;
        }
        #side1 ul{list-style-type: none;
                text-align: center;
        }
        #side1 ul li{border: 1px solid #fff;}
        #side1 ul li a{
            background-color: rgb(197, 179, 88);
            color: #fff;
            font-family:Arial;
            font-size:18px;
            display:block;
            padding:10px 20px;
            letter-spacing: 2px;
            text-decoration: none
        }
        #side1 ul li a:hover{color:#191970;
            background-color: #fff;
            text-decoration: none;
        }
        #admin_details{
            width: 400px;
            height: 400px;
            border:20px ridge;
            border-style: ;
            border-color: rgba(255, 6, 4, 0.7);
            border-radius: 50%;
            margin: 100px auto;
        }
        #admin_details h2{
            margin-top:170px;
        }

        #side2{
      background-image: url(../img/Ridge-Design-Website-Design-Background.jpg);
      background-attachment: fixed;
       background-repeat: no-repeat;
    background-position: 50% 0;
    -ms-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    background-size: cover;
      min-height: 100vh;

    }
        #body{
            color:#000;
            font-family:Arial, Helvetica, sans-serif;
            font-size:18px;
            letter-spacing:0.5px;
            padding:10px;
            display:block;
            background-color: rgba(255,255,255,0.7);
            border:1px solid white;
            border-radius: 10px;
            margin-bottom: 20px;
            width: 90%;
            line-height: 1em;
            margin: 60px auto;

        }
    </style>
</head>
<body>
	 <?php
	if(array_key_exists('postbtn', $_POST)){
			$err='';
		if(empty($_POST['topic']) || empty($_POST['newsletter'])){
			$err = "Fill all fields.";
		}else{
			$topic = mysqli_real_escape_string($db, $_POST['topic']);
			$newsletter = mysqli_real_escape_string($db, $_POST['newsletter']);
		}
		if(!$err){
		$query = mysqli_query($db, "INSERT INTO newsletter VALUES(NULL, '".$topic."', '".$newsletter."', NOW(), '".$admin_id."') ") or die(mysqli_error($db));

		$msg = "Newsletter Successfully Created";

		header("location:create_newsletter.php?msg=$msg"); 
        }
	}

?>
    

	<div id="container">
		 <div id="header" class="top">
                <p align="center" id="admin_name" class="float_left"><?php echo $admin_name ?></p>

                <a href="admin_logout.php" class="float_right">Logout</a>
            </div>
        <div id="side1">
            <div class="profile_image" align="center"><img src="../img/placeholder.png"></div>
           <ul>
				<li class="top"><a href="admin_home.php"> Dashboard</a></li>
				<li class="top"><a href="add_teacher">Add Teacher</a></li>
				<li class="top"><a href="add_student">Add Student</a></li>
				<li class="top"><a href="view_teacher">View Teacher Profile</a></li>
				<li class="top"><a href="view_student">View Student Profile</a></li>
				<li class="top"><a href="create_newsletter">Add Newsletter</a></li>
				<li class="top"><a href="view_newsletter">View Newsletters</a></li>
			</ul>
			
		</div>
		<div id="side2">
			
			<div id="body">
			
				
				<form action="" method="post" class="center">
				<input type="text" name="topic" placeholder="Newsletter Topic"><br/>
				<textarea  cols="100" name="newsletter"></textarea><br/>
				<input type="submit" name="postbtn" value="POST" />
				</form>
                </div>
			</div>
		</div>
	</div>
</body>
</html>