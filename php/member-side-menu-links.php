<?php
    SESSION_START();
    include('connect.php');
    include('member-acting-initial-credentials.php');
    $view_deposit_drafts = '<hr>
        <li>
            <a href="member-deposit-drafts.php">
                <!-- <i class="fa fa-plus-circle"></i> -->
                Deposit drafts
            </a>
        </li>';
    $view_recent_orders = '<hr>
        <li>
            <a href="member-recent-orders.php">
                Recent orders
            </a>
        </li>';
    $view_shops_list = '<hr>
        <li>
            <a href="member-shops-list.php">
                Shops list
            </a>
        </li>';
    $view_sellers_withdraws = '<hr>
        <li>
            <a href="member-sellers-withdraws.php">
                <!-- <i class="fa fa-plus-circle"></i> -->
                Sellers Withdraws
            </a>
        </li>';
    $view_sellers_payments_methods = '<hr>
        <li>
            <a href="member-sellers-payment-methods.php">
                <i class="fa fa-money-check"></i>
                Sellers payment methods
            </a>
        </li>';
    $view_buyers_payment_methods = '<hr>
        <li>
            <a href="member-buyers-payment-methods.php">
                <i class="fa fa-money-check"></i>
                Buyers payment methods
            </a>
        </li>';
    $view_couriers = '<hr>
        <li>
            <a href="member-couriers.php">
                <i class="fa fa-biking"></i>
                Couriers
            </a>
        </li>';
    $view_home_sliding_shops = '<hr>
        <li>
            <a href="member-home-sliding-shops.php">
                <i class="fa fa-sliders-h"></i>
                Home sliding shops
            </a>
        </li>';
    $view_members = '<hr>
        <li>
            <a href="member-members-list.php">
                <i class="fa fa-sliders-h"></i>
                Members
            </a>
        </li>';
    
    
?>
<ul>
    <?php
        if ($member_acting_type == 'Chief executive officer') {
            echo $view_deposit_drafts;
            echo $view_recent_orders;
            echo $view_shops_list;
            echo $view_sellers_withdraws;
            echo $view_sellers_payments_methods;
            echo $view_buyers_payment_methods;
            echo $view_couriers;
            echo $view_home_sliding_shops;
            echo $view_members;

        }
        elseif ($member_acting_type == 'Manager') {
            echo $view_shops_list;
            echo $view_sellers_withdraws;
            echo $view_sellers_payments_methods;
            echo $view_buyers_payment_methods;
            echo $view_members;        
        }
        elseif ($member_acting_type =='Market analyzer') {
            echo $view_recent_orders;
            echo $view_shops_list;
            echo $view_couriers;
        }
    ?>
    <hr>
    <li>
        <a href="logout.php?member-out=<?php echo $member_acting_userid; ?>">
            <i class="fa fa-sign-out-alt"></i>
            Logout
        </a>
    </li>
    <hr>
</ul>