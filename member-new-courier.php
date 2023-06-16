<?php
    SESSION_START();
    include('php/connect.php');
    include('php/member-acting-initial-credentials.php');
    if (!isset($_SESSION['acting_memberid'])) {
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
    <?php
        include('php/modal-pages.php');
    ?>
    <div class="main-gate">
    <?php
            include('php/member-in-header.php');
        ?>
        <div class="remaining">
            <?php
                include('php/member-sub-nav.php');
                include('php\member-new-courier.php');
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>
