<?php
    
?>
<div class="home-dashboard">
    <div class="dashboard-cont">
        <h1 class="text-primary" style="font-size: 20px">
            Dashboard
        </h1>
        <div class="dash-center">
            <!-- TOtl products -->
            <div class="dash alert" style="
                        display: flex;width: 300px;margin: 8px;">
                <div class="left">
                    <h1 style="font-size: 30px">
                        <?php 
                            $get_stockproducts = mysqli_query($server,"SELECT * from products
                                WHERE shop = '$seller_acting_shop'
                                AND quantity_remain > 0
                            ");
                            echo mysqli_num_rows($get_stockproducts);
                        ?>
                    </h1>
                    <p  class="h5">
                        Products
                        
                    </p>
                </div>
                <div class="right"  style="text-align:center;flex:1;">
                    <i class="fa fa-store"
                        style="font-size: 30px;position: relative; top: 30%;left: 10%;"></i>
                </div>
            </div>
            <!-- TOtl products orders -->
            <div class="dash alert" style="
                        display: flex;width: 300px;margin: 8px;">
                <div class="left">
                    <h1 style="font-size: 30px">
                        <?php 
                            $get_total_buyers = mysqli_query($server,"SELECT * from products_orders 
                                WHERE shop = '$seller_acting_shop'
                            ");
                            echo mysqli_num_rows($get_total_buyers);
                        ?>
                    </h1>
                    <p class="h5">
                        Orders
                        
                    </p>
                </div>
                <div class="right"  style="text-align:center;flex:1;">
                    <!-- <i class="fa fa-jedi-order" -->
                        <!-- style="font-size: 30px;position: relative; top: 30%;left: 10%;"></i> -->
                </div>
            </div>
            <!-- TOtl pending orders -->
            <div class="dash alert" style="
                        display: flex;width: 300px;margin: 8px;">
                <div class="left">
                    <h1 style="font-size: 30px">
                        <?php 
                            $get_total_pending = mysqli_query($server,"SELECT * from products_orders 
                                WHERE shop = '$seller_acting_shop'
                                AND order_status = 'Pending'
                            ");
                            echo mysqli_num_rows($get_total_pending);
                        ?>
                    </h1>
                    <p class="h5">
                        Pending orders
                        
                    </p>
                </div>
                <div class="right"  style="text-align:center;flex:1;">
                    <!-- <i class="fa fa-store"
                        style="font-size: 30px;position: relative; top: 30%;left: 10%;"></i> -->
                </div>
            </div>
            <!-- TOtal earnings -->
            <div class="dash alert" style="
                        display: flex;width: 300px;margin: 8px;">
                <div class="left">
                    <h1 style="font-size: 30px">
                        <?php 
                            $get_total_earnings = mysqli_query($server,"SELECT sum(receivedamount) from
                                sellers_products_selling WHERE seller = '$seller_acting_userid'
                            ");
                            $data_total_earnings = mysqli_fetch_array($get_total_earnings);
                            echo $data_total_earnings['sum(receivedamount)']."RWF";
                        ?>
                    </h1>
                    <p class="h5">
                        Total earnings
                        
                    </p>
                </div>
                <div class="right"  style="text-align:center;flex:1;">
                    <i class="fa fa-dollar-sign"
                        style="font-size: 30px;position: relative; top: 30%;left: 10%;"></i>
                </div>
            </div>
        </div>
    </div>
    <?php
        // include('seller-shop-details.php');
    ?>
</div>