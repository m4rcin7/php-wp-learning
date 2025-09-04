<?php
    // dashboard.php - Example of a protected page
    require_once 'connection.php';
    require_once 'auth_functions.php';
    session_start();

    // Protect this page - redirect to login if not logged in
    requireLogin();

    // Get current user data
    $currentUser = getCurrentUser($conn);
?>


<div class="dashboard-container">
    <h1>Welcome to Dashboard</h1>

    <?php if ($currentUser): ?>
        <div class="user-info">
            <h2>User Information</h2>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($currentUser['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($currentUser['email']); ?></p>
            <p><strong>Member since:</strong> <?php echo htmlspecialchars($currentUser['created_at']); ?></p>
        </div>
    <?php endif; ?>

    <div class="dashboard-actions">
        <a href="profile.php">Edit Profile</a> |
        <a href="logout.php">Logout</a>
    </div>

    <div class="dashboard-content">
        <h2>Dashboard Content</h2>
        <p>This is a protected page that only logged-in users can see.</p>
        <div class="admin-btn-container">
            <button class="admin-btn">Add post</button>
            <button class="admin-btn">View all posts</button>
            <button class="admin-btn">Add User</button>
            <button class="admin-btn">View all sers</button>
        </div>
    </div>
</div>