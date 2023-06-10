<?php
    SESSION_START();
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['payment'])) {
            $paymentid = $_POST['payment'];
            // Check if the payment method exists
            $checkexist = mysqli_query($server,"SELECT * from
                buyer_payment_methods 
                WHERE 
                id ='$paymentid'
            ");
            if (mysqli_num_rows($checkexist) != 1) {
                ?>
                <div class="failed">
                    Error! It looks like the payment method doesn't exists
                </div>
                <?php
            }
            else {
                // Verify the method
                $verify = mysqli_query($server,"UPDATE buyer_payment_methods
                    SET 
                    status ='Verified'
                    WHERE id = '$paymentid'
                ");
                if (!$verify) {
                    ?>
                    <div class="failed">
                        Error! Verifying the payment method
                        failed. Try again later or call system support.
                    </div>
                    <?php
                }
                else {
                    ?>
                    <div class="succed">
                        Congrats! Verifying the payment method have 
                        succed.
                    </div>
                    <?php
                }
            }
        }
    ?>
</div>