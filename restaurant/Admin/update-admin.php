<?php include('partials/menu.php');  ?>

    <div class="main-content">

            <div class="wrapper">

                <h1>Update Admin</h1>

                <br><br>
                

                <?php

                    $id = $_GET['id'];
                    $sql = "SELECT * FROM tbl_admin WHERE id = $id ";
                    $res = mysqli_query($conn, $sql);

                    if($res == TRUE)
                    {
                            $count = mysqli_num_rows($res);

                            if($count==1)
                            {
                                    //echo "Admin Avail";
                                    $row = mysqli_fetch_assoc($res);

                                    $full_name = $row['full_name'];
                                    $username = $row['username'];
                                   // $password = md5( $row['password']);
                            }
                            else
                            {
                                header("location:" .SITEURL. 'Admin/Manage-admin.php');
                            }
                    }
                    else
                    {

                    }

                ?>
                <form action="" method="POST">
                    <table class="table-30">

                        <tr>
                            <td>Ful Name: </td>
                            <td>
                                <input type="text" name="full_name" value="<?php echo $full_name;?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Username: </td>
                            <td>
                                <input type="text" name="username" value=" <?php echo $username ?>">
                            </td>
                        </tr>
                        


                        <tr colspan = 2>
                            <td>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type = "submit" name="submit" value="Update Admin" class="btn-secondary">
                            </td>
                        </tr>


                    </table>
                </form>

            </div>

    </div>

    <?php

                    if(isset($_POST['submit']))
                    {
                        //echo "clicked";
                        $id = $_POST['id'];
                        $full_name = $_POST['full_name'];
                        $username = $_POST['username'];

                        $sql = "UPDATE tbl_admin SET 
                        full_name = '$full_name',
                        username = '$username'
                        WHERE id = '$id'
                        ";

                        $res = mysqli_query($conn, $sql);

                        if($res == TRUE)
                        {
                            $_SESSION['update'] = "Admin updated successfully";
                            header("location:" .SITEURL. 'Admin/Manage-admin.php');
                        }
                        else
                        {
                            $_SESSION['update'] = "Error in updating Admin details";
                            header("location:" .SITEURL. 'Admin/Manage-admin.php');
                        }

                    }
                    else
                    {
                        //echo "Not clicked";
                    }
                
    ?>

<?php include('partials/footer.php') ?>