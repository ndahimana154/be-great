<?php
    SESSION_START();
    include('php/connect.php');
    include('php\seller-acting-initial-credentials.php');
    if (!isset($_SESSION['seller_acting-userid'])) {
        header("location: home.php");
    }
    if (!isset($_GET['txnid'])) {
        header("location: seller-home.php");
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
        include('php/modal-pages.php')
    ?>
    <div class="main-gate">
        <?php
            include('php\seller-in-header.php');
        ?>
        <div class="remaining">
            <?php
                include('php/seller-sub-nav.php');
                include('php/seller-send-withdrawing-complaint.php');
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>
