
<div class="signupform-box">
    <div class="signup-cont">
        <div class="header">
            <h1>
                NEW HOME SLIDING SHOPS
            </h1>
            <a>
                <i class="fa fa-window-close"></i>
            </a>
        </div> 
        <div class="form-results">
            <?php
                if (isset($_POST['SaveProductBTN'])) {
                    $shop = $_POST['shop'];
                    $message = $_POST['msg'];
                    $enddate = $_POST['enddate'];
                    $endtime = $_POST['endtime'];
                    $until = $enddate." ".$endtime;

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
                    elseif ($shop == 'Select the shop name') {
                        ?>
                        <div class="failed">
                            Error! PLease select the collect shop name.
                        </div>
                        <?php
                    }
                    else {
                            // Check if the shop exists
                            $checkshop = mysqli_query($server,"SELECT * from shops WHERE
                                shop_id = '$shop'
                            ");
                            if (mysqli_num_rows($checkshop) !=1) {
                                ?>
                                <div class="failed">
                                    Error! It looks like the shop selected doesn't even exists.
                                </div>
                                <?php
                            }
                            else {
                                // Fetch the shop data
                                $datashopcheck = mysqli_fetch_array($checkshop);
                                $shopname = $datashopcheck['shop_name'];
                                // Change the image name and include his email
                                // $newprofileimagename = "SLide.png";
                                $testname =md5($shopname." - ".$until).".png";
                                $newprofileimagename = $testname;
                                // Uploading the image
                                $upload_pic = move_uploaded_file($phototmp_name,"images/shops/home-sliding/$newprofileimagename");
                                // Insert the sliding images
                                $new = mysqli_query($server,"INSERT into home_sliding_shops
                                    VALUES(null,'$shop','$message','$newprofileimagename',now(),'$until','Sliding')
                                ");
                                if ($new && $upload_pic) {
                                    ?>
                                    <div class="succed">
                                        Congrats! The shop is added to sliding shop
                                        successfully.
                                    </div>
                                    <?php
                                }
                                else {
                                    ?>
                                    <div class="failed">
                                        Error! Adding the shop to sliding list
                                        has failed.
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
                Shop name
            </p>
            <p>
                <select name="shop" id="" class="text-box">
                    <option value="Select the shop name">
                        Select the shop name
                    </option>
                    <?php
                        $get_shops = mysqli_query($server,"SELECT * from
                            shops WHERE
                            shop_status != 'Stopped'
                            ORDER BY shop_name ASC
                        ");
                        while($datashops = mysqli_fetch_array($get_shops)) {
                            ?>
                            <option value="<?php echo $datashops['shop_id']; ?>">
                                <?php echo $datashops['shop_name'] ?>
                            </option>
                            <?php
                        }
                    ?>
                </select>
            </p>
            <p>
                <span class="text-danger">*</span>
                Sliding message
            </p>
            <p>
                <textarea name="msg" id="" 
                    rows="6" class="text-box"
                    required
                    ></textarea>
            </p>
            <p>
                <span class="text-danger">*</span>
                Sliding end date
            </p>
            <p>
                <input type="date" class="text-box" name="enddate"
                    value ="" required
                    placeholder="Type...">
            </p>
            <p>
                <span class="text-danger">*</span>
                Sliding end time
            </p>
            <p>
                <input type="time" class="text-box" name="endtime"
                    value ="" required
                    placeholder="Type...">
            </p>
            <p>
                <span class="text-danger">*</span>
                Sliding image
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
