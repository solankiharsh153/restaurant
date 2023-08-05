<?php include('partials/menu.php') ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Food</h1>

            <br><br>

            <?php

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

            ?>

            <form action="" method="post" enctype = "multipart/form-data">
                <table class="table-30">

                        <tr>
                            <td>Title :</td>
                            <td>
                                <input type="text" name="title" placeholder="Enter the title">
                            </td>
                        </tr>

                        <tr>
                            <td>Description :</td>
                            <td>
                                <textarea name="description" id="" cols="30" rows="5"></textarea>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Price :</td>
                            <td>
                                <input type="number" name="price" placeholder="Price">
                            </td>
                        </tr>

                        <tr>
                            <td>Image :</td>
                            <td>
                                <input type="file" name="image" >
                            </td>
                        </tr>

                        <tr>
                            <td> Category :</td>
                            <td>
                                <select name="category" >

                                    <?php
                                    // Get the values from the DB

                                        //Sql Query
                                        $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                        //display
                                        $res = mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);

                                        if($count>0)
                                        {
                                            while($row = mysqli_fetch_assoc($res))
                                            {
                                                $id = $row['id'];
                                                $title = $row['title'];
                                                ?>
                                                <option value="<?php echo $id; ?>"> <?php echo $title; ?></option>
                                                <?php
                                            }
                                            
                                        }
                                        else
                                        {
                                            ?>
                                           // echo "";
                                           <option value="0">No category availabel</option>

                                           <?php
                                        }
                                    ?>


                                </select>
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
                            <input type = "submit" name="submit" value="Add Food" class="btn-secondary">
                            </td>
                        </tr>



                </table>
            </form>

            <?php

                    if(isset($_POST['submit']))
                    {
                        // submit clicked

                        // get data from form
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $price = $_POST['price'];
                        $category = $_POST['category'];

                        // featured
                        if(isset($_POST['featured']))
                        {
                          $featured = $_POST['featured'];
                        }
                        else
                        {
                             $featured = "No";
                        }
                        

                        //Active
 
                        if(isset($_POST['active']))
                        {
                         $active = $_POST['active'];
                        }
                        else
                        {
                         $active = "No";
                        }
 
                        

                        //get the image & change name
                        if(isset($_FILES['image']['name']))
                        {
                            $image_name = $_FILES['image']['name'];

                            if($image_name != "")
                            {

                                // Rename the image
                                //Divide the image into2 parts : name & the extension

                                    $ext = explode('.', $image_name);
                                    $tmp = end($ext);

                                    //Rename
                                    $image_name = "Food_Name_".rand(0000,9999).'.'.$tmp;

                                    $source_path = $_FILES['image']['tmp_name'];
                                    $destination_path = "../images/food/".$image_name;
                                    $upload = move_uploaded_file($source_path, $destination_path);

                                    if($upload==FALSE)
                                    {
                                        $_SESSION['upload']= "Failed to upload image";
                                        header("location:" .SITEURL. 'Admin/add-food.php');
                                        die();
                                    }

                            }
                        }
                        else
                        {
                            $image_name = "";
                        }
                        


                        //insert into db
                        $sql2 = " INSERT INTO tbl_food SET
                        title = '$title',
                        description = '$description',
                        price = $price,
                        image_name = '$image_name',
                        category_id = '$category',
                        featured = '$featured',
                        active = '$active'

                        ";

                        //Execute query
                        $res2 = mysqli_query($conn, $sql2);

                        //Redirect

                        if($res2 == TRUE)
                        {
                            $_SESSION['food-added'] = "Food Added Successfully";
                           // header("location:" .SITEURL. 'Admin/manage-food.php');
                           echo "<script> window.location.href('manage-food.php'); </script>";

                        }
                        else
                        {
                            $_SESSION['food-added'] = "Unable to add food";
                            header("location:" .SITEURL. 'Admin/manage-food.php');
                        }

                        
                    }
                    else
                    {
                        // Not clicked
                    }

            ?>




        </div>
    </div>

<?php include('partials/footer.php') ?>
