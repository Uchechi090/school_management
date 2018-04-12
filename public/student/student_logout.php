<?php

    session_start();
    unset($_SESSION['student_email']);
    unset($_SESSION['student_password']);
    unset($_SESSION['student_name']);
    header("location:student_login.php");

?>