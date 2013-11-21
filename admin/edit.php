<?php 
/*
	File Name 		:- edit.php
	Description		:- edit user information
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	ob_start();
	include_once('include/authenticate.php');
	include_once('include/headers.php');
	if(isset($_REQUEST['id'])){
		$id=$_REQUEST['id'];	
		if(isset($_POST['submit'])){
			
			$updateUserData=update_user_data($_POST);
			if(isset($updateUserData)){
				header("location:user-list.php");
			}
			else{
				header("location:edit.php?id=$id");
			}
		}
		if(isset($_POST['cancel'])){
			header("location:user-list.php");
		}
	}
?>

<title>Edit User Details</title>
	<form action="" method="POST"> 
		<div>
			<ul class="breadcrumb">
				<li>
					<a href="#">Home</a> <span class="divider">/</span>
				</li>
				<li>
					<a href="#">User Management</a>
				</li>
			</ul>
		</div>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-edit"></i> Edit User</h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
					</div>
				</div>
				<?php
					if(isset($_REQUEST['id'])){
						$getUserData="SELECT * FROM user_master WHERE `id`='".$_REQUEST['id']."'";
						$result=mysql_query($getUserData) or die('Error'.mysql_error());
						$row=mysql_fetch_array($result);
					}
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
					<label class="control-label">Username</label>
					<div class="controls">
						<input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row['email'];?>" name="userName">
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
						<input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row['contact'];?>" name="phoneNo">
					</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="focusedInput">Status</label>
				<div class="controls">
				  <input class="input-xlarge focused" id="focusedInput" type="text" value="<?php echo $row['status'];?>" name="status">
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
			<label class="control-label" for="selectError">Country</label>
			<div class="controls">
				  <select id="country" data-rel="chosen" name="country">
					<?php
						$country=array("India","Albania","Algeria","American Samoa","Anguilla","Argentina","Azerbaijan","Bahamas","Barbados","Chad");
						for($i=0;$i<count($country); $i++) {
						    if($i==$row['country'])
						    {
						    	echo '<option selected="selected" value="'.$country[$i].'">'.$country[$i]."</option>";
						    }
							echo '<option value="'.$country[$i].'">'.$country[$i]."</option>";
						}
				 ?>
			  </select>
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
