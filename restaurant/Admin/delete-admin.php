<?php

    include('C:\xampp\htdocs\restaurant\config\connect.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM tbl_admin WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    if( $res == TRUE)
    {
        //echo "Admin Deleted";
        $_SESSION['delete'] = "Admin Deleted";
        header("location:" .SITEURL. 'Admin/Manage-admin.php');
    }
    else
    {
        //echo "error";
        $_SESSION['delete'] = "Error in deleting Admin";
        header("location:" .SITEURL. 'Admin/Manage-admin.php');
    }

?>