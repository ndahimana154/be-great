<div class="topcategories">
    <h1>
        Top categories
    </h1>
    <div class="topc-cont">
        <ul>
            <?php
                $sql_cate=mysqli_query($server,"SELECT * from product_genres ORDER BY genre_name ASC");
                while ($data_cate=mysqli_fetch_array($sql_cate)) {
                    ?>
                    <li>
                        <a href="Buyer-shop-by-category.php?category=<?php echo $data_cate['genre_id'] ?>">
                            <?php
                                echo $data_cate['genre_name'];
                            ?>
                        </a>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>
</div>