<!-- Menu section start -->
<?php
            include('partials/menu.php') 
?>

<!-- Menu section end -->

 <!-- Main Content section start -->

        <div class = "main-content">
            <div class = "wrapper">
                    <h1 class="text-center"><strong>MANAGE CATEGORIES</strong></h1>

                    <br><br>

                    <?php
                        if(isset($_SESSION['add']))
                        {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
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
                        
                        if(isset($_SESSION['no-category-found']))
                        {
                                echo $_SESSION['no-category-found'];
                                unset($_SESSION['no-category-found']);
                        }
                        
                        if(isset($_SESSION['category-updated']))
                        {
                                echo $_SESSION['category-updated'];
                                unset($_SESSION['category-updated']);
                        }

                        if(isset($_SESSION['upload']))
                        {
                                echo $_SESSION['upload'];
                                unset($_SESSION['upload']);
                        }
                        
                        if(isset($_SESSION['failed-remove']))
                        {
                                echo $_SESSION['failed-remove'];
                                unset($_SESSION['failed-remove']);
                        }
                ?>

                <br><br>

                        <a href="add-categories.php" class = "btn-primary" >Add Category</a>

                         <table class="table-full">
                                        <tr>   
                                        <th>Sr. No.</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Feature</th>
                                        <th>Active</th>
                                        <th>Actions</th>
                                </tr>

                                <?php

                                        $sql = "SELECT * FROM tbl_category ";
                                        $res = mysqli_query($conn, $sql);

                                        $count = mysqli_num_rows($res);
                                        $sn = 1;

                                        if($count >0)
                                        {


                                                while ($row = mysqli_fetch_assoc($res))
                                                {
                                                        $id = $row['id'];
                                                        $title = $row['title'];
                                                        $image_name = $row['image_name'];
                                                        $featured  = $row['featured'];
                                                        $active = $row['active'];

                                                        
                                                ?>

                                                <tr>
                                                        <td> <?php echo $sn++; ?> </td>
                                                        <td> <?php echo $title; ?> </td>

                                                        <td> 
                                                                <?php 
                                                                        if($image_name!="")
                                                                        {
                                                                                ?>
                                                                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" width="100px"  >
                                                                                <?php
                                                                        }
                                                                        else
                                                                        {
                                                                                echo "Image not available";
                                                                        }
                                                                ?> 
                                                        </td>

                                                        <td> <?php echo $featured; ?> </td>
                                                        <td> <?php echo $active; ?> </td>
                                                        <td>
                                                        <a href = "<?php echo SITEURL; ?>admin/update-categories.php?id=<?php echo $id; ?>" class = "btn-secondary">Update Category</a> 
                                                        <a href="<?php echo SITEURL; ?>admin/delete-categories.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class = "btn-danger">Delete Category</a>
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