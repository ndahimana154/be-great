<div class="latest-row">
    <?php
        while ($data_latest=mysqli_fetch_array($get_allproducts)) {
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
                    <button class="deliverout"
                        value="<?php echo $data_latest['product_id']; ?>">
                        <i class="fa fa-cart-plus"></i>
                        Deliver
                    </button>
                </div>
            </div>
            <?php
        }
    ?>
</div>