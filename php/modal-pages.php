<!-- Signup modal  -->
<div class="modal" id="s-t-modal">
    <div class="signup-type">
        
    </div>
</div>

<!-- Sign in modal -->
<div class="modal" id="s-in-modal">
    <div class="sign-in-type">
     
    </div>
</div>

<!-- Buyer Shopping form modal -->
<div class="modal" id="deliver-modal">
    <div class="deliver-cont">
       
    </div>
    <div class="yesnoshop">
        <div class="header">
            <h2>
                Are you sure?
            </h2>
            <button id="closeyesnoshopbtn">
                <i class="fa fa-window-close"></i>
            </button>
        </div>
        <hr>
        <div class="yesnobox">
            <button class="yes">
                Yes
            </button>
            <button class="no">
                No
            </button>
        </div>
    </div>
</div>

<!-- Buyyer cancelling the placed order -->
<div class="cancel-order-buyer" id="">
    <div class="buyer-cancel-order">
        <div class="cancel-order-cont">
            <div class="header">
                <h2>
                    Cancel the order
                </h2>
                <button class="cancelBTNinhead">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <div class="cancel-bdy">
                <div class="ask">
                    Are you sure to cancel this order?
                </div>
                <div class="btnz">
                    <button class="yes-cancel">
                        Yes
                    </button>
                    <button class="no-cancel">
                        No
                    </button>
                </div>
            </div>
            <button class="cancelbtn-foot">
                <i class="fa fa-window-close"></i>
                Cancel
            </button>
        </div>
    </div>
</div>

<!-- The signed out deliver modal -->
<div class="outdelivermodal">
    <di class="deliver-cont-mod">
        <div class="del-box">
            <div class="header">
                <h2>
                    Login first
                </h2>
                <button class="canceldeli">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <div class="deliv-content">
                <div class="aa">
                    Please login first or create a buyer account for more!
                </div>
                <div class="btndel">
                    <a href="Buyer-signin.php" class="btn outLoginBTN">
                        Login
                    </a>
                    <a href="Buyer-signup.php" class="btn outCreatBTN">
                        Create account
                    </a>
                </div>
            </div>
        </div>
    </di>
</div>


<!-- The member backend side menu -->
<div class="backend-sidemenumodal">
    <div class="sidemenu-cont">
        <div class="header">
            <h2>
                <a href="member-home.php">
                    BEGREAT
                </a>
            </h2>
            <button class="close-sidebarmenu">
                <i class="fa fa-window-close"></i>
            </button>
        </div>
        <div class="menu-controls">
            
        </div>
    </div>
</div>

<!-- The notifier for the seller about the order that was made by the client -->
<div class="notifier1-modal">
    <div class="notifier-cont">
        <div class="notifier-box">
            <div class="header">
                <h2>
                    Notify seller
                </h2>
                <button id="notifier1-close">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <div class="notifier-content"></div>
        </div>
    </div>
</div>



<!-- Confirming or declining the shop -->
<div class="confirmordecline">
    <div class="cordec-cont">
        <div class="header">
            <h2>
                Shop waiting response
            </h2>
            <button class="closeconordeclbtn">
                <i class="fa fa-window-close"></i>
            </button>
        </div>
        <hr>
        <div class="confirm-content">
        </div>
    </div>
</div>

<!-- The seller backend side menu -->
<div class="seller-backend-sidemenumodal">
    <div class="sidemenu-cont">
        <div class="header">
            <h2>
                <a href="seller-home.php">
                    BEGREAT
                </a>
            </h2>
            <button class="close-sidebarmenu">
                <i class="fa fa-window-close"></i>
            </button>
        </div>
        <div class="seller-menu-controls">
        </div>
    </div>
</div>

<!-- Seller confirm orders -->
<div class="seller-confirmorder-modal">
    <div class="confirm-ordercont">
        <div class="confirm-modal-box">
            <div class="header">
                <h2>
                    Confirm order
                </h2>
                <button class="cancelconfirmbtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="cofn-modal-content">
                
            </div>
        </div>
    </div>
</div>

<!-- Sellernew payment method modal -->
<div class="seler-newpyt-method">
    <div class="method-cont">
        <div class="method-box">
            <div class="header">
                <h2>
                    New payment method
                </h2>
                <button class="cancelnewMTDbtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="method-contents">
                <div class="rrr"></div>
                <p>
                    Payment method
                </p>
                <p>
                    <select name="" class="text-box payment_method_type">
                        <option value="select">
                            Select payment method
                        </option>
                        <?php
                            $get_methods = mysqli_query($server,"SELECT * from payment_methods 
                                ORDER BY
                                method_name ASC
                            ");
                            while ($data_methods = mysqli_fetch_array($get_methods)) {
                                ?>
                                <option value="<?php echo $data_methods['id']; ?>">
                                    <?php
                                        echo $data_methods['method_name'];
                                    ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select>
                </p>
                <p>
                    Payment digits
                </p>
                <p>
                    <input type="text" class="text-box pyt_digits" placeholder="Type...">
                </p>
                <p>
                    <button class="btn btn-success" id="sendnewmethodBTN">
                        <i class="fa fa-plus-circle"></i>
                        Create payment method
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>



<!-- Seller delete the  payment methof Yes/No modal-->
<div class="deletepyt-modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Delete payment method
                </h2>
                <button id="closedeltepytbtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="yesnobox">
                <p>
                    Are you sure you want to delete this 
                    payment method from your account?
                </p>
                <button class="yesdelete btn btn-success">
                    Yes
                </button>
                <button class="nodontdelete btn btn-primary">
                    No
                </button>
            </div>
        </div>
    </div>
</div>


<!-- The Buyer backend side menu -->
<div class="buyer-backend-sidemenumodal">
    <div class="sidemenu-cont">
        <div class="header">
            <h2>
                <a href="buyer-home.php">
                    BEGREAT
                </a>
            </h2>
            <button class="close-sidebarmenu">
                <i class="fa fa-window-close"></i>
            </button>
        </div>
        <div class="buyer-menu-controls">
        </div>
    </div>
</div>


<!-- Buyer create new payment  method -->
<div class="buyer-newpyt-method">
    <div class="method-cont">
        <div class="method-box">
            <div class="header">
                <h2>
                    New payment method
                </h2>
                <button class="cancelnewMTDbtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="method-contents">
                <div class="rrrr"></div>
                <p>
                    Payment method
                </p>
                <p>
                    <select name="" class="text-box byr-payment_method_type">
                        <option value="select">
                            Select payment method
                        </option>
                        <?php
                            $get_methods = mysqli_query($server,"SELECT * from payment_methods 
                                ORDER BY
                                method_name ASC
                            ");
                            while ($data_methods = mysqli_fetch_array($get_methods)) {
                                ?>
                                <option value="<?php echo $data_methods['id']; ?>">
                                    <?php
                                        echo $data_methods['method_name'];
                                    ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select>
                </p>
                <p>
                    Payment digits
                </p>
                <p>
                    <input type="text" class="text-box buyer-pyt_digits" placeholder="Type...">
                </p>
                <p>
                    <button class="btn btn-success" id="buyersendnewmethodBTN">
                        <i class="fa fa-plus-circle"></i>
                        Create payment method
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>



<!-- Buyer delete payment method -->
<div class="buyerdeletepyt-modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Delete payment method
                </h2>
                <button class="closedeltepytbtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="yesnobox">
                <p>
                    Are you sure you want to delete this 
                    payment method from your account?
                </p>
                <button class="yesdeletebuyeMethod btn btn-success">
                    Yes
                </button>
                <button class="nodontdelete btn btn-danger">
                    No
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Members confirming the seller's withdraw modal  -->
<div class="mbr-confirmsellerwithdra-modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Confirm withdraw
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="yesnobox">
                <p>
                    Are you sure you want confirm this 
                    seller's withdraw?
                </p>
                <button class="yesconfirmwithdraw btn btn-success">
                    Yes
                </button>
                <button class="nodontconfirm btn btn-primary">
                    No
                </button>
            </div>
        </div>
    </div>
</div>



<!-- Seller - Viewing the product orders notifications -->
<div class="ordernofierr-modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Order notifications
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="notifier-content">
            </div>
        </div>
    </div>
</div>