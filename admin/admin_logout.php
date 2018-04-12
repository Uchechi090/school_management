<?php

    session_start();
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    header("location:admin_login.php");

?>