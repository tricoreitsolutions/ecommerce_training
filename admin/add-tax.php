<?php 
/*
	File Name 		:- add-tax.php
	Description		:- add tax details
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	if(isset($_POST['submit'])){
		$addTaxData=insert_tax_data($_POST);
		if(isset($addTaxData)){
			header("location:tax.php");
		}
		else{
			header("location:add-tax.php");
		}
	}
	if(isset($_POST['cancel'])){
		header("location:tax.php");
	}
?>
	<title>Add Tax</title>
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
					var tax= $("#add-tax [name='tax']").val();
					if(tax== "") {
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

	<form action="" method="POST" enctype="multipart/form-data" id="add-tax"> 
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
					<h2><i class="icon-add"></i> Add Tax</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<div class="box-content">
				  <div class="control-group">
						<label class="control-label" for="optionsCheckbox2">Tax Status</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="status" value="enable" name="status"><?php $selected = (isset($_POST['status']) == 'enable')?'enable':'disable';?>Enable/Diable
							</label>
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label" for="focusedInput">Tax</label>
						<div class="controls">
							<input class="input-xlarge focused" id="tax" type="text" value="<?php echo isset($_POST['tax'])?$_POST['tax']:'';?>" name="tax">
							<span class="val_tax"></span>
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
</div>
</div>
</div>
<?php include('include/footer.php'); ?>



