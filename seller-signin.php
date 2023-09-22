<?php
    SESSION_START();
    include('php/connect.php');
    include('php/check_session.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php  
    include('php\head-tag.php');
?>
<head>
    <!-- Font awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styling/main-style.css">
</head>
<body>
    <?php
        include('php/modal-pages.php');
        include('php/out_header.php');
    ?>
    <div class="buyer-sign-cont">
        <div class="buyer-sign-wrapper">
            <div class="sign-form-cont">
                <div class="header">
                    <h1>
                        Seller - Signin
                    </h1>
                </div>
                <div class="form-results">
                    <?php
                        if (isset($_POST['signupbtn'])) {
                            $email = $_POST['email'];
                            $passW = $_POST['password'];
                            $check_email = mysqli_query($server,"SELECT * from sellers WHERE email='$email'");
                            if (mysqli_num_rows($check_email) < 1) {
                                ?>
                                <div class="failed">
                                    Error - Email (<b><?php echo $email; ?></b>) doesn't exists.
                                </div>
                                <?php
                            }
                            else {
                                $check_psw = mysqli_query($server,"SELECT * from sellers WHERE email='$email' AND password='$passW'");
                                if (mysqli_num_rows($check_psw) != 1) {
                                    ?>
                                    <div class="failed">
                                        Error - Email and password doesn't match.
                                    </div>
                                    <?php
                                }
                                else {
                                    // Get the sellers infors
                                    $sellersinfos = mysqli_fetch_array($check_psw);
                                    $sellerid = $sellersinfos['id'];
                                    // Check if the sellers have shop assigned.
                                    $checkshopassign = mysqli_query($server,"SELECT * from sellers_to_shops
                                        WHERE seller = '$sellerid'
                                    ");
                                    if (mysqli_num_rows($checkshopassign) < 1) {
                                        ?>
                                        <div class="failed">
                                            Error! The seller with email (<b><?php echo $email ?></b>)
                                            exists but no shop assigned. You can call system support if
                                            there is some misunderstandings.
                                        </div>
                                        <?php
                                    }
                                    else {
                                        // check if the seller is working
                                        $sellerstatus = $sellersinfos['seller_status'];
                                        if ($sellerstatus != 'Selling') {
                                            ?>
                                            <div class="failed">
                                                Error! The sellers status '<b><?php echo $sellerstatus; ?></b>' 
                                                can't allow You
                                                to work. Contact system support if there is some 
                                                misunderstandings.
                                            </div>
                                            <?php
                                        }
                                        else {
                                            // Check if the seller have account else create it
                                            $checkaccount = mysqli_query($server, "SELECT * from seller_accounts
                                                WHERE seller = $sellerid;
                                            ");
                                            if (mysqli_num_rows($checkaccount) != 1) {
                                                $create_account = mysqli_query($server,"INSERT into seller_accounts 
                                                    VALUES(null,$sellerid,0)
                                                ");
                                            }
                                            $_SESSION['seller_acting-userid'] = $sellerid
                                            ?>
                                            <div class="succed">
                                                Congrats! Signin succed. 
                                                <a href="Seller-home.php">go home</a>
                                            </div>
                                            <?php  
                                        }
                                    }
                                    
                                }
                            }
                        }
                    ?>
                </div>

                <form class="sign-box" action="" method="POST"  enctype="multipart/form-data">
                    <p>
                        Email address
                    </p>
                    <p>
                        <input type="email" name="email" class="text-box" placeholder="Type..." required>
                    </p>
                    <p>
                        Password
                    </p>
                    <p>
                        <input type="password" class="text-box" name="password"  placeholder="Type...">
                    </p>
                    <p>
                        <button type="submit" name="signupbtn" class="signup-Btn">
                            <i class="fa fa-sign-in-alt"></i>
                            Signin
                        </button>
                        <!-- <button type="reset" class="clear-Btn">
                            <i class="fa fa-window-close"></i>
                            Clear form
                        </button> -->
                    </p>
                </form>
            </div>
        </div>
        <?php
            include('php/big-footer.php'); include('php/developer-footer.php');
        ?>
    </div>
</body>
</html>