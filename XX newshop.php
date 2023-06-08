<?php
    include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.js"></script>
    <title></title>
</head>
<body>
    <form action="" method="POST"  enctype="multipart/form-data">
        <h1>
            New shop 
        </h1>
        <?php
            if (isset($_POST['SaveSHopBTN'])) {
                echo"eo ij";
                $name = $_POST['shopname'];
                $district = $_POST['shopdistr'];
                $sector = $_POST['shopsector'];
                $location = $_POST['shoplocati'];
                $entrydate = $_POST['shopentrydate'];
                
                $logoname = $_FILES['shoplogo']['name'];
                $logotype = $_FILES['shoplogo']['type'];
                $logotmp_name = $_FILES['shoplogo']['tmp_name'];

                $logo_explode = explode('.', $logoname);
                $logo_exte = end($logo_explode);

                $accepted_ext= ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($logotype, $accepted_ext) === true) {
                        $newlogoname = "Logo - ".$name.".png";
                        if (move_uploaded_file($logotmp_name,"images/shops/logo/".$newlogoname) && mysqli_query($server,"INSERT into shops values(null,'$newlogoname','$name','$district','$sector','$location','$entrydate',CURRENT_TIME(),'Trial period')")) {
                            $query = "";
                            echo "SUcced";
                        }
                        else {
                            echo"Upload failed";
                        }
                }
                else {
                    echo "No ";
                }
            }
            // else {
            //     echo"Not even isseting";
            // }
        ?>
        <p>
            Shop name
        </p>
        <p>
            <input type="text" name="shopname"  placeholder="Type..." required>
        </p>
        <p>
            Shop logo
        </p>
        <p>
            <input type="file" name="shoplogo" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </p>
        <p>
            Shop District
        </p>
        <p>
            <input type="text" name="shopdistr"  placeholder="Type...">
        </p>
        <p>
            Shop Sector
        </p>
        <p>
            <input type="text" name="shopsector"  placeholder="Type...">
        </p>
        <p>
            Shop Location
        </p>
        <p>
            <textarea name="shoplocati" placeholder="Type..."></textarea>
        </p>
        <p>
            Shop entry date
        </p>
        <p>
            <input type="date" name="shopentrydate">
        </p>
        <p>
            <button name="SaveSHopBTN">
                Save
            </button>    
        </p>
    </form>
</body>
</html>