<?php
    
?>
<div class="home-dashboard">
    <div class="dashboard-cont">
        <h1 class="text-primary" style="font-size: 20px">
            Dashboard
        </h1>
        <div class="dash-center">
            <div class="dash-box">
                <div class="left">
                    <h2>
                        Shops
                    </h2>
                    <p>
                        <?php
                            $get_tp_shops = mysqli_query($server,"SELECT * from shops WHERE shop_status='Trial period'");
                            echo"TP: ".mysqli_num_rows($get_tp_shops)."<br>";
                            $get_workings_shop = mysqli_query($server,"SELECT * from shops_waiting WHERE 
                                wait_status='Waiting'
                            ");
                            echo"WK: ".mysqli_num_rows($get_workings_shop)
                        ?>
                    </p>
                </div>
                <div class="right">
                    <?php
                        $get_total_shops = mysqli_query($server,"SELECT * from shops");
                        echo mysqli_num_rows($get_total_shops);
                    ?>
                </div>
            </div>
            <div class="dash-box">
                <div class="left">
                    <h2>
                        Buyers
                    </h2>
                    <p>
                        <?php
                            $get_total_buyers = mysqli_query($server,"SELECT * from buyers");
                        ?>
                        TOT: <?php echo mysqli_num_rows($get_total_buyers) ?>
                    </p>
                </div>
                <div class="right">
                    <?php
                        echo mysqli_num_rows($get_total_buyers);
                    ?>
                </div>
            </div>
            <div class="dash-box">
                <div class="left">
                    <h2>
                        Earnings
                    </h2>
                    <p>
                        Total earned money
                    </p>
                </div>
                <div class="right">
                    <?php
                        $get_in_tot = mysqli_fetch_array(mysqli_query($server,"SELECT 
                            sum(amount) 
                            from 
                            owner_account_txns 
                            WHERE type='IN'
                        "));
                        $get_out_tot = mysqli_fetch_array(mysqli_query($server,"SELECT 
                            sum(amount) 
                            from 
                            owner_account_txns 
                            WHERE type='OUT'
                        "));
                        $total_ins =(int) $get_in_tot['sum(amount)'];
                        $total_outs =(int) $get_out_tot['sum(amount)'];
                        echo $total_ins - $total_outs."RWF";
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>