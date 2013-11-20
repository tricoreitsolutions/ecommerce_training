<?php 
/*
	File Name 		:- add-manufacture.php
	Description		:- add manufacture details
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	include_once('include/connection.php');
	include_once('include/functions.php');
	
	if(isset($_POST['submit'])){
		$addmanufactureData=insert_manufacture_data($_POST);
		
		if(isset($addmanufactureData)){
			header("location:manufacture.php");
		}
		else{
			header("location:add-manufacture.php");
		}
	}
	if(isset($_POST['cancel'])){
		header("location:manufacture.php");
	}
?>
	<title>Add Manufacture</title>
	<style>
		span.validate  {
			color:#F00;
			padding-left:8px;
			font-style:italic;
		}
	</style>
	<script type="text/javascript">
		jQuery(function(jQuery) {
				var validation_holder;
				jQuery("#submit").click(function() {
					var validation_holder = 0;
					var name = $("#add-category input[name='name']").val();
					var status= $("#add-category input[name='status']").val();
					if(name == "") {
						$("span.val_name").html("Name is required.")
						$("span.val_name").addClass('validate');
						validation_holder = 1;
					} else {
							$("span.val_name").html("");
					}
					if(status == "") {
						$("span.val_status").html("Status is required.")
						$("span.val_status").addClass('validate');
						validation_holder = 1;
					} 
					else{
							$("span.val_status").html("");
					}
					if(validation_holder == 1) { // if have a field is blank, return false
						return false;
					}  validation_holder = 0; // else return true
				});
			});	
	</script>

<body>
	<form action="" method="POST" enctype="multipart/form-data" id="add-category"> 
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
					<h2><i class="icon-add"></i> Add Manufacture</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<div class="box-content">
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Name</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="name" type="text" value="<?php echo isset($_POST['name'])?$_POST['name']:'';?>" name="name">
					   <span class="val_name"></span>
					</div>
				 </div>
				
				<div class="control-group">
					<label class="control-label" for="focusedInput">Status</label>
					<div class="controls">
						<input class="input-xlarge focused" id="status" type="text" value="<?php echo isset($_POST['status'])?$_POST['status']:'';?>" name="status">
						<span class="val_status"></span>
				</div>
			</div>
		  <div class="form-actions">
			<button type="submit" class="btn btn-primary" id="submit" name="submit">Save changes</button>
			<button class="btn" name="cancel" type="submit">Cancel</button>
		</div>
	</div>
	</div><!--/span-->
			
	</div><!--/row-->			
</form>
</body>

    
<?php include('include/footer.php'); ?>



