<?php
session_start();

include 'config.php';

if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: login.php?=sign-up");
    die();
}

if (isset($_SESSION['SESSION_EMAIL'])) {
    $status = "1";
    $email = $_SESSION['SESSION_EMAIL'];
	$sql = "SELECT * FROM `basic` WHERE email='$email' AND otp='$status'";
	$result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		echo $row['date_time']; ?><br><?php
		echo "promo membership " . " <a href='logout.php'>Logout</a>"; ?><br><?php echo "free users " . " <a href='welcome.php'>click</a>"; ?>
        <br>
        
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>welcome</title>
</head>
<body>
    <style>
        body{
            background: #ccc;
        }
        .container{
            border: 5px solid gray;
            max-width: 700px;
            margin: auto;
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <div class="container">
        <video width="400" height="300" controls>
            <source src="BATUH - MODOD.mp4" type="video/mp4">
        </video>
    </div>
</body>
</html>
        <?php
    }else{
        header("Location: welcome.php?tand-promo-erh-alga");
    }
}
?>