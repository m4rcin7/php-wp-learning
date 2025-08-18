<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="login.php" method="post">
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter your username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter your password" name="psw" required>

            <button type="submit">Login</button>

            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <a href="index.php"><button type="button" class="cancelbtn">Cancel</button></a>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>
</body>

</html>