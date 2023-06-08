<?php
    SESSION_START();
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['withdraw'])) {
            $withdrawid = $_POST['withdraw'];
            // Check if the withdraw id exists
            $checkexistence = mysqli_query($server,"SELECT * from
                sellers_withdraws 
                WHERE id = '$withdrawid'
            ");
            if (mysqli_num_rows($checkexistence) != 1) {
                ?>
                <div class="failed">
                    Error! The withdraw id doesn't exists.
                </div>
                <?php
            }
            else {
                // Get the infors
                $datachecks = mysqli_fetch_array($checkexistence);
                $seller = $datachecks['seller'];
                $amount_withdrawed = (int) $datachecks['amount_withdrawed'];
                $amount_receivable = (int) $datachecks['amount_receivable'];
                $withdate = $datachecks['date'];
                $withtime = $datachecks['time'];
                // Get sellers oldbalance
                $getoldbalance = mysqli_query($server,"SELECT * from seller_accounts
                    WHERE seller = '$seller'
                ");
                $dataoldbalance = mysqli_fetch_array($getoldbalance);
                $oldbalance = (int) $dataoldbalance['balance'];
                $newbalance = $oldbalance - $amount_withdrawed;
                if ($newbalance < 0) {
                    ?>
                    <div class="failed">
                        Error!
                        The new balance can't be less than <b>0 RWF</b>
                    </div>
                    <?php
                }
                else {
                    // Set to withdrawed
                    $setwithdrawed = mysqli_query($server,"UPDATE sellers_withdraws
                        SET status = 'Withdrawed'
                        WHERE 
                        id = '$withdrawid'
                    ");
                    // Save the trxn record
                    $saverecord = mysqli_query($server,"INSERT into seller_money_txns
                        VALUES(null,'$seller','OUT','$oldbalance','$newbalance','$withdate','$withtime')
                    ");
                    if ($saverecord && $setwithdrawed) {
                        $updatethebalance = mysqli_query($server,"UPDATE seller_accounts
                            SET balance = '$newbalance'
                            WHERE seller = '$seller'
                        ");
                        ?>
                        <div class="succed">
                            Congrats! confirming withdraw have succed.
                        </div>
                        <?php
                    }
                    else {
                        ?>
                        <div class="failed">
                            Error! Confirming the withdraw has failed.
                            Please contact system support for any problem
                        </div>
                        <?php
                    }
                }
            }
        }
    ?>
</div>