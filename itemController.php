<?php 
include 'db.php';

if (isset($_POST['add'])) {		
	$name 			= $_POST['name'];
	$category 		= $_POST['category'];
	$description 	= $_POST['description'];
	$coast 			= $_POST['coast'];
	$date 			= $_POST['date'];
	$insert		= mysql_query("INSERT INTO `item`(`item_name`, `category`, `description`, `coast`, `date`) 
		VALUES ('$name','$category','$description','$coast','$date')")
		or die('could not Select :'.mysql_error());				   	
}

if (isset($_POST['update'])) {		
	$id 			= $_POST['id'];
	$name 			= $_POST['name'];
	$category 		= $_POST['category'];
	$description 	= $_POST['description'];
	$coast 			= $_POST['coast'];
	$date 			= $_POST['date'];
	$update		= mysql_query("UPDATE `item` SET `item_name`='$name',`category`='$category',`description`='$description',`coast`='$coast',`date`='$date'
		WHERE `id`='$id' ")
		or die('could not Select :'.mysql_error());				   	
}

if (isset($_POST['delete'])) {		
	$id 		= $_POST['id'];	
	$delete		= mysql_query("DELETE FROM `item` WHERE `id`='$id' ")
	or die('could not Select :'.mysql_error());				   
}

header("location:view_items.php");
?>