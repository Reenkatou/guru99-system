<?php
require('header.php');
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) { 
    require('header.php');
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/guru99/content/css/style.css">
    <title>GURU99</title>
</head>
<body>


<section>
    <div class="img"></div>
        <div class="center">
            <div class="title">Create Amazing Website</div>
                <div class="sub_title">Pure HTML & CSS Only</div>
                    <div class="btns">
                        <button>Learn More</button>
                        <button>Get start</button>
                    </div>
        </div>
</section>

</body>
</html>
<?php
}else{ ?>
<?php
require('header.php');
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/guru99/content/css/style.css">
    <title>GURU99</title>
</head>
<body>


<section>
    <div class="img"></div>
        <div class="center">
            <div class="title">Create Amazing Website</div>
                <div class="sub_title">pro site</div>
                    <div class="btns">
                        <button>Learn More</button>
                        <button>Get start</button>
                    </div>
        </div>
</section>

</body>
</html>
<?php
}
    ?>
