<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post">
        <h2>Login To Dashboard</h2>
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter your username" name="username" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter your password" name="password" required>

            <button type="submit">Login</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <a href="./index.php"><button type="button" class="backBtn">Back to Home</button></a>
            <span>No account?<a href="./index.php"><button type="button" class="backBtn"> Register here.</button></a></span>
        </div>
    </form>
</body>

</html>