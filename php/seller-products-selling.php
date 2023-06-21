<div class="orders-cont">
    <div class="orders-box">
        <h2>
            products selling history
        </h2>
        <!-- <div class="ctrl-btns" style="padding: 10px;">
            <a href="sellers-newproduct.php" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
                new product
            </a>
        </div> -->
        <div class="table" style="padding: 10px; overflow:auto;">
            <table class="table table-hover table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Product id
                        </th>
                        <th>
                            Product name
                        </th>
                        <th>
                            Buyer names
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            unity price
                        </th>
                        <th>
                            Total Price
                        </th>
                        <th>
                            Received amount
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT * from
                            products,shops,product_genres,sellers_products_selling
                            ,buyers
                            WHERE products.shop = shops.shop_id
                            AND products.product_genre = product_genres.genre_id
                            AND sellers_products_selling.product = products.product_id
                            AND sellers_products_selling.buyer = buyers.id
                            AND sellers_products_selling.seller = '$seller_acting_userid'
                            ORDER BY date DESC
                            ,time DESC
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
                                        echo $data_txns['date']." ".$data_txns['time']; 
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['product_id']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['product_name']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['firstname']." ".$data_txns['lastname']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['product_quantity']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['unityprice']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['totalprice']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['receivedamount']."RWF"; ?>
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