<?php
    SESSION_START();
    include('connect.php');
    include('seller-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php 
        if(isset($_POST['district'])) {
            $district = $_POST['district'];
            $sector = $_POST['sector'];
            $location = $_POST['location'];
            $inserttheshops = mysqli_query($server,"UPDATE shops
                set shop_district = '$district',
                shop_sector = '$sector',
                shop_location = '$location'
                WHERE shop_id = '$seller_acting_shop'
                -- AND 
            ");
            if (!$inserttheshops) {
                ?>
                <div class="failed">
                    Error! The shop locations failed to be saved.
                    Try again later or contact system support.
                </div>
                <?php
            }
            else {
                ?>
                <div class="succed">
                    Congrats! The shop's location is saved successfully.

                </div>
                <?php
            }
        }
        else {
            ?>
            <div class="failed">
                Error! No values sent to the server.
            </div>
            <?php
        }
    ?>
</div>