<?php
    include('connect.php');
    include('buyer-acting_initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <div class="btn-ctrls" style="padding: 10px;">
            <button class="btn btn-success" id="print_transactions_BTN">
                <i class="fa fa-print"></i>
                Print
            </button>
            <a href="buyer-transactions.php" class="btn btn-success">
                Transactions
            </a>
            <a href="buyer-deposit.php" class="btn btn-success">
                Deposit money
            </a>
            <button class="btn btn-success">
                <i class="fa fa-eye"></i>
                View complaints
            </button>
        </div>
        <div class=""  id="print_transactions_contents">
            <?php
                include('co_buyer_print_descriptions.php');
            ?>
            <h2>
                Transactions complaints
            </h2>
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
                            Txn id
                        </th>
                        <th>
                            Complaint
                        </th>
                        <th>
                            Response
                        </th>
                        <!-- <th class="to_be_hidden">
                            actions
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT *
                            FROM buyer_money_txns_complaints
                            WHERE 
                            buyer = '$acting_userid'
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
                                        echo $data_txns['date']." ".$data_txns['time'] 
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['txnid'] ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['complaint']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['response']; ?>
                                </td>
                                <!-- <td class="to_be_hidden">
                                    <a href="buyer-send-txn-complaint.php?txnid=<?php echo $data_txns['id'] ?>" class="btn btn-warning">
                                        <i class="fa fa-question"></i>
                                    </a>
                                </td> -->
                            </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>