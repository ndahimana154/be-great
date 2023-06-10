<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Stock history
        </h2>
        <div class="ctrl-btns" style="padding: 10px;">
            <!-- <a href="sellers-newproduct.php" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
                new product
            </a> -->
        </div>
        <div class="table" style="padding: 10px; overflow:auto;">
            <table class="table table-hover table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Date & time
                        </th>
                        <th>
                            Product id
                        </th>
                        <th>
                            Product name
                        </th>
                        <th>
                            Txn type
                        </th>
                        <th>
                            Txn quantity
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT * from
                            products,product_quantity_txns
                            WHERE products.product_id = product_quantity_txns.product
                            AND products.shop = '$seller_acting_shop'
                            ORDER BY 
                            txn_date DESC
                            ,txn_time DESC
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
                                    <?php echo $data_txns['txn_date']." ".$data_txns['txn_time']; ?>
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
                                    <?php 
                                        if($data_txns['txn_type'] == 'IN') {
                                            echo "Import";
                                        } 
                                        elseif ($data_txns['txn_type'] == 'OUT') {
                                            echo "Export";
                                        }
                                        else {
                                            echo "Not defined";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['txn_quantity']; ?>
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