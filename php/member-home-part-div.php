<?php
    
?>
<div class="home-dashboard">
    <div class="dashboard-cont">
        <h1 class="text-primary" style="font-size: 20px">
            Dashboard
        </h1>
        <?php 
            if ($member_acting_type == 'Chief executive officer') {
                ?>
                <div class="dash-center">
                    <!-- Total members -->
                    <div class="dash alert" style="
                        display: flex;width: 300px;margin: 8px;">
                        <div class="left" style="flex: 1;">
                            <?php
                                $getallmembers = mysqli_query($server,"SELECT * from co_members");
                            ?>
                            <h1 style="font-size: 30px;">
                                <?php echo mysqli_num_rows($getallmembers); ?>
                            </h1>
                            <p class="h5" style="padding-left: 10px;">
                                Members
                            </p>
                        </div>
                        <div class="right" style="text-align:center;flex:1;">
                            <i class="fa fa-eye" style="font-size: 30px;position: relative; top: 30%;left: 10%;"></i>
                        </div>
                    </div>
                    <!-- Total shops -->
                    <div class="dash alert bg-white" style="
                        display: flex;width: 300px;margin: 8px;">
                        <div class="left" style="flex: 1;">
                            <h1 style="font-size: 30px;">
                                <?php
                                    $get_total_shops = mysqli_query($server,"SELECT * from shops");
                                    echo mysqli_num_rows($get_total_shops);
                                ?>
                            </h1>
                            <p class="h5" style="padding-left: 10px;">
                                Shops
                            </p>
                        </div>
                        <div class="right" style="text-align:center;flex:1;">
                            <i class="fa fa-shopping-bag" style="font-size: 30px;position: relative; top: 30%;left: 10%;"></i>
                        </div>
                    </div>
                    <!-- Total buyers -->
                    <div class="dash alert bg-white" style="
                        display: flex;width: 300px;margin: 8px;">
                        <div class="left" style="flex: 1;">
                            <h1 style="font-size: 30px;">
                            <?php
                                    $get_total_buyers = mysqli_query($server,"SELECT * from buyers");
                                ?>
                                <?php echo mysqli_num_rows($get_total_buyers) ?>
                            </h1>
                            <p class="h5" style="padding-left: 10px;">
                                Buyers
                            </p>
                        </div>
                        <div class="right" style="text-align:center;flex:1;">
                            <i class="fa fa-user-friends" style="font-size: 30px;position: relative; top: 30%;left: 10%;"></i>
                        </div>
                    </div>
                    <!-- Total couriers -->
                    <div class="dash alert bg-white" style="
                        display: flex;width: 300px;margin: 8px;">
                        <div class="left" style="flex: 1;">
                            <h1 style="font-size: 30px;">
                                <?php
                                    $getallcouriers = mysqli_query($server,"SELECT * from
                                        courier
                                        WHERE courier_status != 'Fired'
                                    ");
                                    echo mysqli_num_rows($getallcouriers);
                                ?>
                            </h1>
                            <p class="h5" style="padding-left: 10px;">
                                Couriers
                            </p>
                        </div>
                        <div class="right" style="text-align:center;flex:1;">
                            <i class="fa fa-biking" style="font-size: 30px;position: relative; top: 30%;left: 10%;"></i>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
        
    </div>
</div>