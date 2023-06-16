<?php
    $seller_acting_userid = $_SESSION['seller_acting-userid'];
    $get_seller_credentials = mysqli_query($server,"SELECT * from sellers
        WHERE
        id = '$seller_acting_userid'
    ");
    // echo mysqli_num_rows($get_seller_credentials);
    $data_seller_credentials = mysqli_fetch_array($get_seller_credentials);
    $seller_acting_email = $data_seller_credentials['email'];
    $seller_acting_fnaame = $data_seller_credentials['firstname'];
    $seller_acting_lname = $data_seller_credentials['lastname'];
    $seller_actingphone = $data_seller_credentials['phone'];
    $seller_acting_profilepic = $data_seller_credentials['profilepicture'];

    // Go to the connected shops
    $get_connectedshop = mysqli_fetch_array(mysqli_query($server,"SELECT * from 
        sellers_to_shops
        WHERE seller = '$seller_acting_userid'
    "));
    $seller_acting_shop = $get_connectedshop['shop'];
    // Get the real shop infos
    $getshopinfos = mysqli_fetch_array(mysqli_query($server,"SELECT * from 
        shops WHERE shop_id = '$seller_acting_shop'
    "));
    $seller_acting_shop_name = $getshopinfos['shop_name'];
    $seller_acting_shop_logo = $getshopinfos['shop_logo'];
    $seller_acting_district = $getshopinfos['shop_district'];
    $seller_acting_sector = $getshopinfos['shop_sector'];
    $seller_acting_location = $getshopinfos['shop_location'];

    // Getting the sellers acccounts and balances
    $checkaccount = mysqli_query($server, "SELECT * from seller_accounts
        WHERE seller = '$seller_acting_userid'
    ");
    $datacheckaccount = mysqli_fetch_array($checkaccount);
    $acting_seller_account_id = $datacheckaccount['id'];
    $acting_seller_account_balance = (int) $datacheckaccount['balance'];
?>