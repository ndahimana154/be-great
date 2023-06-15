
<div class="signupform-box">
    <div class="signup-cont">
        <div class="header">
            <h1>
                NEW PROFILE PiCTURE
            </h1>
            <a>
                <i class="fa fa-window-close"></i>
            </a>
        </div> 
        <div class="form-results">
            <?php
                if (isset($_POST['SaveProductBTN'])) {
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
                        // Change the image name and include his email
                        $newprofileimagename = $member_acting_username." - Profile image.png";
                        // Uploading the image
                        $upload_pic = move_uploaded_file($phototmp_name,"images/members/profile_images/$newprofileimagename");
                        // Update the profile name
                        $update = mysqli_query($server,"UPDATE co_members_auth
                            SET profile_image = '$newprofileimagename'
                            WHERE id = '$member_acting_userid'
                        "); 
                        if (!$upload_pic) {
                            ?>
                            <div class="failed">
                                Error! The profile image is not upladed successfully.
                                Try again later or call system support.
                            </div>
                            <?php
                        }
                        else {
                            ?>
                            <div class="succed">
                                Congrats! Your profile image is uploaded successfully.
                            </div>
                            <?php
                        }
                    }
                }
            ?>
        </div>
        <form class="sign-box" action="" method="POST"  enctype="multipart/form-data">
            <p>
                <span class="text-danger">*</span>
                Profile image
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
