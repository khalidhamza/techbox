<?php

include 'db.php';
if (isset($_POST['email']) && isset($_POST['password']) ) {	
	
	$email 		= $_POST['email'];
	$password 	= md5($_POST['password']);

	$check		= mysql_query("SELECT * FROM `user` WHERE `email`='$email' AND `password`='$password'")
	or die('could not Select :'.mysql_error());

	if (mysql_num_rows($check) > 0) {
		while ($row=mysql_fetch_array($check)) {
			$user_id 	=$row['id'];
			$first_name =$row['first_name'];
			$last_name 	=$row['last_name'];			
			$user_name 	=$first_name." ". $last_name;			
			session_start();
		 	$_SESSION["user"] = $user_name;
			$_SESSION["id"]   = $user_id;

			
		}
		
		$result = [
			'success' 	=> true,
			'msg' 		=> 'welcome',				
			'go'		=> 'index.php',
		];

	}else{		
		$result = [
			'success' 	=> false,
			'msg' 		=> 'incorrect username or password',
			'go'		=> 'login.php',
		];	
	} 
	
	echo json_encode($result);

}else{
	header("location: login.php");
}

?>