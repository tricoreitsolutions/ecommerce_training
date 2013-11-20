<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>eCart</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/script.js"></script>  
</head>
<body>

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="#" class="round button dark ic-left-arrow image-left">Go to website</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>admin</strong></a>
					<ul>
						<li><a href="#">My Profile</a></li>
						<li><a href="#">User Settings</a></li>
						<li><a href="#">Change Password</a></li>
						<li><a href="#">Log out</a></li>
					</ul> 
				</li>
			
				<li><a href="#" class="round button dark menu-email-special image-left">3 new messages</a></li>
				<li><a href="#" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.html" class="dashboard-tab">Dashboard</a></li>
				<li><a href="page-full-width.html" class="active-tab">Full width page</a></li>
				<li><a href="page-other.html">Other page elements</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/ecart_logo1.jpg" alt="ecart" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="content-module">
			
				<div class="content-module-heading cf">
				
					<h3 class="fl">Menu</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				
				</div> <!-- end content-module-heading -->
				
				
				<div class="content-module-main">			
					<table>
						<thead>
			
							<tr>
								<th><input type="checkbox" id="table-select-all"></th>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Actions</th>
							</tr>
						
						</thead>

						<tfoot>
						
							<tr>
							
								<td colspan="5" class="table-footer">
								
									<label for="table-select-actions">With selected:</label>

									<select id="table-select-actions">
										<option value="option1">Delete</option>
										<option value="option3">Select all</option>
									</select>
									
									<a href="#" class="round button blue text-upper small-button">Apply to selected</a>	

								</td>
								
							</tr>
						
						</tfoot>
						
						<tbody>

							<tr>
								<td><input type="checkbox"></td>
								<td>Ranavaya Sarman G.</td>
								<td>sgranavaya</td>
								<td><a href="#">sarman.ranavaya@gmail.com</a></td>
								<td>
									<a href="#" class="table-actions-button ic-table-edit"></a>
									<a href="#" class="table-actions-button ic-table-delete"></a>
								</td>
							</tr>

						</tbody>
						
					</table>
					
					<div class="stripe-separator">
                    		
                    
                    <!--  --></div>
					
					<p>Other Contents display here</p>
					
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->

	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">eCart</a>. All rights reserved.</p>
		<p><strong>eCart</strong>by <a href="http://www.abc.com">ABC</a></p>
	
	</div> <!-- end footer -->

</body>
</html>