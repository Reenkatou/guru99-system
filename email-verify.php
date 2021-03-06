<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('PHPMailer/Exception.php');
require('PHPMailer/SMTP.php');
require('PHPMailer/PHPMailer.php');

$mail = new PHPMailer(true);

$output = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    try {
    $mail->isSMTP();
    $mail->Host = 'mail.tsdkod.com';
    $mail->SMTPAuth = true;
      // Gmail ID which you want to use as SMTP server
    $mail->Username = 'sao.team1007@tsdkod.com';
      // Gmail Password
    $mail->Password = 'eplmEs5}cDfijl';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

      // Email ID from which you want to send the email
    $mail->setFrom('sao.team1007@tsdkod.com', 'tsdkod.com');
      // Recipient Email ID where you want to receive emails
    $mail->addAddress('tsdkodteam@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = "$subject";
    $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

    $mail->send();
    $output = '<div class="alert alert-success">
        <h5>Thankyou! contacting us</h5>
            </div>';

    } catch (Exception $e) {
    $output = '<div class="alert alert-danger">
        <h5>' . $e->getMessage() . '</h5>
            </div>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Using PHPMailer & Gmail SMTP</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css' />
</head>

<body class="bg-info">
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 mt-3">
        <div class="card border-danger shadow">
          <div class="card-header bg-danger text-light">
            <h3 class="card-title">Contact Us</h3>
          </div>
          <div class="card-body px-4">
            <form action="#" method="POST">
              <div class="form-group">
                <?= $output; ?>
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required>
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter E-Mail" required>
              </div>
              <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject"
                  required>
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" rows="5" class="form-control" placeholder="Write Your Message"
                  required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Send" class="btn btn-danger btn-block" id="sendBtn">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>