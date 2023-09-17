<header>
    <div class="logo">
        <a href="home.php">
            <img src="images\Defaults\be-great logo.png" alt="Be Great Logo">
        </a>
    </div>
    <div class="nav">
        <form action="search-results.php" method="GET" class="form-inline" autocomplete="off">
                <input class="form-control" type="search" name="searchField" value="<?php if (isset($_GET['searchField'])) {
                    echo $_GET['searchField'];
                } ?>" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
        </form>
        <div class="logz-btn">
            <button id="LoginBTN">
                <i class="fa fa-user"></i>
                <span>
                    Login
                </span>
            </button>
            <button id="signupBTN">
                <i class="fa fa-user-plus"></i>
                <span>
                    Signup
                </span>
            </button>
        </div>
    </div>
</header>
<div class="height-opt" style="height: 55px"></div>