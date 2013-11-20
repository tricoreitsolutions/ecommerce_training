
<?php 
/*
	File Name 		:- edit-shipping.php
	Description		:- edit-shipping file to edit shipping details
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	include_once('include/connection.php');
	include_once('include/functions.php');
	if(isset($_REQUEST['id'])){
		$getShippingData="SELECT * FROM shipping_master WHERE `id`='".$_REQUEST['id']."'";
		$result=mysql_query($getShippingData) or die('Error'.mysql_error());
		$row=mysql_fetch_array($result);	
		if(isset($_POST['submit'])){
			if(empty($_POST['shipping'])){
				$_POST['shipping']='diable';
			}
			$updateShippingData=update_shipping_data($_POST);
			if(isset($updateShippingData)){
				header("location:shipping.php");
			}
			else{
				header("location:edit-shipping.php?id='".$_REQUEST['id']."'");
			}
		}
		if(isset($_POST['cancel'])){
			header("location:shipping.php");
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
					var rate= $("#edit-shipping [name='rate']").val();
					var rateType= $("#edit-shipping select[name='rateType']").val();
					if(rate== "" || rate==0) {
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
<body>
	<form action="" method="POST" enctype="multipart/form-data" id="edit-shipping"> 
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
					<h2><i class="icon-edit"></i> Edit Shipping</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
				<div class="box-content">
				  <div class="control-group">
						<label class="control-label" for="optionsCheckbox2">Shipping</label>
						<div class="controls">
							<label class="checkbox">
								<input type="checkbox" id="enable" name="shipping" value="enable" <?php if($row['status']=="enable") echo 'checked';?>>Enable/Disable
							</label>
							
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="selectError3">Rate Type</label>
						<div class="controls">
							<select id="rateType" name="rateType">
								<?php
									$rateType=array("-Select Rate Type-","percentage","flatrate");
									//echo '<option value="0">'.$rateType[0].'</option>';
									for($i=1;$i<=count($rateType); $i++) {
										if($i==$row['rate_type'])
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
						<input class="input-xlarge focused" id="status" type="text" value="<?php echo $row['rate'];?>" name="rate">
						<span class="val_rate"></span>
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
</html>	
    
<?php include('include/footer.php'); ?>


