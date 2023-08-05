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
                include('php\buyer-search-retrival.php');
                // If the results set is less than 1 display the latest products
                if (mysqli_num_rows($query_latest) < 1) {
                    include('php/Buyer-in-latest-products.php');
                }
                include('php/big-footer.php'); 
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>