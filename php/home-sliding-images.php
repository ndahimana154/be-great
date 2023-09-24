<div class="home-slide">
    <h1>
        TRENDING SHOPS
    </h1>
    <div class="slide-row">
        <?php
            $getsliding = mysqli_query($server,"SELECT * from
                home_sliding_shops,shops
                WHERE shops.shop_id = home_sliding_shops.shop
                AND home_sliding_shops.sliding_status = 'Sliding'
                AND home_sliding_shops.sliding_until > now()
            ");
            if (mysqli_num_rows($getsliding) < 1) {
            
            }
            while ($data_slidings = mysqli_fetch_array($getsliding)) {
                // echo $data_slidings['sliding_image'];
                ?>
                <div class="slide-box">
                    <img src="images\shops\home-sliding\<?php echo $data_slidings['sliding_image'] ?>" class="d-block w-100" alt="Image 1">
                    <div class="">
                        <h3>
                            <?php echo $data_slidings['shop_name']; ?>
                        </h3>
                        <p><?php echo $data_slidings['sliding_message']; ?></p>
                        <a href="view-shops.php?shop=<?php echo $data_slidings['shop_id'] ?>" class="btn btn-primary">
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
     