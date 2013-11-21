<?php 
/*
	File Name 		:- order.php
	Description		:- order page
	Developer ID	:- tricore.dev20
	Date			:- 19/11/2013 
*/

	include_once('include/authenticate.php');
	include_once('include/headers.php'); 
	?>
<title>Order</title>
	<form>
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="order.php">Order</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid sortable">		
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-user"></i> Order</h2>
					<div class="box-icon">						
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<div class="box-content">
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
						<thead>
						  <tr>
							<th>Order ID</th>	
							<th>Username</th>
							<th>Status</th>
							<th>Total</th>
							<th>Actions</th>
						  </tr>
						</thead>   
						<tbody>
							<?php
								$getOrderDetails=view_order_details();
								while($resultOrderDetails=mysql_fetch_array($getOrderDetails)){
									echo '<tr>';
									echo '<td>'.$resultOrderDetails['id'].'</td>';
									$getUserName=mysql_query("select firstname,lastname from user_master where id='".$resultOrderDetails['user_id']."'") or die('Error'.mysql_error());
									$resultName=mysql_fetch_array($getUserName);
									echo '<td>'.$resultName['firstname']." ".$resultName['lastname'].'</td>';
									echo '<td>';
									if($resultOrderDetails['status']=='complete'){
										echo '<span class="label label-success">Complete</span>';
									}
									else if($resultOrderDetails['status']=='shipped'){
										echo '<span class="label">Shipped</span>';
									}
									else if($resultOrderDetails['status']=='cancelled'){
										echo '<span class="label label-important">Cancelled</span>';
									}
									else
									{
										echo '<span class="label label-warning">Pending</span>';
									}
									echo '</td>';
									echo '<td>'.$resultOrderDetails['grand_total'].'</td>';
									echo '<td class="center">';
										echo '<a class="btn btn-info" href="edit-order.php?id='.$resultOrderDetails['id'].'">'.'<i class="icon-edit icon-white"></i>Edit</a>';
										echo "\t";
										echo '<a class="btn btn-danger" href="user-list.php?id='.$resultOrderDetails['id'].'" onclick="return confirm("Are you sure want to delete ??");">'.
										'<i class="icon-trash icon-white"></i>Delete</a>';
									echo '</td>';
									echo '</tr>';
								}
							?>		
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


