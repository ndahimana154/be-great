<div class="latestproducts">
    <!-- <div class="leftlatest">
    </div> -->
    <div class="rightlatest">
        <h1>
            Category '<b><?php echo $data_category['genre_name'] ?></b>'
        </h1>
        <hr>
        <div class="latestcont">
            <?php
                while ($data_latest=mysqli_fetch_array($get_allproducts)) {
                    ?>
                    <div class="product-box flex-4product_box">
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
                                <p style="font-weight: 600;">
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
                            <button class="shopBTN" value="<?php echo $data_latest['product_id']; ?>">
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