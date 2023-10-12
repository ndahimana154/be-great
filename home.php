<?php
    SESSION_START();
    include('php/connect.php');
    include('php\head-tag.php');
    include('php/check_session.php');
    include('php/modal-pages.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add the Bootstrap CSS link here -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styling/main-style.css">
</head>
<body>
    <?php
        include('php/out_header.php');
        include('php/hero.php');
        include('php/Latest-products.php');
        include('php/big-footer.php'); 
        include('php/developer-footer.php');
    ?>
     <!-- Include jQuery and Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="js\jquery-3.6.0.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script> -->
    <!-- External scripts -->
</body>
</html>