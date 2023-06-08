<?php
    SESSION_START();
    include('php/connect.php');
    include('php/check_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php  
    include('php\head-tag.php');
?>
<body>
    <?php
        include('php/modal-pages.php')
    ?>
    <div class="main-gate">
        <?php
            include('php/out_header.php');
        ?>
        <div class="remaining">
            <div class="signupform-box">
                <div class="signup-cont">
                    <div class="header">
                        <h1>
                            Buyer - Signup
                        </h1>
                        <a>
                            <i class="fa fa-window-close"></i>
                        </a>
                    </div> 
                    <div class="form-results">
                        <?php
                            if (isset($_POST['signupbtn'])) {
                                $firstname = $_POST['firstN'];
                                $lastname = $_POST['lastN'];
                                $email = $_POST['emailA'];
                                $phone = $_POST['phoneN'];
                                $password = $_POST['passW']; 
                                $retype = $_POST['retp'];
                                // echo "dij";
                                $profile = $_FILES['profilepicture']['name'];
                                $phototype = $_FILES['profilepicture']['type'];
                                $phototmp_name = $_FILES['profilepicture']['tmp_name'];

                                $photo_explode = explode('.', $profile);
                                $photoexte = end($photo_explode);

                                $accepted_exte = ["image/jpeg", "image/jpg", "image/png", "image/HEIC"];
                                $check_email_ext = mysqli_query($server,"SELECT * from buyers WHERE email='$email'");
                                if (mysqli_num_rows($check_email_ext) > 0) {
                                    ?>
                                    <div class="failed">
                                        Error - email(<b><?php echo $email ?></b>) already exists!
                                    </div>
                                    <?php
                                }
                                elseif ($password != $retype) {
                                    ?>
                                    <div class="failed">
                                        Error - Passwords doesn't match!
                                    </div>
                                    <?php
                                }
                                elseif (in_array($phototype, $accepted_exte) == true) {
                                    $newprofileimagename = $email." - Profile image .png";
                                    $upload_pic = move_uploaded_file($phototmp_name,"images/buyers/profileimages/$newprofileimagename");
                                    $insert_buyer = mysqli_query($server,"INSERT into buyers values(null,'$firstname','$lastname','$email','$phone','$newprofileimagename','$password')");
                                    if ($upload_pic && $insert_buyer) {
                                        ?>
                                        <div class="succed">
                                            Congratulations the account is created successfully!
                                             - <?php echo $email ?> 
                                        </div>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <div class="failed">
                                            Error the account creation failed - 
                                            <b>Contact system support</b>
                                        </div>
                                        <?php
                                    }
                                }
                                else {
                                    ?>
                                    <div class="failed">
                                        Error! The type of image you are trying to upload is invalid.
                                        Pleased use <br> <b>
                                            "JPG", "JPEG", "PNG"
                                        </b>
                                    </div>
                                    <?php
                                }
                            }
                            
                        ?>
                    </div>

                    <form class="sign-box" action="" method="POST"  enctype="multipart/form-data">
                        <p>
                            Firstname
                        </p>
                        <p>
                            <input type="text" name="firstN" class="text-box" placeholder="Type..." required>
                        </p>
                        <p>
                            Lastname
                        </p>
                        <p>
                            <input type="text" name="lastN" class="text-box" placeholder="Type..." required>
                        </p>
                        <p>
                            Email address
                        </p>
                        <p>
                            <input type="email" name="emailA" class="text-box" placeholder="Type..." required>
                        </p>
                        <p>
                            Phone number
                        </p>
                        <p>
                            <input type="number" name="phoneN" class="text-box" placeholder="Type..." required>
                        </p>
                        <p>
                           Profile picture
                        </p>
                        <p>
                            <input type="file" name="profilepicture" id="" class="text-box" required>
                        </p>
                        <p>
                            Password
                        </p>
                        <p>
                            <input type="password" class="text-box" name="passW" placeholder="Type...">
                        </p>
                        <p>
                            Retype Password
                        </p>
                        <p>
                            <input type="password" class="text-box" name="retp"  placeholder="Type...">
                        </p>
                        <div class="btnz">
                            <button type="submit" name="signupbtn" class="signup-Btn">
                                <i class="fa fa-check"></i>
                                Signup
                            </button>
                            <button type="reset" class="clear-Btn">
                                <i class="fa fa-window-close"></i>
                                Clear form
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <?php
                include('php/big-footer.php'); include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>