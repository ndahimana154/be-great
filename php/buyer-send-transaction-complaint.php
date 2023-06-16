<div class="form-results">
    <?php
        $txnid = $_GET['txnid'];
        // Check if the txn exists
        $check_txn = mysqli_query($server,"SELECT * from buyer_money_txns
            WHERE id ='$txnid'
        ");
        if (mysqli_num_rows($check_txn) != 1) {
            ?>
            <div class="failed">
                Error! The transaction sent doesn't exist.
            </div>
            <?php
        }
        else {
            // CHeck if the seller owns the transaction
            $check_txn_owner = mysqli_query($server,"SELECT * from buyer_money_txns
                WHERE 
                id ='$txnid'
                AND buyer='$acting_userid'
            ");
            if (mysqli_num_rows($check_txn_owner) != 1 ) {
                ?>
                <div class="failed">
                    Error! The transaction doesn't belong to this buyer.
                </div>
                <?php
            }
            else {
                ?>
                </div>
                <div class="signupform-box">
                    <div class="signup-cont">
                        <div class="header">
                            <h1>
                                Type and send your complaint
                            </h1>
                            <a>
                                <i class="fa fa-window-close"></i>
                            </a>
                        </div> 
                        <div class="form-results">
                            <?php
                                if (isset($_POST['SaveProductBTN'])) {
                                    $txnid = $_POST['txnid'];
                                    $complaint =  $_POST['complaint'];
                                    $sendcomplaint = mysqli_query($server,"INSERT into 
                                        buyer_money_txns_complaints
                                        VALUES(null,$acting_userid,$txnid,'$complaint','Not responded yet',CURRENT_DATE,CURRENT_TIME())
                                    ");
                                    if (!$sendcomplaint) {
                                        ?>
                                        <div class="failed">
                                            Error! The complaint failec to be sent.
                                            Try again or call system support.
                                        </div>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <div class="succed">
                                            Congrats! The complaint is sent successfully. 
                                            You will be responded soon.
                                        </div>
                                        <?php
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
                                    value = "<?php echo $txnid ?>"
                                    placeholder="Type..." readonly>
                            </p>
                            <p>
                                State your complaint
                            </p>
                            <p>
                                <textarea name="complaint" id="" cols="30" rows="8" class="text-box"></textarea>
                            </p>
                            <div class="btnz">
                                <button name="SaveProductBTN" class="signup-Btn">
                                    <i class="fa fa-paper-plane"></i>
                                    Send
                                </button> 
                                <button type="reset" class="clear-Btn">
                                    <i class="fa fa-window-close"></i>
                                    Clear form
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }
        }
    ?>
