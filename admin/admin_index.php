<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Panel</title>
</head>
<body>
	<?php echo $_SESSION['user_name'];  ?>
	<a href="admin_createuser.php"><br>Create User</a>
	<a href="admin_edituser.php"><br>Edit User</a>
	<a href="admin_deleteuser.php"><br>Delete User</a>
	<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>