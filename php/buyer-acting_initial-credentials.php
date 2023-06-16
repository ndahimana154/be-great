<?php
    $acting_userid = $_SESSION['acting_userid'];
    $get_credentials = mysqli_query($server,"SELECT * from buyers WHERE id='$acting_userid'");
    $data_credentials = mysqli_fetch_array($get_credentials);
    $acting_email = $data_credentials['email'];
    $acting_fn = $data_credentials['firstname'];
    $acting_ln = $data_credentials['lastname'];
    $acting_phone = $data_credentials['phone'];
    $acting_profilePic = $data_credentials['profilepicture'];

    // Checking the remaining balance
    $check_balance = mysqli_query($server,"SELECT * from buyers_accounts WHERE 
        buyer='$acting_userid'
    ");
    $data_check_balance = mysqli_fetch_array($check_balance);
    $acting_account_id = $data_check_balance['acc_id'];
    $actingbalance =(int) $data_check_balance['balance'];
?>