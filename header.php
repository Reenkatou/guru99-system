<?php
include 'connection.php';
if (!isset($_SESSION['SESSION_EMAIL'])) { ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/guru99/content/css/style.css">
    
</head>
<body>
    <header>
        <a href="index.php" class="logo">GURU99</a>
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">menu</label>
        <nav class="navbar">
            <ul>
                <li><a href="/guru99/">Home</a></li>
                <li><a href="#">Lesson</a></li>
                <li><a href="#">News</a></li>
                <li><a href="sign-up.php">Sign up</a></li>
                <li><a href="sign-in.php">Sign in</a></li>
            </ul>
        </nav>
    </header>

</body>
</html>
<?php
}else{ ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/guru99/content/css/style.css">
    
</head>
<body>
    <header>
        <a href="index.php" class="logo">GURU99</a>
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">menu</label>
        <nav class="navbar">
            <ul>
                <li><a href="/guru99/">Home</a></li>
                <li><a href="#">Lesson</a></li>
                <li><a href="/guru99/mn">Users</a></li>
                <li><a href="log-out.php">logout</a></li>
            </ul>
        </nav>
    </header>

</body>
</html>
<?php
}
?>