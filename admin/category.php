<?php 
/*
	File Name 		:- category.php
	Description		:- to view, edit and delete category details
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	include_once('include/authenticate.php');
	include_once('include/headers.php'); 
		if(isset($_REQUEST['id'])){
			delete_category_detail($_REQUEST['id']);
		}
	?>
<title>Category</title>
	<form>
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="category.php">Category Management</a>
				</li>
				</ul>
		</div>
		<div class="row-fluid">			
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-user"></i>Category</h2>
						<div class="box-icon">						
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
				</div>
					
			</div>
			<div class="box-content">
				<div class="add">
					<a class="btn btn-success" href="add-category.php">
						<i class="icon-zoom-in icon-white"></i>Add Category
					</a>
				</div>
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<th>Name</th>	
						<th>Description</th>
						<th>Image</th>
						<th>Status</th>
						<th>Actions</th>
					</thead>   
					<tbody>
						<?php
							$getCategoryInfo=view_category_info();
							while($row=mysql_fetch_array($getCategoryInfo))
							{
						?>
								<tr>
									<td><?php echo $row['name'];?></td>
									<td><?php echo $row['description'];?></td>
									<td><img src="images/category_images/thumbnail/<?php echo $row['image'] ?>"/></td>									<td class="center">
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
										<a class="btn btn-info" href="edit-category.php?id=<?php echo $row['id'];?>"><i class="icon-edit icon-white"></i>Edit</a>
										<a class="btn btn-danger" href="category.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure want to delete ??');"><i class="icon-trash icon-white"></i> Delete</a>
									</td>
								</tr>
						<?php  } ?>
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

