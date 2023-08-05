<?php

    include('C:\xampp\htdocs\restaurant\config\connect.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove from storage
        if($image_name != "")
        {
            $path = "../images/food/".$image_name;

            //remove image from folder
            $remove = unlink($path);

            if($remove == FALSE)
            {
               $_SESSION['remove'] = "Failed to remove the image";
               header("location:" .SITEURL. 'Admin/manage-food.php');
               die();

            }
            
        }

        $sql = "DELETE FROM tbl_food WHERE id = $id";

        $res = mysqli_query($conn, $sql);

        if( $res == TRUE)
        {
            //echo "Admin Deleted";
            $_SESSION['delete'] = "Food Deleted";
            header("location:" .SITEURL. 'Admin/manage-food.php');
        }
        else
        {
            //echo "error";
            $_SESSION['delete'] = "Error in deleting food";
            header("location:" .SITEURL. 'Admin/manage-food.php');
        }
    }
    else
    {
        $_SESSION['unauthorize'] = "Unauthorized Access";
        header("location:" .SITEURL. 'Admin/manage-food.php');
    }

?>