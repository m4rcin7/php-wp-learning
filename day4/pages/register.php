<form action="register.php" method="post">
    <h1>Sign Up</h1>
    <div>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
        <label for="password2">Password Again:</label>
        <input type="password" name="password2" id="password2">
    </div>
    <button type="submit">Register</button>
    <footer>Already a member? <a href="<?php echo $basePath; ?>/login">Login here</a></footer>
</form>