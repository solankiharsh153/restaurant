<?php

    include('C:\xampp\htdocs\restaurant\config\connect.php');
    include('login-check.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="C:\xampp\htdocs\restaurant\css\style.css">
    <link rel="stylesheet" href="C:\xampp\htdocs\restaurant\css\admin.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo SITEURL; ?>" title="Logo">
                    <img src="../images/logomain.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                             <li><a href="index.php">Home</a></li>
                            <li><a href="Manage-admin.php">Admin</a></li>
                            <li><a href="manage-categories.php">Category</a></li>
                            <li><a href="manage-food.php">Food</a></li>
                            <li><a href="manage-order.php">Order</a></li>
                            <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->