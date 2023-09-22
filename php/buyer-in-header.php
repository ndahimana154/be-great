<header>
    <div class="logo">
        <a href="Buyer-home.php">
            <img src="images\Defaults\be-great logo.png" alt="Be Great Logo">
        </a>
    </div>
    <div class="nav">
        <form action="buyer-search-results.php" method="GET" class="form-inline" autocomplete="off">
                <input class="form-control" type="search" name="searchField" value="<?php if (isset($_GET['searchField'])) {
                    echo $_GET['searchField'];
                } ?>" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="SearchBTN">
                        <i class="fa fa-search"></i>
                    </button>
        </form>
        <div class="balance">
            <div class="left">
                <b>
                <?php
                    echo $actingbalance."RWF";
                ?>
                </b>
            </div>
        </div>
        <div class="logz-btn">
            <button id="menu-BTN" class="buyermenuBTN">
                <i class="fa fa-bars"></i>
                <span>
                    Menu
                </span>
            </button>
        </div>
    </div>
</header>