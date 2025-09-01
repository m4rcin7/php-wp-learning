<form action="register.php" method="post" class="register-container">
    <h2>Sign Up</h2>
    <div class="register-group">
        <label class="register-label" for="username">Username:</label>
        <input class="register-input" type="text" name="username" id="username">
    </div>
    <div class="register-group">
        <label class="register-label" for="email">Email:</label>
        <input class="register-input" type="email" name="email" id="email">
    </div>
    <div class="register-group">
        <label class="register-label" for="password">Password:</label>
        <input class="register-input" type="password" name="password" id="password">
    </div>
    <div class="register-group">
        <label class="register-label" for="password2">Password Again:</label>
        <input class="register-input" type="password" name="password2" id="password2">
    </div>
    <button class="register-btn" type="submit">Register</button>
    <div class="register-footer">Already a member? <a href="<?php echo $basePath; ?>/login">Login here</a></div>
</form>