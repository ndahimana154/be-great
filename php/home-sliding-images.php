<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sliding images</title>
</head>
<body>
    <!-- Slider strt -->
    <div class="slider">
        <div class="slides">
            <!-- Radio buttons start -->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">
            <!-- Radio buttons end -->
            <!-- Slider images start -->
            <div class="slide first">
                <img src="images/shops/home-sliding/1.jpg" alt="" srcset="">
                <p>fdiojuijui</p>
            </div> 
            <div class="slide">
                <img src="images/shops/home-sliding/2.jpg" alt="" srcset="">
            </div> 
            <div class="slide">
                <img src="images/shops/home-sliding/3.jpg" alt="" srcset="">
            </div> 
            <div class="slide">
                <img src="images/shops/home-sliding/4.jpg" alt="" srcset="">
            </div> 
            <!-- Slide images end -->
            <!-- Automatic navigation start -->
            <div class="naivgation-auto">
                <div class="autobtn1"></div>
                <div class="autobtn2"></div>
                <div class="autobtn3"></div>
                <div class="autobtn4"></div>
            </div>
            <!-- Automatic navigation end -->
        </div>
        <!-- Manual navigation start-->
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn manual1"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
        <!-- Manual navigation end -->
    </div>
    <!-- Slider end -->
    <script type="text/javascript">
        var counter = 1;
        setInterval(function(){
            document.getElementById('radio' + counter).checked = true;
            counter ++;
            if (counter > 4) {
                counter =1;
            }
        }, 2500);
    </script>
</body>
</html>