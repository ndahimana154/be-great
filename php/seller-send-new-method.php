<?php
    SESSION_START();
    include('connect.php');
    include('seller-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['methodtype'])) {
            $method = $_POST['methodtype'];
            $digits = $_POST['pytdigits'];
            // Check if the method is well inserted.
            if ($method =='select') {
                ?>
                <div class="failed">
                    Error! Please select the payment method type and try again later.
                </div>
                <?php
            }
            else {
                // Check if the method doesn't exist for the same seller?
                $check_method = mysqli_query($server,"SELECT * from sellers_payment_methods
                    WHERE seller='$seller_acting_userid'
                    AND method = '$method'
                    AND method_digits = '$digits'
                    AND status != 'Deleted'
                ");
                if (mysqli_num_rows($check_method) > 0) {
                    ?>
                    <div class="failed">
                        Error! This Payment method already exists for the same seller.
                        Try again with different Payment method.
                    </div>
                    <?php
                }
                else {
                    $new_method = mysqli_query($server,"INSERT into sellers_payment_methods
                        VALUES(null,$seller_acting_userid,$method,'$digits',CURRENT_DATE(),CURRENT_TIME(),'Unverfied')
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