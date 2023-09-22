<?php
    SESSION_START();
    include('php/connect.php');
    include('php/check_session.php');
    if (isset($_GET['shop'])) {
        $shop = $_GET['shop'];
        $get_shop = mysqli_query($server,"SELECT * from shops WHERE shop_id ='$shop'");
    }
    else {
        header("location: Buyer-home.php");
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
        include('php/out_header.php');
    ?>
    <div class="shop-section">
        <?php
            // Check if the shop is available or not>?
            if (mysqli_num_rows($get_shop) < 1) {
                ?>
                <div class="form-results">
                    <div class="failed">
                        Error! The shop is not found
                    </div>
                </div>
                <?php
            }
            else {
                $data_shop = mysqli_fetch_array($get_shop);
                ?>
                <div class="shop-cont">
                    <div class="header">
                        <img src="images/shops/logo/<?php echo $data_shop['shop_logo'] ?>" alt="">
                        <h1>
                            <?php echo $data_shop['shop_name'] ?>
                        </h1>
                    </div>
                    <div class="details">
                        <div class="">
                            <h2>
                                <img src="images/Defaults/location.png" alt="">
                                <span>
                                    Location details
                                </span>
                            </h2>
                            <div class="loc">
                                <div class="location">
                                    District: <?php echo $data_shop['shop_district'] ?>
                                </div>
                                <div class="location">
                                    Sector: <?php echo $data_shop['shop_sector'] ?>
                                </div>
                                <div class="location">
                                    Exact location: <?php echo $data_shop['shop_location'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="latestproducts" id="shopsproducts">
                    <!-- <div class="leftlatest">
                    </div> -->
                    <div class="latest-products">
                        <h1>
                            SHOP'S PRODUCTS
                        </h1>
                        <div class="latest-row">
                            <?php
                                $sql_latest="SELECT * from 
                                    products 
                                    WHERE shop = '$shop'
                                    ORDER BY product_add_date DESC,
                                    product_name ASC
                                ";
                                $query_latest = mysqli_query($server,$sql_latest);
                                if (mysqli_num_rows($query_latest) < 1) {
                                    ?>
                                    <div class="form-results">
                                        <div class="failed">
                                                No products found
                                        </div>
                                    </div>
                                    <?php
                                }
                                while ($data_latest=mysqli_fetch_array($query_latest)) {
                                    ?>
                                    <div class="latest-box">
                                        <img src="images/products/Frontimages/<?php echo $data_latest['product_image']; ?>" alt="">
                                        <div class="details">
                                            <div class="name">
                                                <a href="buyer-product-details.php?product=<?php echo $data_latest['product_id']; ?>">
                                                    <?php
                                                        echo $data_latest['product_name'];
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="prinshop">
                                                <div class="shop">
                                                    <a href="Buyer-view-shops.php?shop=<?php echo $data_latest['shop'];?>">
                                                        <?php
                                                            $shop_id = $data_latest['shop'];
                                                            $getshop = mysqli_fetch_array(mysqli_query($server,"SELECT * from shops WHERE shop_id='$shop_id'"));
                                                            echo $getshop['shop_name'];
                                                        ?>
                                                    </a>
                                                </div>
                                                <p>
                                                    <?php
                                                        echo $data_latest['product_descr'];
                                                    ?>
                                                </p>
                                                <div class="price">
                                                    RWF
                                                    <?php
                                                        echo $data_latest['product_price'];
                                                    ?>
                                                </div>
                                            </div>
                                            <button class="deliverout" value="<?php echo $data_latest['product_id']; ?>">
                                                <i class="fa fa-cart-plus"></i>
                                                Deliver
                                            </button>
                                        </div>
                                    </div>
                                    <?php
                                }
                            ?>
                            <div class="products-box">
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
    <?php
        include('php/big-footer.php'); 
        include('php/developer-footer.php');
    ?>
</body>
</html>