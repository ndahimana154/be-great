<div class="topshops">
    <div class="topshops-cont">
        <h3>
            Trending shops
        </h3>
        <div class="shops-cont">
            <div class="shop-bx">
                <?php
                    $get_tre_shops = mysqli_query($server,"SELECT * from shops ORDER By shop_entry_date ASC,shop_name ASC");
                    while ($data_tre_shops = mysqli_fetch_array($get_tre_shops)) {
                        ?>
                        <a href="Buyer-view-shops.php?shop=<?php echo $data_tre_shops['shop_id'];?>">
                        <div class="shop-one">
                            <img src="images/shops/logo/<?php echo $data_tre_shops['shop_logo'] ?>" alt="">
                            <div class="shop-name">
                                <?php echo $data_tre_shops['shop_name'] ?>
                            </div>
                        </div>
                        </a>
                        <?php
                    }
                ?>
                
            </div>
        </div>
    </div>
</div>