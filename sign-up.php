<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/PHPMailer.php');
require('connection.php');

    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: /guru99/mn/");
        die();
    }

    $msg = "";

    if (isset($_POST['submit'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);
        $code = mysqli_real_escape_string($conn, md5(rand()));
        
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } else {
            if ($password === $confirm_password) {
                $encpass = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO users (name, email, password, code) VALUES ('{$name}', '{$email}', '{$encpass}', '{$code}')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo "<div style='display: none;'>";

                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();                                            
                        $mail->Host       = 'mail server';                   
                        $mail->SMTPAuth   = true;                                   
                        $mail->Username   = 'username email';                    
                        $mail->Password   = 'password';                              
                        $mail->SMTPSecure = 'tls';    
						$mail->Port       = 587; 

                        $mail->setFrom('your email');
                        $mail->addAddress($email);

                        $mail->isHTML(true);                                  
                        $mail->Subject = 'Tsdkod games Email verification';
                        $mail->Body    = 'Here is the verification link <b><a href="http://localhost/guru99/sign-in.php?verification='.$code.'">http://localhost/guru99/sign-in.php?verification='.$code.'</a></b>';
                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
                    $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
                }
            } else {
                $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match</div>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php 
    include 'header.php'; 
?>
	<link rel="stylesheet" href="/guru99/content/css/root.css">

	<title>Sign up</title>
</head>
<body>
	<div class="container">
	<?php echo $msg; ?>
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Sign up</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="name" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="confirm-password" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Sign in? <a href="sign-in.php">Here</a>.</p>
			<p class="login-register-text">Forgot password?<a href="reset-pass.php">Here</a>.</p>
		</form>
	</div>
</body>
</html>