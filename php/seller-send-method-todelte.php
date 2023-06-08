<?php
    SESSION_START();
    include('connect.php');
    include('seller-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['methodtodelete'])) {
            $method = $_POST['methodtodelete'];
            // Check if the method belongs to the seller
            $checkmethod = mysqli_query($server,"SELECT * from
                sellers_payment_methods 
                WHERE seller = '$seller_acting_userid'
                AND id = '$method'
                AND status != 'Deleted'
            ");
            if (mysqli_num_rows($checkmethod) != 1) {
                ?>
                <div class="failed">
                    Error! This payment method doesn't belong to this seller.
                </div>
                <?php
            }
            else {
                // Check if the seller have another payment method
                $checkpthermethod = mysqli_query($server,"SELECT * from
                    sellers_payment_methods 
                    WHERE
                    seller = '$seller_acting_userid'
                    AND status != 'Deleted'
                ");
                if (mysqli_num_rows($checkpthermethod) < 2) {
                    ?>
                    <div class="failed">
                        Error! You can't delete all payment methods.
                        You must atleast have one to be left.
                    </div>
                    <?php
                }
                else {
                    // Delete the method wuithout any doubt
                    $deltemethod = mysqli_query($server,"UPDATE  
                        sellers_payment_methods 
                        set 
                        status = 'Deleted'
                        WHERE 
                        id = '$method'
                        AND seller = '$seller_acting_userid'
                    ");
                    if (!$deltemethod) {
                        ?>
                        <div class="failed">
                            Error! The method is not delete sucessfully. Try again 
                            later or contact system support.
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="succed">
                            Congrats! The payment method is delete successfully.
                        </div>
                        <?php
                    }
                }
            }
        }
        else {
            ?>
            <div class="failed">
                Error! No data was sent to the server.
            </div>
            <?php
        }
    ?>
</div>