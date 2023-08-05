<?php include('partials/menu.php');  ?>

<div class="main-content">
    <div class="wrapper">

        <h1>Update Categories</h1>

        <br><br>

        <?php

            if(isset($_GET['id']))
            {
               // echo "Get the data";
               $id = $_GET['id'];

               $sql = "SELECT * FROM tbl_category WHERE id = $id";
               $res = mysqli_query($conn, $sql);
               $count = mysqli_num_rows($res);
   
               if($count == 1)
               {
   
                       $row = mysqli_fetch_assoc($res);
   
                       $title = $row['title'];
                       $current_image = $row['image_name'];
                       $featured = $row['featured'];
                       $active = $row['active'];
                       
                   
               }
               else
               {
                    $_SESSION['no-category-found'] = "No category found";
                    header("location:" .SITEURL. 'Admin/manage-categories.php');
               }
            }
            else
            {

                header("location:" .SITEURL. 'Admin/manage-categories.php');
            }

        ?>

        <form action="" method = "post" enctype = "multipart/form-data">

        <table class="table-30">

            <tr>
                <td>Title :</td>
                <td>
                    <input type = "text" name="title" placeholder="Category Title" value="<?php echo $title; ?>" required>
                </td>
            </tr>

            <tr>
                <td>Current Image :</td>
                <td>
                    <?php
                        if($current_image != "")
                        {
                            //display
                            ?>
                                 <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image; ?>" width="100px"  >
                            <?php
                        }
                        else
                        {
                            //No image
                            echo "No image found";
                        }
                    ?>
                </td>
            </tr>

            
            <tr>
                <td>New Image :</td>
                <td>
                   <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>Featured :</td>
                <td>
                    <input <?php if($featured == "Yes") { echo "checked";} ?> type = "radio" name="featured" value = "Yes">Yes
                    <input <?php if($featured == "No") { echo "checked";} ?> type = "radio" name="featured" value = "No">No
                    
                </td>
            </tr>

            <tr>
                <td>Active :</td>
                <td>
                    <input <?php if($active == "Yes") { echo "checked";} ?>  type = "radio" name="active" value = "Yes">Yes
                    <input <?php if($active == "No") { echo "checked";} ?> type = "radio" name="active" value = "No">No
                </td>
            </tr>

            <tr >
            <td colspan = 2>
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input type = "submit" name="submit" value="Update Category" class="btn-secondary">
                </td>
            </tr>

        </table>

        </form>

        <?php

                        if(isset($_POST['submit']))
                        {
                            //echo "clicked";
                            //Get the new values
                            $id = $_GET['id'];
                            $title = $_POST['title'];
                            $current_image = $_POST['current_image'];
                            $featured = $_POST['featured'];
                            $active = $_POST['active'];

                            //check whether image is selected or not
                            if(isset($_FILES['image']['name']))
                            {
                                $image_name = $_FILES['image']['name'];

                                if($image_name != "")
                                {
                                    // Image AVail
                                    
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
                                        header("location:" .SITEURL. 'Admin/manage-categories.php');
                                        die();
                                    }

                                    //Remove the image
                                    if($current_image != "")
                                    {
                                        $path_remove = "../images/category/".$current_image;
                                        $remove = unlink($path_remove);

                                        if($remove==FALSE)
                                        {
                                            $_SESSION['failed-remove'] = "Failed to remove old image";
                                            header("location:" .SITEURL. 'Admin/manage-categories.php');
                                            die();

                                        }
                                    }

                                    
                                }
                                else
                                {
                                    // Not avail
                                    $image_name = $current_image;
                                }

                            }
                            else
                            {
                                $image_name = $current_image;

                            }
                            //Update the New image



                            //Update the new DB
                            $sql2 = "UPDATE tbl_category SET
                            title = '$title',
                            image_name = '$image_name',
                            featured = '$featured',
                            active = '$active'
                            WHERE id = $id
                            ";
                            
                            // Execture the category
                            $res2 = mysqli_query($conn, $sql2);

                            //Check whether executed or not
                            if($res2 == TRUE)
                            {
                                $_SESSION['category-updated'] = "Category updated successfully";
                                header("location:" .SITEURL. 'Admin/manage-categories.php');

                            }
                            else
                            {
                                $_SESSION['category-updated'] = "Failed to update the category";
                                header("location:" .SITEURL. 'Admin/manage-categories.php');
                            }

                            //Redirect

                        }
                        

        ?>

    </div>
</div>

<?php   include('partials/footer.php')     ?>