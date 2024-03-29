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
                        Buyer - Signin
                    </h1>
                </div>
                <div class="form-results">
                    <?php
                        if (isset($_POST['signupbtn'])) {
                            $email = $_POST['email'];
                            $passW = $_POST['password'];
                            $check_email = mysqli_query($server,"SELECT * from buyers WHERE email='$email'");
                            if (mysqli_num_rows($check_email) < 1) {
                                ?>
                                <div class="failed">
                                    Error - Email (<b><?php echo $email; ?></b>) doesn't exists.
                                </div>
                                <?php
                            }
                            else {
                                $check_psw = mysqli_query($server,"SELECT * from buyers WHERE email='$email' AND password='$passW'");
                                if (mysqli_num_rows($check_psw) != 1) {
                                    ?>
                                    <div class="failed">
                                        Error - Email and password doesn't match.
                                    </div>
                                    <?php
                                }
                                else {
                                    $getdataid = mysqli_fetch_array($check_psw);
                                    $acting = $getdataid['id'];
                                    $checkif_balanceisthere = mysqli_query($server,"SELECT * from buyers_accounts WHERE buyer='$acting'");
                                    if (mysqli_num_rows($checkif_balanceisthere) == 0) {
                                        $insert_balance = mysqli_query($server,"INSERT into buyers_accounts values('$acting',0,null)");
                                    }
                                    $_SESSION['acting_userid'] = $acting;
                                    ?>
                                    <div class="succed">
                                        Congrats! Signin succed. 
                                        <a href="Buyer-home.php?welcome">go home</a>
                                    </div>
                                    <?php
                                    // header("location: Buyer-home.php");
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