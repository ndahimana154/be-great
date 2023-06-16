<?php
    SESSION_START();
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['confirm'])) {
            $waitingid = $_POST['waitingid'];
            $getwaitinginfos = mysqli_query($server,"SELECT * from shops_waiting
                WHERE id='$waitingid'
            ");
            $datawaitinginfos = mysqli_fetch_array($getwaitinginfos);
            $shopname = $datawaitinginfos['shop_name'];
            $seller = $datawaitinginfos['seller_id'];
            // Check if the shop exists
            $checkshops = mysqli_query($server,"SELECT * from
                shops WHERE
                shop_name = '$shopname'
            ");
            if (mysqli_num_rows($checkshops) > 0) {
                ?>
                <div class="failed">
                    Error! The shop already exists
                </div>
                <?php
            }
            else {
                // INsert into the shops
                $new_shop = mysqli_query($server,"INSERT into shops
                    VALUES(null,'null','$shopname','null','null','null',CURRENT_DATE(),CURRENT_TIME(),'Trial period')
                ");
                // Get the shop id
                $getshopid = mysqli_query($server,"SELECT * from shops
                    WHERE shop_name = '$shopname'
                ");
                $datashopid = mysqli_fetch_array($getshopid);
                $shop_id = $datashopid['shop_id'];
                // COnnect the shop to the seller
                $connect = mysqli_query($server,"INSERT into sellers_to_shops 
                    VALUES(null,$seller,$shop_id)
                ");
                // Check if the 2 insert operations succed
                if ($connect && $new_shop) {
                    // Update the shops waiting status
                    $updatewait = mysqli_query($server,"UPDATE
                        shops_waiting set wait_status = 'Running' WHERE 
                        id = '$waitingid'
                    ");
                    // Update the sellers status
                    $updateseller = mysqli_query($server,"UPDATE sellers
                        set seller_status = 'Selling'
                        WHERE id='$seller'
                    ");
                    ?>
                    <div class="succed">
                        Congrats! The shop is now running.
                    </div>
                    <?php
                }
                else {
                    // Delete the changes made
                    // delete the shop
                    $delete_shop = mysqli_query($server,"DELETE from shops
                        WHERE shop_name = '$shopname'
                        AND shop_id = '$shop_id'
                    ");
                    // Delete the connection
                    $delete_connection = mysqli_query($server,"DELETE from sellers_to_shops
                        WHERE seller ='$seller'
                        AND shop='$shop_id'
                    ");
                    ?>
                    <div class="failed">
                        Error! Confirming the shop failed due to some errors.
                        You can call system support.
                    </div>
                    <?php
                }
            }
        }
        elseif (isset($_POST['decline'])) {
            $waitingid = $_POST['waitingid'];
            $decline = mysqli_query($server,"UPDATE shops_waiting
                SET wait_status = 'Declined'
                WHERE id = '$waitingid'
            ");
            if (!$decline) {
                ?>
                <div class="failed">
                    Error! Declining the shop failed.
                </div>
                <?php
            }
            else {
                ?>
                <div class="succed">
                    Congrats! The shop is declined successfully.
                    But you can change this later.
                </div>
                <?php
            }
        }
        else {
            ?>
            <div class="failed">
                Error! No contents were sent to the server.
            </div>
            <?php
        }
    ?>
</div>