<div class="shop-section">
    <?php
        // Check if the shop is available or not>?
        if (mysqli_num_rows($get_product) < 1) {
            ?>
            <div class="form-results">
                <div class="failed">
                    Error! The shop is not found
                </div>
            </div>
            <?php
        }
        else {
            $data_product = mysqli_fetch_array($get_product);
            ?>
            <div class="shop-cont">
                <h2>
                     <?php echo $data_product['product_name'] ?>
                </h2>
                <div class="shop-box">
                    <div class="imgz">
                        <img src="images/products/Frontimages/<?php echo $data_product['product_image'] ?>" alt="">
                    </div>
                    <div class="textz">
                            <div class="name">
                                <?php   
                                    $shop = $data_product['shop'];
                                    $get_shop = mysqli_fetch_array(mysqli_query($server,"SELECT * from shops
                                        WHERE shop_id ='$shop'
                                    "));
                                    echo "Shop name ".$get_shop['shop_name'];
                                ?>
                            </div>
                            <hr>
                            <div class="text-cont">
                                <div class="left">
                                    <h3>
                                        Details
                                    </h3>
                                    <div class="location">
                                        <b>
                                            Price:
                                        </b> <?php echo $data_product['product_price']."RWF" ?>
                                    </div>
                                    <div class="location">
                                        <b>
                                            Date added:
                                        </b> <?php echo $data_product['product_add_date'] ?>
                                    </div>
                                    <div class="location">
                                        <b>
                                        Quantity remaining:
                                        </b> <?php echo $data_product['quantity_remain'] ?>
                                    </div>
                                  
                                </div>
                                <div class="right">
                                    <h3>
                                        Activities
                                    </h3>
                                    <div class="location">
                                        <b>No of orders:</b> 
                                        <?php 
                                            $get_no_orders = mysqli_query($server,"SELECT * from products_orders
                                                WHERE product = '$product'
                                            ");
                                            echo mysqli_num_rows($get_no_orders);
                                        ?>
                                    </div>
                                    <button class="shopBTN" 
                                        value="<?php echo $data_product['product_id']; ?>"
                                        style="
                                            background: var(--main-actingcolor);
                                            padding: 5px;
                                            border-radius: 5px;
                                            border: 0;
                                            color: var(--main-white);
                                            cursor: pointer;
                                            margin-top: 10px;">
                                        <i class="fa fa-cart-plus"></i>
                                        Deliver
                                    </button>
                                </div>
                            </div>
                           
                    </div>
                </div>
                
            </div>
            <?php
        }
    ?>
</div>