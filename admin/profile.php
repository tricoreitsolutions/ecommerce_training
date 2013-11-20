<?php 
/*
	File Name 		:- profile.php
	Description		:- to view and edit admin profile
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	include_once('include/authenticate.php');
	include_once('include/headers.php'); 
	include_once('include/connection.php');
	include_once('include/functions.php');
	?>
<body>
	<form>
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="profile.php">Profile</a>
				</li>
				</ul>
			</div>
			<div class="row-fluid">	
					
				<div class="box span12">
					
					
					
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Profile</h2>
						<div class="box-icon">						
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
					
				</div>
				
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						<tr>
						  <th>Name</th>
						  <th>Email</th>
						  <th>Gender</th>
						  <th>Address</th>
						  <th>Phone_No</th>
						  <th>Image</th>
						  <th>Status</th>
						  <th>Actions</th>
						 </tr>
					  </thead>   
					  <tbody>
						<?php
							$getadminInfo=view_admin_info();
							while($row=mysql_fetch_array($getadminInfo))
							{
						?>
								<tr>
									<td><?php echo $row['firstname']." ".$row['lastname'];?></td>
									<td><?php echo $row['email'];?></td>
									<td><?php echo $row['gender'];?></td>
									<td><?php echo $row['address'];?></td>
									<td><?php echo $row['phone_no'];?></td>
									<td><img src="images/smallimages/<?php echo $row['image'] ?>"/></td>
									<td class="center">
										<?php 
											if($row['status']==1){
												echo '<span class="label label-success">Active</span>';
											}
											else
											{
												echo '<span class="label label-warning">Inactive</span>';
											}
										?>					
									</td>
									<td class="center">
										<a class="btn btn-info" href="edit-profile.php?id=<?php echo $row['id'];?>"><i class="icon-edit icon-white"></i>Edit</a>
									</td>
								</tr>
						<?php  } ?>
							
					 </tbody>
				   </table>            
				</div>
			</div><!--/span-->	
		</div><!--/row-->
	  </div>						  
	</form>
	</body>
<?php include_once('include/footer.php'); ?>

