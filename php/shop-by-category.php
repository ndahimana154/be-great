<?php
    if(mysqli_num_rows($get_category) < 1) {
        ?>
        <div class="form-results">
            <div class="failed">
                Error! The category's information is not found
            </div>
        </div>
        <?php
    }
    else {
    $data_category = mysqli_fetch_array($get_category);
        $get_allproducts = mysqli_query($server,"SELECT * from products WHERE product_genre='$category'");
        if (mysqli_num_rows($get_allproducts) < 1) {
            ?>
            <div class="form-results">
                <div class="latestproducts">
                    <h1>
                        Category '<b><?php echo $data_category['genre_name'] ?></b>'
                    </h1>
                </div>
                <div class="failed">
                    No products found!
                </div>
            </div>
            <?php
        }
        else {
            include('php\products-by-category.php');
        }
    }
?>