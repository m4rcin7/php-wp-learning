<?php
include 'connection.php';
?>

<div class="login-container">
    <form class="login-form">
        <h2>Login</h2>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter you email">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter you password">
        </div>
        <button type="submit" class="btn-login">Login</button>
        <div class="login-footer">
            <a href="#">Register</a>
            <a href="./home.php">Back to homepage.</a>
        </div>
    </form>
</div>