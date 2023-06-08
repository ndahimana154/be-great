<?php
    SESSION_START();
    include('php/connect.php');
    include('php/check_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php  
    include('php\head-tag.php');
    include('php/modal-pages.php')
?>
<body>
    <div class="main-gate">
        <?php
            include('php/out_header.php');
        ?>
        <div class="remaining">
            <?php
                include('php\search-retrival.php');
            ?>
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