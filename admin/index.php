<?php 
/*
	File Name 		:- index.php
	Description		:- home page
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/

	include_once('include/authenticate.php');
	include_once('include/headers.php'); 
	?>

<html>
<head></head>
<body>
	<form>
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="index.php">Dashboard</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-user"></i> Members</h2>
					<div class="box-icon">						
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
						  <tr>
							<th>Username</th>
							 <th>Date registered</th>
							  <th>Role</th>
							  <th>Status</th>
							  <th>Actions</th>
						  </tr>
						  </thead>   
						  <tbody>
							<tr>
								<td>David R</td>
								<td class="center">2012/01/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-success">Active</span>
								</td>
								<td class="center">
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
							<tr>
								<td>Worth Name</td>
								<td class="center">2012/03/01</td>
								<td class="center">Member</td>
								<td class="center">
									<span class="label label-warning">Pending</span>
								</td>
								<td class="center">
									<a class="btn btn-info" href="#">
										<i class="icon-edit icon-white"></i>  
										Edit                                            
									</a>
									<a class="btn btn-danger" href="#">
										<i class="icon-trash icon-white"></i> 
										Delete
									</a>
								</td>
							</tr>
					  </tbody>
				  </table>            
				</div>
			</div><!--/span-->
		</div><!--/row-->
	</div>	  
 </form>
</body>
</html>
		  
       
<?php include_once('include/footer.php'); ?>
