<div class="shop-section">
    <?php
        // Check if the shop is available or not>?
        if (mysqli_num_rows($get_shop) < 1) {
            ?>
            <div class="form-results">
                <div class="failed">
                    Error! The shop is not found
                </div>
            </div>
            <?php
        }
        else {
            $data_shop = mysqli_fetch_array($get_shop);
            ?>
            <div class="shop-cont">
                <h2>
                     <?php echo $data_shop['shop_name'] ?>
                </h2>
                <div class="shop-box">
                    <div class="imgz">
                        <img src="images/shops/logo/<?php echo $data_shop['shop_logo'] ?>" alt="">
                    </div>
                    <div class="textz">
                            <div class="name">
                            Shopname : <?php echo $data_shop['shop_name'] ?>
                            </div>
                            <hr>
                            <div class="text-cont">
                                <div class="left">
                                    <h3>
                                        Location details
                                    </h3>
                                    <div class="location">
                                        District: <?php echo $data_shop['shop_district'] ?>
                                    </div>
                                    <div class="location">
                                        Sector: <?php echo $data_shop['shop_sector'] ?>
                                    </div>
                                    <div class="location">
                                        Exact location: <?php echo $data_shop['shop_location'] ?>
                                    </div>
                                </div>
                                <div class="right">
                                    <h3>
                                        Activities
                                    </h3>
                                    <div class="location">
                                        Entry date: <?php echo $data_shop['shop_entry_date']; ?>
                                    </div>
                                    <a href="#shopsproducts" class="btn btn-success">
                                        <i class="fa fa-arrow-circle-down"></i>
                                        Browse products
                                    </a>
                                </div>
                            </div>
                           
                    </div>
                </div>
                
            </div>
            <?php
        }
    ?>
</div>