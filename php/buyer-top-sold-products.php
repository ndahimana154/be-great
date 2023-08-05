<div class="">
    <h1 class="h1 text-primary">
        Top sold 
    </h1>
    <div style="display: flex;flex-direction: row;flex-wrap: wrap;">
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
                <div style="width: 250px">
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
                <div style="width: 250px;margin: auto;border-radius: 10px;border: 1px solid gray;margin-top: 10px">
                    <img style="width: 100%;border-top-left-radius: 10px;border-top-right-radius: 10px;" src="images/products/Frontimages/<?php echo $data_latest['product_image']; ?>" alt="">
                    <div class="p-2">
                        <div class="name">
                            <a class="h3 text-success" style="text-decoration:none;" href="buyer-product-details.php?product=<?php echo $data_latest['product_id']; ?>">
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
                            <div class="h4">
                                <?php
                                    echo $data_latest['product_price']."RWF";
                                ?>
                            </div>
                        </div>
                        <button class="shopBTN btn btn-primary" value="<?php echo $data_latest['product_id']; ?>">
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