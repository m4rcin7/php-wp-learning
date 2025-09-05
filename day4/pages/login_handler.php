<?php
// pages/login_handler.php
session_start();
require_once 'connection.php';

$error = '';

if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Simple validation
    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        // Check if user exists
        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Check password
            if (password_verify($password, $user['password'])) {
                // Login successful - set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                
                // Update last login
                $update_query = "UPDATE users SET last_login = NOW() WHERE id = " . $user['id'];
                $conn->query($update_query);
                
                // Redirect to dashboard
                header("Location: $basePath/dashboard");
                exit();
            } else {
                $error = 'Wrong password!';
            }
        } else {
            $error = 'Email not found!';
        }
    }
}
?>