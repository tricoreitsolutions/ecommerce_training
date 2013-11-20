<?php 
/*
	File Name 		:- index.php
	Description		:- home page
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/

	include_once('include/authenticate.php');
	include_once('include/headers.php'); 
	include_once('include/connection.php');
	include_once('include/functions.php');
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
							<th>Name</th>	
							  <th>Username</th>
							  <th>Gender</th>
							  <th>Address</th>
							  <th>Phone_No</th>
							  <th>Country</th>
							  <th>Status</th>
							  <th>Actions</th>
						  </tr>
						  </thead>   
						  <tbody>
							<?php
								$getUserInfo=view_user_info();
								while($row=mysql_fetch_array($getUserInfo))
								{
							?>
									<tr>
										<td><?php echo $row['firstname']." ".$row['lastname'];?></td>
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row['gender'];?></td>
										<td><?php echo $row['address'];?></td>
										<td><?php echo $row['contact'];?></td>
										<td><?php echo $row['country'];?></td>
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
											<a class="btn btn-info" href="edit.php?id=<?php echo $row['id'];?>">
												<i class="icon-edit icon-white"></i>  
												Edit                                            
											</a>
											<a class="btn btn-danger" href="user-list.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure want to delete ??');">
												<i class="icon-trash icon-white"></i> 
												Delete
											</a>
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
</html>
		  
       
<?php include_once('include/footer.php'); ?>
