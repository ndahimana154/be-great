<?php
    SESSION_START();
    include('connect.php');
    include('buyer-acting_initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['methodtodelete'])) {
            $pytmeth = $_POST['methodtodelete'];
            // Check if the method belongs to this buyer
            $checkmethod = mysqli_query($server,"SELECT *
                from buyer_payment_methods
                WHERE buyer = '$acting_userid'
                AND id = '$pytmeth'
            ");
             if (mysqli_num_rows($checkmethod) != 1) {
                ?>
                <div class="failed">
                    Error! This payment method doesn't belong to this buyer.
                </div>
                <?php
            }
            else {
                // Check if the buyer have atleast one other method
                $checkpthermethod = mysqli_query($server,"SELECT * from
                    buyer_payment_methods
                    WHERE buyer = '$acting_userid'
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
                    // Delete the method exactly
                    $deletemethod = mysqli_query($server,"UPDATE 
                        buyer_payment_methods
                        set
                        status = 'Deleted'
                        WHERE
                        id = '$pytmeth'
                        AND buyer = '$acting_userid'
                    ");
                    if (!$deletemethod) {
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