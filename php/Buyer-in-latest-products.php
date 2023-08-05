    <div class="rightlatest">
        <h1 class="h1 text-primary">
            Latest products
        </h1>
        <div class="" style="display: flex; flex-direction: row; flex-wrap: wrap;">
            <?php
                $sql_latest="SELECT * from products 
                    WHERE quantity_remain > 0
                    ORDER BY 
                    product_add_date DESC,
                    product_name ASC
                    LIMIT 20
                ";
                $query_latest = mysqli_query($server,$sql_latest);
                if (mysqli_num_rows($query_latest) < 1) {
                    ?>
                    <div class="" style="width: 300px;">
                        <div class="details">
                            <a href="">
                                No products found
                            </a>
                        </div>
                    </div>
                    <?php
                }
                while ($data_latest=mysqli_fetch_array($query_latest)) {
                    ?>
                    <div style="width: 300px;margin: auto;border-radius: 10px;margin-top: 10px;" class="bg-light">
                        <img src="images/products/Frontimages/<?php echo $data_latest['product_image']; ?>" 
                            width="100%;"style="border-top-left-radius: 10px;border-top-right-radius: 10px;" alt="">
                        <div class="p-2">
                            <div class="">
                                <a class="h3 text-success" style="text-decoration:none" href="buyer-product-details.php?product=<?php echo $data_latest['product_id']; ?>">
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
                            <button class="shopBTN btn btn-primary" value="<?php echo $data_latest['product_id']; ?>">
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
