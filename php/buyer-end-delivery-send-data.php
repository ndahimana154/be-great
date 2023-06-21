<?php
    SESSION_START();
    // Including the files
    include('connect.php');
    include('head-tag.php');
    include('buyer-acting_initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['endorder'])) {
            $order = $_POST['endorder'];
            $courier = $_POST['courier'];
            // Check courier existence
            $checkcourier = mysqli_query($server,"SELECT * from courier
                WHERE courier_sn = '$courier'
            ");
            // Checkif the order is still delivering
            $checkdelivering = mysqli_query($server,"SELECT * from products_orders
                WHERE order_id = '$order'
            ");
            if (mysqli_num_rows($checkdelivering) !=1) {
                ?>
                <div class="failed">
                    Error! the order doesn't exist.
                </div>
                <?php

            }
            else {
                $datacheckdelivering = mysqli_fetch_array($checkdelivering);
                $orderstatus = $datacheckdelivering['order_status'];
                if ($orderstatus != 'Delivering') {
                    ?>
                        <div class="failed">
                            Error! The order status is not delivering.
                            Try again with different order or call system support.
                        </div>
                    <?php
                }
                else {
                    if(mysqli_num_rows($checkcourier) !=1) {
                        ?>
                        <div class="failed">
                            Error! The courier doesn't exist
                        </div>
                        <?php
                    }
                    else {
                        // Check if the courier meets with the order.
                        $getcouriermeet = mysqli_query($server,"SELECT * from
                            courier_work_proofs WHERE 
                            courier = '$courier'
                            AND orders = '$order'
                        ");
                        if ( mysqli_num_rows($getcouriermeet) !=1) {
                            $getorgproof = mysqli_query($server,"SELECT * from  courier_work_proofs
                                WHERE orders = '$order'
                            ");
                            $dataproofs = mysqli_fetch_array($getorgproof);
                            $courier = $dataproofs['courier'];
                            $dataproof = mysqli_fetch_array(mysqli_query($server,"SELECT * from courier
                                WHERE courier_sn = '$courier'
                            "));
                            ?>
                            <div class="failed">
                                Error! This courier is not assigned to this order.
                                <br>
                                <b> <u> Your order's courier info : </u> </b>
                                <br>
                                Courier names: <?php echo $dataproof['courier_fn']." ".$dataproof['courier_ln']; ?>
                                <br>
                                Courier email: <?php echo $dataproof['courier_email'] ?>
                                <br>
                                Courier phone numbers: <?php echo $dataproof['courier_phone'] ?>
                                <br>
                            </div>
                            <?php
                        }
                        else {
                            // Get the amount to pay
                            $getamount = mysqli_fetch_array(mysqli_query($server,"SELECT * from
                                courier_work_proofs WHERE 
                                courier = '$courier'
                                AND orders = '$order'
                            "));
                            $amount =(int) $getamount['amount'];
                            // Get the current balance
                            $getcourierbalance = mysqli_query($server,"SELECT 
                                * from courier_accounts 
                                WHERE courier = '$courier'
                            ");
                            // If there is no account create one
                            if (mysqli_num_rows($getcourierbalance) !=1) {
                                $new_account = mysqli_query($server,"INSERT into courier_accounts
                                    values(null,'$courier','0');
                                ");
                                $getcourierbalance = mysqli_query($server,"SELECT 
                                    * from courier_accounts 
                                    WHERE courier = '$courier'
                                ");
                                $getcourierbalance = mysqli_fetch_array($getcourierbalance);
                            }
                            else {
                                $getcourierbalance = mysqli_fetch_array($getcourierbalance);
                            }
                            $courierbalance =(int) $getcourierbalance['balance'];
                            $newcourierbalance =(int) $courierbalance + $amount;
                            // End the delivery
                            $enddelivery = mysqli_query($server,"UPDATE products_orders 
                                SET order_status = 'Delivered'
                                WHERE order_id = '$order'
                            ");
                            // End the proof
                            $proof = mysqli_query($server,"UPDATE courier_work_proofs
                                SET status = 'Delivered'
                                WHERE courier = '$courier'
                                AND orders = '$order'
                            ");
                            // Insert the record in courier txn in
                            $newrecord = mysqli_query($server,"INSERT into courier_txn_in
                                VALUES(null,'$courier','$order','$amount',CURRENT_DATE(),CURRENT_TIME(),'Received')
                            ");
                            // INcrease the balance 
                            $increase = mysqli_query($server,"UPDATE courier_accounts
                                SET balance = '$newcourierbalance'
                                WHERE courier = '$courier'
                            ");
                            if ($proof && $enddelivery && $newrecord && $increase) {
                                ?>
                                    <div class="succed">
                                        Congrats! the order is ended sucessfully. Hope your product expectations
                                        are meet succesfully.
                                    </div>
                                <?php
                            }
                            else {
                                $unincrease = mysqli_query($server,"UPDATE courier_accounts
                                    SET balance = '$courierbalance'
                                    WHERE courier = '$courier'
                                ");
                                // Getthe last record in the couriertxnnin
                                $getlast = mysqli_query($server,"SELECT * from courier_txn_in
                                    WHERE courier = '$courier'
                                    AND amount = '$amount' 
                                    AND order = '$order'
                                    AND date = '$CURRENT_DATE()'
                                    ORDER BY id DESC
                                ");
                                $datagetlast = mysqli_fetch_array($getlast);
                                $id = $datagetlast['id'];
                                $unnewrecord = mysqli_query($server,"DELETE from
                                    courier_txn_in WHERE courier = '$courier'
                                    AND amount = '$amount' 
                                    AND order = '$order'
                                    AND date = '$CURRENT_DATE()'
                                    AND id = '$id'
                                ");
                                $unenddelivery = mysqli_query($server,"UPDATE products_orders 
                                    SET order_status = 'Delivering'
                                    WHERE order_id = '$order'
                                ");
                                // End the proof
                                $unproof = mysqli_query($server,"UPDATE courier_work_proofs
                                    SET status = 'Delivering'
                                    WHERE courier = '$courier'
                                    AND orders = '$order'
                                ");
                                ?>
                                <div class="failed">
                                    Error! The order failed to be ended. Try again later
                                    or call system support.
                                </div>
                                <?php
                            }
                            
                        }
                    }
                }
            }
        }
    ?>
</div>