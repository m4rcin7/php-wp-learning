<?php
    // pages/register_handler.php
    require_once '../connection.php';
    $basePath = '';
    $error = '';
    $success = '';

    if ($_POST) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        // Simple validation
        if (empty($username) || empty($email) || empty($password) || empty($password2)) {
            $error = 'Please fill in all fields';
        } elseif ($password !== $password2) {
            $error = 'Passwords do not match';
        } elseif (strlen($password) < 6) {
            $error = 'Password must be at least 6 characters';
        } else {
            // Check if username or email already exists
            $check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
            $result = $conn->query($check_query);

            if ($result->num_rows > 0) {
                $error = 'Username or email already exists';
            } else {
                // Hash password
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                // Insert new user
                $insert_query = "INSERT INTO users (username, email, password, role, created_at) 
                                VALUES ('$username', '$email', '$hashed_password', 'user', NOW())";

                if ($conn->query($insert_query)) {
                    $success = 'Registration successful! You can now login.';
                } else {
                    $error = 'Registration failed. Please try again.';
                }
            }
        }
    }
?>