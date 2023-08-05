<!-- Menu section start -->
<?php
            include('partials/menu.php') 
?>

<!-- Menu section end -->

 <!-- Main Content section start -->

        <div class = "main-content">
            <div class = "wrapper">
                    <h1 class="text-center"><strong>MANAGE ORDER</strong></h1>

                    <br><br>

                    <?php
                            if(isset($_SESSION['updated']))
                            {
                                echo $_SESSION['updated'];
                                unset($_SESSION['updated']);
                            }
                    ?>
                        

                  
                        <table class="table-full">
                                        <tr>   
                                        <th>Sr. No.</th>
                                        <th>Food</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Customer Name</th>
                                        <th>Customer Contact</th>
                                        <th>Customer Email</th>
                                        <th>Customer Address</th>
                                        <th>Actions</th>
                                </tr>

                                <?php

                                        $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
                                        $res = mysqli_query($conn, $sql);
                                        $count = mysqli_num_rows($res);

                                        $sn = 1;

                                        if($count >0)
                                        {
                                                // order avail
                                                while($row = mysqli_fetch_assoc($res))
                                                {
                                                        $id = $row['id'];
                                                        $food = $row['food'];
                                                        $price = $row['price'];
                                                        $qunatity = $row['qty'];
                                                        $total = $row['total'];
                                                        $order_date = $row['order_date'];
                                                        $status = $row['status'];
                                                        $customer_name = $row['customer_name'];
                                                        $customer_contact = $row['customer_contact'];
                                                        $customer_email = $row['customer_email'];
                                                        $customer_address = $row['customer_address'];

                                                        ?>

                                                                <tr>
                                                                        <td> <?php echo $sn++; ?> </td>
                                                                        <td> <?php echo $food; ?> </td>
                                                                        <td> <?php echo $price; ?> </td>
                                                                        <td> <?php echo $qunatity; ?> </td>
                                                                        <td> <?php echo $total; ?> </td>
                                                                        <td> <?php echo $order_date; ?> </td>
                                                                        <td> <?php echo $status; ?> </td>
                                                                        <td> <?php echo $customer_name; ?> </td>
                                                                        <td> <?php echo $customer_contact; ?> </td>
                                                                        <td> <?php echo $customer_email; ?> </td>
                                                                        <td> <?php echo $customer_address; ?> </td>
                                                                        <td>
                                                                        <a href = "<?php echo SITEURL; ?>Admin/update-order.php?id=<?php echo $id;?>" class = "btn-secondary">Update</a>  
                                                                        <!--<a class = "btn-danger">Delete Order</a> -->
                                                                        </td>
                                                                </tr>


                                                        <?php

                                                }
                                        }
                                        else
                                        {
                                                // Order not avail
                                                ?>
                                                <tr>
                                                        <td colspan='12'>No orders placed yet.</td> 
                                                </tr>
                                                <?php
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