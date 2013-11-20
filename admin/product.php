<?php 
/*
	File Name 		:- product.php
	Description		:- product page to view,edit and delete product information
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	include_once('include/authenticate.php');
	include_once('include/headers.php'); 
	include_once('include/connection.php');
	include_once('include/functions.php');
	if(isset($_REQUEST['id'])){
		delete_product_detail($_REQUEST['id']);
	}
	?>
<body>
	<form>
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="product.php">Product Management</a>
				</li>
				</ul>
			</div>
			<div class="row-fluid">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>Product</h2>
						<div class="box-icon">						
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<div class="box-content">
					<a class="btn btn-success" href="add-product.php" style="float:right;margin:0 0 -24px 0"><i class="icon-zoom-in icon-white"></i>Add Product</a>
					<table class="table table-striped table-bordered bootstrap-datatable datatable">
					  <thead>
						<tr>
						  <th>Code</th>
						  <th>Name</th>
						  <th>Manufacture</th>
						  <th>Brand</th>
						  <th>Retail Price</th>
						  <th>Image</th>
						  <th>Quantity</th>
						  <th>Category</th>
						  <th>Status</th>
						  <th>Actions</th>
						 </tr>
					  </thead>   
					  <tbody>
						<?php
							$getProductInfo=view_product_info();
							while($row=mysql_fetch_array($getProductInfo))
							{
						?>
								<tr>
									<td><?php echo $row['product_code'];?></td>
									<td><?php echo $row['productname'];?></td>
									<td>
									
									<?php
										$getManufacture=mysql_query("select * from manufacture_master where id='".$row['manufacture']."' AND status=1") or die('Error'.mysql_error());
										while($resultManufacture=mysql_fetch_array($getManufacture)){
											echo $resultManufacture['name'];
										}
									?>
									</td>
									<td>
									<?php 
										$getBrand=mysql_query("select * from brand_master where id='".$row['brand']."' AND status=1") or die('Error'.mysql_error());
										while($resultBrand=mysql_fetch_array($getBrand)){
											echo $resultBrand['name'];
										}
									?>
									</td>
									<td><?php echo $row['retail_price'];?></td>
									<td>
										<?php 
												$getImage=mysql_query("select image from image_master where product_id='".$row['id']."' LIMIT 1") or die('Error'.mysql_error());
												while($resultImage=mysql_fetch_array($getImage)){?>
													<img src="images/product_images/thumbnail/<?php echo $resultImage['image']?> "/>
												<?php }	
												
										?>
									</td>
									<td><?php echo $row['max_quantity'];?></td>
									<td>
									<?php
										$getCategory=mysql_query("select * from category_master where id='".$row['cat_id']."'") or die('Error'.mysql_error());
										while($result=mysql_fetch_array($getCategory)){
											echo $result['name'];
										}
									?>
									</td>
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
										<a class="btn btn-info" href="edit-product.php?id=<?php echo $row['id'];?>"><i class="icon-edit icon-white"></i>Edit</a>
										<a class="btn btn-danger" href="product.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure want to delete ??');"><i class="icon-trash icon-white"></i> Delete</a>
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

