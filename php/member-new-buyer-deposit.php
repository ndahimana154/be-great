
<div class="signupform-box">
    <div class="signup-cont">
        <div class="header">
            <h1>
                PROCESS NEW BUYER'S DEPOSIT
            </h1>
            <a>
                <i class="fa fa-window-close"></i>
            </a>
        </div> 
        <div class="form-results">
            <?php
                if (isset($_POST['SaveProductBTN'])) {
                    $txn_id = $_POST['txnid'];
                    $txn_names = $_POST['txn_names'];
                    $txn_pytmethod = $_POST['pytmetd'];
                    $txn_digits = $_POST['method_digits'];
                    $txn_date = $_POST['txndate'];
                    $txn_time = $_POST['txntime'];
                    $txn_amount = $_POST['txn_amount'];
                    // Check if the payment method is selected properly as required.
                    if ($txn_pytmethod == 'select payment method') {
                        ?>
                        <div class="failed">
                            Error! Please select payment method.
                        </div>
                        <?php
                    }
                    else {
                        // Check if there is no existing transaction which is the 
                        // same (Transacion_id,Transaction_payment_methods)
                        $check_txnexist = mysqli_query($server,"SELECT * from deposit_draft
                            WHERE transaction_id = '$txn_id'
                            AND transaction_payment_method = '$txn_pytmethod'
                        ");
                        if (mysqli_num_rows($check_txnexist) > 0) {
                            ?>
                                Error! This transaction already exists.
                                If there is misunderstandings please contact
                                system support.
                            <?php
                        }
                        else {
                            $new = mysqli_query($server,"INSERT into 
                                deposit_draft
                                VALUES('$txn_id','$txn_amount','$txn_names','$txn_pytmethod','$txn_digits','$txn_date','$txn_time',now(),'Unreviewed',$member_acting_userid)
                            ");
                            if (!$new) {
                                ?>
                                <div class="failed">
                                    Error! The transaction failed to be saved.
                                </div>
                                <?php
                            }
                            else {
                                ?>
                                <div class="succed">
                                    Congrats! The transaction is saved successfully let's wait it to be Matched.
                                </div>
                                <?php
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
                    value ="" required
                    placeholder="Type...">
            </p>
            <p>
                Transaction names
            </p>
            <p>
                <input type="text" class="text-box" name="txn_names" required
                placeholder="Type...">
            </p>
            <p>
                Transaction amount
            </p>
            <p>
                <input type="number" class="text-box" name="txn_amount" required
                placeholder="Type...">
            </p>
            <p>
                Transaction payment method
            </p>
            <p>
                <select name="pytmetd" id="" class="text-box" required>
                    <option value="select payment method">
                        Select the payment method
                    </option>
                    <?php
                        $get_methods = mysqli_query($server,"SELECT * from 
                            payment_methods 
                        ");
                        while ($data_methods = mysqli_fetch_array($get_methods)) {
                            ?>
                            <option value="<?php echo $data_methods['id']; ?>">
                                <?php echo $data_methods['method_name']; ?>
                            </option>
                            <?php
                        }
                    ?>
                </select>
            </p>
            <p>
                Payment method digits
            </p>
            <p>
                <input type="text" class="text-box" name="method_digits"
                    value ="" required
                    placeholder="Type...">
            </p>
            <p>
                Transaction date
            </p>
            <p>
                <input type="date" name="txndate" class="text-box"
                    value ="" required
                    placeholder="Type...">
            </p>
            <p>
                Transaction time
            </p>
            <p>
                <input type="time" name="txntime" class="text-box"
                    value ="" required
                    placeholder="Type...">
            </p>
            <div class="btnz">
                <button name="SaveProductBTN" class="signup-Btn">
                    <i class="fa fa-save"></i>
                    Save
                </button> 
                <button type="reset" class="clear-Btn">
                    <i class="fa fa-window-close"></i>
                    Clear form
                </button>
            </div>
        </form>
    </div>
</div>
