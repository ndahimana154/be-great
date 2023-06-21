<?php
    SESSION_START();
    include('php/connect.php');
    if (isset($_GET['member-out'])) {
        $member_id = $_GET['member-out'];
        // if ($member_id != $member_acting_userid) {
        //     header("location: member-home.php");
        // }
        // Update the status
        $update = mysqli_query($server,"UPDATE co_members
            SET Status = 'Inactive'
            WHERE id = '$member_id';
        ");
        SESSION_DESTROY();
        header("location: member-signin.php");
    }
    elseif (isset($_GET['seller_out'])) {
        $seller_id = $_GET['seller_out'];
        // Logout
        SESSION_DESTROY();
        header("location: seller-signin.php");
    }
    else {
        SESSION_DESTROY();
        header("location: home.php");
    }
?>