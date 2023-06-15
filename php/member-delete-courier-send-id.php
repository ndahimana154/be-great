<?php
    SESSION_START();
    include('connect.php');
    include('member-acting-initial-credentials.php');
?>
<div class="form-results">
    <?php
        if (isset($_POST['courierdele'])) {
            $courier = $_POST['courierdele'];
            // Delete courier
            $delete = mysqli_query($server,"UPDATE courier 
                SET courier_status = 'Fired'
                WHERE courier_sn = '$courier'
            ");
            if (!$delete) {
                ?>
                <div class="failed">
                    Error! Deleting the courier failed.
                    Don't rush we are handling the error.
                </div>
                <?php
            }
            else {
                ?>
                <div class="succed">
                    Congrats! Deleting the courier has succed.
                </div>
                <?php
            }
        }
    ?>
</div>