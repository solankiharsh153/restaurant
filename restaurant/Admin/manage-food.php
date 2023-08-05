<!-- Menu section start -->
<?php
            include('partials/menu.php') 
?>

<!-- Menu section end -->

 <!-- Main Content section start -->

        <div class = "main-content">
            <div class = "wrapper">
                    <h1 class="text-center"><strong>MANAGE FOOD</strong></h1>
                        
                    <br><br>

                    
                    <?php

                        if(isset($_SESSION['food-added']))
                        {
                        echo $_SESSION['food-added'];
                        unset($_SESSION['food-added']);
                        }

                        if(isset($_SESSION['delete']))
                        {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                        }

                        if(isset($_SESSION['remove']))
                        {
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                        }

                        if(isset($_SESSION['unauthorize']))
                        {
                        echo $_SESSION['unauthorize'];
                        unset($_SESSION['unauthorize']);
                        }

                        if(isset($_SESSION['upload']))
                        {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                        }

                        if(isset($_SESSION['failed-to-remove']))
                        {
                        echo $_SESSION['failed-to-remove'];
                        unset($_SESSION['failed-to-remove']);
                        }

                        
                        if(isset($_SESSION['food-updated']))
                        {
                        echo $_SESSION['food-updated'];
                        unset($_SESSION['food-updated']);
                        }
                        ?>

                        <br><br>

                        <a href="add-food.php" class = "btn-primary" >Add Food</a>
                        
                        <table class="table-full">
                                        <tr>   
                                                <th>Sr. No.</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Category ID</th>
                                                <th>Featured</th>
                                                <th>Active</th>
                                                <th>Actions</th>
                                        </tr>

                                

                                        <?php

                                                $sql = "SELECT * FROM tbl_food";
                                                $res = mysqli_query($conn, $sql);

                                                $count = mysqli_num_rows($res);
                                                $sn = 1;

                                                if($count>0)
                                                {
                                                       while( $row = mysqli_fetch_assoc($res))
                                                       {
                                                         $id = $row['id'];
                                                         $title = $row['title'];
                                                         $description = $row['description'];
                                                         $price = $row['price'];
                                                         $image_name = $row['image_name'];
                                                         $category_id = $row['category_id'];
                                                         $featured = $row['featured'];
                                                         $active = $row['active'];

                                                         ?>
                                                                                  
                                                         <tr>
                                                         <td> <?php echo $sn++; ?></td>
                                                         <td><?php echo $title; ?></td>
                                                         <td> <?php echo $description; ?></td>
                                                         <td><?php echo $price; ?></td>
                                                         <td>
                                                                 <?php
                                                                         if($image_name != "")
                                                                         {
                                                                                 ?>
                                                                                         <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" width="100px"  >
                                                                                 <?php
                                                                         }
                                                                         else
                                                                         {
                                                                                 echo "Image not available";
                                                                         }
                                                                 ?>
                                                         </td>
                                                         <td><?php echo $category_id; ?></td>
                                                         <td><?php echo $featured; ?></td>
                                                         <td><?php echo $active; ?></td>
                                                         <td>
                                                                <a href = "<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class = "btn-secondary">Update Food</a> 
                                                                <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class = "btn-danger">Delete Food</a>
                                                         </td>


                                                 </tr>

                                                               
                                                <?php

                                                        }

                                                        
                                                               
                                                               
                                                }

                                                
                                        ?>


                        </table>


            </div>
        </div>
<!-- Main Content section end -->

                   
<!-- Footer section start -->

        <?php
            include('partials/footer.php')
        ?>

<!-- Footer section end -->