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
                    <div class="product-box">
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
                                <div class="price">
                                    RWF
                                    <?php
                                        echo $data_latest['product_price'];
                                    ?>
                                </div>
                            </div>
                            <button class="deliverout" 
                                style="width: 100%;
                                    background: var(--main-actingcolor);
                                    padding: 5px;
                                    border-radius: 5px;
                                    border: 0;
                                    color: var(--main-white);
                                    cursor: pointer;
                                    margin-top: 10px;"
                                value="<?php echo $data_latest['product_id']; ?>">
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