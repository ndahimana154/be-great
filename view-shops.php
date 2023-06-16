<?php
    SESSION_START();
    include('php/connect.php');
    include('php/check_session.php');
    if (isset($_GET['shop'])) {
        $shop = $_GET['shop'];
        $get_shop = mysqli_query($server,"SELECT * from shops WHERE shop_id ='$shop'");
    }
    else {
        header("location: Buyer-home.php");
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
            include('php/out_header.php');
        ?>
        <div class="remaining">
            <?php
                include('php/shop-section.php');
                // include('php/buyer-top-shops.php');
                include('php\get-shops-products.php ');
                include('php/big-footer.php'); 
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>