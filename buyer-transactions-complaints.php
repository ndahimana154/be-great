<?php
    SESSION_START();
    include('php/connect.php');
    include('php/buyer-acting_initial-credentials.php');
    if (!isset($_SESSION['acting_userid'])) {
        header("location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php  
    include('php\head-tag.php');
?>
<body>
    <?php
        include('php/modal-pages.php')
    ?>
    <div class="main-gate">
        <?php
            include('php/buyer-in-header.php');
        ?>
        <div class="remaining">
            <?php
                include('php/sub-nav.php');
            ?>
            <div class="topsoldnshops">
                <div class="topsold">
                    <?php
                        include('php/buyer-transactions-complaints-retrieve.php');
                    ?>
                    <h1>
                </div>
            </div>
            <?php
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>