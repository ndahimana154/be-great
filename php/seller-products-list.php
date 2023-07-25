<div class="orders-cont">
    <div class="ctrl-btns" style="padding: 10px;">
        <button class="btn btn-success" id="print_product_list_BTN">
            <i class="fa fa-print"></i>
            Print
        </button>
        <a href="sellers-newproduct.php" class="btn btn-success">
            <i class="fa fa-plus-circle"></i>
            new product
        </a>
    </div>
    <div class="orders-box" id="print_product_list_Content">
        <?php
            include('co_print_descriptions.php');
        ?>
        <h2>
            Products list
        </h2>
        <div class="table" style="padding: 10px; overflow:auto;">
            <table class="table table-hover table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Product id
                        </th>
                        <th>
                            Product name
                        </th>
                        <th>
                            Price
                        </th>
                        <th>
                            Add date
                        </th>
                        <th>
                            Genre
                        </th>
                        <th>
                            Remaining quantity
                        </th>
                        <th class="to_be_hidden">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT * from
                            products,shops,product_genres
                            WHERE products.shop = shops.shop_id
                            AND products.product_genre = product_genres.genre_id
                            AND shops.shop_id = '$seller_acting_shop'
                        ");
                        if (mysqli_num_rows($get_txns) < 1) {
                            ?>
                            <tr>
                                <td colspan=100>
                                    no values!
                                </td>
                            </tr>
                            <?php
                        }
                        $id = 1;
                        while ($data_txns = mysqli_fetch_array($get_txns)) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                        echo $id++;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $data_txns['product_id']; 
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['product_name']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['product_price']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['product_add_date']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['genre_name']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['quantity_remain']; ?>
                                </td>
                                <td class="to_be_hidden">
                                    <a href="images/products/Frontimages/<?php echo $data_txns['product_image'] ?>" 
                                        title="View image <?php echo $data_txns['product_name']; ?>" 
                                        target="_blank" 
                                        style="text-decoration: none;" 
                                        class="text-success">
                                            <i class="fa fa-external-link-alt"></i>
                                    </a>
                                    <a href="seller-import-product.php?product=<?php echo $data_txns['product_id'] ?>" style="text-decoration: none;" 
                                        class="text-dark">
                                        <i class="fa fa-cart-arrow-down"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>