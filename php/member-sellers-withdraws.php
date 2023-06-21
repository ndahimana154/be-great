<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Sellers withdraws
        </h2>
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
                            Seller Email
                        </th>
                        <th>
                            Amount withdrawed
                        </th>
                        <th>
                            Amount payable
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
                            sellers_withdraws.id AS 'witdrawid'
                            from sellers_withdraws, sellers
                            WHERE seller = sellers.id
                            ORDER BY
                            date DESC,
                            time DESC
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
                                        <?php  echo $data_txns['date']." ".$data_txns['time']; ?>
                                    
                                </td>
                                <td>
                                    <a href="mailto: <?php echo $data_txns['email']; ?>">
                                        <?php echo $data_txns['email']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $data_txns['amount_withdrawed']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['amount_receivable']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['status']; ?>
                                </td>
                                <td>
                                    <?php
                                        if ($data_txns['status'] == 'Pending') {
                                            ?>
                                            <button value="<?php echo $data_txns['witdrawid'];?>" 
                                                class="btn btn-success widrw-confirmBTN"
                                                title="COnfirm the withdraw"
                                                >
                                                <i class="fa fa-check" style=""></i>
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