<?php 
/*
	File Name 		:- shipping.php
	Description		:- to display and edit shipping information
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	include_once('include/authenticate.php');
	include_once('include/headers.php'); 
?>
<title>Shipping</title>
	<form>
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="shipping.php">Shipping Management</a>
				</li>
				</ul>
			</div>
			<div class="row-fluid">	
					
				<div class="box span12">
					
					
					
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Shipping</h2>
						<div class="box-icon">						
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
					
				</div>
				
				<div class="box-content">
					<div class="add">
						<a class="btn btn-success" href="add-shipping.php">
							<i class="icon-zoom-in icon-white"></i>Add Shipping
						</a>
					</div>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						<tr>
						  <th>Shipping Status</th>	
						  <th>Rate Type</th>
						  <th>Rate</th>
						  <th>Actions</th>
						 </tr>
					  </thead>   
					  <tbody>
						<?php
							$getShippingInfo=view_Shipping_info();
							while($row=mysql_fetch_array($getShippingInfo))
							{
						?>
								<tr>
									<td><?php echo $row['status'];?></td>
									<td><?php echo $row['rate_type'];?></td>
									<td><?php echo $row['rate'];?></td>
									<td class="center">
										<a class="btn btn-info" href="edit-shipping.php?id=<?php echo $row['id'];?>"><i class="icon-edit icon-white"></i>Edit</a>
										<!--<a class="btn btn-danger" href="brand.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure want to delete ??');"><i class="icon-trash icon-white"></i> Delete</a>-->
									</td>
								</tr>
						<?php  }?>
							
					 </tbody>
				   </table>            
				</div>
			</div><!--/span-->	
		</div><!--/row-->					  
	</form>
</div>
</div>
</div>
       
<?php include_once('include/footer.php'); ?>



