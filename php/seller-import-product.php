<?php
    $product = $_GET['product'];
    $check_product_exists = mysqli_query($server,"SELECT * from products,shops
        WHERE
        products.shop = shops.shop_id 
        AND product_id = '$product'
    ");
    if (mysqli_num_rows($check_product_exists) != 1) {
        ?>
        <div class="form-results">
            <div class="failed">
                Error! The product is not found on your products' list
            </div>
        </div>
        <?php
    }
    else {
        $data_prodct = mysqli_fetch_array($check_product_exists);
        ?>
        <div class="signupform-box">
            <div class="signup-cont">
                <div class="header">
                    <h1>
                        Import the product
                    </h1>
                    <a>
                        <i class="fa fa-window-close"></i>
                    </a>
                </div> 
                <div class="form-results">
                    <?php
                        if (isset($_POST['SaveProductBTN'])) {
                            $product = $_POST['productid'];
                            $importquantity = (int) $_POST['quantity'];
                            $currentquantity = (int) $_POST['currentquantity'];
                            $newquantity = $importquantity + $currentquantity;
                            $perform = mysqli_query($server,"INSERT into product_quantity_txns
                                VALUES(null,'$product','IN',$importquantity,CURRENT_DATE(),CURRENT_TIME())
                            ");
                            $update = mysqli_query($server,"UPDATE products set quantity_remain = '$newquantity'
                                WHERE product_id = '$product'
                            ");
                            if ($perform && $update) {
                                ?>
                                <div class="succed">
                                    Congrats! The product import(<b><?php echo $importquantity; ?></b>) succed now the new quantity is
                                    <b><?php echo $newquantity ?></b>
                                </div>
                                <?php
                            }
                            else {
                                ?>
                                <div class="failed">
                                    Error! Importing the product failed.
                                    Try again later if the issue persists
                                    contact system support.
                                </div>
                                <?php
                            }
                        }
                    ?>
                </div>
                <form class="sign-box" action="" method="POST"  enctype="multipart/form-data">
                    <p>
                        Product name
                    </p>
                    <p>
                        <input type="text" class="text-box" name="productname" value="<?php echo $data_prodct['product_name']; ?>" readonly required>
                        <input type="text" name="productid" value="<?php echo $_GET['product'] ?>"
                            style="display:none;">
                        
                    </p>
                    <p>
                        Current quantity
                    </p>
                    <p>
                        
                        <input type="text" name="currentquantity" value="<?php echo $data_prodct['quantity_remain']; ?>"
                            class="text-box" readonly>
                    </p>
                    <p>
                        Import quantity
                    </p>
                    <p>
                        <input type="number" class="text-box" name="quantity"  placeholder="Type..." required>
                    </p>
                    <div class="btnz">
                        <button name="SaveProductBTN" class="signup-Btn">
                            <i class="fa fa-cart-arrow-down"></i>
                            Import
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
?>