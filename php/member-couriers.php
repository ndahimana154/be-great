<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Couriers
        </h2>
        <div class="btnz" style="padding: 10px;">
            <a href="member-new-courier.php" class="btn btn-success">
                <i class="fa fa-plus"></i>
                new courier
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
                            Serial number
                        </th>
                        <th>
                            National ID
                        </th>
                        <th>
                            Names
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Phone numbers
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT *
                            FROM courier
                            WHERE courier_status != 'Fired'
                            ORDER BY courier_sn ASC,
                            courier_nid ASC
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
                                    <?php echo $data_txns['courier_sn']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['courier_nid'] ?>
                                </td>
                                <td>
                                        <?php  echo $data_txns['courier_fn']." ".$data_txns['courier_ln']; ?>
                                    
                                </td>
                                <td>
                                    <a href="mailto: <?php echo $data_txns['courier_email']; ?>">
                                        <?php echo $data_txns['courier_email']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $data_txns['courier_phone'].", ".$data_txns['courier_phone2'] ; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['courier_status']; ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary new-courpytmethodBTN" 
                                        value="<?php echo $data_txns['courier_sn']; ?>">
                                        <i class="fa fa-plus-circle"></i>
                                    </button>
                                    <button class="btn btn-success viewpytmethodsBTN"
                                        value="<?php echo $data_txns['courier_sn']; ?>">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    <?php
                                        if ($member_acting_type == 'Chief executive officer') {
                                            ?>
                                            <button class="btn btn-danger firecourierBTN"
                                                value="<?php echo $data_txns['courier_sn']; ?>">
                                                <i class="fa fa-trash"></i>
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