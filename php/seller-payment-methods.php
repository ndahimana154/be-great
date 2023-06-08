<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Payment methods
        </h2>
        <div class="ctrl-btns" style="padding: 10px;">
            <button class="btn btn-success" id="new-methodBTN">
                <i class="fa fa-plus-circle"></i>
                new method
            </button>
        </div>
        <div class="table" style="padding: 10px; overflow:auto;">
            <table class="table table-hover table-responsive">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            method type
                        </th>
                        <th>
                            Method name
                        </th>
                        <th>
                            Method digits
                        </th>
                        <th>
                            method add time
                        </th>
                        <th>
                            method status
                        </th>
                        <th>
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $get_txns = mysqli_query($server,"SELECT *,
                            sellers_payment_methods.id AS 'methodid'
                            from sellers_payment_methods,
                            payment_methods
                            WHERE 
                            sellers_payment_methods.method = payment_methods.id
                            AND sellers_payment_methods.seller = '$seller_acting_userid'
                            AND sellers_payment_methods.status != 'Deleted'
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
                                        // echo $data_txns['methodid'];
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php echo $data_txns['method_name']; ?>
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
                                    <button class="deletepytmtdBTN" 
                                        value="<?php echo $data_txns['methodid']; ?>"
                                        style="border:0; background:transparent;">
                                        <i class="fa fa-trash text-danger"></i>
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