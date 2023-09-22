<div class="hot-pro">
    <h1>
        ON-HOT DEALS
    </h1>
    <div class="hot-row">
        <?php
            $sql_latest="SELECT 
                p.product_id, p.product_name, 
                p.product_image, p.product_price, 
                p.product_add_date, p.product_genre,
                p.product_descr, 
                p.shop, COUNT(po.product) AS num_orders
                FROM products p
                INNER JOIN products_orders po ON p.product_id = po.product
                GROUP BY p.product_id
                ORDER BY num_orders DESC
                LIMIT 3;
            ";
            $query_latest = mysqli_query($server,$sql_latest);
            if (mysqli_num_rows($query_latest) < 1) {
                ?>
                <div class="hot-box">
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
                <div class="hot-box">
                    <img src="images/products/Frontimages/<?php echo $data_latest['product_image']; ?>" alt="">
                    <div class="hot-info">
                        <a href="buyer-product-details.php?product=<?php echo $data_latest['product_id']; ?>" class="hot-name">
                            <?php
                                echo $data_latest['product_name'];
                            ?>
                        </a>
                        <div class="hot-shop">
                            <a href="view-shops.php?shop=<?php echo $data_latest['shop'];?>" class="shop">
                                <?php
                                    $shop_id = $data_latest['shop'];
                                    $getshop = mysqli_fetch_array(mysqli_query($server,"SELECT * from shops WHERE shop_id='$shop_id'"));
                                    echo $getshop['shop_name'];
                                ?>
                            </a>
                            <p class="desc">
                                <?php
                                    echo $data_latest['product_descr']
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
</div>