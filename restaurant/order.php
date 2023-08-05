<?php include('partials-frontend/menu.php'); ?>

    <?php

        if(isset($_GET['food_id']))
        {
            $food_id = $_GET['food_id'];

            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            if($count==1)
            {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                header("location:" .SITEURL);
            }

        }
        else
        {
            header("location:" .SITEURL);
        }

    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" class="order" method="POST">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Paneer Hawain Pizza" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3> <?php echo $title;  ?> </h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price">₹ <?php echo $price;  ?> </p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>

                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Harsh Solanki" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 6351261615" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. harsh@kalpataruinnovation.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php

        if(isset($_POST['submit']))
        {
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price * $qty;
            $order_date = date("Y-m-d h:i:sa");
            $status = "Ordered";
            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];

            $sql2 = "INSERT INTO tbl_order SET
            food = '$food',
            price = $price,
            qty = $qty,
            total = $total,
            order_date = '$order_date',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address'
            ";

            $res2 = mysqli_query($conn, $sql2);

            if($res2 == TRUE)
            {
                $_SESSION['order'] = "<div class='text-center'>Order placed successfully </div>";
                header("location:" .SITEURL);

            }
            else
            {
                $_SESSION['order'] = "<div class='text-center'>Failed to place order </div>";
                header("location:" .SITEURL);
            }


        }
        

    ?>

 

    <!-- footer Section Starts Here -->
    <?php include('partials-frontend/footer.php'); ?>
    <!-- footer Section Ends Here -->

</body>
</html>