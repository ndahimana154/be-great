<?php
    SESSION_START();
    include('php/connect.php');
    include('php/check_session.php');
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
        include('php/modal-pages.php')
    ?>
    <div class="main-gate">
        <?php
            include('php/out_header.php');
        ?>
        <div class="buyer-sign-cont">
            <div class="buyer-sign-wrapper">
                <div class="sign-form-cont">
                    <div class="header">
                        <h1>
                            Member - Signin
                        </h1>
                    </div>
                    <div class="form-results">
                        <?php
                            if (isset($_POST['signupbtn'])) {
                                $username = $_POST['username'];
                                $passW = $_POST['password'];
                                $check_email = mysqli_query($server,"SELECT * from co_members_auth 
                                    WHERE 
                                    username='$username'
                                ");
                                if (mysqli_num_rows($check_email) < 1) {
                                    ?>
                                    <div class="failed">
                                        Error - Username '<b><?php echo $username; ?></b>'' doesn't exists.
                                    </div>
                                    <?php
                                }
                                else {
                                    $check_psw = mysqli_query($server,"SELECT * from co_members_auth
                                        WHERE
                                        username='$username'
                                        AND password='$passW'
                                    ");
                                    if (mysqli_num_rows($check_psw) != 1) {
                                        ?>
                                        <div class="failed">
                                            Error - Username and password doesn't match.
                                        </div>
                                        <?php
                                    }
                                    else {
                                        $getdataid = mysqli_fetch_array($check_psw);
                                        $acting = $getdataid['id'];
                                        $_SESSION['acting_memberid'] = $acting;
                                        // Update the status
                                        $update = mysqli_query($server,"UPDATE co_members
                                            SET Status = 'Online'
                                            WHERE id = '$acting';
                                        ");
                                        ?>
                                        <div class="succed">
                                            Congrats! Signin succed.
                                            <a href="Member-home.php?welcome">Go home</a>
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
                            Username
                        </p>
                        <p>
                            <input type="text" name="username" class="text-box" placeholder="Type..." required>
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
    </div>
</body>
</html>