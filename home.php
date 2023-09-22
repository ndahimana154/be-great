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
    ?>
    <!-- <div class="hero">
        <div class="hero-box">
            <img src="images/products/Frontimages/Marina Rama Shop - Camera Gimbal ZX Fengyu 4 - FRONTIMAGE.png" alt="">
            <h2>
                Camera Gimbal ZXF103
            </h2>
            <p>
                <span class="desc">
                    Shop description: 
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam obcaecati dolor adipisci corrupti alias nulla, quam error esse fugiat architecto eligendi iusto eius in magni pariatur soluta itaque eaque doloribus.
                </span>
            </p>
        </div>
    </div> -->
    <div class="main-gate">
     

        <div class="remaining">
            <?php
                // include("php/out-home-sliding-imgs.php");
                // include('php\home-sliding-images.php');
            ?>
            <!-- <div class="home-part1" style="
                display: flex;flex-direction:row;
                flex-wrap: wrap;
                ">
                <div class="left" style="flex:1">
                    <?php
                        // include('php/product_category.php');

                    ?>
                </div> -->
                <!-- <div class="center" style="flex:3;justify-contents:center;align-items:center;"> -->
                    <?php
                        // include('php/Latest-products.php');
                    ?>
                </div>
                <!-- <div class="right" style="flex: 1;"> -->
                    <?php
                        // include('php/home-top-shops.php');
                    ?>
                <!-- </div> -->
            </div>
            <?php
                // include('php/top-shops.php');
                include('php/big-footer.php'); 
                include('php/developer-footer.php');
            ?>
        </div>
    </div>
     <!-- Include jQuery and Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="js\jquery-3.6.0.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script> -->
    <!-- External scripts -->
</body>
</html>