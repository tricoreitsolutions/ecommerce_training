<?php
/*
	File Name 		:- log-out.php
	Description		:- logout page that destroy the seesion
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	session_start();
	session_destroy();		
	header('location: login.php');


?>
