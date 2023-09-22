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
<head>
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styling/main-style.css">
</head>
<body>
    <?php
        include('php/modal-pages.php');
        include('php/out_header.php');
    ?>
    <div class="buyer-sign-cont">
        <div class="buyer-sign-wrapper">
            <div class="sign-form-cont">
                <div class="header">
                    <h1>
                        Sellers - Request access
                    </h1>
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
                            $shopname = $_POST['shop'];
                            $profile = $_FILES['profilepicture']['name'];
                            $phototype = $_FILES['profilepicture']['type'];
                            $phototmp_name = $_FILES['profilepicture']['tmp_name'];

                            $photo_explode = explode('.', $profile);
                            $photoexte = end($photo_explode);

                            $accepted_exte = ["image/jpeg", "image/jpg", "image/png"];
                            $check_email_ext = mysqli_query($server,"SELECT * from sellers WHERE email='$email'");
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
                                // Changing the image name
                                $newprofileimagename = $email." - Profile image .png";
                                // Uploading the image
                                $upload_pic = move_uploaded_file($phototmp_name,"images/sellers/profile_images/$newprofileimagename");
                                // Inserting the seller even if we are using the variable containing the buyer
                                $insert_buyer = mysqli_query($server,"INSERT into sellers 
                                    values(null,'$firstname','$lastname','$email','$phone','$newprofileimagename','$password','Waiting list')");
                                // Getting he sellers id
                                $getsellerid = mysqli_fetch_array(mysqli_query($server,"SELECT * from 
                                    sellers WHERE email ='$email'
                                "));
                                $sellerid = $getsellerid['id'];
                                // Insert the shop name on the waiting list
                                $addonthewait = mysqli_query($server,"INSERT into shops_waiting
                                    VALUES(null,$sellerid,'$shopname',now(),'Waiting')
                                ");
                                if (!$addonthewait) {
                                    $deletetheseller = mysqli_query($server,"DELETE from sellers 
                                    WHERE id='$sellerid' AND email='$email'
                                ");
                                }
                                if ($upload_pic && $insert_buyer) {
                                    ?>
                                    <div class="succed">
                                        Congratulations! Now your shop is on request list. You will get a
                                        confirmation on your email.
                                            - '<b><?php echo $email ?></b>' 
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
                        Shop name
                    </p>
                    <p>
                        <input type="text" name="shop"  class="text-box" placeholder="Type...">
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
                    <p>
                        <button type="submit" name="signupbtn" class="signup-Btn">
                            <i class="fa fa-plus-square"></i>
                            Signup
                        </button>
                    </p>
                </form>
            </div>
        </div>
        <?php
            include('php/big-footer.php'); include('php/developer-footer.php');
        ?>
    </div>
</body>
</html>
