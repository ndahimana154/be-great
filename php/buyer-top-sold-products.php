<div class="latestproducts">
    <h1>
        Top sold 
    </h1>
    <div class="latestcont">
        <?php
            $sql_latest="SELECT 
                p.product_id, p.product_name, 
                p.product_image, p.product_price, 
                p.product_add_date, p.product_genre, 
                p.product_descr,
                p.shop, COUNT(po.product) AS num_orders
                FROM products p
                INNER JOIN products_orders po ON p.product_id = po.product
                WHERE quantity_remain > 0
                GROUP BY p.product_id
                ORDER BY num_orders DESC
                LIMIT 5;
            ";
            $query_latest = mysqli_query($server,$sql_latest);
            if (mysqli_num_rows($query_latest) < 1) {
                ?>
                <div class="product-box">
                    <div class="details">
                        <a href="">
                            No products found
                        </a>
                    </div>
                </div>
                <!-- include('php/buyer-top-sold-products.php'); -->
                <?php
            }
            while ($data_latest=mysqli_fetch_array($query_latest)) {
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
                                <p style="font-weight: 600;">
                                    <?php
                                        echo $data_latest['product_descr'];
                                    ?>
                                </p>
                            </div>
                            <div class="price">
                                <?php
                                    echo $data_latest['product_price']."RWF";
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
    </div>
</div>