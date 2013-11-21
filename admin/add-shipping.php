<?php 
/*
	File Name 		:- add-shipping.php
	Description		:- add shipping details
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');

	if(isset($_POST['submit'])){
		$addShippingData=insert_shipping_data($_POST);
		
		if(isset($addShippingData)){
			header("location:shipping.php");
		}
		else{
			header("location:add-shipping.php");
		}
	}
	if(isset($_POST['cancel'])){
		header("location:shipping.php");
	}
?>
	<title>Add Shipping</title>
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
					var rate= $("#add-shippingy [name='rate']").val();
					var rateType= $("#add-shipping select[name='rateType']").val();
					if(rate== "") {
						$("span.val_rate").html("Rate is required.")
						$("span.val_rate").addClass('validate');
						validation_holder = 1;
					} 
					else{
							$("span.val_rate").html("");
					}
					if(rateType== 0) {
						$("span.val_rateType").html("Select Rate Typing.")
						$("span.val_rateType").addClass('validate');
						validation_holder = 1;
					} 
					else{
							$("span.val_rateType").html("");
					}
					if(validation_holder == 1) { // if have a field is blank, return false
						return false;
					}  validation_holder = 0; // else return true
				});
			});	
	</script>

	<form action="" method="POST" enctype="multipart/form-data" id="add-shipping"> 
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="shipping.php">Shipping Management</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid sortable">
			
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-add"></i> Add Shipping</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<div class="box-content">
				  <div class="control-group">
						<label class="control-label" for="optionsCheckbox2">Shipping</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="shipping" value="enable" name="shipping"><?php $selected = (isset($_POST['shipping']) == 'enable')?'enable':'disable';?>Enable/Diable
								<span class="val_shipping"></span>
							</label>
							
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Rate Type</label>
						<div class="controls">
							<select id="rateType" name="rateType">
								<?php
									$rateType=array("-Select Rate Type-","percentage","flatrate");
									echo '<option value="0">'.$rateType[0].'</option>';
									for($i=1;$i<=count($rateType); $i++) {
										if($i==$_POST['rateType'])
										{
											echo '<option selected="selected" value="'.$rateType[$i].'">'.$rateType[$i]."</option>";
										}
										echo '<option value="'.$rateType[$i].'">'.$rateType[$i]."</option>";
									}
								?>
							</select>
							<span class="val_rateType"></span>
						</div>
					</div>
				<div class="control-group">
					<label class="control-label" for="focusedInput">Rate</label>
					<div class="controls">
						<input class="input-xlarge focused" id="status" type="text" value="<?php echo isset($_POST['rate'])?$_POST['rate']:'';?>" name="rate">
						<span class="val_rate"></span>
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



