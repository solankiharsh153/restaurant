            <!-- Menu section start -->
        <?php
            include('partials/menu.php') 
        ?>

        
            <!-- Menu section end -->

            <!-- Main Content section start -->

                         
                        

                <div class = "main-content">
                    <div class = "wrapper">

                    <?php
                            /*if(isset($_SESSION['login']))
                            {
                                echo $_SESSION['login'];
                                unset($_SESSION['login']);
                            } */
                    ?>

                    <br>

                        <h1 class="text-center"><strong>DASHBOARD</strong></h1>

                        <br>
                        <br>
                        
                        <div class="col-4 text-center">

                            <?php

                                $sql = "SELECT * FROM tbl_category";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);

                            ?>

                            <h1> <?php echo $count; ?> </h1>
                            <br>
                            Categories
                        </div>


                        <div class="col-4 text-center">
                        <?php

                            $sql2 = "SELECT * FROM tbl_food";
                            $res2 = mysqli_query($conn, $sql2);
                            $count2 = mysqli_num_rows($res2);

                        ?>
                            <h1> <?php echo $count2; ?> </h1>
                            <br>
                            Foods
                        </div>


                        <div class="col-4 text-center">
                        
                        <?php

                            $sql3 = "SELECT * FROM tbl_order";
                            $res3 = mysqli_query($conn, $sql3);
                            $count3 = mysqli_num_rows($res3);

                        ?>

                            <h1> <?php echo $count3; ?> </h1>
                            <br>
                            Orders
                        </div>


                        <div class="col-4 text-center">

                            <?php
                                $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                                $res4 = mysqli_query($conn, $sql4);
                                $row4 = mysqli_fetch_assoc($res4);

                                $total = $row4['Total'];
                            ?>

                            <h1>₹. <?php echo $total; ?></h1>
                            <br>
                            Revenue
                        </div>

                        <div class="clearfix"></div>

                        

                    </div>
                </div>

                <div class="side-content">
                    <div class="wrapper">
                        <h1 class="text-center"><strong>TOP SELLING CATEGORY</strong></h1>

                        <br><br>

                                <!-- CAtegories Section Starts Here -->
                                        <section class="categories">
                                            <div class="container">
                                            <!-- <h2 class="text-center">Explore Foods</h2> -->

                                                <?php

                                                    $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
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

                                                                <a href="#">
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
                    </div>

                </div>

            <!-- Main Content section end -->

            <!-- Footer section start -->

           <?php
           include('partials/footer.php')
           ?>

            <!-- Footer section end -->