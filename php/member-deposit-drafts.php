<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Deposit drafts
        </h2>
        <div style="padding: 10px;">
            <a href="member-new-deposit-draft.php" class="btn btn-success">
                <i class="fa fa-plus-circle"></i>
                new deposit
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
                            Payment date & time
                        </th>
                        <th>
                            Transaction id
                        </th>
                        <th>
                            Transaction names
                        </th>
                        <th>
                            Transaction amount
                        </th>
                        <th>
                            Payment method
                        </th>
                        <th>
                            Payment digits
                        </th>
                        <th>
                            Recording time
                        </th>
                        <th>
                            Transaction status
                        </th>
                        <th>
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT * from deposit_draft,payment_methods
                            WHERE deposit_draft.transaction_payment_method = payment_methods.id
                            ORDER BY 
                            transaction_date DESC,
                            transaction_time DESC                                      
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
                                    <?php echo $data_txns['transaction_date']." ".$data_txns['transaction_time']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['transaction_id']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['transaction_names']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['transaction_amount']."RWF"; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['method_name']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['transaction_payment_digits']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['transaction_recording_time'];?>
                                </td>
                                <td>
                                    <?php echo $data_txns['transaction_status']; ?>
                                </td>
                                <td>
                                  
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