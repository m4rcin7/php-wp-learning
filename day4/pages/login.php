<?php include 'login_handler.php'; ?>

<form action="login.php" method="post" class="login-container">
    <h2>Login</h2>
    <div class="login-group">
        <label class="login-label" for="email">Email:</label>
        <input class="login-input" type="email" id="email" name="email" placeholder="Enter you email">
    </div>
    <div class="login-group">
        <label class="login-label" for="password">Password:</label>
        <input class="login-input" type="password" id="password" name="password" placeholder="Enter you password">
    </div>
    <button type="submit" class="login-btn">Login</button>
    <div class="login-footer">
        <a href="<?php echo $basePath; ?>/register">Register</a>
    </div>
</form>