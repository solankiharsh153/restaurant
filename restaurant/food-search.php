<?php include('partials-frontend/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <?php

                $search = mysqli_real_escape_string($conn, $_POST['search']);

            ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php

                //Get the keyword
                
                $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];

                        ?>

                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="<?php echo $title; ?>" class="img-responsive img-curve">
                            </div>
            
                            <div class="food-menu-desc">
                                <h4> <?php echo $title; ?> </h4>
                                <p class="food-price"> <?php echo $price; ?> </p>
                                <p class="food-detail">
                                    <?php echo $description; ?>
                                </p>
                                <br>
            
                                <a href="#" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                    <?php

                    }
                }
                else
                {
                    echo "The Searched item is not available";
                }

            ?>





            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->


    <!-- footer Section Starts Here -->
    <?php include('partials-frontend/footer.php'); ?>
    <!-- footer Section Ends Here -->

</body>
</html>