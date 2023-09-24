<div class="hero">
    <?php
        if (isset($_SESSION['acting_userid'])) {
            include('php\buyer-product_category.php');
            include("php\buyer-home-sliding-images.php");
            include('php\buyer-top-sold-products.php');
        }
        else {
            include('product_category.php');
            include('home-sliding-images.php');
            include('top-sold-products.php');
        }
    ?>
</div>