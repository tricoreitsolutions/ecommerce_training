<?php 
/*
	File Name 		:- edit-manufacture.php
	Description		:- edit manufacture information
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	if(isset($_REQUEST['id'])){
		$getManufactureData="SELECT * FROM manufacture_master WHERE `id`='".$_REQUEST['id']."'";
		$result=mysql_query($getManufactureData) or die('Error'.mysql_error());
		$row=mysql_fetch_array($result);	
		if(isset($_POST['submit'])){
			$updateManufactureData=update_manufacture_data($_POST);
			if(isset($updateManufactureData)){
				header("location:manufacture.php");
			}
			else{
				header("location:edit-manufacture.php?id='".$_REQUEST['id']."'");
			}
		}
		if(isset($_POST['cancel'])){
			header("location:manufacture.php");
		}
	}
?>

<title>Edit MAnufacture</title>
	<form action="" method="POST" enctype="multipart/form-data"> 
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="manufacture.php">Manufacture Management</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid sortable">
			
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-edit"></i> Edit Manufacture</h2>
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


