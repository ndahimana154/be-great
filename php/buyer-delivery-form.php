<?php
    include('connect.php');
    include('head-tag.php');
     $_POST['product'];
    if (isset($_POST['product'])) {
        $product = $_POST['product'];
        $get_product_info = mysqli_query($server,"SELECT * from products WHERE 
            product_id='$product'
        ");
        $product_data = mysqli_fetch_array($get_product_info);
        ?>
        <div class="deliver-box">
            <div class="header">
                <h2>
                    Shop <?php echo $product_data['product_name'] ?>
                </h2>
                <button id="closedelivery-btn">
                    <i class="fa fa-window-close"></i>
                </button>
            </div>
            <hr>
            <div id="shop_Resu">
            </div>
            <div class="content">
                    <input type="number" value="<?php echo $product ?>" id="deliproduct" placeholder="type" hidden>
                <div class="row">
                    <p>
                        Quantity
                    </p>
                    <p>
                        :
                    </p>
                    <input type="number" value="1" id="deliver-qua-field" placeholder="type">
                </div>
                <div class="row">
                    <p>
                        Unity price(RWF)
                    </p>
                    <p>
                        :
                    </p>
                    <input type="text" id="unit-price" value="<?php echo $product_data['product_price']; ?>" readonly>
                </div>
                <div class="row">
                    <p>
                        Total price(RWF)
                    </p>
                    <p>
                        :
                    </p>
                    <input type="text" id="total-price" value="<?php echo $product_data['product_price']; ?>" readonly>

                </div>
                <div class="btn">
                    <button id="confirm_shop" class="btn btn-success">
                        <i class="fa fa-fa-shopping-bag"></i>
                        Confirm shop
                    </button>
                </div>
            </div>
        </div>
        <?php
    }
    else {
        ?>
        <div class="form-results">
            <div class="failed">
                Error! No product sent
            </div>
        </div>
        <?php
    }
?>