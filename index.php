<!Doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EM"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://wwww.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SMS | Index</title>
		<style type="text/css">
		*{
			align-items: center;
			margin:0;
			padding:0
		}
		.center{
			align-items: center;
			text-align: center;
			margin: auto;
		}
		#container {
  position: relative;
  min-height: 100vh;
  margin: 0px;
  overflow: hidden;
}

#container::after {
  content: "";
  background: url(img/ghost_town-wallpaper-1920x1080.jpg);
  opacity: 0.8;
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
		 #login{
			border: 1px solid;
			border-color: rgba(255, 255,255, 0.6);
			width: 26%;
			margin: 5em auto 2em auto;
			height: 550px;
			background-color: rgba(255, 255,255, 0.4);
			border-radius: 15px;
		}

		/*.login_input{
			width: 80%;
			margin: 10px auto;
			height: 40px;
			border-radius:5px;
			box-shadow: ;
		    border:1px solid #CCC;
		    background:#FFF;
		}*/
		.login_input{
			width: 87%;
			margin: 10px auto;
			height: 30px;
		    border:1px solid #CCC;
		    background:#FFF;}
		.login_link_holder{
			width: 100%;
			margin: 0 auto;

		}
		.login_link_holder a{
			text-decoration: none;
			font-size: 20px;
			font-family: ;
			color: black;
		}
		.login_link{
			width: 31.76%;
			height: 40px;
			border: none;
			border: 1px solid;
			border-color: rgba(0, 3 ,6 ,0.1); 
			background-color: rgba(255, 255,255, 0.7);
			padding: 1.7656px;

		}
		.login_link:first-child{
			border-top-left-radius: 15px;
		}
		.login_link:last-child{
			border-top-right-radius: 15px;
		}
		.login_link:hover, .login_link:focus{
			background-color: rgba(255, 255,255, 0.1);
		}
		.selected{
			background-color: rgba(255, 255,255, 0);
		}
		input{
			border-radius: 4px;
		}
		#profile{
			height: 150px;
			width: 50%;
			margin: 100px auto 50px auto;
		}
		#profile img{
			width: 100%;
		}
		#error{
			height: 20px;
		}
		span{
			color: red;
		}
		.float_right{
			float: right;
		}
		.float_left{
			float: left;
		}
		.clear{
			clear: both;
		}
		#forgot a{
			color: #191970;
			text-decoration: none;
		}

		</style>
</head>
<body>

	<div id="container">
		<div id="login" class="center">
			<div class="login_link_holder center" align="center">
				<div class="float_left login_link"><a href="admin/admin_login.php">Admin</a></div>
				<div class="float_left login_link"><a href="public/student/student_login.php" >Student</a></div>
				<div class="float_left login_link"><a href="public/teacher/teacher_login.php" >Teacher</a></div>
			</div>
			
			<div  id="profile" class="clear"><img src="img/placeholder2.png"></div>
			
			 <form action="" method="post">
        		<div id="error"></div>
        		<div id="select"><h3><span>*</span>Select Admin, Student or Teacher</h3></div>
                <p>Email:</p><input type="text" name="email" class="login_input"/>
                <p>Password:</p><input type="password" name="password" class="login_input"/>
                
                <input class="login_input" type="submit" name="login" value="Click To Login" />
                
        
        </form>
        <div id="forgot"><a href="">Forgot Password?</a></div>
		</div>
	</div>
	<!-- khfl -->

</body>

</html>