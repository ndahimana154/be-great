<?php
    SESSION_START();
    include('connect.php');
    include('buyer-acting_initial-credentials.php');
?>
<ul>
    <!-- <hr> -->
    <li>
        <a href="buyer-transactions.php">
            Transactions
        </a>
    </li>
    <hr>
    <li>
        <a href="buyer-orders.php">
        <?php 
            $get_num = mysqli_query($server,"SELECT * from products_orders 
                WHERE 
                client = '$acting_userid'
                AND 
                order_status = 'Pending'
            ");
            echo mysqli_num_rows($get_num);
        ?>
            Recent orders
        </a>
    </li>    
    <hr>
    <li>
        <a href="buyer-deposit.php">
            Desposit
        </a>
    </li>
    <hr>
    <li>
        <a href="buyer-payment-methods.php">
            Payment methods
        </a>
    </li>
    <hr>
    <li>
        <a href="logout.php">
            Logout
        </a>
    </li>
    <hr>
</ul>