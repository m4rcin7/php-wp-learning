<?php
    // register.php - Registration Handler
    require_once 'connection.php';
    session_start();

    $errors = [];
    $success = '';

    // Debug: Check if form was submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Debug: Show what was received
        // Uncomment the next line for debugging
        // echo "<pre>POST Data: " . print_r($_POST, true) . "</pre>";
        
        // Get and sanitize input data
        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';

        // Validation
        if (empty($username)) {
            $errors[] = "Username is required";
        } elseif (strlen($username) < 3) {
            $errors[] = "Username must be at least 3 characters";
        }

        if (empty($email)) {
            $errors[] = "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }

        if (empty($password)) {
            $errors[] = "Password is required";
        } elseif (strlen($password) < 6) {
            $errors[] = "Password must be at least 6 characters";
        }

        if ($password !== $password2) {
            $errors[] = "Passwords do not match";
        }

        // Check if username or email already exists
        if (empty($errors)) {
            try {
                $stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
                if (!$stmt) {
                    throw new Exception("Prepare failed: " . $conn->error);
                }
                
                $stmt->bind_param("ss", $username, $email);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $errors[] = "Username or email already exists";
                }
                $stmt->close();
            } catch (Exception $e) {
                $errors[] = "Database error: " . $e->getMessage();
            }
        }

        // Insert new user if no errors
        if (empty($errors)) {
            try {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Fixed: Only store hashed password once, remove password_again from INSERT
                $stmt = $conn->prepare("INSERT INTO users (username, email, password, created_at) VALUES (?, ?, ?, NOW())");
                if (!$stmt) {
                    throw new Exception("Prepare failed: " . $conn->error);
                }

                $stmt->bind_param("sss", $username, $email, $hashed_password);

                if ($stmt->execute()) {
                    $success = "Registration successful! You can now login.";
                    
                    // Optional: Auto-login the user
                    $_SESSION['user_id'] = $conn->insert_id;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;

                    // Clear form data on success
                    $_POST = [];
                    
                    // Redirect after showing success message
                    echo "<script>setTimeout(function(){ window.location.href = 'dashboard.php'; }, 2000);</script>";
                } else {
                    throw new Exception("Execute failed: " . $stmt->error);
                }
                $stmt->close();
            } catch (Exception $e) {
                $errors[] = "Registration failed: " . $e->getMessage();
            }
        }
    } else {
        // Debug: Check if this is a GET request (first load)
        // echo "Form not submitted yet (GET request)";
    }

    // Get basePath if it exists
    $basePath = isset($basePath) ? $basePath : '';
?>


<?php if (!empty($errors)): ?>
    <div class="error-messages" style="color: red; margin-bottom: 20px;">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($success): ?>
    <div class="success-message" style="color: green; margin-bottom: 20px;">
        <?php echo htmlspecialchars($success); ?>
        <br><small>Redirecting to login page...</small>
    </div>
<?php endif; ?>

<form action="register.php" method="post" class="register-container">
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