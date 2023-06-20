<?php
    SESSION_START();
    SESSION_DESTROY();
    if (isset($_GET['member-out'])) {
        header("location: member-signin.php");
    }
    else {
        header("location: home.php");
    }
?>