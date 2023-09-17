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
<head>
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styling/main-style.css">
</head>
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
                // include('php/top-shops.php');
                // include('php/Latest-products.php');
                include('php/big-footer.php'); 
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>