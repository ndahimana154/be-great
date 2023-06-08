<?php
    include('connect.php');
    include('buyer-acting_initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Payment methods
        </h2>
        <div class="btn-ctrls" style="padding: 10px;">
            <button class="btn btn-success buyer-new-method">
                <i class="fa fa-plus-circle"></i>
                new payment method
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
                            Method type
                        </th>
                      
                        <th>
                            Method name
                        </th>
                        <th>
                            Method digits
                        </th>
                        <th>
                            Method add time
                        </th>
                        <th>
                            Method status
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT *,
                            buyer_payment_methods.id AS 'methodidd'
                            FROM buyer_payment_methods,payment_methods
                            WHERE buyer_payment_methods.method = payment_methods.id
                            AND buyer_payment_methods.buyer = '$acting_userid'
                            ORDER BY  method_name ASC                
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
                                        echo $data_txns['method_type']; 
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['method_name'] ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['method_digits']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['add_date']." ".$data_txns['add_time']; ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['status']; ?>
                                </td>
                                <td>
                                    <button 
                                        value = "<?php echo $data_txns['methodidd'] ?>"
                                        class="btn btn-danger deletepytmethodBTN">
                                        <i class="fa fa-trash"></i>
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