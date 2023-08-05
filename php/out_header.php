<div class="main-header">
    <div class="m-hSection">
        <div class="left">
            <div class="menu-links" style="padding:10px">
                <!-- <button id="menu-BTN">
                    <i class="fa fa-bars"></i>
                </button> -->
            </div>
            <div class="logo">
                <a href="home.php">
                    BeGreat
                </a>
            </div>
        </div>
        <div class="right">
            <form action="search-results.php" method="GET" class="search">
                <input type="search" name="searchField" 
                    value="<?php if (isset($_GET['searchField'])) {
                        echo $_GET['searchField'];
                        } ?>" placeholder="Search....">
                <!-- <button class="searchBtn" type="submit" name="submitoutsearch">
                    Search 
                </button> -->
            </form>
            <div class="logBTNz">
                <button class="logBTN" id="LoginBTN">
                    Login
                </button>
                /
                <button class="logBTN" id="signupBTN">
                    Signup
                </button> 
            </div>
        </div>
        <!-- <button class="cart">
            <span>0</span>
            <i class="fa fa-shopping-cart"></i>
        </button> -->
    </div>
    <!-- <div id="menulinksBox">
        <div class="menu-box" id="menu-box">
            <ul> -->
                <!-- <li>
                    <a href="">
                        Browse
                    </a>
                </li>
                <li>
                    <a href="">
                        About us
                    </a>
                </li>
                <li>
                    <a href="">
                        Contact us
                    </a>
                </li> -->
                <!-- <li>
                    <a href="">
                        Browse
                    </a>
                </li> -->
            <!-- </ul>
            <button id="closeMenuBTN">
                <i class="fa fa-window-close"></i>
            </button>
        </div>
    </div> -->
</div>