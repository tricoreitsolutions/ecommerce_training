<?php 
/*
	File Name 		:- edit-brand.php
	Description		:- edit brand details
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	if(isset($_REQUEST['id'])){
		$getBrandData="SELECT * FROM brand_master WHERE `id`='".$_REQUEST['id']."'";
		$result=mysql_query($getBrandData) or die('Error'.mysql_error());
		$row=mysql_fetch_array($result);	
		if(isset($_POST['submit'])){
			$updateBrandData=update_Brand_data($_POST);
			if(isset($updateBrandData)){
				header("location:brand.php");
			}
			else{
				header("location:edit-brand.php?id='".$_REQUEST['id']."'");
			}
		}
		if(isset($_POST['cancel'])){
			header("location:brand.php");
		}
	}
?>

<title>Edit Brand</title>
	<form action="" method="POST" enctype="multipart/form-data"> 
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="brand.php">Brand Management</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid sortable">
			
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-edit"></i> Edit Brand</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
				<div class="box-content">
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Name</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="firstName" type="text" value="<?php echo $row['name'];?>" name="name">
					</div>
				 </div>
			  <div class="control-group">
				<label class="control-label" for="focusedInput">Status</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row['status'];?>" name="status">
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


