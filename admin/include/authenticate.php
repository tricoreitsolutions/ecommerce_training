<?php
/*
	File Name 		:- authenticate.php
	Description		:- authentication file for session
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	session_start();
	if(!isset($_SESSION['admin'])){
		header('location:login.php');
	}
?>
