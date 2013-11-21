<?php
/*
	File Name 		:- headers.php
	Description		:- header file for all pages
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	include_once('include/connection.php');
	include_once('include/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- The styles -->
	<link id="bs-css" href="../admin/css/bootstrap-cerulean.css" rel="stylesheet">
	<?php include_once('style.php');?>
	<!--Jquery -->
	<?php include_once('jquery.php');?>
</head>
<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"> 
					<img alt="smart Logo" src="../admin/images/smart_logo_corp.png" height=50 width=100 alt="smart logo"/> 
					<span>Online Store for Shopping</span>
				</a>
												
				<div class="top-nav nav-collapse">
					<ul class="nav">
						<li>
							<form class="navbar-search pull-right">
								<input placeholder="Search" class="search-query span2" name="query" type="text">
							</form>
						</li>
					</ul>
				</div><!--/.nav-collapse -->
				<!-- user dropdown starts -->
				<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i>
						<span class="hidden-phone"> admin</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!--<li><a href="profile.php">Profile</a></li>
						<li class="divider"></li>-->
						<li><a href="log-out.php">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
			</div><!-- container-fluids ends -->
		</div><!-- navbar-inner -->
	</div><!-- navbar -->

	<div class="container-fluid">
		<div class="row-fluid">		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a class="ajax-link" href="index.php"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
						<li class="nav-header hidden-tablet">Users</li>
							<li><a class="ajax-link" href="user-list.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> User Management</span></a></li>
						<li class="nav-header hidden-tablet">Category</li>
							<li><a class="ajax-link" href="category.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Category Management</span></a></li>
						<li class="nav-header hidden-tablet">Product</li>
							<li><a class="ajax-link" href="product.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Product Management</span></a></li>
						<li class="nav-header hidden-tablet">Brand</li>
							<li><a class="ajax-link" href="brand.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Brand Management</span></a></li>
						<li class="nav-header hidden-tablet">Manufacture</li>
							<li><a class="ajax-link" href="manufacture.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Manufacture Management</span></a></li>
						<li class="nav-header hidden-tablet">Shipping</li>
							<li><a class="ajax-link" href="shipping.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Shipping Management</span></a></li>
						<li class="nav-header hidden-tablet">Tax</li>
							<li><a class="ajax-link" href="tax.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Tax Management</span></a></li>
						<li class="nav-header hidden-tablet">Order</li>
							<li><a class="ajax-link" href="order.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Order Management</span></a></li>

					</ul>
					
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
		<div id="content" class="span10">
