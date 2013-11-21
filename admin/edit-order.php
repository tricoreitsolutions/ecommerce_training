<?php 
/*
	File Name 		:- edit-category.php
	Description		:- edit category details
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];
		//$data=array();
		$getOrderData=mysql_query("SELECT order_master.*, order_details.* FROM order_master INNER JOIN
			order_details ON order_master.id = order_details.order_id where order_master.id='".$_REQUEST['id']."'") or die('Error'.mysql_error());
		//$row=mysql_fetch_array($getOrderData);
		while($row=mysql_fetch_array($getOrderData)){
			$data[]=$row;
			
		}
		if(isset($_POST['submit'])){
			print_r($_POST);
			$updateData=update_order_data($_POST);
			if(isset($updateData)){
				header("location:order.php");
			}
			else{
				header("location:edit-order.php?id=$id");
			}
		}
		if(isset($_POST['cancel'])){
			header("location:order.php");
		}
	}
?>
<title>Edit Order</title>
	<form action="" method="POST" enctype="multipart/form-data"> 
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="order.php">Order Management</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-edit"></i> Edit Order</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
				<div class="box-content">
					 
					<table class="table table-striped table-bordered ">
							<thead>
							  <tr>
								<th>Order Id</th>	
								<th>Username</th>
								<th>Order Date</th>
								<th>Delievery Date</th>
								<th>Grand Total</th>
								<th>Shipping Method</th>
								<th>Shipping Rate</th>
								<th>Payment Method</th>
							  </tr>
							</thead>   
							<tbody>
								<?php
										echo '<tr>';
										echo '<td>'.$data[0]['id'].'</td>';
										$getUserName=mysql_query("select firstname,lastname from user_master where id='".$row['user_id']."'") or die('Error'.mysql_error());
										$resultName=mysql_fetch_array($getUserName);
										echo '<td>'.$resultName['firstname']." ".$resultName['lastname'].'</td>';
										echo '<td>'.$data[0]['order_date'].'</td>';
										echo '<td>'.$data[0]['delievery_date'].'</td>';
										echo '<td>'.$data[0]['grand_total'].'</td>';
										echo '<td>'.$data[0]['shipping_method'].'</td>';
										echo '<td>'.$data[0]['shipping_rate'].'</td>';
										echo '<td>'.$data[0]['payment_method'].'</td>';
										echo '</tr>';
								?>		
							</tbody>
					  </table>   
						<b>Product Details</b><br/>
						<table class="table table-striped table-bordered ">
							<thead>
							  <tr>
								<th>Product Name</th>	
								<th>Quantity</th>
								<th>Unit Price</th>
								<th>Total</th>
							  </tr>
							</thead>   
							<tbody>
								<?php
									foreach($data as $newData)
									{
										echo '<tr>';
										$getProductName=mysql_query("select productname from product_master where id='".$newData['product_id']."'") or die('Error'.mysql_error());
										$result=mysql_fetch_array($getProductName);
										echo '<td>'.$result['productname'].'</td>';
										echo '<td>'.$newData['quantity'].'</td>';
										echo '<td>'.$newData['price'].'</td>';
										echo '<td>'.$newData['total'].'</td>';
										echo '</tr>';
									
									}
								?>		
							</tbody>
					  </table>  
					  <div class="control-group">
						<label class="control-label">Admin Comment</label>
						 <div class="controls">
							<textarea  name="comment" id="textarea2" cols="50" rows="3"></textarea>
						 </div>
						</div>
					<div class="control-group">
						<label class="control-label">Status</label>
						<div class="controls">
							<select id="status" data-rel="chosen" name="status">
								<?php
									$status=array("complete","pending","cancelled","shipped");
									for($i=0;$i<count($status); $i++) {
										if($status[$i]==$data[0]['status'])
										{
											echo '<option selected="selected" value="'.$status[$i].'">'.$status[$i]."</option>";
										}
										echo '<option value="'.$status[$i].'">'.$status[$i]."</option>";
									}
								?>
							</select>
						</div>
					</div>
		  <div class="form-actions">
			<button type="submit" class="btn btn-primary" name="submit">Save changes</button>
			<button class="btn" name="cancel" type="submit">Cancel</button>
		</div>
	</div>
	</div><!--/span-->
			
	</div><!--/row-->			
</form>
</div>
</div>
</div>
<?php include('include/footer.php'); ?>



