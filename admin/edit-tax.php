
<?php 
/*
	File Name 		:- edit-tax.php
	Description		:- edit tax file
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	include_once('include/connection.php');
	include_once('include/functions.php');
	if(isset($_REQUEST['id'])){
		
		$getTaxData="SELECT * FROM tax_master WHERE `id`='{$_REQUEST['id']}'";
		$result=mysql_query($getTaxData) or die('Error'.mysql_error());
		$row=mysql_fetch_array($result);	
		if(isset($_POST['submit'])){
			if(empty($_POST['status'])){
				$_POST['status']='diable';
			}
			$updateTaxData=update_tax_data($_POST);
			if(isset($updateTaxData)){
				header("location:tax.php");
			}
			else{
				header("location:edit-tax.php?id='".$_REQUEST['id']."'");
			}
		}
		if(isset($_POST['cancel'])){
			header("location:tax.php");
		}
	}
?>
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
					var rate= $("#edit-tax [name='rate']").val();
					if(rate== "" || rate==0) {
						$("span.val_tax").html("Tax is required.")
						$("span.val_tax").addClass('validate');
						validation_holder = 1;
					} 
					else{
							$("span.val_tax").html("");
					}
					if(validation_holder == 1) { // if have a field is blank, return false
						return false;
					}  validation_holder = 0; // else return true
				});
			});	
</script>
<body>
	<form action="" method="POST" enctype="multipart/form-data" id="edit-tax"> 
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
		<div class="row-fluid sortable">
			
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-edit"></i> Edit Tax</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
				<div class="box-content">
				  <div class="control-group">
						<label class="control-label" for="optionsCheckbox2">Tax</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="enable" name="status" value="enable" <?php if($row['status']=="enable") echo 'checked';?>>Enable/Disable
							</label>
							
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="focusedInput">Tax</label>
						<div class="controls">
							<input class="input-xlarge focused" id="tax" type="text" value="<?php echo $row['tax'];?>" name="tax">
							<span class="val_tax"></span>
					</div>
			  <div class="form-actions">
				<button type="submit" class="btn btn-primary" name="submit" id="submit">Save changes</button>
				<button class="btn" name="cancel" type="submit">Cancel</button>
			 </div>
		</div>
	</div><!--/span-->
			
	</div><!--/row-->			
</form>
</body>
    
<?php include('include/footer.php'); ?>


