<div class="search-results">
    <div class="search-resu-cont">
        <?php
            if (!isset($_GET['searchField'])) {
                ?>
                <div class="form-results">
                    <div class="failed">
                        Error! No values sent to server.
                    </div>
                </div>
                <?php
            }
            else {
                $searchvalue = $_GET['searchField'];
                ?>
                <div class="latestproducts">
                    <!-- <div class="leftlatest">
                    </div> -->
                    <div class="rightlatest">
                        <h1>
                            Search results for '<b><?php echo $searchvalue ?></b>'
                        </h1>
                        <div class="latestcont">
                            <?php
                                $sql_latest="SELECT * from products 
                                    WHERE product_name LIKE '%$searchvalue%'
                                    ORDER BY product_add_date DESC,
                                    product_name ASC
                                ";
                                $query_latest = mysqli_query($server,$sql_latest);
                                if (mysqli_num_rows($query_latest) < 1) {
                                    ?>
                                    <div class="form-results">
                                        <div class="failed">
                                            No results found! But no worries here are some latest products.
                                        </div>
                                    </div>
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
                <?php
            }
        ?>     
    </div>
</div>