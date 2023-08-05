<?php
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="orders-cont">
    <div class="orders-box">
        <h2>
            Home sliding shops
        </h2>
       <div class="sliding-end form-results">
            <?php
            if (!isset($_GET['end'])) {
                ?>
                <p class="failed">
                    The data is not sent to the server!
                </p>
                <?php
            }
            else {
                $slide_id = $_GET['end'];
                // Check if the slide exists
                $checkslide = mysqli_query($server,"SELECT * from  home_sliding_shops
                    WHERE id ='$slide_id'
                ");
                if (mysqli_num_rows($checkslide) !=1) {
                    ?>
                    <p class="failed">
                        Error! The sliding shop is not found.
                    </p>
                    <?php
                }
                else {
                    // Update and set to not sliding
                    $update = mysqli_query($server,"UPDATE home_sliding_shops
                        SET sliding_status = 'Not sliding' WHERE id='$slide_id'
                    ");
                    if (!$update) {
                        ?>
                        <p class="failed">
                            Error! Changing the sliding shop failed
                        </p>
                        <?php
                    }
                    else {
                        ?>
                        <p class="succed">
                            Congrats! The sliding shop is updated successfully!
                        </p>
                        <?php
                    }
                }
            }
            ?>
       </div>
    </div>
</div>