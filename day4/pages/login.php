<?php include 'login_handler.php'; ?>

<?php if ($error): ?>
    <div class="error-message"><?php echo $error; ?></div>
<?php endif; ?>

<form action="" method="post" class="login-container">
    <h2>Login</h2>
    <div class="login-group">
        <label class="login-label" for="email">Email:</label>
        <input class="login-input" type="email" id="email" name="email" placeholder="Enter your email" required>
    </div>
    <div class="login-group">
        <label class="login-label" for="password">Password:</label>
        <input class="login-input" type="password" id="password" name="password" placeholder="Enter your password" required>
    </div>
    <button type="submit" class="login-btn">Login</button>
    <div class="login-footer">
        <a href="<?php echo $basePath; ?>/register">Don't have an account? Register</a>
    </div>
</form>