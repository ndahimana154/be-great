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
                include('php/buyer-Latest-products.php');           
            ?>
            <?php
                include('php/big-footer.php'); 
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>