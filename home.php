<?php
    SESSION_START();
    include('php/connect.php');
    include('php\head-tag.php');
    include('php/check_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add the Bootstrap CSS link here -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
        include('php/modal-pages.php');
    ?>
    
    <div class="main-gate">
        <?php
            include('php/out_header.php');
            include("php/hero-test.php");
        ?>
        <div class="remaining">
            <?php
                include("php/out-home-sliding-imgs.php");
            ?>
            <div class="home-part1" style="
                display: flex;flex-direction:row;
                flex-wrap: wrap;
                ">
                <div class="left" style="flex:1">
                    <?php
                        include('php/product_category.php');
                    ?>
                </div>
                <div class="center" style="flex:3;justify-contents:center;align-items:center;">
                    <?php
                        include('php\home-sliding-images.php');
                        include('php/Latest-products.php');
                    ?>
                </div>
                <div class="right" style="flex: 1;">
                    <?php
                        include('php/home-top-shops.php');
                    ?>
                </div>
            </div>
            <?php
                // include('php/top-shops.php');
                include('php/big-footer.php'); 
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>