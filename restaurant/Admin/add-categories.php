<?php  include('partials/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>

            <br><br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }
            ?> 

            <form action="" method = "post" enctype = "multipart/form-data">

                <table class="table-30">

                    <tr>
                        <td>Title :</td>
                        <td>
                            <input type = "text" name="title" placeholder="Category Title" required>
                        </td>
                    </tr>

                    <tr>
                        <td>Select Image :</td>
                        <td>
                            <input type = "file" name="image" >
                        </td>
                    </tr>

                    <tr>
                        <td>Featured :</td>
                        <td>
                            <input type = "radio" name="featured" value = "Yes">Yes
                            <input type = "radio" name="featured" value = "No">No
                            
                        </td>
                    </tr>

                    <tr>
                        <td>Active :</td>
                        <td>
                            <input type = "radio" name="active" value = "Yes">Yes
                            <input type = "radio" name="active" value = "No">No
                        </td>
                    </tr>

                    <tr >
                    <td colspan = 2>
                        <input type = "submit" name="submit" value="Add Category" class="btn-secondary">
                        </td>
                    </tr>

                </table>

                </form>

                <?php

                    if(isset($_POST['submit']))
                    {
                       // echo "submitted";
                       // Get values

                       $title = $_POST['title'];

                       if(isset($_POST['featured']))
                       {
                         $featured = $_POST['featured'];
                       }
                       else
                       {
                            $featured = "No";
                       }

                       if(isset($_POST['active']))
                       {
                        $active = $_POST['active'];
                       }
                       else
                       {
                        $active = "No";
                       }

                       // Check the image is selected or not

                       //print_r($_FILES['image']);
                       //die();

                       if(isset($_FILES['image']['name']))
                       {
                        // Upload the file
                        $image_name = $_FILES['image']['name'];

                        //Let the image be empty 
                            if($image_name != "")
                            {

                                    

                                    // Rename the image
                                    //Divide the image into2 parts : name & the extension

                                    $ext = end(explode('.', $image_name));

                                    //Rename
                                    $image_name = "Food_Category_".rand(000,999).'.'.$ext;

                                    $source_path = $_FILES['image']['tmp_name'];
                                    $destination_path = "../images/category/".$image_name;
                                    $upload = move_uploaded_file($source_path, $destination_path);

                                    if($upload==FALSE)
                                    {
                                        $_SESSION['upload']= "Failed to upload image";
                                        header("location:" .SITEURL. 'Admin/add-categories.php');
                                        die();
                                    }
                            }
                       }
                       else
                       {
                        //Don't upload the file
                        $image_name = "";
                       }


                       //Create the query
                       $sql = "INSERT INTO tbl_category SET
                       title = '$title',
                       featured = '$featured',
                       active = '$active',
                       image_name = '$image_name'
                       ";

                       // insert into database
                       $res = mysqli_query($conn, $sql);

                       if($res == TRUE)
                       {
                        $_SESSION['add'] = "Category added successfully";
                        header("location:" .SITEURL. 'Admin/manage-categories.php');
                       }
                       else
                       {
                        $_SESSION['add'] = " Unable to add Category ";
                        header("location:" .SITEURL. 'Admin/add-categories.php');
                       }


                    }
                    

                ?>
        </div>
    </div>



<?php  include('partials/footer.php') ?>