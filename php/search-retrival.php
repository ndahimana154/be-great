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
                                            No products found
                                        </div>
                                    </div>
                                    <?php
                                }
                                elseif (empty($searchvalue)== true) {
                                    ?>
                                    <div class="form-results">
                                        <div class="failed">
                                            Error! We can't search empty value.
                                        </div>
                                    </div>
                                    <?php
                                }
                                else {
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
                                                    <div class="price">
                                                        RWF
                                                        <?php
                                                            echo $data_latest['product_price'];
                                                        ?>
                                                    </div>
                                                </div>
                                                <button class="deliverout" 
                                                    value="<?php echo $data_latest['product_id']; ?>"
                                                    style="width: 100%;
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
                                        <?php
                                    }
                                }
                            ?>
                        
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>     
    </div>
</div>