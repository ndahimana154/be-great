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
                        Products
                    </h2>
                    <p>
                        In stock:
                        <?php 
                            $get_stockproducts = mysqli_query($server,"SELECT * from products
                                WHERE shop = '$seller_acting_shop'
                                AND quantity_remain > 0
                            ");
                            echo mysqli_num_rows($get_stockproducts);
                        ?>
                    </p>
                    <p>
                        Out of stock:
                        <?php 
                            $get_outstockproducts = mysqli_query($server,"SELECT * from products
                                WHERE shop = '$seller_acting_shop'
                                AND quantity_remain < 1
                            ");
                            echo mysqli_num_rows($get_outstockproducts);
                        ?>
                    </p>
                </div>
                <div class="right">
                    <?php
                        $get_products_count = mysqli_query($server,"SELECT * from products
                            WHERE shop = '$seller_acting_shop'
                            -- AND quantity_remain > 0
                        ");
                        echo mysqli_num_rows($get_products_count);
                    ?>
                </div>
            </div>
            <div class="dash-box">
                <div class="left">
                    <h2>
                        Product orders
                    </h2>
                    <p>
                        <?php
                            $get_total_buyers = mysqli_query($server,"SELECT * from products_orders 
                                WHERE shop = '$seller_acting_shop'
                            ");
                        ?>
                        Pending: 
                        <?php 
                        $pendingorders = mysqli_query($server,"SELECT * from products_orders 
                            WHERE shop = '$seller_acting_shop' AND order_status ='Pending'
                        ");
                        echo mysqli_num_rows($pendingorders);
                        ?>
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
                        Account
                    </h2>
                    <p>
                        PG WR:
                        <?php
                            $gettotalpendings = mysqli_query($server,"SELECT sum(amount_withdrawed)
                                from sellers_withdraws 
                                WHERE 
                                seller = '$seller_acting_userid'
                                AND status = 'Pending'
                            ");
                            $data_totalpendings = mysqli_fetch_array($gettotalpendings);
                            echo $data_totalpendings['sum(amount_withdrawed)']."RWF";
                        ?>
                    </p>
                </div>
                <div class="right">
                    <?php
                        echo $acting_seller_account_balance."Rwf";
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
        include('seller-shop-details.php');
    ?>
</div>