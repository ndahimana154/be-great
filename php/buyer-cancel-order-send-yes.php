<?php
    SESSION_START();
    include('connect.php');
    include('buyer-acting_initial-credentials.php');
    include('head-tag.php');
    if (isset($_POST['orderid'])) {
        $order = $_POST['orderid'];
        // Get order infos
        $get_order = mysqli_fetch_array(mysqli_query($server,"SELECT * from products_orders 
            WHERE order_id='$order'
        "));
        $status = $get_order['order_status'];
        $ordertotalprice =(int) $get_order['total'];
        $newbalance = $ordertotalprice + $actingbalance;
        ?>
        <div class="form-results">
            <?php
            if ($status != 'Pending') {
                ?>
                <div class="failed">
                    Error! The order status is not pending.
                </div>
                <?php
            }
            else {
                // INserting the order cancelled
                $insert_cancellTXN = mysqli_query($server,"INSERT into buyer_money_txns 
                    VALUES(null,$acting_userid,CURRENT_DATE(),CURRENT_TIME(),'Cancel Shopping',$actingbalance,$newbalance,$ordertotalprice)
                ");
                // Withdrwall from owener accoutn
                $insert_owner = mysqli_query($server,"INSERT into owner_account_txns 
                    values(null,'OUT','$ordertotalprice',now())
                ");
                // Updating the account
                $update_the_balance = mysqli_query($server,"UPDATE buyers_accounts set
                    balance = '$newbalance' 
                    WHERE
                    buyer = '$acting_userid'
                ");
                // uPDATE THE ORDER  status to Cancelled
                $update_order_status = mysqli_query($server,"UPDATE products_orders SET 
                    order_status = 'Cancelled'
                    WHERE
                    order_id = '$order'
                    AND client = '$acting_userid'
                ");
                ?>
                <div class="succed">
                    Congrats! The order is cancelled successfully.
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
?>