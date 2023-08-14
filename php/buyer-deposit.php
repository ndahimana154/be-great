
<div class="signupform-box">
    <div class="signup-cont">
        <div class="header">
            <h1>
                DEPOSIT MONEY
            </h1>
            <a>
                <i class="fa fa-window-close"></i>
            </a>
        </div> 
        <div class="form-results">
            <?php
                if (isset($_POST['SaveProductBTN'])) {
                    $txnid = $_POST['txnid'];
                    // Check if the transaction existss
                    $checktxnexists = mysqli_query($server,"SELECT * from 
                        deposit_draft 
                        WHERE transaction_id = '$txnid'
                    ");
                    if (mysqli_num_rows($checktxnexists) < 1) {
                        ?>
                        <div class="failed">
                            Error! The transaction id doesn't exists
                        </div>
                        <?php
                    }
                    else {
                        // Check if the transaction is
                        // not yet confirmed or reviewed
                        $checkreview = mysqli_query($server,"SELECT * from 
                            deposit_draft 
                            WHERE transaction_id = '$txnid' 
                            AND transaction_status = 'Unreviewed'
                        ");
                        if (mysqli_num_rows($checkreview) !=1) {
                            ?>
                            <div class="failed">
                                Error! It looks like the transaction have
                                already matched with other customer.
                                If there is misunderstaings you can call our
                                system support.
                            </div>
                            <?php
                        }
                        else {
                            // Check if the payment digits are
                            // assigned to the customer
                            $data_check = mysqli_fetch_array($checkreview);
                            $method_id = $data_check['transaction_payment_method'];
                            $payment_digits = $data_check['transaction_payment_digits'];
                            $checkinmembrpyts = mysqli_query($server,"SELECT * from
                                buyer_payment_methods
                                WHERE method_digits = '$payment_digits'
                                AND method = '$method_id'
                                AND buyer = '$acting_userid'
                            ");
                            if (mysqli_num_rows($checkinmembrpyts) < 1) {
                                ?>
                                <div class="failed">
                                    Error! It looks like this payment method used is not
                                    assigned to your account.
                                    Please make sure that the method used in the payment
                                    is in your payment methods list and try again.
                                </div>
                                <?php
                            }
                            else {
                                $trxn_date = $data_check['transaction_date'];
                                $trxn_time = $data_check['transaction_time'];
                                $trxn_amount = (int) $data_check['transaction_amount'];
                                $newbalance = $actingbalance + $trxn_amount;
                                $insert_record = mysqli_query($server,"INSERT into buyer_money_txns
                                    values(null,'$acting_userid','$trxn_date','$trxn_time','Deposit',$actingbalance,$newbalance,$trxn_amount)
                                ");
                                $update_balance = mysqli_query($server,"UPDATE buyers_accounts
                                    SET balance = '$newbalance'
                                    WHERE buyer = '$acting_userid'
                                ");
                                $updatethestatus = mysqli_query($server,"UPDATE deposit_draft
                                    SET  transaction_status = 'Matching'
                                    WHERE transaction_id = '$txnid'
                                ");
                                if ($insert_record && $update_balance) {
                                    ?>
                                    <div class="succed">
                                        Congrats! The depositing your money have succed.
                                        Now your new balance is (<b><?php echo $newbalance; ?>)
                                    </div>
                                    <?php
                                }
                                else {
                                    ?>
                                    <div class="failed">
                                        Congrats! Depositing your money failed.
                                        Try again later or contact system support.
                                    </div>
                                    <?php
                                }
                            }
                        }
                    }
                }
            ?>
        </div>
        <form class="sign-box" action="" method="POST"  enctype="multipart/form-data">
            <p>
                Transaction id
            </p>
            <p>
                <input type="text" class="text-box" name="txnid"
                    value =""
                    placeholder="Type...">
            </p>
            <div class="btnz">
                <button name="SaveProductBTN" class="signup-Btn">
                    <i class="fa fa-money-check"></i>
                    Review
                </button> 
                <button type="reset" class="clear-Btn">
                    <i class="fa fa-window-close"></i>
                    Clear form
                </button>
            </div>
        </form>
    </div>
</div>
