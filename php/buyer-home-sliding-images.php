<?php
    $getsliding = mysqli_query($server,"SELECT * from
        home_sliding_shops,shops
        WHERE shops.shop_id = home_sliding_shops.shop
        AND home_sliding_shops.sliding_status = 'Sliding'
        AND home_sliding_shops.sliding_until > now()
    ");
    if(mysqli_num_rows($getsliding) > 0) {
        ?>
        <div class="sliding-cont">
            <h1 class="sliding-header">
                Trending shops
            </h1>
            <div class="slider">
                <div class="slide-track">
                    <?php
                        while ($data_slidings = mysqli_fetch_array($getsliding)) {
                            ?>
                            <div class="slide">
                                <img src="images\shops\home-sliding/<?php echo $data_slidings['sliding_image'] ?>" 
                                    alt="" height="200px">
                                <div class="description">
                                    <h1>
                                        <?php echo $data_slidings['shop_name']; ?>
                                    </h1>
                                    <p class="text-success">
                                        <?php echo $data_slidings['sliding_message']; ?>
                                    </p>
                                    <a href="Buyer-view-shops.php?shop=<?php echo $data_slidings['shop_id'] ?>" class="btn btn-primary">
                                        <i class="fa fa-external-link-alt"></i>
                                        Visit shop
                                    </a>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                    
            

                </div>
            </div>
            <!-- <marquee behavior="" direction="">
                <div class="sliding-box">
                    <div class="sliding-image">
                        <img src="images\shops\home-sliding\9aaa511fb48afae2d1f2fd28d5efd9fa.png" 
                            alt="" height="300px">
                    </div>
                    <div class="description">
                        <h1>
                            SHop name
                        </h1>
                        <p>
                            SHop description in here is now to be sliding
                        </p>
                        <button class="btn btn-primary">
                            <i class="fa fa-external-link-alt"></i>
                            Visit shop
                        </button>
                    </div>
                </div>
            </marquee> -->
        </div>
        <?php
    }
?>