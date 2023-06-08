<?php
    SESSION_START();
    include('connect.php');
    include('buyer-acting_initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['method'])) {
            $method = $_POST['method'];
            $pytdigits = $_POST['pytdigits'];
            // Check if the method is welll selected
            if ($method =='select') {
                ?>
                <div class="failed">
                    Error! Please select the payment method type and try again later.
                </div>
                <?php
            }
            else {
                // Check if the method exists for the same buyer
                $check_method = mysqli_query($server,"SELECT * from buyer_payment_methods
                    WHERE buyer = '$acting_userid'
                    AND method = '$method'
                    AND method_digits = '$pytdigits'
                    AND status != 'Deleted'
                ");
                if (mysqli_num_rows($check_method) > 0) {
                    ?>
                    <div class="failed">
                        Error! This Payment method already exists for the same buyer.
                        Try again with different Payment method.
                    </div>
                    <?php
                }
                else {
                    // Create the method
                    $new_method = mysqli_query($server,"INSERT into buyer_payment_methods
                        VALUES(null,'$acting_userid','$method','$pytdigits',CURRENT_DATE(),CURRENT_TIME(),'Unverfied')
                    ");
                      if (!$new_method) {
                        ?>
                        <div class="failed">
                            Error! Creating new method failed. We don't know the error.
                            Try again if the error persists please call system support.
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="succed">
                            Congrats! Your payment method is now created successfully. So you 
                            will wait so that your method is reviewed and be <b>Verfied</b>.
                        </div>
                        <?php
                    }
                }
            }
        }
    ?>
</div>