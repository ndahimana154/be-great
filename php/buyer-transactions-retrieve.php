<?php
    include('connect.php');
    include('buyer-acting_initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Account transactions
        </h2>
        <div class="btn-ctrls" style="padding: 10px;">
            <a href="buyer-deposit.php" class="btn btn-success">
                Deposit money
            </a>
            <button class="btn btn-success">
                <i class="fa fa-eye"></i>
                View complaints
            </button>
        </div>
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
                            transaction type
                        </th>
                        <th>
                            Old balance
                        </th>
                        <th>
                            New balance
                        </th>
                        <th>
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT *
                            FROM buyer_money_txns
                            WHERE 
                            buyer = '$acting_userid'
                            ORDER BY 
                            txndate DESC,
                            txntime DESC                      
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
                                        echo $data_txns['txndate']." ".$data_txns['txntime'] 
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['txntype'] ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['oldacc']."RWF" ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['newacc']."RWF" ?>
                                </td>
                                <td>
                                    <a href="buyer-send-txn-complaint.php?txnid=<?php echo $data_txns['id'] ?>" class="btn btn-warning">
                                        <i class="fa fa-question"></i>
                                    </a>
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