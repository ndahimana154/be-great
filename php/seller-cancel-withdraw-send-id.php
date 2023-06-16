<?php
    SESSION_START();
    include('connect.php');
    include('seller-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php 
        if(isset($_POST['cancelid'])) {
            $withdrawid = $_POST['cancelid'];
            // Check if id exists
            $checkexists = mysqli_query($server,"SELECT * from 
                sellers_withdraws
                WHERE id ='$withdrawid'
                AND seller = '$seller_acting_userid'
            ");
            if (mysqli_num_rows($checkexists) < 1) {
                ?>
                <div class="failed">
                    Error! This transaction id is not matching with the seller
                </div>
                <?php
            }
            else {
                // Cancel the withdraw
                $cancelwithdraw = mysqli_query($server,"UPDATE sellers_withdraws
                    SET status = 'Cancelled'
                    WHERE id = '$withdrawid'
                    AND seller = '$seller_acting_userid'
                ");
                if (!$cancelwithdraw) {
                    ?>
                    <div class="failed">
                        Error! Cancelling the withdraw failed.
                        Try again or call system support.
                    </div>
                    <?php
                }
                else {
                    ?>
                    <div class="succed">
                        Congrats! Cancelling the withdraw has been succed.
                    </div>
                    <?php
                }
            }
        }
    ?>
</div>