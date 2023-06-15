
<div class="signupform-box">
    <div class="signup-cont">
        <div class="header">
            <h1>
                NEW COURIER 
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
                    $backupP = $_POST['bph'];
                    $doB = $_POST['dob'];
                    $niD = $_POST['nid'];

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
                        // Check if the National ID is not going to be duplicate
                        $check_nid = mysqli_query($server,"SELECT * from courier
                            WHERE courier_nid = '$niD'
                        ");
                        if (mysqli_num_rows($check_nid) != 0) {
                            $datachech_nid = mysqli_fetch_array($check_nid);
                            ?>
                            <div class="failed">
                                Error! it looks like this National ID is already 
                                registered to another courier.
                                <br>
                                <b>Info about the courier:</b>
                                <br>
                                Courier names: <?php echo $datachech_nid['courier_fn']." ".$datachech_nid['courier_ln']; ?>,
                                Phone number: <?php echo $datachech_nid['courier_phone']; ?> 
                            </div>
                            <?php
                        }
                        else {
                            // Change the image name and include his email
                            $newprofileimagename = $emaiL." - Profile image.png";
                            // Uploading the image
                            $upload_pic = move_uploaded_file($phototmp_name,"images/couriers/$newprofileimagename");
                            // Insert the courier
                            $new_courier = mysqli_query($server,"INSERT into courier
                                VALUES(null,'$firstN','$lastN','$emaiL','$phoneN','$backupP','$doB','$niD','$newprofileimagename','Pending')
                            ");
                            if ($new_courier && $upload_pic) {
                                ?>
                                <div class="succed">
                                    Congrats! The courier is saved successfuly.
                                    But you must add atleast one payment method
                                    so that he can start delivering.
                                </div>
                                <?php
                            }
                            else {
                                ?>
                                <div class="failed">
                                    Error! THe courier is not saved successfuly,
                                    but don't rush we are handling the error.
                                </div>
                                <?php
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
                Backup phone number (Only if exists)
            </p>
            <p>
                <input type="text" class="text-box" name="bph"
                    value =""
                    placeholder="Type...">
            </p>
            <p>
                <span class="text-danger">*</span>
                Date of birth
            </p>
            <p>
                <input type="date" class="text-box" name="dob"
                    value ="" required
                    placeholder="Type...">
            </p>
            <p>
                <span class="text-danger">*</span>
                National id
            </p>
            <p>
                <input type="text" class="text-box" name="nid"
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
