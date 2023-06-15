<?php
    SESSION_START();
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['courier'])) {
            $courier = $_POST['courier'];
            // Check if the courier exists
            $checkexists  = mysqli_query($server,"SELECT * from courier
                WHERE courier_sn = '$courier'
            ");
            if (mysqli_num_rows($checkexists) < 1) {
                ?>
                <div class="failed">
                    Error! The courier selected doesn't
                    exists in the database.
                </div>
                <?php
            }
            else {
                // Check if he/she have the payment method
                $checkmethodexists = mysqli_query($server,"SELECT * from
                    courier_payment_methods,payment_methods 
                    WHERE courier = '$courier'
                    AND courier_payment_methods.method_type = payment_methods.id
                ");
                if (mysqli_num_rows($checkmethodexists) < 1) {
                    ?>
                    <div class="failed">
                        Error! The seller doesn't have
                         the payment method.
                    </div>
                    <?php
                }
                else {
                    $datacourier = mysqli_fetch_array($checkexists);
                    ?>
                    <div style="color: #000;">
                        <p style="font-weight: 900">
                            Names: <?php echo $datacourier['courier_fn']." ".$datacourier['courier_ln'];  ?>
                        </p>
                        <p style="font-weight: 900">
                            Email:  <?php echo $datacourier['courier_email'];  ?>
                        </p>
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
                                        Payment digits
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $id=1;
                                    while ($datamethodss = mysqli_fetch_array($checkmethodexists)) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $id++; ?>
                                            </td>
                                            <td>
                                                <?php echo $datamethodss['method_type']; ?>
                                            </td>
                                            <td>
                                                <?php echo $datamethodss['method_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $datamethodss['method_digits']; ?>
                                            </td>
                                            <td>
                                                <?php echo $datamethodss['method_status']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
            }
        }
    ?>
</div>