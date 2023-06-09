<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Sellers payment methods
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
                            Seller Email
                        </th>
                        <th>
                            Method type
                        </th>
                        <th>
                            Method name
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
                        $get_txns = mysqli_query($server,"SELECT *,
                            sellers_payment_methods.status AS 'ssttus'
                            FROM sellers_payment_methods,sellers,payment_methods
                            WHERE 
                            sellers_payment_methods.id = sellers.id
                            AND sellers_payment_methods.method = payment_methods.id
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
                                        <?php  echo $data_txns['firstname']." ".$data_txns['lastname']; ?>
                                    
                                </td>
                                <td>
                                    <a href="mailto: <?php echo $data_txns['email']; ?>">
                                        <?php echo $data_txns['email']; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $data_txns['method_type']; ?>
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
                                    <?php echo $data_txns['ssttus']; ?>
                                </td>
                                <td>
                                    <?php
                                        if ($data_txns['status'] == 'Pending') {
                                            ?>
                                            <button value="<?php echo $data_txns['witdrawid'];?>" 
                                                class="btn btn-success widrw-confirmBTN"
                                                title="COnfirm the withdraw"
                                                >
                                                <i class="fa fa-check text-warning" style=""></i>
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