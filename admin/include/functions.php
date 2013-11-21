<?php
/*
	File Name 		:- functions.php
	Description		:- all user-defined functions that used in other php file
	Developer ID	:- tricore.dev20
	Date			:- 18/11/2013 
*/
	require_once 'connection.php';
	
	$table=array('admin_master','user_master','category_master');
	function confirm_query($resultQuery)
	{
		if(!$resultQuery)
		{
			die("Database query failed".mysql_error());
		}
	}
	
	function select_query($data){
		global $connection;
		global $table;
		$query="select * from $table[0] where `email`='".$data['username']."' AND `password`='".sha1($data['password'])."'";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function view_user_info(){
		global $connection;
		global $table;
		$query="select * from $table[1]";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function update_user_data($data)
	{
		$updateQuery="UPDATE `user_master` SET `firstname`='".$data['firstName']."',`lastname`='".$data['lastName']."',`email`='".$data['userName']."',`address`='".$data['address']."',`contact`='".$data['phoneNo']."',`gender`='".$data['gender']."',`country`='".$data['country']."',`status`='".$data['status']."' WHERE `id`='".$data['id']."'";	
		$resultUpdateQuery=mysql_query($updateQuery);
		confirm_query($resultUpdateQuery);
		return $resultUpdateQuery;
	}
	function delete_user_detail($id)
	{
		$deleteQuery="DELETE FROM `user_master` WHERE `id`='$id'";
		$resultDeleteQuery=mysql_query($deleteQuery);
		confirm_query($resultDeleteQuery);
		return $resultDeleteQuery;
	}
	function view_category_info(){
		global $connection;
		global $table;
		$query="select * from $table[2]";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function update_Category_data($data)
	{
		$data['description']=mysql_real_escape_string($data['description']);
		$updateQuery="UPDATE `category_master` SET `name`='".$data['name']."',`description`='".$data['description']."',`image`='".$data['image']."',`status`='".$data['status']."' WHERE `id`='".$data['id']."'";	
		$resultUpdateQuery=mysql_query($updateQuery);
		confirm_query($resultUpdateQuery);
		return $resultUpdateQuery;
	}
	function delete_category_detail($id)
	{
		$deleteQuery="DELETE FROM `category_master` WHERE `id`='$id'";
		$resultDeleteQuery=mysql_query($deleteQuery);
		confirm_query($resultDeleteQuery);
		return $resultDeleteQuery;
	}
	function insert_data($data)
	{
			
		global $connection;
		$data['description']=mysql_real_escape_string($data['description']);
		$query="INSERT INTO `category_master`(`name`,`description`,`image`,`parent_id`,`status`)
		VALUES ('".$data['name']."','". $data['description']."','".$data['image']."','".$data['category']."','".$data['status']."')";
		echo $query;
		$resultInsertUserData = mysql_query($query,$connection);
		confirm_query($resultInsertUserData);
		echo "Record Successfully Inserted";
		return $resultInsertUserData;
	}
	function insert_product_data($data){
		global $connection;
		$query="INSERT INTO `product_master`(`product_code`,`productname`, `description`,`manufacture`,`brand`,`full_list_price`,`retail_price`,`wholesaler_price`,`max_quantity`,`cat_id`,`weight`,`barcode`,`status`)
		VALUES ('".$data['code']."','".$data['name']."','". $data['description']."','".$data['manufacture']."','".$data['brand']."','".$data['fullListPrice']."','".$data['retailPrice']."','".$data['wholeSalePrice']."','".$data['quantity']."','".$data['category']."','".$data['weight']."','".$data['barcode']."','".$data['status']."')";
		$resultInsertUserData = mysql_query($query,$connection);
		confirm_query($resultInsertUserData);
		echo "Record Successfully Inserted";
		return $resultInsertUserData;
	}
	function view_product_info(){
		global $connection;
		$query="select * from product_master";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function update_Product_data($data){
		$updateQuery="UPDATE `product_master` SET `product_code`='".$data['code']."',`productname`='".$data['name']."',`description`='".$data['description']."',`manufacture`='".$data['manufacture']."',`brand`='".$data['brand']."',`full_list_price`='".$data['fullListPrice']."',`retail_price`='".$data['retailPrice']."',`wholesaler_price`='".$data['wholeSalePrice']."',`max_quantity`='".$data['quantity']."',`cat_id`='".$data['category']."',`weight`='".$data['weight']."',`barcode`='".$data['barcode']."',`status`='".$data['status']."' WHERE `id`='".$data['id']."'";
		$resultUpdateQuery=mysql_query($updateQuery);
		confirm_query($resultUpdateQuery);
		return $resultUpdateQuery;
	}
	function delete_product_detail($id)
	{
		$deleteQuery="DELETE FROM `product_master` WHERE `id`='$id'";
		$resultDeleteQuery=mysql_query($deleteQuery);
		confirm_query($resultDeleteQuery);
		return $resultDeleteQuery;
	}
	function insert_brand_data($data){
		global $connection;
		$query="INSERT INTO `brand_master`(`name`,`status`)
		VALUES ('".$data['name']."','".$data['status']."')";
		$resultInsertUserData = mysql_query($query,$connection);
		confirm_query($resultInsertUserData);
		echo "Record Successfully Inserted";
		return $resultInsertUserData;
	}
	function view_brand_info(){
		global $connection;
		$query="select * from brand_master";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function update_Brand_data($data){
		$updateQuery="UPDATE `brand_master` SET `name`='".$data['name']."',`status`='".$data['status']."' WHERE `id`='".$data['id']."'";	
		echo $updateQuery;
		$resultUpdateQuery=mysql_query($updateQuery);
		confirm_query($resultUpdateQuery);
		return $resultUpdateQuery;
	}
	function delete_brand_detail($id)
	{
		$deleteQuery="DELETE FROM `brand_master` WHERE `id`='$id'";
		$resultDeleteQuery=mysql_query($deleteQuery);
		confirm_query($resultDeleteQuery);
		return $resultDeleteQuery;
	}
	function insert_manufacture_data($data){
		global $connection;
		$query="INSERT INTO `manufacture_master`(`name`,`status`)
		VALUES ('".$data['name']."','".$data['status']."')";
		$resultInsertUserData = mysql_query($query,$connection);
		confirm_query($resultInsertUserData);
		echo "Record Successfully Inserted";
		return $resultInsertUserData;
	}
	function view_manufacture_info(){
		global $connection;
		$query="select * from manufacture_master";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function update_manufacture_data($data){
		$updateQuery="UPDATE `manufacture_master` SET `name`='".$data['name']."',`status`='".$data['status']."' WHERE `id`='".$data['id']."'";	
		echo $updateQuery;
		$resultUpdateQuery=mysql_query($updateQuery);
		confirm_query($resultUpdateQuery);
		return $resultUpdateQuery;
	}
	function delete_manufacture_detail($id)
	{
		$deleteQuery="DELETE FROM `manufacture_master` WHERE `id`='$id'";
		$resultDeleteQuery=mysql_query($deleteQuery);
		confirm_query($resultDeleteQuery);
		return $resultDeleteQuery;
	}
	function insert_shipping_data($data){
		global $connection;
		$query="INSERT INTO `shipping_master`(`status`,`rate_type`,`rate`)
		VALUES ('".$data['shipping']."','".$data['rateType']."','".$data['rate']."')";
		$resultInsertUserData = mysql_query($query,$connection);
		confirm_query($resultInsertUserData);
		echo "Record Successfully Inserted";
		return $resultInsertUserData;
	}
	function view_shipping_info(){
		global $connection;
		$query="select * from shipping_master";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function update_shipping_data($data){
		$updateQuery="UPDATE `shipping_master` SET `status`='".$data['shipping']."',`rate_type`='".$data['rateType']."',`rate`='".$data['rate']."' WHERE `id`='".$data['id']."'";	
		$resultUpdateQuery=mysql_query($updateQuery);
		confirm_query($resultUpdateQuery);
		return $resultUpdateQuery;
	}
	function insert_tax_data($data){
		global $connection;
		$query="INSERT INTO `tax_master`(`status`,`tax`)
		VALUES ('".$data['status']."','".$data['tax']."')";
		$resultInsertUserData = mysql_query($query,$connection);
		confirm_query($resultInsertUserData);
		echo "Record Successfully Inserted";
		return $resultInsertUserData;
	}
	function view_tax_info(){
		global $connection;
		$query="select * from tax_master";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function update_tax_data($data){
		$updateQuery="UPDATE `tax_master` SET `status`='".$data['status']."',`tax`='".$data['tax']."' WHERE `id`='".$data['id']."'";	
		$resultUpdateQuery=mysql_query($updateQuery);
		confirm_query($resultUpdateQuery);
		return $resultUpdateQuery;
	}
	function view_admin_info(){
		global $connection;
		$query="select * from admin_master";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function update_admin_data($data)
	{
		$updateQuery="UPDATE `admin_master` SET `firstname`='".$data['firstName']."',`lastname`='".$data['lastName']."',`email`='".$data['email']."',`gender`='".$data['gender']."',`address`='".$data['address']."',`phone_no`='".$data['phoneNo']."',`image`='".$data['image']."',`status`='".$data['status']."' WHERE `id`='".$data['id']."'";
		$resultUpdateQuery=mysql_query($updateQuery);
		confirm_query($resultUpdateQuery);
		return $resultUpdateQuery;
	}
	function view_order_details(){
		global $connection;
		$query="select * from order_master";
		$result=mysql_query($query,$connection);
		confirm_query($result);
		return $result;
	}
	function update_order_data($data)
	{
		$updateQuery="UPDATE `order_master` SET `comment`='".$data['comment']."',`status`='".$data['status']."' WHERE `id`='".$data['id']."'";
		$resultUpdateQuery=mysql_query($updateQuery);
		confirm_query($resultUpdateQuery);
		return $resultUpdateQuery;
	}
	function create_thumb($dest, $width, $height,$fileName)
	{
			$targetPath ="images/".$fileName;
		
				
			if(!list($w, $h) = getimagesize($targetPath)) return "Unsupported picture type!";
				
			$type = strtolower(substr(strrchr($targetPath,"."),1));
			if($type == 'jpeg') $type = 'jpg';
			switch($type){
				case 'bmp': $img = imagecreatefromwbmp($targetPath); break;
				case 'gif': $img = imagecreatefromgif($targetPath); break;
				case 'jpg': $img = imagecreatefromjpeg($targetPath); break;
				case 'png': $img = imagecreatefrompng($targetPath); break;
				default : return "Unsupported picture type!";
			}
				
			if($height<=0) $height = $h * $width/$w;
				
			$new = imagecreatetruecolor($width, $height);
				
			// preserve transparency
			if($type == "gif" or $type == "png"){
				imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
				imagealphablending($new, false);
				imagesavealpha($new, true);
			}
				
			imagecopyresampled($new, $img, 0, 0, 0, 0, $width, $height, $w, $h);
				
			$destinationPath = $dest.$fileName;
			
			switch($type){
				case 'bmp': imagewbm/ypm/p($new, $destinationPath); break;
				case 'gif': imagegif($new, $destinationPath); break;
				case 'jpg': imagejpeg($new, $destinationPath); break;
				case 'png': imagepng($new, $destinationPath); break;
			}
			return $fileName;
		}
?>
