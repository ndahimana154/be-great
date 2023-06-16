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
    <title>New product</title>
</head>
<body>
    <?php
        // echo $accepted_ext= ["image/jpeg", "image/jpg", "image/png"];
    ?>
    <form action="" method="POST"  enctype="multipart/form-data">
        <h1>
            New products
        </h1>
        <?php
            if (isset($_POST['SaveProductBTN'])) {
               
                $productname=$_POST['productname'];
                $productgenre=$_POST['product_genre'];
                $shop=$_POST['shop'];
                $price=$_POST['productprice'];
                $gettingshopname = mysqli_fetch_array(mysqli_query($server,"SELECT * from shops WHERE shop_id='$shop'"));
                $shopname=$gettingshopname['shop_name'];
                
                $logoname = $_FILES['productimage']['name'];
                $logotype = $_FILES['productimage']['type'];
                $logotmp_name = $_FILES['productimage']['tmp_name'];

                $logo_explode = explode('.', $logoname);
                $logo_exte = end($logo_explode);

                $accepted_ext= ["image/jpeg", "image/jpg", "image/png"];
                if(in_array($logotype, $accepted_ext) === true) {
                        $newproductimagename = $shopname." - ".$productname." - FRONTIMAGE.png";
                        if (move_uploaded_file($logotmp_name,"images/products/Frontimages/".$newproductimagename) && mysqli_query($server,"INSERT into products values(null,'$productname','$newproductimagename','$price',CURRENT_DATE(),'$productgenre','$shop')")) {
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
            Product name
        </p>
        <p>
            <input type="text" name="productname"  placeholder="Type..." required>
        </p>
        <p>
            Product price
        </p>
        <p>
            <input type="text" name="productprice"  placeholder="Type..." required>
        </p>
        <p>
            Product image
        </p>
        <p>
            <input type="file" name="productimage" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </p>
        <p>
            Product Genre
        </p>
        <p>
            <select name="product_genre" id="">
                <option>
                    --- select ---
                </option>
                <?php
                    $query =mysqli_query($server,"SELECT * from product_genres");
                    while ($data=mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $data['genre_id'] ?>">
                            <?php
                                echo $data['genre_name'];
                            ?>
                        </option>
                        <?php
                    }
                ?>
            </select>
        </p>
        <p>
            Shop
        </p>
        <p>
        <select name="shop" id="">
                <option>
                    --- select ---
                </option>
                <?php
                    $query =mysqli_query($server,"SELECT * from shops");
                    while ($data=mysqli_fetch_array($query)) {
                        ?>
                        <option value="<?php echo $data['shop_id'] ?>">
                            <?php
                                echo $data['shop_name'];
                            ?>
                        </option>
                        <?php
                    }
                ?>
            </select>
        </p>
       
        <p>
            <button name="SaveProductBTN">
                Save
            </button>    
        </p>
    </form>
</body>
</html>