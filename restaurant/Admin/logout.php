<?php

    include('../config/connect.php') ;
    session_destroy();
    header("location:" .SITEURL. 'Admin/login.php');

?>