<?php
	require_once('phpscripts/config.php');
    confirm_logged_in();
    $id = $_SESSION['user_id'];
    // echo $id;
    $tbl = "tbl_user";
    $col = "user_id";
    $popForm = getSingle($tbl,$col,$id);
    $found_user = mysqli_fetch_array($popForm,MYSQLI_ASSOC);
    // echo $found_user;

    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);
            $result = editUser($id,$fname,$username,$password,$email);
            $message = $result;
        }
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Panel</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="css/foundation.css">
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/admin_main.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
    <h1 class="hidden">Edit User Page</h1>
    <?php if(!empty($message)){echo $message;}?>
    <form action="admin_edituser.php" method="post">
        <label>First Name:</label>
        <input  type="text" name="fname" value="<?php echo $found_user['user_fname'];?>">
        <label>Username:</label>
        <input  type="text" name="username" value="<?php echo $found_user['user_name'];?>">
        <label>Password:</label>
        <input  type="text" name="password" value="<?php echo $found_user['user_pass'];?>">
        <label>Email:</label>
        <input  type="text" name="email" value="<?php echo $found_user['user_email'];?>">
        <label>User Level:</label>
        <input type="submit" name="submit" value="Edit User">
    </form>
</body>
</html>