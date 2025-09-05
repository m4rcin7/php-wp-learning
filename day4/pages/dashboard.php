<?php
// Check if user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: $basePath/login");
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: $basePath/login");
    exit();
}
?>

<div class="dashboard-container">
    <div class="dashboard-header">
        <h1>Welcome to Dashboard</h1>
        <div class="user-info">
            <span>Hello, <?php echo $_SESSION['username']; ?>!</span>
            <a href="?logout=1" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="dashboard-content">
        <div class="user-card">
            <h3>Your Profile</h3>
            <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p><strong>Role:</strong> <?php echo ucfirst($_SESSION['role']); ?></p>
        </div>

        <?php if ($_SESSION['role'] == 'admin'): ?>
        <div class="admin-section">
            <h3>Admin Panel</h3>
            <p>You have admin access!</p>
            <div class="admin-buttons">
                <button class="admin-btn">Manage Users</button>
                <button class="admin-btn">Site Settings</button>
                <button class="admin-btn">View Reports</button>
            </div>
        </div>
        <?php endif; ?>

        <div class="actions">
            <h3>Quick Actions</h3>
            <a href="<?php echo $basePath; ?>/blog" class="action-link">View Blog</a>
            <a href="<?php echo $basePath; ?>/about" class="action-link">About Page</a>
            <a href="<?php echo $basePath; ?>/contact" class="action-link">Contact</a>
        </div>
    </div>
</div>