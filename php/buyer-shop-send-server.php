<?php
    SESSION_START();
    // Including the files
    include('connect.php');
    include('head-tag.php');
    include('buyer-acting_initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['yes'])) {
            // Getting the values from the jQuery
            $product = $_POST['product'];
            $quantity = $_POST['quantity'];
            $unitprice = $_POST['unitp'];
            $totalprice = (int) $_POST['totalprice'];
            // Get product owner according to the product
            $get_shop_id = mysqli_fetch_array(mysqli_query($server,"SELECT * from products
                WHERE product_id = '$product'
            "));
            $shop = $get_shop_id['shop'];
            // Checking if the remaining balance is greater than the price
            if ($totalprice > $actingbalance) {
                $required = $totalprice - $actingbalance;
                ?>
                <div class="failed">
                    Error! You are required more <b><?php echo $required; ?> RWF</b>
                    to perform this transaction.
                    Deposit to continue
                </div>
                <?php
            }
            else {
                // Check if no duplicate is trying to go in
                $check_no_duplicate = mysqli_query($server,"SELECT * from products_orders WHERE
                    product = '$product' AND
                    client = '$acting_userid' AND
                    product_price =  '$unitprice' AND
                    quantity = '$quantity' AND
                    total = '$totalprice' AND
                    order_date = CURRENT_DATE AND
                    order_time = CURRENT_TIME() AND
                    order_status = 'Pending'
                ");
                if (mysqli_num_rows($check_no_duplicate) >= 1) {
                    
                    ?>
                    <div class="succed">
                        <!-- Error! The order already exists. Don't worry it may be to a  double typing. You
                        can call system support, check your orders history or refresh the page! -->
                        Congrats! The order was sent successfully.
                    </div>
                    <?php
                }
                else {
                      // Create an order
                    $placeorder = mysqli_query($server,"INSERT INTO products_orders 
                        values(null,$product,$acting_userid,$unitprice,$quantity,$totalprice,CURRENT_DATE(),CURRENT_TIME(),'Pending',$shop)
                    ");
                    if (!$placeorder) {
                        ?>
                        <div class="failed">
                            Error! The order failed. Sorry none of your
                            problem but we're dealing with the error
                        </div>
                        <?php
                    }
                    else {
                        // Changing the new balance
                        $newbalance = $actingbalance - $totalprice;
                        // Saving the transaction in the owners acc
                        $insert_ownertxn = mysqli_query($server,"INSERT into owner_account_txns 
                            VALUES(null,'IN',$totalprice,now())
                        ");
                        // Saving the txn history
                        $savehistory = mysqli_query($server,"INSERT into buyer_money_txns
                            values(null,'$acting_userid',CURRENT_DATE(),CURRENT_TIME(),'Shopping','$actingbalance','$newbalance')
                        ");
                        // Updating the account balance
                        $update_the_balance = mysqli_query($server,"UPDATE buyers_accounts set
                            balance = '$newbalance' 
                            WHERE
                            buyer = '$acting_userid'
                            -- AND acc_id = '$acting_account_id'
                        ");
                        ?>
                        <div class="succed">
                            <?php
                            // echo $actingbalance;
                            // echo $totalprice;
                            // echo $newbalance;
                            ?>
                            Congrats! The order is placed successfully.
                        </div>
                        <?php
                    }
                }
              
            }
        }
        else {
            ?>
            <div class="failed">
                Error! The confirmation was not received successfully.
            </div>
            <?php
        }
    ?>
</div>