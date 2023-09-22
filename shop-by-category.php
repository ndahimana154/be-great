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
<head>
    <!-- Add the Bootstrap CSS link here -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styling/main-style.css">
</head>
<body>
    <?php
        include('php/modal-pages.php');
        include('php/out_header.php');
        include('php/shop-by-category.php');
        include('php/big-footer.php'); 
        include('php/developer-footer.php');
    ?>
</body>
</html>