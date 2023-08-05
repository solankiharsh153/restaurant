<?php include('partials-frontend/menu.php'); ?>

    <section class="food-search text-center">
        <div class="container">
            
           <h1 class="bigfont">CONTACT US</h1>

        </div>
    </section>

    
                          
    

    <div class="main-content">
        <div class="wrapper">
            <div class="background">

            <br><br>

                <?php
                    if(isset($_SESSION['msg-send']))
                        {
                            echo $_SESSION['msg-send'];
                            unset($_SESSION['msg-send']);
                        }

                ?>

                    <div class="side-col">
                    
                    </div>

                    <div class="main-col">

                    

                        <h1 class="text-center">GET IN TOUCH</h1>
                        

                        <div class="expand">

                            <form action="" method="POST">
                                <table>

                                    <tr>
                                        <td>
                                            <input type="text" name="first_name" placeholder="First Name" class="field" >
                                        </td>
                                        <td>
                                        <input type="text" name="last_name" placeholder="Last Name" class="field" >
                                        </td>

                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <input type="email" name="email" placeholder="Your Email" class="field">
                                        </td>   
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <input type="tel" name="mobile" placeholder="Your Contact Number" class="field">
                                        </td>   
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <textarea name="msg"   cols="30" rows="10" placeholder="Your Message" class="text-msg"></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" name="submit" value="SUBMIT" class="form-button">
                                        </td>
                                    </tr>

                                </table>
                            </form>

                            <?php
   

                                if(isset($_POST['submit']))
                                {
                                    $first_name = $_POST['first_name'];
                                    $last_name = $_POST['last_name'];
                                    $email = $_POST['email'];
                                    $mobile =  $_POST['mobile'];
                                    $msg = $_POST['msg'];

                                    $sql = "INSERT INTO tbl_contact SET
                                    first_name = '$first_name',
                                    last_name = '$last_name',
                                    email = '$email',
                                    mobile = '$mobile',
                                    msg = '$msg'
                                    ";


                                $res = mysqli_query($conn, $sql) or die(mysqli_error());

                                if($res == TRUE)
                                {
                                    $_SESSION['msg-send'] = " We'll get in touch with you shortly.";
                                    echo "<script> window.locathion.href = 'contact.php'; </script>";
                                }
                                else
                                {
                                    $_SESSION['msg-send'] = "Error";
                                    header("location:" .SITEURL. 'contact.php');
                                }
                                }
                                

                            ?>

                            
                            

                        </div>
                    </div> 

                    <div class="side-col">

                    </div>
            </div>


        </div>
    </div>

    <br><br>
   
    <div class = "main-content">
                    <div class = "wrapper">

                         <br><br>                 
                        <div class="col-3 text-center margin-left">

                        <span class="icon">
                            <i class="fa fa-phone"> </i>
                           </span> 
                            <br><br>
                           <p class="details"> +91 63512-61615</p> 

                        </div>


                        <div class="col-3 text-center">
                        
                           <span class="icon">
                            <i class="fa fa-envelope"> </i>
                           </span> 
                            <br><br>
                           <p class="details"> harsh@kalpataruinnovation.com</p> 
                        </div>


                        <div class="col-3 text-center">
                        
                        <span class="icon">
                            <i class="fa fa-map-pin"> </i>
                           </span> 
                            <br><br>
                           <p class="details"> 403, Hira Panna, Sattapir Road, Navsari</p> 
                            
                        </div>
                        

                        
                        <div class="clearfix"></div>
                        <br><br>
                        

                    </div>
                </div>

                

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.9600048100606!2d72.92254527942319!3d20.954121240535798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be0f7fde24e2a4b%3A0x78f53a0b4b3e2edb!2sKalpataru%20Innovation!5e0!3m2!1sen!2sin!4v1691220318606!5m2!1sen!2sin" width="1518px" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    

<?php include('partials-frontend/footer.php'); ?>