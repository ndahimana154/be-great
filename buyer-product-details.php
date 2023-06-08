<?php
    SESSION_START();
    include('php/connect.php');
    include('php/buyer-acting_initial-credentials.php');
    if (!isset($_SESSION['acting_userid'])) {
        header("location: home.php");
    }
    if (isset($_GET['product'])) {
        $product = $_GET['product'];
        $get_product = mysqli_query($server,"SELECT * from products
            WHERE
            product_id = '$product'
        ");
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
            include('php/buyer-in-header.php');
        ?>
        <div class="remaining">
            <?php
                include('php/sub-nav.php');
                include('php/buyer-product-details-section.php');
                // include('php/buyer-top-shops.php');
            ?>
           
            <?php
                include('php/Buyer-in-latest-products.php');
                include('php/big-footer.php'); include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>