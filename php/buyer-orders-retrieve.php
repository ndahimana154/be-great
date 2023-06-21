<?php
    include('connect.php');
    include('buyer-acting_initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Recent orders
        </h2>
        <div class="table">
            <table class="table table-hover table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            date time
                        </th>
                        <th>
                            Order id
                        </th>
                        <th>
                            product
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
                        $get_orders = mysqli_query($server,"SELECT *,
                            products_orders.order_id AS 'pro_order'
                            FROM products_orders 
                            JOIN products 
                            on products.product_id = products_orders.product
                            AND products_orders.client = '$acting_userid'  
                            ORDER BY products_orders.order_date DESC, 
                            products_orders.order_time DESC                      
                        ");
                        if (mysqli_num_rows($get_orders) < 1) {
                            ?>
                            <tr>
                                <td colspan=100>
                                    no values!
                                </td>
                            </tr>
                            <?php
                        }
                        $id = 1;
                        while ($data_orders = mysqli_fetch_array($get_orders)) {
                            ?>
                            <tr>
                                <td>
                                    <?php
                                        echo $id++;
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $data_orders['order_date']." ".$data_orders['order_time'] 
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo $data_orders['pro_order']; 
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_orders['product_name'] ?>
                                </td>
                                <td>
                                    <?php echo $data_orders['quantity'] ?>
                                </td>
                                <td>
                                    <?php echo $data_orders['total']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_orders['order_status'] ?>
                                </td>
                                <td>
                                    <?php
                                        if ($data_orders['order_status'] == 'Pending') {
                                            ?>
                                            <button class="btn btn-danger cancelorderBTN" value="<?php echo $data_orders['order_id']; ?>">
                                                <i class="fa fa-window-close"></i>
                                            </button>
                                            <?php
                                        }
                                        if ($data_orders['order_status'] == 'Delivering') {
                                            ?>
                                            <button class="btn btn-primary endtheorderbtn" value="<?php echo $data_orders['order_id']; ?>">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <?php
                                        }
                                    ?>
                                    <!-- <button class="btn btn-danger">
                                        <i class="fa fa-window-close"></i>
                                    </button>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-window-close"></i>
                                    </button> -->
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