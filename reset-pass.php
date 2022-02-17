<?php

session_start();
if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: /guru99/mn/");
    die();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/PHPMailer.php');

require('connection.php');
$msg = "";

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $code = mysqli_real_escape_string($conn, md5(rand()));

    if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        $query = mysqli_query($conn, "UPDATE users SET code='{$code}' WHERE email='{$email}'");

        if ($query) {        
            echo "<div style='display: none;'>";

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();                                            
                $mail->Host       = 'mail server';                   
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'username';                    
                $mail->Password   = 'password';                              
                $mail->SMTPSecure = 'tls';    
		$mail->Port       = 587; 

                $mail->setFrom('email');
                $mail->addAddress($email);

                $mail->isHTML(true);                                 
                $mail->Subject = 'Tsdkod games forgot pass ';
                $mail->Body    = 'Here is the verification link <b><a href="http://localhost/guru99/reset-pass.php?reset='.$code.'">http:http://localhost/guru99/reset-pass.php?reset='.$code.'</a></b>';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            echo "</div>";        
            $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
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

    <?php include 'header.php'; ?>
	<title>Reset password</title>
</head>
<body>
	<div class="container">
	<?php echo $msg; ?>
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Forgot password</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Send</button>
			</div>
			<p class="login-register-text">sign in? <a href="sign-in.php">Here</a>.</p>
			<p class="login-register-text">sign up account? <a href="sign-up.php">Here</a>.</p>
		</form>
	</div>
</body>
</html>