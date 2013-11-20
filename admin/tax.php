<?php 
/*
	File Name 		:- tax.php
	Description		:- tax file to view ,edit tax information
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
					<a href="tax.php">Tax Management</a>
				</li>
				</ul>
			</div>
			<div class="row-fluid">	
					
				<div class="box span12">
					
					
					
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Tax</h2>
						<div class="box-icon">						
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
					
				</div>
				
				<div class="box-content">
					<a class="btn btn-success" href="add-tax.php" style="float:right;margin:0 0 -24px 0"><i class="icon-zoom-in icon-white"></i>Add tax</a>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						<tr>
						  <th>Tax Status</th>	
						  <th>Tax</th>
						  <th>Actions</th>
						 </tr>
					  </thead>   
					  <tbody>
						<?php
							$getTaxInfo=view_tax_info();
							while($row=mysql_fetch_array($getTaxInfo) or die(mysql_error()))
							{
						?>
								<tr>
									<td><?php echo $row['status'];?></td>
									<td><?php echo $row['tax'];?></td>
									<td class="center">
										<a class="btn btn-info" href="edit-tax.php?id=<?php echo $row['id'];?>"><i class="icon-edit icon-white"></i>Edit</a>
										<!--<a class="btn btn-danger" href="brand.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure want to delete ??');"><i class="icon-trash icon-white"></i> Delete</a>-->
									</td>
								</tr>
						<?php  }?>
							
					 </tbody>
				   </table>            
				</div>
			</div><!--/span-->	
		</div><!--/row-->
	  </div>						  
	</form>
	</body>
       
<?php include_once('include/footer.php'); ?>



