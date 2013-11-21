<?php 
/*
	File Name 		:- edit-profile.php
	Description		:- to edit the profile of admin
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	if(isset($_REQUEST['id'])){
			$getAdminData="SELECT * FROM admin_master WHERE `id`='".$_REQUEST['id']."'";
			$result=mysql_query($getAdminData) or die('Error'.mysql_error());
			$row=mysql_fetch_array($result);
		if(isset($_POST['submit'])){
			if(!empty($_FILES["file"]["name"])) {
				$allowedExts = array("jpg", "jpeg", "gif", "png","JPG","JPEG","GIF","PNG");
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
								$existImageName=$imageName;
								if (file_exists("../images/" .$existImageName))
								  {
									unlink("../images/" .$existImageName);
								  }
								else
								  {
								
										if(move_uploaded_file($_FILES["file"]["tmp_name"],
									  "images/" .$imageName))
										{
											$dest="images/";
											if(file_exists("../images/".$existImageName))
											{
												unlink("../images/".$existImageName);
											}
											$width=150;
											$height=150;
											$newImageName=create_thumb($dest, $width, $height,$imageName);
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
				$_POST['image']=$row['image'];
			}
			print_r($_POST);
			$updateAdminData=update_admin_data($_POST);
			if(isset($updateAdminData)){
				header("location:profile.php");
			}
			else{
				header("location:edit-profile.php?id=$id");
			}
		}
		if(isset($_POST['cancel'])){
			header("location:profile.php");
		}
	}
?>
<title>Edit Admin Details</title>
	<form action="" method="POST" enctype="multipart/form-data"> 
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="profile.php">Dashboard</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-edit"></i> Edit Admin Details</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<?php
					
				?>
				<input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
				<div class="box-content">
				  <div class="control-group">
					<label class="control-label" for="focusedInput">Firstname</label>
					<div class="controls">
					  <input class="input-xlarge focused" id="firstName" type="text" value="<?php echo $row['firstname'];?>" name="firstName">
					</div>
				 </div>
				  <div class="control-group">
					<label class="control-label">Lastname</label>
					<div class="controls">
						<input class="input-xlarge focused" id="lastName" type="text" value="<?php echo $row['lastname'];?>" name="lastName">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label">Email</label>
					<div class="controls">
						<input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row['email'];?>" name="email">
					</div>
				  </div>
				  <div class="control-group">
					<label class="control-label" for="selectError3">Gender</label>
					<div class="controls">
					  <select id="gender" name="gender">
						<?php
							$gender=array("male","female");
							for($i=0;$i<count($gender); $i++) {
								if($i==$row['gender'])
								{
									echo '<option selected="selected" value="'.$gender[$i].'">'.$gender[$i]."</option>";
								}
								echo '<option value="'.$gender[$i].'">'.$gender[$i]."</option>";
							}
						?>
					  </select>
				    </div>
		          </div>
				 <div class="control-group">
					<label class="control-label">Address</label>
					 <div class="controls">
						<textarea  name="address" id="textarea2" cols="50" rows="3"><?php echo $row['address'];?></textarea>
					 </div>
				</div>
				<div class="control-group">
					<label class="control-label">Phone_No</label>
					<div class="controls">
						<input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row['phone_no'];?>" name="phoneNo">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Change image</label>
					<div class="controls">
						<img src="images/<?php echo $row['image'] ?>">
						<input class="input-file uniform_on" id="fileInput" type="file" name="file">
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
    
<?php include_once('include/footer.php'); ?>

