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
                <?php
                    include('php/buyer-product_category.php');
                    
                ?>
                <div class="topsold">
                    <h1>
                        Top sold products
                    </h1>
                    <div class="topsold-cont">
                        <?php
                            include('php/buyer-top-sold-products.php');
                        ?>
                    </div>
                </div>
            </div>
            <?php
                include('php/buyer-top-shops.php');
                include('php/Buyer-in-latest-products.php');
                include('php/big-footer.php'); 
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>