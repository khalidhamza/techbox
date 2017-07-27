<?php

include 'db.php';

if (isset($_POST['add'])) {		
	$name 		= $_POST['name'];
	$insert		= mysql_query("INSERT INTO `category`(`name`) VALUES ('$name')")
	or die('could not Select :'.mysql_error());				   	
}

if (isset($_POST['update'])) {		
	$id 		= $_POST['id'];
	$name 		= $_POST['name'];
	$update		= mysql_query("UPDATE `category` SET `name`='$name' WHERE `id`='$id' ")
	or die('could not Select :'.mysql_error());				   	
}

if (isset($_POST['delete'])) {		
	$id 		= $_POST['id'];	
	$delete		= mysql_query("DELETE FROM `category` WHERE `id`='$id' ")
	or die('could not Select :'.mysql_error());				   
}

header("location:view_categories.php");

?>