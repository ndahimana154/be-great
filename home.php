<?php
    SESSION_START();
    include('php/connect.php');
    include('php\head-tag.php');
    include('php/check_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        include('php/modal-pages.php')
    ?>
    <div class="main-gate">
        <?php
            include('php/out_header.php');
        ?>
        <div class="remaining">
            <div class="home-slideing"
                style="display:flex;
                flex-direction:row;">
                <?php
                    // include('php/product_category.php');
                    include('php\home-sliding-images.php');
                ?>
            </div>
            <div class="topsoldnshops">
                <?php
                    include('php/product_category.php');
                ?>
                  <div class="topsold">
                    <h1>
                        Top sold products
                    </h1>
                    <div class="topsold-cont">
                        <?php
                            include('php/top-sold-products.php');
                        ?>
                    </div>
                </div>
            </div>
            <?php
                include('php/top-shops.php');
                include('php/Latest-products.php');
                include('php/big-footer.php'); 
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>