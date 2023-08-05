<?php

    include('C:\xampp\htdocs\restaurant\config\connect.php');
    include('login-check.php');

?>


<html>

    <head>

        <title>Admin Panel </title>
        <link rel="stylesheet" href="../css/admin.css">

    </head>

    <body>

            <!-- Menu section start -->
            <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>Admin/index.php" title="Logo">
                    <img src="../images/logomain.png" alt="Restaurant Logo" width="60%">
                </a>
            </div>
                <div class = "menu text-right">
                    
                    <div class = "full-width">

                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="Manage-admin.php">Admin</a></li>
                            <li><a href="manage-categories.php">Category</a></li>
                            <li><a href="manage-food.php">Food</a></li>
                            <li><a href="manage-order.php">Order</a></li>
                            <li><a href="logout.php">Logout</a></li>

                        </ul>

                    </div>

                </div>

    </body>
</html>