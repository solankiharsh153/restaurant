<?php include('partials/menu.php');  ?>

    <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_order WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count==1)
            {

                $row = mysqli_fetch_assoc($res);

                $id = $row['id'];
                $food = $row['food'];
                $price = $row['price'];
                $qty = $row['qty'];
                $total = $row['total'];
                $order_date = $row['order_date'];
                $status = $row['status'];
                $customer_name = $row['customer_name'];
                $customer_contact = $row['customer_contact'];
                $customer_email = $row['customer_email'];
                $customer_address = $row['customer_address'];

            }
            else
            {
                header("location:" .SITEURL. 'Admin/manage-order.php');                
            }

        }
        else
        {
            header("location:" .SITEURL. 'Admin/manage-order.php');
        }
    ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Order</h1>

            <br><br>

                <form action="" method="post">

                    <table class="table-30">

                        <tr>
                            <td>Food Name :</td>
                            <td> <input type="text" name="food" value="<?php echo $food; ?>"></td>
                        </tr>

                        <tr>
                            <td>Price :</td>
                            <td> <input type="number" name="price" value="<?php echo $price; ?>"></td>
                        </tr>

                        <tr>
                            <td> Quantity :</td>
                            <td> <input type="number" name="qty" value="<?php echo $qty; ?>"> </td>

                        </tr>

                        <tr>
                                <td>Status :</td>
                                <td>
                                    <select name="status" >
                                        <option <?php if($status=="Ordered"){echo "selected";} ?> value="ordered">Ordered</option>
                                        <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                                        <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                                        <option <?php if($status=="Cancelled"){echo "selected";} ?> value="Cancelled">Cancelled</option>
                                    </select>
                                </td>
                        </tr>

                        <tr>
                            <td>Customer Name :</td>
                            <td>
                                <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Customer Contact :</td>
                            <td>
                                <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Customer Email :</td>
                            <td>
                                <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Customer Address :</td>
                            <td>
                                <textarea name="customer_address"  cols="30" rows="5"> <?php echo $customer_address; ?> </textarea>
                                
                            </td>
                        </tr>

                        <tr>
                            <td colspan='2'>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                <input type="submit" name="submit" value="Update Order" class="btn-secondary"> 
                            </td>
                        </tr>

                    </table>

                </form>

                <?php

                    if(isset($_POST['submit']))
                    {
                        // update the details
                       // echo "clicked";

                        //fetch
                        $id = $_POST['id'];
                        $food = $_POST['food'];
                        $price = $_POST['price'];
                        $qty = $_POST['qty'];
                        $status = $_POST['status'];
                        $customer_name = $_POST['customer_name'];
                        $customer_contact = $_POST['customer_contact'];
                        $customer_email = $_POST['customer_email'];
                        $customer_address = $_POST['customer_address'];

                        //execute

                        $sql2 = "UPDATE tbl_order SET
                            qty = '$qty',
                            total = $total,
                            status = '$status',
                            customer_name  = '$customer_name',
                            customer_contact  = '$customer_contact',
                            customer_email  = '$customer_email',
                            customer_address  = '$customer_address'
                            WHERE id=$id
                        ";

                        $res2 = mysqli_query($conn, $sql2);

                        if($res2==TRUE)
                        {
                            $_SESSION['updated'] = "Order updated succcessfully";
                            echo "<script> window.location.href='manage-order.php'; </script>";

                        }
                        else
                        {
                            $_SESSION['updated'] = "Failed to update order";
                            header("location:" .SITEURL. 'Admin/manage-order.php');
                        }

                        //save to db 
                    }

                ?>

        </div>
    </div>

<?php   include('partials/footer.php')     ?>