<?php include('partials-frontend/menu.php'); ?>

<section class="food-search text-center">
        <div class="container">
            
           <h1 class="bigfont">CATEGORIES</h1>

        </div>
    </section>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

<!--            <a href="category-foods.html">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
            </a>

-->

            <?php

            $sql = "SELECT * FROM tbl_category WHERE active='Yes' ";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0)
            {
                while ($row = mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>

                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php

                                if($image_name=="")
                                {
                                    echo "Image not available";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="" class="img-responsive img-curve">
                                    <?php
                                }

                            ?>
                        

                            <h3 class="float-text text-white"><?php echo $title;?></h3>
                        </div>
                        </a>

                    <?php
                }

            }
            else
            {
                echo "Category not avail";
            }

            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


   

    <!-- footer Section Starts Here -->
    <?php include('partials-frontend/footer.php'); ?>
    <!-- footer Section Ends Here -->

</body>
</html>