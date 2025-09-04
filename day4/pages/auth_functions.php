<?php
    // auth_functions.php - Authentication Helper Functions
    // Include this file in any page that needs authentication

    function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    function requireLogin()
    {
        if (!isLoggedIn()) {
            header("Location: login.php");
            exit();
        }
    }

    function getCurrentUser($conn)
    {
        if (!isLoggedIn()) {
            return null;
        }

        $stmt = $conn->prepare("SELECT id, username, email, created_at FROM users WHERE id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        return $user;
    }

    function getUserById($conn, $user_id)
    {
        $stmt = $conn->prepare("SELECT id, username, email, created_at FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        return $user;
    }

    function logoutUser()
    {
        session_destroy();
        header("Location: login.php");
        exit();
    }

    // Example usage:
    // To protect a page, add this at the top:
    /*
    require_once 'connection.php';
    require_once 'auth_functions.php';
    session_start();
    requireLogin();
    $currentUser = getCurrentUser($conn);
    */
?>