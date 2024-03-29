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
    <div class="sign-in-type">
        <div class="s-in-cont">
            <div class="header">
                <h2>
                    Login first
                </h2>
                <button class="close-modal" id="canceldeli">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="s-in-body">
                <p>
                    Please login first or create a buyer account for more!
                </p>
                <div class="b-cont">
                    <a href="Buyer-signin.php" class="btn outLoginBTN">
                        Login
                    </a>
                    <a href="Buyer-signup.php" class="btn outCreatBTN">
                        Create account
                    </a>
                </div>
            </div>
            <button class="cancel-modal" id="cancel-deliveroutBTN">
                <i class="fa fa-window-close"></i>
                Cancel
            </button>
        </div>
    </div>
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

<!-- Member stop shop -->
<div class="shop-stop-modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Shop delete
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="deleteresultshop">
            </div>
        </div>
    </div>
</div>

<!-- Member unstop the shop -->
<div class="shop-unstop-modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Shop delete
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="playshopresult">
            </div>
        </div>
    </div>
</div>

<!-- Member verify sellers payment method -->
<div class="verfiy-seller-pytmodal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Verify seller's payment method
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="verifypytresults">
            </div>
        </div>
    </div>
</div>

<!-- Member unverify sellers payment method -->
<div class="unverfiy-seller-pytmodal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Unverify seller's payment method
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="unverifypytresults">
            </div>
        </div>
    </div>
</div>



<!-- Member Verify buyers payment method -->
<div class="vrify-buyer-pyt-methodmodal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Verify buyer's payment method
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="verifybuyerpYTresults">
            </div>
        </div>
    </div>
</div>


<!-- Member UnVerify buyers payment method -->
<div class="unverify-buyer-pyt-modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Unverify buyer's payment method
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="Unverfy-byuer-methodresults">
            </div>
        </div>
    </div>
</div>


<!-- Seller cancel withdraw -->
<div class="cancel-withdraw-seller-modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Cancel withdraw
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="seller-cancel-withdraw-results">
            </div>
        </div>
    </div>
</div>


<!-- Member new courier payment method -->
<div class="newcourier-pytmodal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    New Courier payment method
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="courier-contents" style="padding: 10px;">
                <div class="new-cou-pyt-resu"></div>
                <p>
                    Method type
                </p>
                <p>
                    <select name="" id="method-co-id" class="text-box">
                        <option value="Select method type">
                            Select method type
                        </option>
                        <?php 
                            $getmethods = mysqli_query($server,"SELECT *
                                FROM payment_methods
                                ORDER BY method_name ASC
                            ");
                            while ($datamethods = mysqli_fetch_array($getmethods)) {
                                ?>
                                <option value="<?php echo $datamethods['id']; ?>">
                                    <?php echo $datamethods['method_name']; ?>
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
                    <input type="text" class="text-box" 
                        id="pyt-co-digits"
                        placeholder="Type...">
                </p>
                <p>
                    <button class="btn btn-success" id="new-courier-pytm-BTN">
                        <i class="fa fa-save"></i>
                        Save
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>


<!-- Viewing the payment methods -->
<div class="view-courier-pyts" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Courier payment methods
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="view-content"></div>
        
        </div>
    </div>
</div>


<!-- Fire the courier -->
<div class="fire-courier-modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                    Delete courier
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="delete-courier-content"></div>
        
        </div>
    </div>
</div>

<!-- Select the courier before confirming the order -->
<div class="select_courier_first_modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                   Select courier first
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="form-box" style="padding: 10px">
                <p>
                    Courier S/N
                </p>
                <p>
                    <select name="" id="courier_textbox" class="text-box">
                        <option value="Select courier S/N">
                            Select courier S/N
                        </option>
                        <?php
                            $get_couriers = mysqli_query($server,"SELECT * from courier
                                WHERE  courier_status != 'Fired'
                                ORDER BY courier_sn ASC 
                            ");
                            while ($datacourier = mysqli_fetch_array($get_couriers)) {
                                ?>
                                <option value="<?php echo $datacourier['courier_sn']; ?>">
                                    <?php echo $datacourier['courier_sn']." - ".$datacourier['courier_email']; ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select>
                </p>
                <p>
                    Amount to pay
                </p>
                <p>
                    <input type="text" class="text-box" id="courier_amount" placeholder="type...">
                </p>
                <p>
                    <button class="btn btn-success" id="procedd_courier">
                        <i class="fa fa-arrow-right"></i>
                        Procced
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>



<!-- Ending the transaction modal -->
<div class="end_delivery_modal" id="">
    <div class="pyt-cont">
        <div class="yesnosdelete">
            <div class="header">
                <h2>
                   Select courier
                </h2>
                <button class="closeconfribtn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div class="form-box" style="padding: 10px">
                <div class="ffrr"></div>
                <p>
                    Courier S/N
                </p>
                <p>
                    <input type="text" class="text-box" 
                        id="courier_fieldbox" placeholder="type...">
                <p>
                <p>
                    <button class="btn btn-success" id="procedd_end_delivery">
                        <i class="fa fa-arrow-right"></i>
                        Procced
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>






