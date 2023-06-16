<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Recent products orders
        </h2>
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
                            quantity
                        </th>
                        <th>
                            total price
                        </th>
                        <th>
                            status
                        </th>
                        <th>
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
                                    <?php echo $data_txns['quantity']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['total']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['order_status']; ?>
                                </td>
                                <td>
                                    <?php
                                        // $datentime = $data_txns['order_date']." ".$data_txns['order_time'];
                                        // $datentime = new DateTime($datentime);
                                        // $currenttime = new DateTime();
                                        // echo $datentime;
                                        // echo $currenttime;
                                        if ($data_txns['order_status'] == 'Pending') {
                                            ?>
                                            <button value="<?php echo $data_txns['order_id'];?>" 
                                                class="order_remind_seller"
                                                title="Notify seller"
                                                style="border:0;background: transparent;">
                                                <i class="fa fa-bell text-warning" style=""></i>
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