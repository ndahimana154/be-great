<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
    if ($member_acting_type == 'Chief executive officer') {
        ?>
        <div class="orders-cont">
            <div class="orders-box">
                <h2>
                    Shops waiting list
                </h2>
                <div class="table" style="padding: 10px; overflow:auto;">
                    <table class="table table-hover table-responsive">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Seller names
                                </th>
                                <th>
                                    Seller email
                                </th>
                                <th>
                                    Shop name
                                </th>
                                <th>
                                    Waiting from
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $get_txns = mysqli_query($server,"SELECT *,
                                    shops_waiting.id  AS 'waitingid'
                                    from 
                                    shops_waiting,sellers
                                    WHERE shops_waiting.seller_id = sellers.id  
                                    AND shops_waiting.wait_status != 'Running'
                                    AND sellers.seller_status = 'Waiting list'                                  
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
                                                echo $data_txns['firstname']." ".$data_txns['lastname']; 
                                            ?>
                                        <td>
                                            <a href="mailto:<?php echo $data_txns['email'];?>">
                                                <?php 
                                                    echo $data_txns['email']; 
                                                ?>
                                            </a>
                                            
                                        </td>
                                        <td>
                                            <?php echo $data_txns['shop_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data_txns['wait_from']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data_txns['wait_status']; ?>
                                        </td>
                                        <td>
                                            <button class="Confirmshop" 
                                                value="<?php echo $data_txns['waitingid']; ?>"
                                                style="background: transparent;
                                                border: 0;">
                                                <i class="fa fa-check text-success"></i>
                                            </button>
                                            <button class="declineshop"
                                                value="<?php echo $data_txns['waitingid']; ?>"
                                                style="background: transparent;
                                                    border: 0;">
                                                <i class="fa fa-window-close text-danger"></i>
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
        <?php
    }
    else {
        ?>
        <div class="form-results">
            <div class="failed">
                Error! You are not authorized to visit this page
            </div>
        </div>
        <?php
    }
?>