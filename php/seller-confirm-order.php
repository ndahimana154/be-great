<?php
    SESSION_START();
    include('connect.php');
    include('seller-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['order'])) {
            $order = $_POST['order'];
            $courier = $_POST['courier'];
            $amount_courier = $_POST['courieramount'];

            //Get the full info on the courier 
            $getinfocourier = mysqli_query($server,"SELECT * from courier
                WHERE courier_sn = '$courier'
            ");
            if ($courier == 'Select courier S/N') {
                ?>
                    <div class="failed">
                        Error! Please select the courier.
                    </div>
                <?php
            }
            elseif( mysqli_num_rows($getinfocourier) != 1) {
                ?>
                    <div class="failed">
                        Error! The courier is not found in the database.
                    </div>
                <?php
            }
            else {
                $datacourier = mysqli_fetch_array($getinfocourier);
                $courier_names = $datacourier['courier_fn']." ".$datacourier['courier_ln'];
                $courier_email = $datacourier['courier_email'];
                $courier_phone = $datacourier['courier_phone'];
                // Get the orders full infos
                $get_order_info = mysqli_fetch_array(mysqli_query($server,"SELECT * from products_orders
                    WHERE order_id ='$order' AND shop = '$seller_acting_shop'
                "));
                $product = $get_order_info['product'];
                $buyer = $get_order_info['client'];
                $product_price = (int) $get_order_info['product_price'];
                $quantity = (int) $get_order_info['quantity'];
                $totalprice = $product_price * $quantity;
                // Check if the quantityy is of the product is cool
                $checkQuantity = mysqli_fetch_array(mysqli_query($server,"SELECT * from products 
                    WHERE product_id = '$product'
                "));
                $quantity_remain = $checkQuantity['quantity_remain'];
                if ($quantity > $quantity_remain) {
                    $differnce = $quantity - $quantity_remain
                    ?>
                    <div class="failed">
                        Error! The quantity ordered is exceeding you stock.
                        You are required more <?php echo $differnce; ?> to confirm this order
                    </div>
                    <?php
                }
                else {
                    // Change the order sttus 
                    $changeorderstatus = mysqli_query($server,"UPDATE 
                        products_orders SET 
                        order_status = 'Delivering'
                        WHERE product = '$product'
                        AND shop = '$seller_acting_shop'
                        AND order_id = '$order'
                    ");
                    // Calculate the percentage to be withdrawn
                    $companymoney =($totalprice * 5)/100;
                    $sellersmoney = $totalprice - $companymoney; 
                    // Make a withdraw on the system's account
                    $withdraw = mysqli_query($server,"INSERT into owner_account_txns 
                        VALUES(null,'OUT',$sellersmoney,now())
                    ");
                    // Changing the balance variable
                    $newbalance = $acting_seller_account_balance + $sellersmoney;
                    // Save the record in  seller money txns
                    $savetherecord = mysqli_query($server,"INSERT into seller_money_txns
                        VALUES(null,'$seller_acting_userid','IN','$acting_seller_account_balance','$newbalance',CURRENT_DATE(),CURRENT_TIME())
                    ");
                    // Save the record of reducing the quanity
                    $savequantityrecord = mysqli_query($server,"INSERT into product_quantity_txns 
                        values(null,$product,'OUT','$quantity',CURRENT_DATE(),CURRENT_TIME())
                    ");
                    // Update the  balance account
                    $updatebalance = mysqli_query($server,"UPDATE seller_accounts
                        SET balance = '$newbalance' 
                        WHERE id='$acting_seller_account_id'
                        AND seller = '$seller_acting_userid'
                    ");
                    // Chnging the product quantity in the stock
                    $new_quantity = $quantity_remain - $quantity;
                    // Changing the quantity 
                    $changequantity = mysqli_query($server,"UPDATE products set 
                        quantity_remain = '$new_quantity'
                        WHERE product_id = '$product'
                        AND shop = '$seller_acting_shop'
                    ");
                    // Save the roduct selling history
                    $store_selling_history = mysqli_query($server,"INSERT into
                        sellers_products_selling 
                        VALUES(null,'$product','$seller_acting_userid','$buyer','$quantity','$product_price','$totalprice','$sellersmoney ',CURRENT_DATE(),CURRENT_TIME())
                    ");
                    // Save the courier prof
                    $courier_proof = mysqli_query($server,"INSERT into courier_work_proofs
                        VALUES(null,'$courier','$order','$amount_courier',CURRENT_DATE(),CURRENT_TIME(),'Delivering')
                    ");
                    // If all these conditions are true
                    if ($savequantityrecord && $savetherecord && $withdraw && $changeorderstatus && $updatebalance && $changequantity) {
                        ?>
                        <div class="succed">
                            Congrats! The product order is confirmed successfully.
                            <br>
                            <b>Amount received: <?php echo $sellersmoney."RWF"; ?></u></b>
                            <br>
                            <b><u>Info about the courier:</u></b>
                            <br>
                            Courier names: <?php echo $courier_names ?>
                            <br>
                            Courier email: <?php echo $courier_email ?>
                            <br>
                            Courier phone: <?php echo $courier_phone ?>
                            <br>
                            Payment amount: <?php echo $amount_courier."RWF"; ?>
                            <br>
                        </div>
                        <?php
                    }
                    else {
                        ?>
                            <div class="failed">
                                Error! The confirming the product order failed. It's technical issue so you 
                                may contact system support.
                            </div>
                        <?php
                    }
                }
            }
        }
    ?>
</div>