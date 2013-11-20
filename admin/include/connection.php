<?php
/*
	File Name 		:- connection.php
	Description		:- database connection file
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	$connection=mysql_connect("localhost","root","");
	if(!$connection){
		die('could  not connect'.mysql_error());
	}
	$selectDb=mysql_select_db("ecommerce_training",$connection);
	if(!$selectDb){
		die('could not connect'.mysql_error());
	}
?>
