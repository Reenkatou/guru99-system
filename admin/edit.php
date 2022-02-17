<?php
session_start();

include 'connection.php';

if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php?=sign-up");
    die();
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `basic` WHERE email='{$email}'")) === 0) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
            $sql = "INSERT INTO `basic` (email, otp) VALUES ('{$email}', '{$quantity}')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: edit.php?=new-member-upload");
            }
    }else{
        header("Location: edit.php?=member-aldaa");
    }
}
if (isset($_POST['btn'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `basic` WHERE email='{$email}'")) > 0) {
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
            $sql = "UPDATE `basic` SET otp='$quantity' WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: edit.php?=update-upload");
            }
    }else{
        header("Location: edit.php?=update-aldaa");
    }
}


?>

<!DOCTYPE html>
<html>
<head>
<?php include '..//mn/navbar.php'; ?>
</head>
<body>


<br>
<br>
<br>
<br>
<br>
<form action="" METHOD="POST">
    <label for="quantity">New basic members  </label>
    <input type="email" placeholder="Email" name="email" required>
    <input type="number" id="quantity" placeholder="Status" name="quantity" min="0" max="1" required>
    <button name="submit" class="btn">New users</button>
</form>
<br>
<form action="" METHOD="POST">
    <label for="quantity">update  </label>
    <input type="email" placeholder="Email" name="email" required>
    <input type="number" id="quantity" placeholder="Status" name="quantity" min="0" max="1" required>
    <button name="btn" class="btn">Update</button>
</form>


</body>
</html>