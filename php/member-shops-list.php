<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Shops list
        </h2>
        <div class="ctrls" style="padding: 10px">
            <a href="member-shops-waiting-list.php" class="btn btn-success">
                Waiting list
            </a>
        </div>
        <div class="table" style="padding: 10px; overflow:auto;">
            <table class="table table-hover table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Shop name
                        </th>
                        <th>
                            Shop email
                        </th>
                        <th>
                            Shop location
                        </th>
                        <th>
                            Shop entry time
                        </th>
                        <th>
                            Shop status
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT
                            * from shops,sellers,sellers_to_shops
                            WHERE sellers_to_shops.shop  = shops.shop_id
                            AND sellers_to_shops.seller = sellers.id 
                            AND shops.shop_status != 'Deleted'
                            
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
                                        echo $data_txns['shop_name']; 
                                    ?>
                                <td>
                                    <a href="mailto:<?php echo $data_txns['email'];?>" target="_blank">
                                        <?php 
                                            echo $data_txns['email']; 
                                        ?>
                                    </a>
                                    
                                </td>
                                <td>
                                    <?php
                                        echo $data_txns['shop_district'].","; 
                                        echo $data_txns['shop_sector'].","; 
                                        echo $data_txns['shop_location'].","; 
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['shop_entry_date']." ".$data_txns['shop_entry_time']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['shop_status'] ?>
                                </td>
                                <td>
                                    <button class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <button class="btn btn-warning">
                                        <i class="fa fa-stop-circle"></i>
                                    </button>
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