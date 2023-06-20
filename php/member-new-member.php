<?php
    if ($member_acting_type == 'Chief executive officer') {
        ?>
        <div class="signupform-box">
            <div class="signup-cont">
                <div class="header">
                    <h1>
                        NEW MEMBER
                    </h1>
                    <a>
                        <i class="fa fa-window-close"></i>
                    </a>
                </div> 
                <div class="form-results">
                    <?php
                        if (isset($_POST['SaveProductBTN'])) {
                            $firstN = $_POST['fn'];
                            $lastN = $_POST['ln'];
                            $emaiL = $_POST['em'];
                            $phoneN = $_POST['ph'];
                            $usertype = $_POST['ut'];
                            $username = $_POST['un'];
                            $password=123456;


                            $profile = $_FILES['profile']['name'];
                            $phototype = $_FILES['profile']['type'];
                            $phototmp_name = $_FILES['profile']['tmp_name'];

                            $photo_explode = explode('.', $profile);
                            $photoexte = end($photo_explode);

                            $accepted_exte = ["image/jpeg", "image/jpg", "image/png"];
                            // If the photot extension is not allowed
                            if (!in_array($phototype, $accepted_exte)) {
                                ?>
                                <div class="failed">
                                    Error! The photo extension is not valid.
                                    Please use "JPG, PNG or JPEG"
                                </div>
                                <?php
                            }
                            else {
                                // Check if the email is not duplicate
                                $check_nid = mysqli_query($server,"SELECT * from co_members 
                                    WHERE Email = '$emaiL'
                                ");
                                if (mysqli_num_rows($check_nid) != 0) {
                                    $datachech_nid = mysqli_fetch_array($check_nid);
                                    ?>
                                    <div class="failed">
                                        Error! it looks like the email is already being used by other user.
                                        Use different email or call system support.
                                    </div>
                                    <?php
                                }
                                else {
                                    // Check if the username is not duplicated
                                    $checkusendupli = mysqli_query($server,"SELECT * from co_members_auth 
                                        WHERE username = '$username'
                                    ");
                                    if (mysqli_num_rows($checkusendupli) != 0) {
                                        ?>
                                        <div class="failed">
                                            Error! it looks like the username is already in use.
                                            Try again with different username or call system support.
                                        </div>
                                        <?php
                                    }
                                    else {
                                        // Change the image name and include his email
                                        $newprofileimagename = $username." - Profile image.png";
                                        // Uploading the image
                                        $upload_pic = move_uploaded_file($phototmp_name,"images/members/profile_images/$newprofileimagename");
                                        // Insert the courier
                                        $new_courier = mysqli_query($server,"INSERT into co_members
                                            VALUES(null,'$firstN','$lastN','$emaiL','$phoneN','$usertype','Inactive')
                                        ");
                                        if ($new_courier && $upload_pic) {
                                            $gettheinsertedones = mysqli_query($server,"SELECT * from co_members 
                                                WHERE Email = '$emaiL'
                                            ");
                                            $dataemail = mysqli_fetch_array($gettheinsertedones);
                                            $userid = $dataemail['id'];
                                            // Create user authorization account
                                            $authnew = mysqli_query($server,"INSERT into co_members_auth
                                                VALUES('$userid','$username','$password','$newprofileimagename')
                                            ");
                                            ?>
                                            <div class="succed">
                                                Congrats! The member is created successfully.
                                                Remember the default password is "<b><?php echo $password; ?>"
                                            </div>
                                            <?php
                                        }
                                        else {
                                            $deletetheuser = mysqli_query($server,"DELETE from
                                                co_members WHERE
                                                Email = '$emaiL'
                                            ");
                                            ?>
                                            <div class="failed">
                                                Error! Creating the member failed.
                                            </div>
                                            <?php
                                        }
                                    }
                                    
                                }
                                
                            }
                        }
                    ?>
                </div>
                <form class="sign-box" action="" method="POST"  enctype="multipart/form-data">
                    <p>
                        <span class="text-danger">*</span>
                        Firstname
                    </p>
                    <p>
                        <input type="text" class="text-box" name="fn"
                            value ="" required
                            placeholder="Type...">
                    </p>
                    <p>
                        Lastname
                    </p>
                    <p>
                        <input type="text" class="text-box" name="ln"
                            value =""
                            placeholder="Type...">
                    </p>
                    <p>
                        <span class="text-danger">*</span>
                        Email 
                    </p>
                    <p>
                        <input type="email" class="text-box" name="em"
                            value ="" required
                            placeholder="Type...">
                    </p>
                    <p>
                        <span class="text-danger">*</span>
                        Phone number
                    </p>
                    <p>
                        <input type="text" class="text-box" name="ph"
                            value ="" required
                            placeholder="Type...">      
                    </p>
                    <p>
                        <span class="text-danger">*</span>
                        User type
                    </p>
                    <p>
                        <select name="ut" id="" class="text-box">
                            <option value="">
                                Select user type
                            </option>
                            <?php
                                $gettypes = mysqli_query($server,"SELECT * from co_members_types 
                                    order by 
                                    type ASC
                                ");
                                while ($datatypes = mysqli_fetch_array($gettypes)) {
                                    ?>
                                    <option value="<?php echo $datatypes['id']; ?>">
                                        <?php echo $datatypes['type']; ?>
                                    </option>
                                    <?php
                                }
                            ?>
                        </select>     
                    </p>
                    <p>
                        <span class="text-danger">*</span>
                        Username
                    </p>
                    <p>
                        <input type="text" class="text-box" name="un"
                            value ="" required
                            placeholder="Type...">      
                    </p>
                    <p>
                        <span class="text-danger">*</span>
                        Passport photo
                    </p>
                    <p>
                        <input type="file" class="text-box" name="profile"
                            value ="" required
                            placeholder="Type...">
                    </p>
                    <div class="btnz">
                        <button name="SaveProductBTN" class="signup-Btn">
                            <i class="fa fa-save"></i>
                            Save
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
    }
    else {
        ?>
        <div class="form-results">
            <div class="failed">
                Error! You are not authorized to visit this page
            </div>
        </div>
        <?php
    }
?>
