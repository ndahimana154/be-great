<div class="signupform-box">
    <div class="signup-cont">
        <div class="header">
            <h1>
                Create new product
            </h1>
            <a>
                <i class="fa fa-window-close"></i>
            </a>
        </div> 
        <div class="form-results">
            <?php
                if (isset($_POST['SaveProductBTN'])) {
                    $productname=$_POST['productname'];
                    $productgenre=$_POST['product_genre'];
                    $price=$_POST['productprice'];
                    $productdescr = $_POST['descriptionprod'];
                    $gettingshopname = mysqli_fetch_array(mysqli_query($server,"SELECT * from shops WHERE shop_id='$seller_acting_shop'"));
                    $shopname=$gettingshopname['shop_name'];
                    
                    $logoname = $_FILES['productimage']['name'];
                    $logotype = $_FILES['productimage']['type'];
                    $logotmp_name = $_FILES['productimage']['tmp_name'];

                    $logo_explode = explode('.', $logoname);
                    $logo_exte = end($logo_explode);

                    $accepted_ext= ["image/jpeg", "image/jpg", "image/png"];
                    if(in_array($logotype, $accepted_ext) === true) {
                            $newproductimagename = $shopname." - ".$productname." - FRONTIMAGE.png";
                            if (move_uploaded_file($logotmp_name,"images/products/Frontimages/".$newproductimagename) && mysqli_query($server,"INSERT into products values(null,'$productname','$newproductimagename','$price',CURRENT_DATE(),'$productgenre','$seller_acting_shop',0,'$productdescr')")) {
                                ?>
                                <div class="succed">
                                    Congrats! The product is saved successfully.
                                </div>
                                <?php
                            }
                            else {
                                ?>
                                <div class="failed">
                                    Error! The prduct is not saved successfully.
                                </div>
                                <?php
                            }
                    }
                    else {
                        ?>
                        <div class="failed">
                            Error! The file format is not allowed. 
                            Please use (<b>jpeg, jpg, png</b>)
                        </div>
                        <?php
                    }
                }
                // else {
                //     echo"Not even isseting";
                // }
            ?>
        </div>
        <form class="sign-box" action="" method="POST"  enctype="multipart/form-data">
            <p>
                Product name
            </p>
            <p>
                <input type="text" class="text-box" name="productname"  placeholder="Type..." required>
            </p>
            <p>
                Product description
            </p>
            <p>
                <textarea name="descriptionprod" id="" cols="30" rows="5"
                    placeholder="Type..." class="text-box"></textarea>
            </p>
            <p>
                Product price
            </p>
            <p>
                <input type="text" class="text-box" name="productprice"  placeholder="Type..." required>
            </p>
            <p>
                Product image
            </p>
            <p>
                <input type="file" class="text-box" name="productimage" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
            </p>
            <p>
                Product Genre
            </p>
            <p>
                <select class="text-box" name="product_genre" id="">
                    <option>
                        --- select ---
                    </option>
                    <?php
                        $query =mysqli_query($server,"SELECT * from product_genres");
                        while ($data=mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?php echo $data['genre_id'] ?>">
                                <?php
                                    echo $data['genre_name'];
                                ?>
                            </option>
                            <?php
                        }
                    ?>
                </select>
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