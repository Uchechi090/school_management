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
        <title>SMS | Add New Students</title>

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
        form{
            width: 70%;
            height: auto;
            margin: 40px auto;
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
        input{
            border-radius:5px;
            box-shadow: ;
            border:1px solid #CCC;
            background:#FFF;
            margin:auto;
            padding:6px;
            width:95%;
        }
        .button{
            width: 5%;
        }
        textarea {
              height:50px;
              max-width:100%;
              resize:none;
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
    </style>
</head>
<body>
     <?php
     
        if(array_key_exists('add', $_POST))   {

             $error = array();

             if(empty($_POST['first_name']))   {
                  $error[] = "*Please enter firstname";
             }  else{
                 $firstname = mysqli_real_escape_string($db, $_POST['first_name']);
             }

             if(empty($_POST['middle_name']))   {
                 $error[] = "*Please enter middlename";
             }  else{
                 $middlename = mysqli_real_escape_string($db, $_POST['middle_name']);
             }

             if(empty($_POST['last_name']))   {
                $error[] = "*Please enter lastname";
             }  else{
                $lastname = mysqli_real_escape_string($db, $_POST['last_name']);
             }

             if(empty($_POST['email']))   {
                $error[] = "*Please enter email";
             }  else{
                $email = mysqli_real_escape_string($db, $_POST['email']);
             }

             if(empty($_POST['matric_no']))   {
                 $error[] = "*Please enter matriculation number";
             }  else{
                 $matric_no = mysqli_real_escape_string($db, $_POST['matric_no']);
             }

             if(empty($_POST['gender']))   {
                 $error[] = "*Please enter gender";
             }  else{
                 $gender = mysqli_real_escape_string($db, $_POST['gender']);
             }

             if(empty($_POST['date_of_birth']))   {
                 $error[] = "*Please enter date of birth";
             }  else{
                 $date_of_birth = mysqli_real_escape_string($db, $_POST['date_of_birth']);
             }

             if(empty($_POST['address']))  {
                 $error[] = "*Please enter address";
             }  else{
                 $address = mysqli_real_escape_string($db, $_POST['address']);
             }

             if(empty($_POST['nationality']))  {
                 $error[] = "*Please enter nationality";
             }  else{
                 $nationality = mysqli_real_escape_string($db, $_POST['nationality']);
             }

             if(empty($_POST['state_of_origin']))   {
                 $error[] = "*Please enter state of origin";
             }  else{
                 $state_of_origin = mysqli_real_escape_string($db, $_POST['state_of_origin']);
             }

             if(empty($_POST['faculty']))  {
                 $error[] = "Please enter faculty";
             }  else{
                 $faculty = mysqli_real_escape_string($db, $_POST['faculty']);
             }

             if(empty($_POST['department']))  {
                 $error[] = "*Please enter department";
             }  else{
                 $department = mysqli_real_escape_string($db, $_POST['department']);
             }

             if(empty($_POST['level']))  {
                 $error[] = "*Please enter level";
             }  else{
                 $level = mysqli_real_escape_string($db, $_POST['level']);
             }

             if(empty($_POST['marital_status']))  {
                 $error[] = "*Please enter marital status";
             }  else{
                 $marital_status = mysqli_real_escape_string($db, $_POST['marital_status']);
             }

             if(empty($_POST['hobbies']))  {
                 $error[] = "*Please enter hobbies";
             }  else{
                 $hobbies = mysqli_real_escape_string($db, $_POST['hobbies']);
             }

             if(empty($_POST['password']))  {
                 $error[] = "*Please enter password";
             }  else{
                 $password = md5(mysqli_real_escape_string($db, $_POST['password']));
             }

             if(empty($error))  {

                $insert = mysqli_query($db, "INSERT INTO student 
                                                VALUES(NULL,
                                                       '".$firstname."',
                                                       '".$middlename."',
                                                       '".$lastname."',
                                                       '".$email."',
                                                       '".$matric_no."',
                                                       '".$gender."',
                                                       '".$date_of_birth."',
                                                       '".$address."',
                                                       '".$nationality."',
                                                       '".$state_of_origin."',
                                                       '".$faculty."',
                                                       '".$department."',
                                                       '".$level."',
                                                       '".$marital_status."',
                                                       '".$hobbies."',
                                                       '".$password."',
                                                       '".$admin_id."' )
                                                       
                                                       ")  or die(mysqli_error($db));

            $msg = "Student Added Successfully";

            header("location:add_student.php?success=$msg");

             }  else{
                 
                 foreach($error as $error)   {
                     echo $error. "</br>";
                 }

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
                 <form action=""  method="POST">
     
             <fieldset><input type="text"  name="first_name"  placeholder="Firstname"/></fieldset>

             <fieldset><input type="text" name="middle_name"  placeholder="Middlename"/></fieldset>

             <fieldset><input type="text"  name="last_name"  placeholder="Lastname"/></fieldset>

             <fieldset><input type="email"  name="email" placeholder="Email"/></fieldset>

             <fieldset><input type="text"  name="matric_no"  placeholder="Matriculation Number"/></fieldset>

             <fieldset><p>Gender:  Male<input type="radio"  name="gender"  value="M" class="button" />
                                   Female<input type="radio"  name="gender"  value="F" class="button"/></p></fieldset>

             <fieldset><p>Date Of Birth:</p><input type="date"  name="date_of_birth"  placeholder="Date of Birth"/></fieldset>

             <fieldset><textarea  rows="5"  cols="90"  name="address"  
                                  placeholder="Residential Address"></textarea></fieldset>

             <fieldset><input type="text"  name="nationality"  placeholder="Nationality"/></fieldset>
             
             <fieldset><input type="text"  name="state_of_origin"  placeholder="State of Origin"/></fieldset>

             <fieldset><input type="text"  name="faculty"  placeholder="Faculty"/></fieldset>

             <fieldset><input type="text"  name="department"  placeholder="Department"/></fieldset>

             <fieldset><input type="text"  name="level"  placeholder="Level"/></fieldset>

             <fieldset><p>Marital Status: Single<input type="radio" name="marital_status" value="single" class="button"/>
                                          Married<input type="radio"  name="marital_status"  value="married" class="button"/>
                                          Divorced<input type="radio"  name="marital_status"  value="divorced" class="button"/>
                                          Widowed<input type="radio"  name="marital_status"  value="widowed" class="button"/></p></fieldset>

             <fieldset><textarea  rows="5"  cols="90"  name="hobbies"  placeholder="Hobbies"></textarea></fieldset>

             <fieldset><input type="password"  name="password"  placeholder="Password"/></fieldset>

             <fieldset><button type="submit"  name="add">Add Student</button></fieldset>
     </form>

            </div>
        </div>
    </div>
</body>
</html>