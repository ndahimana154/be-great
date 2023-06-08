<?php
    SESSION_START();
    include('php/connect.php');
    include('php/buyer-acting_initial-credentials.php');
    if (!isset($_SESSION['acting_userid'])) {
        header("location: home.php");
    }
    if (!isset($_GET['txnid'])) {
        header("location: buyer-home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php  
    include('php\head-tag.php');
    include('php/modal-pages.php');
?>
<body>
    <?php
        include('php/modal-pages.php');
    ?>
    <div class="main-gate">
        <?php
            include('php/buyer-in-header.php');
        ?>
        <div class="remaining">
            <?php
                include('php/sub-nav.php');
                include('php\buyer-send-transaction-complaint.php');
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>
