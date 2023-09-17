<section id="hero" class="" style="width: 100vw;">
    <div id="carouselExampleIndicators"  style="width: 98vw; height: 100vh;" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
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
                    echo $data_slidings['sliding_image'];
                    ?>
                    <div class="carousel-item">
                        <img src="images\shops\home-sliding\<?php echo $data_slidings['sliding_image'] ?>" class="d-block w-100" alt="Image 1">
                        <div class="carousel-caption d-none d-md-block">
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
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>