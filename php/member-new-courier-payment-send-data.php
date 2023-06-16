<?php
    SESSION_START();
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['method'])) {
            $method = $_POST['method'];
            $digits = $_POST['digits'];
            $courier = $_POST['courier'];
            // Check if the method is selected properly and if the payment 
            // Digits are not empty
            if ($method == 'Select method type') {
                ?>
                <div class="failed">
                    Error! Please select the payment method type
                </div>
                <?php
            }
            elseif (empty($digits)) {
                ?>
                <div class="failed">
                    Error! The payment digits can't
                    be empty.
                </div>
                <?php
            }
            else {
                // Check if payment method doesn't exists
                $checkexists = mysqli_query($server,"SELECT * 
                    from courier_payment_methods
                    WHERE method_type = '$method'
                    AND method_digits = '$digits'
                ");
                if (mysqli_num_rows($checkexists) > 0) {
                    ?>
                    <div class="failed">
                        Error! It looks like the payment method already
                        exists.
                    </div>
                    <?php
                }
                else {
                    // Create the courier payment method with no doubt
                    $new = mysqli_query($server,"INSERT into courier_payment_methods
                        VALUES(null,'$courier','$method','$digits','Verified')
                    ");
                    // Then update the courier to working
                    $update = mysqli_query($server,"UPDATE courier
                        SET courier_status = 'Working'
                        WHERE courier_sn = '$courier'
                    ");
                    if (!$new) {
                        ?>
                        <div class="failed">
                            Error! The creating the payment method 
                            failed, but don't rush we are handling the error.
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="succed">
                            Congrats! The payment is created successfully.  
                        </div>
                        <?php
                    }
                }
            }
        }
    ?>
</div>