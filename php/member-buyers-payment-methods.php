<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Buyers payment methods
        </h2>
        <div class="table" style="padding: 10px; overflow:auto;">
            <table class="table table-hover table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Method type
                        </th>
                        <th>
                            Method name
                        </th>
                        <th>
                            Buyer names
                        </th>
                        <th>
                            Buyer Email
                        </th>
                        <th>
                            Account digits
                        </th>
                        <th>
                            Creation date
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
                            ,
                            buyer_payment_methods.status AS 'buyer_pytstatus',
                            buyer_payment_methods.id AS 'paymentid'
                            FROM buyer_payment_methods
                            ,buyers
                            ,payment_methods
                            WHERE 
                            buyer_payment_methods.buyer = buyers.id
                            AND buyer_payment_methods.method = payment_methods.id
                            AND buyer_payment_methods.status != 'Deleted'
                            ORDER BY
                            buyer_payment_methods.status ASC
                            ,method_type ASC
                            ,method_name ASC
                            ,firstname ASC
                            ,lastname ASC
                            ,email ASC
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
                                    <?php echo $data_txns['method_type']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['method_name'] ?>
                                </td>
                                <td>
                                        <?php  echo $data_txns['firstname']." ".$data_txns['lastname']; ?>
                                    
                                </td>
                                <td>
                                    <a href="mailto: <?php echo $data_txns['email']; ?>">
                                        <?php echo $data_txns['email']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $data_txns['method_digits']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['add_date']." ".$data_txns['add_time']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['buyer_pytstatus']; ?>
                                </td>
                                <td>
                                    <?php
                                        if ($data_txns['buyer_pytstatus'] == 'Unverfied') {
                                            ?>
                                            <button class="btn btn-success BuyerverifyPYTBTN"
                                                value="<?php echo $data_txns['paymentid']; ?>">
                                                <i class="fa fa-check"></i>
                                            </button>
                                            <?php
                                        }
                                        elseif ($data_txns['buyer_pytstatus'] == 'Verified') {
                                            ?>
                                            <button class="btn btn-danger BuyerUnverifyPYTBTN"
                                                value="<?php echo $data_txns['paymentid']; ?>">
                                                <i class="fa fa-window-close"></i>
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