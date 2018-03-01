<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		//$date = new DateTime(); //I wanted to have it so that when a new user is made, the database wouldn't set a login date (only updates once the user logs in again); if NULL, they logged in for the first time, if not NULL, they logged in before.
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
		$user_set = mysqli_query($link, $loginstring);
		//echo mysqli_num_rows($user_set);
		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name']= $founduser['user_fname'];
			if(mysqli_query($link, $loginstring)){
				$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
				//$update = "UPDATE tbl_user SET user_date='{$date}' WHERE user_id={$id}"; //trying to apply what I said above
				$updatequery = mysqli_query($link, $update);
			}
			redirect_to("admin_edituser.php"); //changed from admin_index.php, first time logins will start by editing their page.
		}else{
			$message = "Username/Password is incorrect";
			return $message;
		}

		mysqli_close($link);
	}
?>