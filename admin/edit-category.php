<?php 
/*
	File Name 		:- edit-category.php
	Description		:- edit category details
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	if(isset($_REQUEST['id'])){
		$getCategoryData="SELECT * FROM category_master WHERE `id`='".$_REQUEST['id']."'";
		$result=mysql_query($getCategoryData) or die('Error'.mysql_error());
		$getCategoryRow=mysql_fetch_array($result);
	}
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];	
		if(isset($_POST['submit'])){
			if(!empty($_FILES["file"]["name"])) {
				$allowedExts = array("jpg", "jpeg", "gif", "png","JPG","JPEG","GIF","PNG");
				$filename=$_FILES["file"]["name"];
				$bits = explode(".", $filename);
				$imgName=current($bits);
				$extension = end($bits);
				if ((($_FILES['file']['type'] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/png")
				|| ($_FILES["file"]["type"] == "image/pjpeg"))
				&& in_array($extension, $allowedExts))
				  {
					  if ($_FILES["file"]["error"] > 0)
						{
						echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
						}
					 else
						 {
							$newImageName=time();
							$imageName=$newImageName."_".$imgName.".".$extension;
							echo $imageName;
							$existImageName=$imageName;
							if(file_exists("../images/" .$existImageName))
							 {
								unlink("../images/" .$existImageName);
							 }
							else
							  {
							
								if(move_uploaded_file($_FILES["file"]["tmp_name"],"images/" .$imageName))
								{
									$dest="images/category_images/thumbnail/";
									if(file_exists("../images/category_images/thumbnail/".$existImageName))
									{
										unlink("../images/category_images/thumbnail/".$existImageName);
									}
									$width=150;
									$height=150;
									$newImageName=create_thumb($dest, $width, $height,$imageName);
									echo $newImageName;
									$_POST['image']=$newImageName;
								}
								 echo "Your image upload successfully !!";
							   ?>
									
							   <?php 
							}
					}
				  }
				else
				  {
					echo "Invalid file";
					
				  }
			}
			else
			{
				$_POST['image']=$getCategoryRow['image'];
			}
			$updateCategoryData=update_Category_data($_POST);
			if(isset($updateCategoryData)){
				header("location:category.php");
			}
			else{
				header("location:edit-category.php?id=$id");
			}
		}
		if(isset($_POST['cancel'])){
			header("location:category.php");
		}
	}
?>
<title>Edit Category</title>
	<form action="" method="POST" enctype="multipart/form-data"> 
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
		<div class="row-fluid sortable">
			
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-edit"></i> Edit Category</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				
				<?php
					
				?>
				<input type="hidden" name="id" value="<?php echo $getCategoryRow['id'];?>"/>
				<div class="box-content">
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Name</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="firstName" type="text" value="<?php echo $getCategoryRow['name'];?>" name="name">
					</div>
				 </div>
				 <div class="control-group">
					<label class="control-label">Description</label>
					 <div class="controls">
						<textarea  name="description" id="textarea2" cols="50" rows="3"><?php echo $getCategoryRow['description'];?></textarea>
					 </div>
				</div>
				<div class="control-group">
					<label class="control-label">Change image</label>
					<div class="controls">
						<img src="images/category_images/thumbnail/<?php echo $getCategoryRow['image'] ?>">
						<input class="input-file uniform_on" id="fileInput" type="file" name="file">
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
										display_child_nodes($id, $level +1,$cat_id);
									}
								}
							}
							display_child_nodes(0, 0,$getCategoryRow['parent_id']);
						?>
			  </select>
			</div>
		  </div> 
			  <div class="control-group">
				<label class="control-label" for="focusedInput">Status</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $getCategoryRow['status'];?>" name="status">
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

