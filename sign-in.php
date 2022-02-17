<?php
    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: /guru99/mn/");
        die();
    }

require('connection.php');

    $msg = "";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE users SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: sign-in.php");
        }
    }

    if (isset($_POST['submit'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $fetch = mysqli_fetch_assoc($result);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                if(empty($fetch['code'])){
                    $_SESSION['SESSION_EMAIL'] = $email;
                    header("Location: /guru99/mn/");
                }else{
                    $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
                }
            }else{
                $msg = "<div class='alert alert-danger'>password not match.</div>";
            }
        }else{
            $msg = "<div class='alert alert-danger'>not Email.</div>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="/guru99/content/css/root.css">

    <?php
        include 'header.php';
    ?>
	<title>Sign in</title>

</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <?php echo $msg; ?>
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign in</p>
			<div class="input-group">
				<input type="email" placeholder="Email and name" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Sign up? <a href="sign-up.php">Here</a>.</p>
			<p class="login-register-text">Reset password? <a href="reset-pass.php">Here</a>.</p>
		</form>
	</div>
</body>
</html>