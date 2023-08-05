<?php

    include('C:\xampp\htdocs\restaurant\config\connect.php');

    if(isset($_GET['id']) AND isset($_GET['image_name']))
    {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //Remove from storage
        if($image_name != "")
        {
            $path = "../images/category/".$image_name;

            //remove image
            $remove = unlink($path);

            if($remove == FALSE)
            {
               $_SESSION['remove'] = "Failed to remove the image";
               header("location:" .SITEURL. 'Admin/manage-categories.php');
               die();

            }
            
        }

        $sql = "DELETE FROM tbl_category WHERE id = $id";

        $res = mysqli_query($conn, $sql);

        if( $res == TRUE)
        {
            //echo "Admin Deleted";
            $_SESSION['delete'] = "Category Deleted";
            header("location:" .SITEURL. 'Admin/manage-categories.php');
        }
        else
        {
            //echo "error";
            $_SESSION['delete'] = "Error in deleting category";
            header("location:" .SITEURL. 'Admin/manage-categories.php');
        }
    }
    else
    {
        $_SESSION['delete'] = "Error in deleting category";
        header("location:" .SITEURL. 'Admin/manage-categories.php');
    }

?>