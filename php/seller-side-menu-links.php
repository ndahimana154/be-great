<?php
    SESSION_START();
    include('connect.php');
    include('seller-acting-initial-credentials.php');
    if (!isset($_SESSION['seller_acting-userid'])) {
        header("location: home.php");
    }
?>
<ul>
    <li>
        <a href="seller-products-list.php">
            Products list
        </a>
    </li>
    <hr>
    <li>
        <a href="seller-stock-history.php">
        Stock history
        </a>
    </li>
    <!-- <hr>
    <li>
        <a href="sellers-newproduct.php?back">
            New product
        </a>
    </li> -->
    <hr>
    <li>
        <a href="seller-product-orders.php">
            Product orders
        </a>
    </li>
    <hr>
    <li>
        <a href="seller-payment-methods.php">
        Payment methods
        </a>
    </li>
    <hr>
    <li>
        <a href="seller-withdraw-history.php">
        Withdrawing history
        </a>
    </li>
    <hr>
    <li>
        <a href="seller-products-selling.php">
        Selling history
        </a>
    </li>
    <hr>
    <li>
        <a href="logout.php?seller_out=<?php echo $seller_acting_userid; ?>">
            <i class="fa fa-sign-out-alt"></i>
            Logout
        </a>
    </li>
    <hr>
</ul>