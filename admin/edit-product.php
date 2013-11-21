
<?php 
/*
	File Name 		:- edit-product.php
	Description		:- edit product page
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	if(isset($_REQUEST['id'])){
		$getProductData="SELECT * FROM product_master WHERE `id`='".$_REQUEST['id']."'";
		$result=mysql_query($getProductData) or die('Error'.mysql_error());
		$getProductRow=mysql_fetch_array($result);
		$getImage=mysql_query("select * from image_master where product_id='".$getProductRow['id']."'") or die('Error'.mysql_error());
		$counter=mysql_num_rows($getImage);
		if(isset($_POST['submit'])){
			if(isset($_POST['checkbox'])){
				if(count($_POST['checkbox'])>0){
					for($i=0;$i<count($_POST['checkbox']);$i++){
						$del_id=$_POST['checkbox'][$i];
						$queryDelete= "DELETE FROM image_master WHERE id='$del_id'";
						$resultDelete = mysql_query($queryDelete);
					}
				}
			}
			echo $counter;
			for($i=1;$i<=5-$counter;$i++){
				$allowedExts = array("jpg", "jpeg", "gif", "png","JPG","JPEG","GIF","PNG");
				$filename=$_FILES["file".($i)]["name"];
				echo $filename;
				$bits = explode(".", $filename);
				$imgName=current($bits);
				$extension = end($bits);
				if ((($_FILES["file".($i)]["type"] == "image/gif")
				|| ($_FILES["file".($i)]["type"] == "image/jpeg")
				|| ($_FILES["file".($i)]["type"] == "image/png")
				|| ($_FILES["file".($i)]["type"] == "image/pjpeg"))
				&& in_array($extension, $allowedExts))
				{
					if ($_FILES["file".($i)]["error"] > 0)
					{
						echo "Return Code: " . $_FILES["file".($i)]["error"] . "<br>";
					}
					else
					{
						$newImageName=time();
						$imageName=$newImageName."_".$imgName.".".$extension;
						$existImageName=$imageName;
							if(move_uploaded_file($_FILES["file".($i)]["tmp_name"],"images/" .$imageName))
							{
								$dest="images/product_images/thumbnail/";
								if(file_exists("..images/product_images/thumbnail/".$existImageName))
								{
									unlink("..images/product_images/thumbnail/".$existImageName);
								}
								$width=150;
								$height=150;
								$newImageName=create_thumb($dest, $width, $height,$imageName);
								$_POST['image']=$newImageName;
								echo $newImageName;
								$query="INSERT INTO `image_master`(`product_id`,`image`)VALUES ('".$_REQUEST['id']."','". $_POST['image']."')";
								echo $query;
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
			$updateProductData=update_Product_data($_POST);
			if(isset($updateProductData)){
				header("location:product.php");
			}
			else{
				header("location:edit-product.php?id=$id");
			}
		}
	}
	if(isset($_POST['cancel'])){
		header("location:product.php");
	}
?>
<title>Edit Product</title>
	<form action="" method="POST" enctype="multipart/form-data"> 
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
					<h2><i class="icon-edit"></i>Edit Product</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<input type="hidden" name="id" value="<?php echo $getProductRow['id'];?>"/>
				<div class="box-content">
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Code</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="code" type="text" value="<?php echo $getProductRow['product_code'];?>" name="code">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Name</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="name" type="text" value="<?php echo $getProductRow['productname'];?>" name="name">
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label">Description</label>
					 <div class="controls">
						<textarea  name="description" id="description" cols="50" rows="3"><?php echo $getProductRow['description'];?></textarea>
					 </div>
				</div>
				 <div class="control-group">
					<label class="control-label" for="selectError">Manufacture</label>
					<div class="controls">
						<select id="manufacture" data-rel="chosen" name="manufacture">
							<?php
								$manufacture=mysql_query("select * from manufacture_master") or die('Error'.mysql_error());
								while($resultManufacture=mysql_fetch_array($manufacture)) {
									if($getProductRow['manufacture']==$resultManufacture['id']){
											echo '<option selected=selected value="'.$resultManufacture['id'].'">'.$resultManufacture['name']."</option>";
										}
										echo '<option value="'.$resultManufacture['id'].'">'.$resultManufacture['name']."</option>";
								}
										
							?>
						</select>
					</div>
				</div>     
				 <div class="control-group">
					<label class="control-label" for="selectError">Brand</label>
					<div class="controls">
						<select id="brand" data-rel="chosen" name="brand">
								<option value="0">-Select Brand-</option>
								<?php
									$brand=mysql_query("select * from brand_master") or die('Error'.mysql_error());
									while($resultBrand=mysql_fetch_array($brand)) {
										if($getProductRow['brand']==$resultBrand['id']){
											echo '<option selected="selected" value="'.$resultBrand['id'].'">'.$resultBrand['name']."</option>";
										}
											echo '<option value="'.$resultBrand['id'].'">'.$resultBrand['name']."</option>";
									}
										
							 ?>
						</select>
					</div>
				</div>     
				 <div class="control-group">
					<label class="control-label" for="focusedInput">Full-List-Price</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="fullListPrice" type="text" value="<?php echo $getProductRow['full_list_price'];?>" name="fullListPrice">
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label" for="focusedInput">Retail-Price</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="retailPrice" type="text" value="<?php echo $getProductRow['retail_price'];?>" name="retailPrice">
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label" for="focusedInput">Wholesale-Price</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="wholeSalePrice" type="text" value="<?php echo $getProductRow['wholesaler_price'];?>" name="wholeSalePrice">
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label">Change image</label>
					<div class="controls">
						
								<?php 
								if($counter>0)
								{
								?>
									<table class="table table-striped bootstrap-datatable">
									<thead>
										<th><label class="checkbox"><input type="checkbox" id="status" value="enable" name="chk">Delete</label></th>
										<th>Image</th>
									</thead>
									<tbody>
								<?php while($resultImage=mysql_fetch_array($getImage)){
								?>
									<tr>
										<td><label class="checkbox"><input type="checkbox" id="checkbox" value="<?php echo $resultImage['id']?>" name="checkbox[]"></label></td>
										<td><img src="images/product_images/thumbnail/<?php echo $resultImage['image'] ?>"></td>
									</tr>
								<?php
									}
								}
								for($i=5;$i>$counter;$i--){?>
									<input class="input-file uniform_on" id="fileInput" type="file" name="file<?php echo (5-$i)+1 ; ?>" />
									<br/>
								<?php } ?>
								</tbody>
							</table>
					</div>
			    </div>
				<div class="control-group">
					<label class="control-label" for="focusedInput">Max-Quantity</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="quantity" type="text" value="<?php echo $getProductRow['max_quantity'];?>" name="quantity">
					</div>
				 </div>
				<div class="control-group">
					<label class="control-label" for="selectError">Category</label>
					<div class="controls">
						<select id="category" data-rel="chosen" name="category">
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
									function display_child_nodes($parent_id, $level,$cat_id)
									{
										global $data, $index;
										$parent_id = $parent_id === NULL ? "NULL" : $parent_id;
										if (isset($index[$parent_id])) {
											foreach ($index[$parent_id] as $id) {
												$indent=str_repeat("-",$level);
												if($data[$id]["id"]==$cat_id){
													echo '<option selected="selected" value="'.$data[$id]["id"].'">'.$indent.$data[$id]["name"].'</option>';
												}
												echo '<option value="'.$data[$id]["id"].'">'.$indent.$data[$id]["name"].'</option>';
												
												display_child_nodes($id, $level + 1,$cat_id);
											}
											
										}
									}
									display_child_nodes(0, 0,$getProductRow['cat_id']);
										
								?>
						</select>
					</div>
				</div>        
				<div class="control-group">
					<label class="control-label" for="focusedInput">Weight</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="weight" type="text" value="<?php echo $getProductRow['weight'];?>" name="weight">
					</div>
			    </div>
				 <div class="control-group">
					<label class="control-label" for="focusedInput">Barcode</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="barcode" type="text" value="<?php echo $getProductRow['barcode'];?>" name="barcode">
					  <span class="val_barcode"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="focusedInput">Status</label>
					<div class="controls">
						<input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $getProductRow['status'];?>" name="status">
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
