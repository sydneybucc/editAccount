<?php
	require_once('phpscripts/config.php');
    confirm_logged_in();
    $tbl = "tbl_user";
    $users = getAll($tbl);

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
</head>
<body>
    <h1>Delete User Page</h1>
    <?php
        while($row = mysqli_fetch_array($users)){
            echo "{$row['user_fname']}<a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Delete User</a><br>";
        }
    ?>
</body>
</html>