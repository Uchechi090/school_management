<?php

	include ("db_config.php");

	function authenticate() {
		if(!isset($_SESSION['name']) && !isset($_SESSION['email'])) {

			header("location:teacher_login.php");


		}	

	}