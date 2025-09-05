<?php include 'register_handler.php'; ?>

<?php if ($error): ?>
    <div class="error-message"><?php echo $error; ?></div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="success-message"><?php echo $success; ?></div>
<?php endif; ?>

<form action="" method="post" class="register-container">
    <h2>Sign Up</h2>
    <div class="register-group">
        <label class="register-label" for="username">Username:</label>
        <input class="register-input" type="text" name="username" id="username"
            value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" required>
    </div>
    <div class="register-group">
        <label class="register-label" for="email">Email:</label>
        <input class="register-input" type="email" name="email" id="email"
            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
    </div>
    <div class="register-group">
        <label class="register-label" for="password">Password:</label>
        <input class="register-input" type="password" name="password" id="password" required>
    </div>
    <div class="register-group">
        <label class="register-label" for="password2">Password Again:</label>
        <input class="register-input" type="password" name="password2" id="password2" required>
    </div>
    <button class="register-btn" type="submit">Register</button>
    <div class="register-footer">Already a member? <a href="<?php echo $basePath; ?>/login">Login here</a></div>
</form>