<?php
    SESSION_START();
    include('php/connect.php');
    include('php\seller-acting-initial-credentials.php');
    if (!isset($_SESSION['seller_acting-userid'])) {
        header("location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php  
    include('php\head-tag.php');
    include('php/modal-pages.php');
?>
<body>
    <div class="main-gate">
        <?php
            include('php\seller-in-header.php');
        ?>
        <div class="remaining">
            <?php
                include('php/seller-sub-nav.php');
                include('php/seller-stock-history.php');
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>