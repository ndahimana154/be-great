<div class="div">
    <!-- <h2>
        Home sliding images
    </h2> -->
    <div style="display: flex;flex-direction: row; flex-wrap: wrap;">
        <?php
            $get_home_sliding = mysqli_query($server,"SELECT * from
             
                home_sliding_shops,
                shops
                WHERE home_sliding_shops.shop = shops.shop_id
                AND home_sliding_shops.sliding_status='Sliding'
                ORDER BY sliding_until DESC
                ");
            while ($data_slides=mysqli_fetch_array($get_home_sliding)) {
                ?>
                <div class="probox" style="width: 300px;
                    margin: 10px;border: 1px solid gray;
                    background: #fff;border-radius: 10px;margin:auto;margin-top: 10px;">
                    <img width="100%" style="border-top-left-radius: 10px;border-top-right-radius: 10px" src="images\shops\home-sliding\<?php echo $data_slides['sliding_image'] ?>" alt="">
                    <div class="descccc p-2">
                        <h3 class="text-primary">
                            <?php echo $data_slides['shop_name']; ?>
                        </h3>
                        <p>
                            <?php echo $data_slides['sliding_message'] ?>
                        </p>
                        <a href="Buyer-view-shops.php?shop=<?php echo $data_slides['shop_id'] ?>" class="btn btn-primary">
                            <i class="fa fa-arrow-alt-circle-right"></i>
                            Visit shop
                        </a>
                    </div>
                    
                </div>
                <?php
            }
        ?>
        <div class="product-box">
            <img src="" alt="">
        </div>
    </div>
</div>