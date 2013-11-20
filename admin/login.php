<?php 
/*
	File Name 		:- login.php
	Description		:- login page for admin
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	  session_start();
	  include_once('include/connection.php');
	  include_once('include/functions.php');
	   
	if(isset($_POST['submit'])){
		$select=select_query($_POST);
		$count=mysql_num_rows($select);
		if($count>0){
			$_SESSION['admin']=$_POST['username'];
			header('location:index.php');
		}
	}
?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Product Management</title>

	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
	
	
	<script type="text/javascript">

	jQuery(function($) {
				var validation_holder;
				$("form#login-form input[name='submit']").click(function() {

				var validation_holder = 0;
				var email 			= $("#login-form input[name='username']").val();
				var email_regex 	= /^[\w%_\-.\d]+@[\w.\-]+.[a-za-z]{2,6}$/; // reg ex email check
				var password 		= $("#login-form input[name='password']").val();
				
				if(email == "") {
					$("span.val_email").html("Email address is required.")
					$("span.val_email").addClass('validate');
					validation_holder = 1;
				} else {
					if(!email_regex.test(email)){ // if invalid email
						$("span.val_email").html("Invalid email!")
						$("span.val_email").addClass('validate');
						validation_holder = 1;
					} else {
						$("span.val_email").html("");
					}
				}
				if(password == "") {
					$("span.val_pass").html("Password is required.")
					$("span.val_pass").addClass('validate');
					validation_holder = 1;
				} 
				else{
					if(password.length<7 || password.length>20){
						$("span.val_pass").html("Password length is greater than 7 and less than 20.")
						$("span.val_pass").addClass('validate');
						validation_holder = 1;
					}
					else {
						$("span.val_pass").html("");
					}
				}
					if(validation_holder == 1) { // if have a field is blank, return false
					return false;
				}  validation_holder = 0; // else return true
				});
			});
	</script>
</head>
<body>
	<div id="top-bar">
		<div id="logo">
				<a class="brand" href=""> <img alt="smart Logo" src="images/smart_logo_corp.png" height=50 width=100 alt="smart logo"/> </a>
				<span class="heading">Online Store for Shopping</span>
		</div>
	
	</div> <!-- end top-bar -->
	
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1>Login to admin</h1>
				<h5>Enter your credentials below</h5>
			
			</div>
			
			<a href="#" id="company-branding" class="fr"><img src="images/ecart_logo1.jpg" alt="ecart logo" /></a>
			
		</div> 
        
	
    </div> <!-- end header -->
	<div id="content">
		<form action="login.php" method="POST" id="login-form">
				<span style="color:red"><?php if(isset($count)){if($count==0) echo "Invalid username or password";}?></span>
				<br>
				<p>
					<label for="login-username">username</label>
					<input type="text"  title="Username" data-rel="tooltip" id="username" name="username"  placeholder="Username" class="round full-width-input"
					 value="<?php echo isset($_POST['username'])?$_POST['username']:'';?>" />
					<span class="val_email"></span>
				</p>
				<p>
					<label for="login-password">password</label>
					<input type="password" id="password" title="Password" data-rel="tooltip" placeholder="Password"  name="password"class="round full-width-input" />
					<span class="val_pass"></span> 
				</p>
				<p><a href="include/forgot-password.php">Forgotten my password</a>.</p>
				<br>
				<input type="submit" class="button round blue image-right ic-right-arrow" value="LOG IN" name="submit">
			
		
			<br/>
            
      		
	</div> <!-- end content -->
	<div id="footer">
			Copyright © 2013 TriCore IT Solutions. All rights reserved. Powered by 
			<a href="http://www.tricoreitsolutions.com/"> Tricore It Solutions </a>
	</div>
</body>
	

