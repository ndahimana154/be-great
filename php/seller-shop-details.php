<div class="shop-details alert alert-primary m-3">
    <!-- shop detailg -->
    <h1>
        Shop details
    </h1>
    <div class="details-cont">
        <div class="line" style="display: flex; flex-direction: row;">
            <div style="flex: 1">
                Shop name :
            </div>
            <div style="flex: 1">
                <?php
                    echo $seller_acting_shop_name
                ?>
            </div>
        </div>
        <div class="line" style="display: flex; flex-direction: row;">
            <div style="flex: 1">
                Shop district :
            </div>
            <div style="flex: 1">
                <?php
                    echo $seller_acting_district;
                ?>
            </div>
        </div>
        <div class="line" style="display: flex; flex-direction: row;">
            <div style="flex: 1">
                Shop sector :
            </div>
            <div style="flex: 1">
                <?php
                    echo $seller_acting_sector
                ?>
            </div>
        </div>
        <div class="line" style="display: flex; flex-direction: row;">
            <div style="flex: 1">
                Shop location :
            </div>
            <div style="flex: 1">
                <?php
                    echo $seller_acting_location
                ?>
            </div>
        </div>
    </div>
</div>