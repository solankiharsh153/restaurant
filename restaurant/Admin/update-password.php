<?php include('partials/menu.php');  ?>

    <div class="main-content">
        <div class="wrapper">

            <h1>Change Password</h1>

            <br><br>

            <?php

                    if(isset($_GET['id']))
                    {
                        $id = $_GET['id'];
                    }

            ?>

            <form action="" method="POST">

                    <table class="table-30">

                        <tr>
                            <td>Old Password:</td>
                            <td> 
                                <input type="password" name="old_password" placeholder="Enter your old password.">
                            </td>
                        </tr>

                        <tr>
                            <td>New Password:</td>
                            <td>
                                <input type="password" name="new_password" placeholder= "Enter the new password">
                            </td>
                        </tr>

                        <tr>
                            <td>Confirm Password:</td>
                            <td>
                                <input type="password" name="confirm_password" placeholder="Confirm your password">
                            </td>
                        </tr>

                        <tr colspan = 2>
                       <td>
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                         <input type = "submit" name="submit" value="Change Password" class="btn-secondary">
                        </td>
                    </tr>

                    </table>

            </form>

        </div>
    </div>

    <?php

                if(isset($_POST['submit']))
                {
                    $id = $_POST['id'];
                    $old_password = md5($_POST['old_password']);
                    $new_password = md5($_POST['new_password']);
                    $confirm_password = md5($_POST['confirm_password']);

                    $sql = " SELECT * FROM tbl_admin WHERE id= $id AND password = '$old_password'";

                    $res = mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        $count = mysqli_num_rows($res);

                        if($count==1)
                        {
                            if($new_password == $confirm_password)
                            {
                                //echo "Password Changed";
                                $sql2 = "UPDATE tbl_admin SET
                                            password = '$new_password'
                                            WHERE id = $id
                                            ";

                                $res2 = mysqli_query($conn, $sql2);

                                if($res2 == TRUE)
                                {
                                    $_SESSION['pwd-change'] = "Password Changed Successfully";
                                    header("location:" .SITEURL. 'Admin/Manage-admin.php');
                                }
                                else
                                {
                                    $_SESSION['pwd-change'] = "Error in Password Changing";
                                    header("location:" .SITEURL. 'Admin/Manage-admin.php');
                                }
                            }
                            else
                            {
                                $_SESSION['pwd-not-match'] = "Password did not match";
                                header("location:" .SITEURL. 'Admin/Manage-admin.php');
                            }
                        }
                        else
                        {
                            //echo "User does not exist";
                            $_SESSION['user-not-found'] = "User not found";
                            header("location:" .SITEURL. 'Admin/Manage-admin.php');
                        }
                    }
                }
                

    ?>

<?php include('partials/footer.php'); ?>