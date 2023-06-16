<?php
    if (isset($_SESSION['acting_memberid'])) {
        header("location: member-home.php");
    }
?>