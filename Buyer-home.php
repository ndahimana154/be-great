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
<head>
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styling/main-style.css">
</head>
<body>
    <?php
        include('php/modal-pages.php');
        include('php/buyer-in-header.php');
    ?>
    <div class="low-container">
        <div class="left"></div>
        <div class="right">
            <?php
                include('php/hero.php');
                include('php/Latest-products.php');           
            ?>
        </div>
    </div>
    <div class="remaining">
        <?php
            include("php\buyer-home-sliding-imgs.php");
        ?>
        <div>
            <!-- <div class="left" style="width: 400px;"> -->
                <?php
                    // include('php/buyer-product_category.php');
                ?>
            <!-- </div> -->
            <div class="center" style="flex: 4;">
                <?php
                    include('php/Buyer-in-latest-products.php');
                ?>
            </div>
            <div class="right" style="flex: 1;">
                <?php
                    include('php/buyer-top-sold-products.php');
                ?>
            </div>
        </div>
        <?php
            include('php/big-footer.php'); 
            include('php/developer-footer.php');
        ?>
    </div>
</body>
</html>