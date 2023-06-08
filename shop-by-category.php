<?php
    SESSION_START();
    include('php/connect.php');
    include('php/check_session.php');
    if (!isset($_GET['category'])) {
        header("location: home.php");
    }
    else {
        $category = $_GET['category'];
        $get_category = mysqli_query($server,"SELECT * from product_genres WHERE
            genre_id = '$category'
        ");
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
                include('php/shop-by-category.php');
                include('php/top-shops.php');
                include('php/Latest-products.php');
                include('php/big-footer.php'); 
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
</body>
</html>