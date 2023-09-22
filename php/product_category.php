<div class="hero-cate">
    <h1>
        Top categories
    </h1>
    <div class="cate-row">
            <?php
                $sql_cate=mysqli_query($server,"SELECT * from product_genres ORDER BY genre_name ASC");
                
                while ($data_cate=mysqli_fetch_array($sql_cate)) {
                    ?>
                    <div>
                        <a href="shop-by-category.php?category=<?php echo $data_cate['genre_id'] ?>">
                            <img src="images\products\Categories\s-1.png" alt="">
                            <p>
                            <?php
                                echo $data_cate['genre_name'];
                            ?>
                            </p>
                        </a>
                    </div>
                    <?php
                }
            ?>
    </div>
</div>