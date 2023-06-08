<div class="signupform-box">
    <div class="signup-cont">
        <div class="header">
            <h1>
                Withdraw money
            </h1>
            <a>
                <i class="fa fa-window-close"></i>
            </a>
        </div> 
        <div class="form-results">
            <?php
                if (isset($_POST['Seller-WD-btn'])) {
                    $wiD_amount = $_POST['wd-amount'];
                    $pyt_method = $_POST['pyt_method'];
                    // echo $pyt_method;
                    if ($pyt_method == 'Select payment method') {
                        ?>
                        <div class="failed">
                            Error! Please select the Payment method and try again.
                        </div>
                        <?php
                    }
                    else {
                        
                        $get_methods_all_about = mysqli_query($server,"SELECT * from sellers_payment_methods
                            WHERE id = '$pyt_method'
                        ");
                        $get_methods_all_about = mysqli_fetch_array($get_methods_all_about);
                        $method = $get_methods_all_about['method'];
                        $get_methodinfo = mysqli_fetch_array(mysqli_query($server,"SELECT * from payment_methods
                            WHERE id = '$method'"));
                        $method_name = $get_methodinfo['method_name'];
                        $method_type  = $get_methodinfo['method_type'];
                        if ($method_type == 'Banking') {
                            $methods_commission = ($wiD_amount * 5)/100;
                            $amount_receivables = $wiD_amount - $methods_commission;
                        }
                        else {
                            $amount_receivables = $wiD_amount;
                        }
                        // check if the withdraw aount is not greater than the the balance
                        if ($wiD_amount > $acting_seller_account_balance) {
                            ?>
                            <div class="failed">
                                Error! Your withdraw amount is geater than the balance.
                                Remember your balance is 
                                <b><?php echo $acting_seller_account_balance."RWF"; ?></b>,
                                So don't exceed the balance.
                            </div>
                            <?php
                        }
                        else {
                            // Check if there is no other pending withdraw
                            $checkkpeinding = mysqli_query($server,"SELECT * from
                                sellers_withdraws
                                WHERE 
                                seller = '$seller_acting_userid'
                                AND status = 'Pending'
                            ");
                            if (mysqli_num_rows($checkkpeinding) > 0) {
                                ?>
                                <div class="failed">
                                    Error! There is other pending withdraw,
                                    wait the existing one to be withdrawed or delete it.
                                </div>
                                <?php
                            }
                            else {
                                 // Create  apending withdraw 
                                $newwd = mysqli_query($server,"INSERT into sellers_withdraws
                                    VALUES(null,$seller_acting_userid,CURRENT_DATE(),CURRENT_TIME(),$wiD_amount,$amount_receivables,'Pending')
                                ");
                                if (!$newwd) {
                                    ?>
                                    <div class="failed">
                                        Error! Withdrawing the money failed.
                                        Please contact the system support.
                                    </div>
                                    <?php
                                }
                                else {
                                    ?>
                                    <div class="succed">
                                        Congrats! You withdraw is successfully received. Wait a bit you will be notified
                                        with your money.
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
                Withdraw amount
            </p>
            <p>
                <input type="number" class="text-box" name="wd-amount"  placeholder="Type..." required>
            </p>
            <p>
               Payment method
            </p>
            <p>
                <select name="pyt_method" id="" class="text-box">
                    <option value="Select payment method">
                        Select a payment method
                    </option>
                    <?php
                        $get_methods = mysqli_query($server,"SELECT *,
                            sellers_payment_methods.id AS 'seller_method'
                            from sellers_payment_methods,payment_methods
                            WHERE 
                            seller = '$seller_acting_userid'
                            AND payment_methods.id = sellers_payment_methods.method
                            AND status = 'Verfied'
                        ");
                        if (mysqli_num_rows($get_methods) < 1) {
                            ?>
                            <option value="Select payment method">
                                no method available
                            </option>
                            <?php
                        }
                        while ($datamethods = mysqli_fetch_array($get_methods)) {
                           
                            ?>
                            <option value="<?php echo $datamethods['seller_method']; ?>">
                                <?php
                                    // echo "Seller method".$datamethods['seller_method']."<br>";
                                    echo $datamethods['method_name']." (".$datamethods['method_digits'].")";
                                ?>
                            </option>
                            <?php
                        }
                    ?>
                </select>
            </p>
            <div class="btnz">
                <button name="Seller-WD-btn" class="signup-Btn">
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