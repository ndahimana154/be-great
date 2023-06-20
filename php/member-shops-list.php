<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Shops list
        </h2>
        <?php
            if ($member_acting_type == 'Chief executive officer') {
                ?>
                <div class="ctrls" style="padding: 10px">
                    <a href="member-shops-waiting-list.php" class="btn btn-success">
                        <i class="fa fa-th-list"></i> &nbsp;
                        Waiting list
                    </a>
                </div>
                <?php
            }
        ?>
        
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
                        <?php
                            if ($member_acting_type == 'Chief executive officer') {
                                ?>
                                <th>
                                    Actions
                                </th>
                                <?php
                            }
                        ?>
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
                                        echo $data_txns['shop_location']; 
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['shop_entry_date']." ".$data_txns['shop_entry_time']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['shop_status'] ?>
                                </td>
                                <?php
                                    if ($member_acting_type == 'Chief executive officer') {
                                        ?>
                                        <td>
                                            <?php
                                                if($data_txns['shop_status'] == 'Running' || $data_txns['shop_status'] == 'Trial period') {
                                                    ?>
                                                    <button class="btn btn-danger deleteshopBTN" 
                                                        value="<?php echo $data_txns['shop_id']; ?>">
                                                        <i class="fa fa-pause"></i>
                                                    </button>
                                                    <?php
                                                }
                                                else {
                                                    ?>
                                                    <button class="btn btn-warning playshopBTN"
                                                        value="<?php echo $data_txns['shop_id']; ?>">
                                                        <i class="fa fa-play"></i>
                                                    </button>
                                                    <?php
                                                }
                                            ?>
                                        </td>
                                        <?php
                                    }
                                ?>
                             
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>