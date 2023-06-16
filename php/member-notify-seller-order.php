<?php
    SESSION_START();
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
    <hr>
    <div class="form-results">
        <?php
            if (isset($_POST['order'])) {
                $order = $_POST['order'];
                // Check if there is no existing notifier for this order
                $check_notifier = mysqli_query($server,"SELECT * from
                    sellers_orders_notifier
                    WHERE order_id='$order'
                ");
                if (mysqli_num_rows($check_notifier) > 0) {
                    ?>
                    <div class="failed">
                        Error! The notifier already exists for this order.
                    </div>
                    <?php
                }
                else {
                    // Get orderinfo
                    $getorderinfo = mysqli_fetch_array(mysqli_query($server,"SELECT * from 
                        products_orders WHERE 
                        order_id ='$order'
                    "));
                    $shop = $getorderinfo['shop'];
                    $orderdate = $getorderinfo['order_date'];
                    $order_time = $getorderinfo['order_time'];
                    $order_status = $getorderinfo['order_status'];
                    // Get the shops names
                    $getshp = mysqli_fetch_array(mysqli_query($server,"SELECT * from
                        shops WHERE shop_id = '$shop'
                    "));
                    $shop_name = $getshp['shop_name'];
                    // Notifier message
                    $notifier_msg = "Hello The manager of $shop_name, We are happy to remind you that
                        you have the order that was placed on $orderdate at $order_time but it is
                        still $order_status. Thanks
                    ";
                    // Create the notifier
                    $new_notifier = mysqli_query($server,"INSERT into sellers_orders_notifier
                        VALUES(null,$member_acting_userid,$shop,'$notifier_msg',$order,now(),'Not viewed')
                    ");
                    if (!$new_notifier) {
                        ?>
                        <div class="failed">
                            Error! The notification failed to be sent. Don't panic it's not your 
                            fault. You can call system support for help
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="succed">
                            Congrats! The notification is successfully sent to (<b><?php echo $shop_name; ?></b>).
                        </div>
                        <?php
                    }
                }
            }
        ?>
    </div>
</div>