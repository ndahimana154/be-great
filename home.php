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
        <div class="hero-section">
            <div class="row">
                <!-- First Column - Sliding Images -->
                <div class="col-md-6">
                    <div class="h-100"> <!-- Add the 'h-100' class for equal height -->
                        <div id="hero-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <!-- Slide 1 -->
                                <div class="carousel-item active">
                                    <img src="https://via.placeholder.com/900x600" class="d-block w-100" alt="Image 1">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>Shop Name 1</h3>
                                        <p>Shop Description 1</p>
                                        <a href="#" class="btn btn-primary">
                                            <i class="fa fa-shopping-cart"></i> Visit Shop
                                        </a>
                                    </div>
                                </div>

                                <!-- Slide 2 -->
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/800x600" class="d-block w-100" alt="Image 2">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>Shop Name 2</h3>
                                        <p>Shop Description 2</p>
                                        <a href="#" class="btn btn-primary">
                                            <i class="fa fa-shopping-cart"></i> Visit Shop
                                        </a>
                                    </div>
                                </div>

                                <!-- Slide 3 (Add more slides as needed) -->
                                <div class="carousel-item">
                                    <img src="https://via.placeholder.com/800x600" class="d-block w-100" alt="Image 3">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h3>Shop Name 3</h3>
                                        <p>Shop Description 3</p>
                                        <a href="#" class="btn btn-primary">
                                            <i class="fa fa-shopping-cart"></i> Visit Shop
                                        </a>
                                    </div>
                                </div>

                                <!-- Add more slides with the same structure as above -->
                            </div>
                            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#hero-carousel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                </div>
                
                <!-- Second Column - Most Trending Products -->
                <div class="col-md-2">
                    <div class="card h-100"> <!-- Add the 'h-100' class for equal height -->
                        <div class="trending-products">
                            <h2>Most Trending Products</h2>
                            <div class="card">
                                <!-- Product 1 content here -->
                            </div>
                            <div class="card">
                                <!-- Product 2 content here -->
                            </div>
                            <!-- Add more product cards with placeholder images and contents as needed -->
                        </div>
                    </div>
                </div>

                <!-- Third Column - Categories -->
                <div class="col-md-4">
                    <div class="card h-100"> <!-- Add the 'h-100' class for equal height -->
                        <div class="categories">
                            <h2>Categories</h2>
                            <div class="card">
                                <!-- Category 1 content here -->
                            </div>
                            <div class="card">
                                <!-- Category 2 content here -->
                            </div>
                            <!-- Add more category cards with placeholder images and contents as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="remaining">
            <?php
                // include("php/out-home-sliding-imgs.php");
                // include('php\home-sliding-images.php');
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
     <!-- Include jQuery and Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="js\jquery-3.6.0.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script> -->
    <!-- External scripts -->
</body>
</html>