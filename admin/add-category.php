<?php 
/*
	File Name 		:- add-category.php
	Description		:- add new category in that file
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	include_once('include/connection.php');
	include_once('include/functions.php');
	
	if(isset($_POST['submit'])){
		$allowedExts = array("jpg", "jpeg", "gif", "png");
		$filename=$_FILES["file"]["name"];
		$bits = explode(".", $filename);
		$imgName=current($bits);
		$extension = end($bits);
			if ((($_FILES["file"]["type"] == "image/gif")
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
						if (file_exists("../images/" .$existImageName))
						{
							unlink("../images/" .$existImageName);
						}
						else
						{
							if(move_uploaded_file($_FILES["file"]["tmp_name"],"images/" .$imageName))
							{
								$dest="images/category_images/thumbnail/";
								if(file_exists("..images/category_images/thumbnail/".$existImageName))
								{
									unlink("..images/category_images/thumbnail/".$existImageName);
								}
								$width=150;
								$height=150;
								$newImageName=create_thumb($dest, $width, $height,$imageName);
								$_POST['image']=$newImageName;
							}
							
						}
					}
			}
			else
			{
				echo "Invalid file";
					
			}
		$addCategoryData=insert_data($_POST);
		if(isset($addCategoryData)){
			header("location:category.php");
		}
		else{
			header("location:add-category.php");
		}
	}
	if(isset($_POST['cancel'])){
		header("location:category.php");
	}
?>
	<title>Add Category</title>
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
	<form action="add-category.php" method="POST" enctype="multipart/form-data" id="add-category"> 
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
					<h2><i class="icon-add"></i> Add Category</h2>
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
					<label class="control-label">Description</label>
					 <div class="controls">
						<textarea  name="description" id="description" cols="50" rows="3"><?php echo isset($_POST['description'])?$_POST['description']:'';?></textarea>
					 </div>
				</div>
				<div class="control-group">
					<label class="control-label" for="fileInput">Image</label>
					 <div class="controls">
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
							function display_child_nodes($parent_id, $level)
							{
										global $data, $index;
										$parent_id = $parent_id === NULL ? "NULL" : $parent_id;
										if (isset($index[$parent_id])) {
											foreach ($index[$parent_id] as $id) {
												$indent=str_repeat("-",$level);
												echo '<option value="'.$data[$id]["id"].'">'.$indent.$data[$id]["name"].'</option>';
												display_child_nodes($id, $level + 1);
											}
										}
									}
									display_child_nodes(0, 0);
										
								?>
			  </select>
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


