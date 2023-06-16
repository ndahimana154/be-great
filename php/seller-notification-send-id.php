<?php
    SESSION_START();
    include('connect.php');
    include('seller-acting-initial-credentials.php');
    // include('../php/head-tag.php');
    if (isset($_POST['noti_id'])) {
        $notification = $_POST['noti_id'];
        $getallnotifications = mysqli_query($server,"SELECT * FROM
            sellers_orders_notifier 
            WHERE id = '$notification'
            AND shop = '$seller_acting_shop'
        ");
        $updateall_notification = mysqli_query($server,"UPDATE sellers_orders_notifier
            SET status = 'Viewed'
            WHERE id = '$notification'
        ");
        if (mysqli_num_rows($getallnotifications) < 1) {
            ?>
            <div class="form-results">
                <div class="failed">
                    Error! It looks like the notification's information is not 
                    available. Try again or contact system support.
                </div>
            </div>
            <?php
        }
        else {
            while ($dataallnotis = mysqli_fetch_array($getallnotifications)) {
                ?>
                <div class="notifier-box alert">
                    <p class="date">
                        <b>
                            Date:
                        </b>
                        <?php echo $dataallnotis['datetime'] ?>
                    </p>
                    <div class="sender">
                        <b>
                            Sender: <?php
                                $sender = $dataallnotis['sender'];
                                $get_sender = mysqli_fetch_array(mysqli_query($server,"SELECT *
                                    FROM co_members
                                    WHERE id = '$sender'
                                "));
                                $sender_email = $get_sender['Email'];
                                echo $sender_email;
                            ?>
                        </b>
                    </div>
                    <div class="msg">
                        <b>
                            Notification:
                        </b>
                        <?php 
                            echo $dataallnotis['notifier_msg'];
                        ?>
                    </div>
                    <div class="ctlrs">
                        <?php
                            // if ($dataallnotis['status'] == 'Not viewed') {
                                ?>
                                <!-- <button class="btn btn-primary viewnotifier_BTN" -->
                                    <!-- value = " -->
                                    <?php 
                                        // echo $dataallnotis['id']; 
                                        ?>
                                        <!-- "> -->
                                    <!-- <i class="fa fa-check-double"></i>
                                    <i class="fa fa-check-double"></i>
                                    <i class="fa fa-check-double"></i>
                                </button> -->
                                <?php
                            // }
                            // else {
                                ?>
                                <!-- <button class="btn">
                                    <i class="fa fa-check"></i>
                                    <i class="fa fa-check"></i>
                                    <i class="fa fa-check"></i>
                                </button> -->
                                <?php
                            // }
                        ?>
                        
                    </div>
                </div>
                <?php
            }
        }
    }
    else {
        ?>
        <div class="form-results">
            <div class="failed">
                Error! No notification sent to the server.
            </div>
        </div>
        <?php
    }
?>