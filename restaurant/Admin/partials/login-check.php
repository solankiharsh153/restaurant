<?php

    if(!isset($_SESSION['user']))
    {
        $_SESSION['not-logged-in'] = "Please login to access Admin Panel";
        header("location:" .SITEURL. 'Admin/login.php');
    }

?>