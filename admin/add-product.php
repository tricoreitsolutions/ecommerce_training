<?php 
/*
	File Name 		:- headers.php
	Description		:- add new product information
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	include_once('include/connection.php');
	include_once('include/functions.php');
		
	if(isset($_POST['submit'])){
		print_r($_POST['category']);exit;
		$addProductData=insert_product_data($_POST);
		$product_id=mysql_query("select id from product_master where productname='".$_POST['name']."'") or die('Error'.mysql());
		$result=mysql_fetch_array($product_id);

		for($i=0;$i<5;$i++){
			echo $i;echo '<br/>';
			$allowedExts = array("jpg", "jpeg", "gif", "png","JPG","JPEG","GIF","PNG");
			$filename=$_FILES["file".($i+1)]["name"];
			$bits = explode(".", $filename);
			$imgName=current($bits);
			$extension = end($bits);
			if ((($_FILES["file".($i+1)]["type"] == "image/gif")
			|| ($_FILES["file".($i+1)]["type"] == "image/jpeg")
			|| ($_FILES["file".($i+1)]["type"] == "image/png")
			|| ($_FILES["file".($i+1)]["type"] == "image/pjpeg"))
			&& in_array($extension, $allowedExts))
			{
				if ($_FILES["file".($i+1)]["error"] > 0)
				{
					echo "Return Code: " . $_FILES["file".($i+1)]["error"] . "<br>";
				}
				else
				{
					$newImageName=time();
					$imageName=$newImageName."_".$imgName.".".$extension;
					$existImageName=$imageName;
						if(move_uploaded_file($_FILES["file".($i+1)]["tmp_name"],"images/" .$imageName))
						{
							$dest="images/smallimages/";
							if(file_exists("../images/smallimages/".$existImageName))
							{
								unlink("../images/smallimages/".$existImageName);
							}
							$width=150;
							$height=150;
							$newImageName=create_thumb($dest, $width, $height,$imageName);
							$_POST['image']=$newImageName;
							echo $_POST['image'];
							$query="INSERT INTO `image_master`(`product_id`,`image`)VALUES ('".$result['id']."','". $_POST['image']."')";
							$resultInsertImageData = mysql_query($query,$connection);
							confirm_query($resultInsertImageData);
						}
									  
				}
			}
			else
			{
				echo "Invalid file";
						
			}
		}
		if(isset($resultInsertImageData)){
			header("location:product.php");
		}
		else{
			header("location:add-product.php");
		}
	}
	if(isset($_POST['cancel'])){
		header("location:product.php");
	}
?>
	<title>Add Product</title>
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
					var code=$("#add-product input[name='code']").val();
					var name = $("#add-product input[name='name']").val();
					var manufacture= $("#add-product select[name='manufacture']").val();
					var fullListPrice= $("#add-product input[name='fullListPrice']").val();
					var retailPrice= $("#add-product input[name='retailPrice']").val();
					var image1= $("#add-product input[name='file1']").val();
					var image2= $("#add-product input[name='file2']").val();
					var image3= $("#add-product input[name='file3']").val();
					var image4= $("#add-product input[name='file4']").val();
					var image5= $("#add-product input[name='file5']").val();
					var wholeSalePrice= $("#add-product input[name='wholeSalePrice']").val();
					var quantity= $("#add-product input[name='quantity']").val();
					var category= $("#add-product select[name='category']").val();
					var status= $("#add-product input[name='status']").val();
					if(code == "") {
						$("span.val_code").html("Code is required.")
						$("span.val_code").addClass('validate');
						validation_holder = 1;
					} else {
							$("span.val_code").html("");
					}
					if(name == "") {
						$("span.val_name").html("Name is required.")
						$("span.val_name").addClass('validate');
						validation_holder = 1;
					} else {
							$("span.val_name").html("");
					}
					if(manufacture == 0) {
						$("span.val_manufacture").html("Manufacture is required.")
						$("span.val_manufacture").addClass('validate');
						validation_holder = 1;
					} else {
							$("span.val_manufacture").html("");
					}
					if(fullListPrice == "") {
						$("span.val_fullListPrice").html("Full List Price is required.")
						$("span.val_fullListPrice").addClass('validate');
						validation_holder = 1;
					} else {
							$("span.val_fullListPrice").html("");
					}
					if(retailPrice == "") {
						$("span.val_retailPrice").html("Retail Price is required.")
						$("span.val_retailPrice").addClass('validate');
						validation_holder = 1;
					} else {
							$("span.val_retailPrice").html("");
					}
					if(wholeSalePrice == "") {
						$("span.val_wholeSalePrice").html("Whole Sale Price is required.")
						$("span.val_wholeSalePrice").addClass('validate');
						validation_holder = 1;
					} else {
							$("span.val_wholeSalePrice").html("");
					}
					if(quantity == "") {
						$("span.val_quantity").html("Max quantity is required.")
						$("span.val_quantity").addClass('validate');
						validation_holder = 1;
					} else {
							$("span.val_quantity").html("");
					}
					if(category ==0) {
						$("span.val_category").html("Category is required.")
						$("span.val_category").addClass('validate');
						validation_holder = 1;
					} else {
							$("span.val_category").html("");
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
	<form action="add-product.php" method="POST" enctype="multipart/form-data" id="add-product"> 
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
		<div class="row-fluid sortable">
			
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-add"></i> Add Product</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<div class="box-content">
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Code</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="code" type="text" value="<?php echo isset($_POST['code'])?$_POST['code']:'';?>" name="code">
					   <span class="val_code"></span>
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Name</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="name" type="text" value="<?php echo isset($_POST['name'])?$_POST['name']:'';?>" name="name">
					   <span class="val_name"></span>
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label">Description</label>
					 <div class="controls">
						<textarea  name="description" id="description" cols="50" rows="3"><?php echo isset($_POST['description'])?$_POST['description']:'';?></textarea>
					 </div>
				</div>
				 <div class="control-group">
					<label class="control-label" for="selectError">Manufacture</label>
					<div class="controls">
						<select id="manufacture" data-rel="chosen" name="manufacture">
							<option value="0">-Select Manufacture-</option>
								<?php
									$manufacture=mysql_query("select * from manufacture_master where `status`=1") or die('Error'.mysql_error());
									while($row=mysql_fetch_array($manufacture)) {
										if($row['id']==$_POST['manufacture']){
											echo '<option selected="selected "value="'.$row['id'].'">'.$row['name']."</option>";
										}
											echo '<option value="'.$row['id'].'">'.$row['name']."</option>";
									}
										
							 ?>
						</select>
						 <span class="val_manufacture"></span>
					</div>
				 </div>    
				 <div class="control-group">
					<label class="control-label" for="selectError">Brand</label>
					<div class="controls">
						<select id="brand" data-rel="chosen" name="brand">
							<option value="0">-Select Brand-</option>
								<?php
									$brand=mysql_query("select * from brand_master where `status`=1") or die('Error'.mysql_error());
									while($row=mysql_fetch_array($brand)) {
										if($row['id']==$_POST['brand']){
											echo '<option selected="selected "value="'.$row['id'].'">'.$row['name']."</option>";
										}
											echo '<option value="'.$row['id'].'">'.$row['name']."</option>";
									}
										
							 ?>
						</select>
						 <span class="val_brand"></span>
					</div>
				 </div>    
				 <div class="control-group">
					<label class="control-label" for="focusedInput">Full-List-Price</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="fullListPrice" type="text" value="<?php echo isset($_POST['fullListPrice'])?$_POST['fullListPrice']:'';?>" name="fullListPrice">
					   <span class="val_fullListPrice"></span>
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label" for="focusedInput">Retail-Price</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="retailPrice" type="text" value="<?php echo isset($_POST['retailPrice'])?$_POST['retailPrice']:'';?>" name="retailPrice">
					   <span class="val_retailPrice"></span>
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label" for="focusedInput">Wholesale-Price</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="wholeSalePrice" type="text" value="<?php echo isset($_POST['wholeSalePrice'])?$_POST['wholeSalePrice']:'';?>" name="wholeSalePrice">
					   <span class="val_wholeSalePrice"></span>
					</div>
				 </div>
				<div class="control-group">
					<label class="control-label" for="fileInput">Image</label>
					 <div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name="file1">
						 <span class="val_image1"></span>
					 </div>
				</div>  
				<div class="control-group">
					<label class="control-label" for="fileInput">Image</label>
					 <div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name="file2">
						 <span class="val_image2"></span>
					 </div>
				</div>  
				<div class="control-group">
					<label class="control-label" for="fileInput">Image</label>
					 <div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name="file3">
						 <span class="val_image3"></span>
					 </div>
				</div>  
				<div class="control-group">
					<label class="control-label" for="fileInput">Image</label>
					 <div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name="file4">
						 <span class="val_image4"></span>
					 </div>
				</div>  
				<div class="control-group">
					<label class="control-label" for="fileInput">Image</label>
					 <div class="controls">
						<input class="input-file uniform_on" id="fileInput" type="file" name="file5">
						 <span class="val_image5"></span>
					 </div>
				</div>  
				<div class="control-group">
					<label class="control-label" for="focusedInput">Max-Quantity</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="quantity" type="text" value="<?php echo isset($_POST['quantity'])?$_POST['quantity']:'';?>" name="quantity">
					   <span class="val_quantity"></span>
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label" for="selectError">Category</label>
					<div class="controls">
						<select id="category" data-rel="chosen" name="category">
							<option value="0">-Select Category-</option>
								<?php
									$data = array();
									$index = array();
									$query = mysql_query("SELECT id, parent_id, name FROM category_master ORDER BY name");
									while ($row = mysql_fetch_assoc($query)) {
										$id = $row["id"];
										$parent_id = $row["parent_id"] === NULL ? "NULL" : $row["parent_id"];
										$data[$id] = $row;
										$index[$parent_id][] = $id;
									}
									/*
									 * Recursive top-down tree traversal example:
									 * Indent and print child nodes
									 */
									function display_child_nodes($parent_id, $level)
									{
										global $data, $index;
										$parent_id = $parent_id === NULL ? "NULL" : $parent_id;
										if (isset($index[$parent_id])) {
											foreach ($index[$parent_id] as $id) {
												$indent=str_repeat("-",$level);
												echo '<option value="'.$indent.$data[$id]["id"].'">'.$indent.$data[$id]["name"].'</option>';
												display_child_nodes($id, $level + 1);
											}
										}
									}
									display_child_nodes(0, 0);
										
								?>
						</select>
						 <span class="val_category"></span>
					</div>
				</div>        
				<div class="control-group">
					<label class="control-label" for="focusedInput">Weight</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="weight" type="text" value="<?php echo isset($_POST['weight'])?$_POST['weight']:'';?>" name="weight">
					</div>
			    </div>
				 <div class="control-group">
					<label class="control-label" for="focusedInput">Barcode</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="barcode" type="text" value="<?php echo isset($_POST['barcode'])?$_POST['barcode']:'';?>" name="barcode">
					  <span class="val_barcode"></span>
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
