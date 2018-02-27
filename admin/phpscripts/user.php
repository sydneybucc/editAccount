<?php
    function createUser($fname,$username,$password,$email,$userlvl){
        include('connect.php');
        $userString = "INSERT INTO tbl_user VALUES (NULL,'{$fname}','{$username}','{$password}','{$email}',NULL,'{$userlvl}','no')";
        // echo $userString;
        $userQuery = mysqli_query($link,$userString);
        if($userQuery){
            redirect_to('admin_index.php');
        }else{
            $message = "There was a problem setting up this user.";
            return $message;
        }
        

        mysqli_close($link);
    }

    function editUser($id,$fname,$username,$password,$email){
        include('connect.php');
        $updateString = "UPDATE tbl_user SET user_fname='{$fname}',user_name='{$username}',user_pass='{$password}',user_email='{$email}' WHERE user_id={$id}";
        
        $updateQuery = mysqli_query($link,$updateString);
        if($updateQuery){
            redirect_to('admin_index.php');
        }else{
            $message = 'Edit failed.';
            return $message;
        }
        mysqli_close($link);
    }

    function deleteUser($id){
        include('connect.php');
        $delString = "DELETE FROM tbl_user WHERE user_id={$id}";
        $delQuery = mysqli_query($link,$delString);
        if($delQuery){
            redirect_to('../admin_index.php');
        }else{
            $message = "Delete failed.";
            return $message;
        }

        mysqli_close($link);
    }

?>