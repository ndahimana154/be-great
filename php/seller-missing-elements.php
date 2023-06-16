<div class="missing-sect">
    <?php
        if ($seller_acting_district == 'null'  || $seller_acting_sector == 'null' || $seller_acting_location == 'null') {
            ?>
            <div class="initial-btn">
                <button class="btn btn-success"
                    id="fill_initial_BTN">
                    <i class="fa fa-plus-circle"></i>
                    Fill shop locations
                </button>
            </div>
            <div class="missing-location">
                <h1>
                    Shop locations
                </h1>
                <div class="saveLocaresu"></div>
                <div class="missing-conts">
                    <div class="field-conts">
                        <p>
                            District
                        </p>
                        <p>
                            <input type="text" 
                                class="form-control"
                                id = "district"
                                placeholder="Type...">
                        </p>
                    </div>
                    <div class="field-conts seconds">
                        <p>
                            Sector
                        </p>
                        <p>
                            <input type="text" 
                                class="form-control"
                                id ="sector"
                                placeholder="Type...">
                        </p>
                    </div>
                    <div class="field-conts third">
                        <p>
                            Exact location
                        </p>
                        <p>
                            <input type="text" 
                                class="form-control"
                                id="location"
                                placeholder="Type...">
                        </p>
                    </div>
                </div>
                <div class="btnz" style="padding: 10px;">
                    <button class="btn btn-primary"
                        id = "saveshopLocation_BTN">
                        <i class="fa fa-save"></i>
                        Save
                    </button>
                </div>
            </div>
            <?php
        }
    ?>
</div>