<div class="latest-products">
    <h1>
        Latest products
    </h1>
    <div class="latest-row">
        <?php
            $sql_latest="SELECT * from products 
                WHERE quantity_remain>0
                ORDER BY 
                product_add_date DESC,
                product_name ASC
                LIMIT 15
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
                            value="<?php echo $data_latest['product_id']; ?>" >
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