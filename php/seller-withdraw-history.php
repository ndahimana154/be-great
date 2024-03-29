<div class="orders-cont">
    <div class="ctrl-btns" style="padding: 10px;">
        <button class="btn btn-success" id="print_withdraw_history_btn">
            <i class="fa fa-print"></i>
            Print
        </button>
        <a href="seller-withdraw.php?back" class="btn btn-success">
            <i class="fa fa-outdent"></i>
            Withdraw
        </a>
    </div>
    <div class="orders-box" id="print_withdraw_history_content">
        <?php
            include('co_print_descriptions.php');
        ?>
        <h2>
            Withdrawing history
        </h2>
        <div class="table" style="padding: 10px; overflow:auto;">
            <table class="table table-hover table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Date time
                        </th>
                        <th>
                            Transaction id
                        </th>
                        <th>
                            Withdraw amount
                        </th>
                        <th>
                            Amount receivable
                        </th>
                        <th>
                            Status
                        </th>
                        <th class="to_be_hidden">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT *
                            from sellers_withdraws
                            WHERE 
                            seller = '$seller_acting_userid'
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
                                    <?php 
                                        echo $data_txns['date']." ".$data_txns['time']; 
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['id'] ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['amount_withdrawed']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['amount_receivable']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['status']; ?>
                                </td>
                                <td  class="to_be_hidden">
                                    <a href="seller-send-withdrawing-complaint.php?txnid=<?php echo $data_txns['id'];?>" 
                                        title="Send complaint about this transaction"
                                        class="btn btn-warning">
                                        <i class="fa fa-question"></i>
                                    </a>
                                    <?php
                                        if ($data_txns['status'] == 'Pending') {
                                            ?>
                                            <button class="btn btn-danger sellcancelwithdrawBTN"
                                                value="<?php echo $data_txns['id'];?>">
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