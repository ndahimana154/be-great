<div class="sub-nav">
    <div class="menu-nav">
        <div class="nav-links">
            <ul>
                <li class="cart-li">
                    <a href="buyer-orders.php">
                        <?php 
                            // $get_cart_count = mysqli_query($server,"SELECT * from cart_draft WHERE
                            //     buyer ='$acting_userid' AND status = 'Draft'
                            // ");
                            // echo mysqli_num_rows($get_cart_count);
                            $get_num = mysqli_query($server,"SELECT * from products_orders 
                                WHERE 
                                client = '$acting_userid'
                                AND 
                                order_status = 'Pending'
                            ");
                            echo mysqli_num_rows($get_num);
                        ?>
                        <i class="fa fa-shopping-cart"></i>
                    </a>
                </li>
                <li class="search-li">
                    <form action="buyer-search-results.php" method="get" class="search">
                        <input type="search" name="searchField" placeholder="Search....">
                        <button class="searchBtn" type="submit" name="SearchBTN">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
        <div class="profile-menu">
            <button>
                <img src="images/buyers/profileimages/<?php echo $acting_profilePic; ?>" alt="">
            </button>
        </div>
    </div>
</div>