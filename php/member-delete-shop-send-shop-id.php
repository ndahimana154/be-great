<?php
    SESSION_START();
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php 
        if (isset($_POST['shop'])) {
            $shopid = $_POST['shop'];
            // Check if the shop is alreadt running
            $checkrunning = mysqli_query($server,"SELECT * from shops
                WHERE shop_id = '$shopid'
            ");
            if (mysqli_num_rows($checkrunning) < 1) {
                ?>
                <div class="failed">
                    Error! The shop doesn't exist on the shop list.
                </div>
                <?php
            }
            else {
                $datacheckrunning = mysqli_fetch_array($checkrunning);
                if ($datacheckrunning['shop_status'] != 'Trial period' && $datacheckrunning['shop_status'] != 'Running') {
                    ?>
                    <div class="failed">
                        Error! It looks like the shop is not even running or in 
                        trial period. The shop must be running or in trial period 
                        in order that it can be stopped.
                    </div>
                    <?php
                }
                else {
                    // Stop the shop
                    $stop = mysqli_query($server,"UPDATE shops 
                        set shop_status = 'Stopped'
                        WHERE shop_id = '$shopid'
                    ");
                    // Get the seller id
                    $getseller = mysqli_fetch_array(mysqli_query($server,"SELECT * from
                        sellers_to_shops 
                        WHERE shop = '$shopid'
                    "));
                    $seller = $getseller['seller'];
                    // Stopseller
                    $stopseller = mysqli_query($server,"UPDATE sellers
                        SET seller_status = 'Stopped'
                        WHERE id = '$seller'
                    ");
                    if (!$stop || !$stopseller) {
                        ?>
                        <div class="failed">
                            Error! The shop has not been stopped. Try again
                            later or call system support.
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="succed">
                            Congrats! The shop has been stopped successfully.
                        </div>
                        <?php
                    }
                }
            }
        }
    ?>
</div>