<?php include('partials/menu.php');  ?>

<?php

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        // sql
        $sql2 = "SELECT * FROM tbl_food WHERE id = $id";
        $res2 = mysqli_query($conn,$sql2);

        $row = mysqli_fetch_assoc($res2);
        $title = $row['title'];
        $description = $row['description'];
        $price = $row['price'];
        $current_image = $row['image_name'];
        $current_category = $row['category_id'];
        $featured = $row['featured'];
        $active = $row['active'];

    }
    else
    {
        header("location:" .SITEURL. 'Admin/manage-food.php');
    }

?>

    <div class="main-content">
        <div class="wrapper">

            <h1>Update Food</h1>

            <br><br>

                <form action="" method="post" enctype="multipart/form-data">
                    <table class="table-30">

                        <tr>
                            <td>Title :</td>
                            <td>
                                <input type="text" name="title" placeholder="Enter the title" value="<?php echo $title ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Description :</td>
                            <td>
                            <textarea name="description" id="" cols="30" rows="5" > <?php echo $description ?> </textarea>
                            </td>
                        </tr>

                        <tr>
                            <td>Price :</td>
                            <td>
                            <input type="number" name="price" placeholder="Price" value="<?php echo $price ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Current Image:</td>
                            <td>
                                <?php

                                    if($current_image != "")
                                    {
                                        ?>
                                        <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image; ?>" width="100px">
                                        <?php
                                    }
                                    else
                                    {
                                        echo "No image found";
                                    }

                                ?>

                            </td>
                        </tr>

                        <tr>
                            <td>New Image:</td>
                            <td>
                                <input type="file" name="image" >
                            </td>
                        </tr>

                        <tr>
                            <td>Category :</td>
                            <td>
                                <select name="category" >

                                    <?php

                                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                        $res = mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);

                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $category_title = $row['title'];
                                                $category_id = $row['id'];
                                                ?>
                                                <option <?php if($current_category == $category_id){echo "Selected";} ?> value="<?php echo $category_id;?>"><?php echo $category_title; ?></option>
                                                <?php
                                            }

                                        }
                                        else
                                        {
                                            ?>
                                            <option value="0">Category</option>"
                                            <?php
                                        }
                                    
                                    ?>  

                                </select>
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
                                <input <?php if($active == "Yes"){ echo "checked";}?> type = "radio" name="active" value = "Yes">Yes
                                <input <?php if($active == "No") { echo "checked";}?> type = "radio" name="active" value = "No">No
                            </td>
                        </tr>

                        <tr >
                        <td colspan = 2>
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                            <input type = "submit" name="submit" value="Update Food" class="btn-secondary">
                            </td>
                        </tr>


                    </table>
                </form>

                <?php

                        if(isset($_POST['submit']))
                        {
                            //echo "clicked";
                            //Get details form form
                            $id = $_GET['id'];
                            $title = $_POST['title'];
                            $description = $_POST['description'];
                            $current_image = $_POST['current_image'];
                            $price = $_POST['price'];
                            $category = $_POST['category'];
                            $featured = $_POST['featured'];
                            $active = $_POST['active'];

                            //upload image
                            if(isset($_FILES['image']['name']))
                            {
                                $image_name = $_FILES['image']['name'];

                                if($image_name != "")
                                {
                                    $ext = explode('.', $image_name);
                                    $tmp = end($ext);

                                    $image_name = "Food_Name_".rand(0000,9999).'.'.$tmp;
                                    $source_path = $_FILES['image']['tmp_name'];
                                    $destination_path = "../images/food/".$image_name;
                                    $upload = move_uploaded_file($source_path, $destination_path);

                                    if($upload == FALSE)
                                    {
                                        $_SESSION['upload']= "Failed to upload image";
                                        header("location:" .SITEURL. 'Admin/manage-food.php');
                                        die();
                                    }

                                    if($current_image != "")
                                    {
                                        // remove image
                                        $path_remove = "../images/food/".$current_image;
                                        $remove = unlink($path_remove);

                                        if($remove == FALSE)
                                        {
                                            $_SESSION['failed-to-remove'] = "Failed to delete the old image";
                                            header("location:" .SITEURL. 'Admin/manage-food.php');
                                            die();
                                        }
                                    }
                                }
                                else
                                {
                                    $image_name = $current_image;
                                }

                            }
                            else
                            {
                                $image_name = $current_image;
                            }

                            

                            //update the Db

                            $sql3 = "UPDATE tbl_food SET 
                                    title = '$title',
                                    description = '$description',
                                    price = '$price',
                                    image_name = '$image_name',
                                    category_id = '$category',
                                    featured = '$featured',
                                    active = '$active'
                                    WHERE id = $id
                            ";
                            //Execute the query
                            $res3 = mysqli_query($conn, $sql3);

                            //check 
                            if($res3 == TRUE)
                            {                                
                                $_SESSION['food-updated']= "Food updated successfully";
                               // header("location:" .SITEURL. 'Admin/manage-food.php');
                               echo "<script> window.location.href='manage-food.php'; </script>";
                            }
                            else
                            {
                                //Redirect
                                $_SESSION['food-updated']= "Unable to update the food";
                                header("location:" .SITEURL.'Admin/manage-food.php');

                            }

                        
                        }
                        

                ?>
        </div>
    </div>

<?php   include('partials/footer.php')     ?>