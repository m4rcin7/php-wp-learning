<?php
include '../config/connection.php';
include '../includes/header.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        header("Location: list-user.php");
        exit;
    } else {
        echo "<p class='error'>Please provide valid data.</p>";
    }
}
?>

<h2>Add New User</h2>
<form method="POST" onsubmit="return validateForm(this)">
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <button type="submit">Save</button>
</form>

<?php include '../includes/footer.php'; ?>