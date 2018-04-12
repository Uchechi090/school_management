<?php

	include ("db_config.php");

	function authenticate() {
		if(!isset($_SESSION['student_email']) && !isset($_SESSION['student_password']) && !isset($_SESSION['student_name'])) {

			header("location:student_login.php");


		}	

	}
?>