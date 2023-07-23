<div class="orders-cont">
    <div class="ctrl-btns" style="padding: 10px;">
        <button class="btn btn-success" id="print_product_orders_content_btn">
            <i class="fa fa-print"></i>
            Print
        </button>
    </div>
    <div class="orders-box" id="print_product_orders_content">
        <?php
            include('co_print_descriptions.php');
        ?>
        <h2>
            Recent products orders
        </h2>
        <!-- <div style="padding: 10px;">
            <a href="seller-product-orders-notifications.php" class="btn btn-success">
                <i class="fa fa-bell"></i>
                notifications
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
                            order id
                        </th>
                        <th>
                            date time
                        </th>
                        <th>
                            product ordered
                        </th>
                        <th>
                            Client's email
                        </th>
                        <th>
                            Unit price
                        </th>
                        <th>
                            quantity
                        </th>
                        <th>
                            total price
                        </th>
                        <th>
                            status
                        </th>
                        <th class="to_be_hidden">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT 
                        po.order_id, po.product, po.client, 
                        po.product_price, po.quantity, 
                        po.total, po.order_date, 
                        po.order_time, po.order_status, 
                        s.shop_logo, s.shop_name, 
                        s.shop_district, s.shop_sector, 
                        s.shop_location, s.shop_entry_date, 
                        s.shop_entry_time, s.shop_status, 
                        p.product_name, p.product_image, 
                        p.product_genre, b.firstname, b.lastname, 
                        b.email, b.phone, b.profilepicture
                        FROM products_orders po
                        JOIN products p ON po.product = p.product_id
                        JOIN buyers b ON po.client = b.id
                        JOIN shops s ON po.shop = s.shop_id
                        WHERE po.shop = '$seller_acting_shop'
                        ORDER BY po.order_date DESC,
                        po.order_time DESC
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
                                        echo $data_txns['order_id']; 
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['order_date']." ".$data_txns['order_time']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['product_name']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['email']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['product_price']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['quantity']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['total']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['order_status']; ?>
                                </td>
                                <td  class="to_be_hidden">
                                    <?php
                                        if ($data_txns['order_status'] =='Pending') {
                                            ?>
                                            <button value="<?php echo $data_txns['order_id']; ?>" 
                                                class="seller-order-cfn-order btn btn-success" 
                                                >
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <?php
                                        }
                                        $order = $data_txns['order_id'];
                                        $checkifexists = mysqli_query($server,"SELECT * from sellers_orders_notifier
                                            WHERE order_id = '$order' AND status = 'Not viewed'
                                        ");
                                        if (mysqli_num_rows($checkifexists) > 0 && $data_txns['order_status'] =='Pending') {
                                            $datacheckexists = mysqli_fetch_array($checkifexists);
                                            $notifierid = $datacheckexists['id'];
                                            ?>
                                            <button class="btn btn-warning viewordernoti_BTN"
                                                value = "<?php echo $notifierid; ?>">
                                                <?php 
                                                    // echo mysqli_num_rows($checkifexists); 
                                                ?>
                                                <i class="fa fa-bell"></i>
                                            </button>
                                            <?php
                                        }
                                    ?>
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