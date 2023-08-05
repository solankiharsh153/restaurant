<?php include('../config/connect.php') ?>
<html>

    <head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login ">
            <h1 class="text-center">Login</h1>

            <!-- Start Form -->
            <br>

            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['not-logged-in']))
                {
                    echo ($_SESSION['not-logged-in']);
                    unset($_SESSION['not-logged-in']);
                }
            ?>
            <br><br>


                <form action="" method="post" class="text-center">
                    Username :
                    <input type="text" name="username" placeholder = "Enter Username " required >

                    <br>

                    Password :
                    <input type="password" name="password" placeholder = "Enter Password " required>

                    <br><br>

                    <input type="submit" name="submit" value="Login" class="btn-primary ">
                </form>

            <!-- End Form -->
            <br>
            <p class="text-center">Created by - <a href="https://www.kalpataruinnovation.com/">Kalpataru Innovation</a></p>

        </div>

    </body>
</html>

<?php

    if(isset($_POST['submit']))
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //echo "user avail";
            $_SESSION['login'] = "Login Successful";
            $_SESSION['user'] = $username;
            header("location:" .SITEURL. 'Admin/');
        }
        else
        {
            echo "user not found";
            $_SESSION['login'] = "Invalid Credentials";
            header("location:" .SITEURL. 'Admin/login.php');
        }

    }

?>