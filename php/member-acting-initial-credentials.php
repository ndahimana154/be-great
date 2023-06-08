<?php
    $member_acting_userid = $_SESSION['acting_memberid'];
    $get_member_credentials = mysqli_query($server,"SELECT * from co_members_auth 
        WHERE
        id = '$member_acting_userid'
    ");
    $data_member_credentials = mysqli_fetch_array($get_member_credentials);
    $member_acting_username = $data_member_credentials['username'];
    $member_acting_profilepic = $data_member_credentials['profile_image'];
    $get_member_allinfo = mysqli_query($server,"SELECT * from co_members 
        WHERE id = '$member_acting_userid'
    ");
    $data_member_allinfo = mysqli_fetch_array($get_member_allinfo);
    $member_acting_fn = $data_member_allinfo['Fname'];
    $member_acting_ln = $data_member_allinfo['Lname'];
    $member_acting_email = $data_member_allinfo['Email'];
    $member_acting_phone = $data_member_allinfo['Phone'];
    $member_acting_type = $data_member_allinfo['Type'];

?>