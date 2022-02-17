<?php

include 'connection.php';

session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: /guru99/sign-in.php");
    die();
}

    if (isset($_SESSION['SESSION_EMAIL'])) {
        $status = "1";
        $email = $_SESSION['SESSION_EMAIL'];
        $sql = "SELECT * FROM `basic` WHERE email='$email' AND otp='$status'";
        $result = mysqli_query($conn, $sql);
        
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result); ?>
            <br>
<br>
<br>
<br>


<?php echo $row['date_time']; ?>
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../content/css/responsive.css">
    <title>responsive image</title>
    <?php require('navbar.php'); ?>
</head>
<body>
    <h1>responsive image</h1>
    <section>
    <div class="responsive">
        <div class="gallery">
            <a href="../content/section/nOUwYbq.jpg" target="_blank"><img src="../content/section/nOUwYbq.jpg" width="300" height="200"></a>
            <div class="des">1. Add a description of the image here</div>
        </div>
    </div>
    <div class="responsive">
        <div class="gallery">
            <a href="../content/section/THxWjlg.png" target="_blank"><img src="../content/section/THxWjlg.png" width="300" height="200"></a>
            <div class="des">2. Add a description of the image here</div>
        </div>
    </div>
    <div class="responsive">
        <div class="gallery">
            <a href="../content/section/V46lXj7.jpg" target="_blank"><img src="../content/section/V46lXj7.jpg" width="300" height="200"></a>
            <div class="des">3. Add a description of the image here</div>
        </div>
    </div>
    <div class="responsive">
        <div class="gallery">
            <a href="../content/section/VQaJKNO.png" target="_blank"><img src="../content/section/VQaJKNO.png" width="300" height="200"></a>
            <div class="des">4. Add a description of the image here</div>
        </div>
    </div>
    <div class="responsive">
        <div class="gallery">
            <a href="../content/section/vUbHfrB.jpg" target="_blank"><img src="../content/section/vUbHfrB.jpg" width="300" height="200"></a>
            <div class="des">5. Add a description of the image here</div>
        </div>
    </div>
    <div class="responsive">
        <div class="gallery">
            <a href="../content/section/wYjAzA9.jpg" target="_blank"><img src="../content/section/wYjAzA9.jpg" width="300" height="200"></a>
            <div class="des">6. Add a description of the image here</div>
        </div>
    </div>
    <div class="responsive">
        <div class="gallery">
            <a href="../content/section/XSysiUZ.jpg" target="_blank"><img src="../content/section/XSysiUZ.jpg" width="300" height="200"></a>
            <div class="des">7. Add a description of the image here</div>
        </div>
    </div>
    <div class="responsive">
        <div class=" gallery gal">
            <a href="../content/section/XSysiUZ.jpg" target="_blank"><video width="300" height="200" poster="../content/section/XSysiUZ.jpg" controls>
                <source src="../content/trailer/BATUH - MODOD.mp4" type="video/mp4">
            </video></a>
            <div class="des"><a href="../content/section/XSysiUZ.jpg">8. Add a description of the image here</a></div>
        </div>
    </div>
</section>
</body>
</html>
            <?php
        }else{
            echo "promo-erk-alga";
        }
    }
?>