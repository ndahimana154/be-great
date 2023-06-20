<div class="sub-nav">
    <div class="menu-nav">
        <div class="nav-links">
            <ul>
                <li class="cart-li p-3 text-primary" 
                    style="font-size: 20px;
                    user-select: none;
                    font-wieght: 800;">
                    <?php
                        echo $member_acting_username." : ";
                        if ($member_acting_type == 'Chief executive officer') {
                            echo "CEO";
                        }
                        else {
                            echo $member_acting_type;
                        }
                    ?>
                </li>
                <!-- <li class="search-li">
                    <form action="buyer-search-results.php" method="get" class="search">
                        <input type="search" name="searchField" placeholder="Search....">
                        <button class="searchBtn" type="submit" name="SearchBTN">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </li> -->
            </ul>
        </div>
        <div class="profile-menu" style="padding: 10px">
            <?php 
                if ($member_acting_profilepic == 'Not set yet') {
                    ?>
                    <a class="btn btn-primary"
                        href="member-new-profile-picture.php">
                        <i class="fa fa-plus-circle"></i> new profile picture
                    </a>
                    <?php
                }
                else {
                    ?>
                    <button>
                        <img src="images/members/profile_images/<?php echo $member_acting_profilepic; ?>" alt="">
                    </button>
                    <?php
                }
            ?>
            
        </div>
    </div>
</div>