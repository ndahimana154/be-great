<div class="sub-nav">
    <div class="menu-nav">
        <div class="nav-links" style="margin: 5px">
            <ul>
                <li class="cart-li text-primary" 
                    style="font-size: 20px;
                    user-select: none;
                    font-wieght: 800;">
                    <?php
                        echo $seller_acting_shop_name." <b>(".$acting_seller_account_balance."RWF)</b>";
                    ?>
                </li>
            </ul>
        </div>
        <div class="profile-menu" style="padding: 10px">
            <?php 
                if ($seller_acting_shop_logo == 'null') {
                    ?>
                    <button class="btn" style="
                        background: #007ff5;
                        color: #fff;
                        ">
                        <i class="fa fa-plus-circle"></i> new profile picture
                    </button>
                    <?php
                }
                else {
                    ?>
                    <button>
                        <img src="images/shops/logo/<?php echo $acting_profilePic; ?>" alt="">
                    </button>
                    <?php
                }
            ?>
            
        </div>
    </div>
</div>