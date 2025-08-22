<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="./css/home.css">
</head>

<body>
    <?php
    include './includes/header.php';
    renderHeader('home');
    ?>

    <section class="hero">
        <h1>Welcome Home</h1>
        <p>Discover a modern, clean experience designed with simplicity and elegance in mind. Everything you need, nothing you don't.</p>
        <a href="#" class="cta-button">Get Started</a>
    </section>

    <div class="features">
        <div class="feature-card">
            <div class="feature-icon">⚡</div>
            <h3>Fast & Efficient</h3>
            <p>Built with performance in mind, delivering lightning-fast experiences across all devices.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🎨</div>
            <h3>Modern Design</h3>
            <p>Clean, contemporary aesthetics that provide an intuitive and enjoyable user experience.</p>
        </div>
        <div class="feature-card">
            <div class="feature-icon">📱</div>
            <h3>Fully Responsive</h3>
            <p>Perfectly optimized for desktop, tablet, and mobile devices with seamless responsiveness.</p>
        </div>
    </div>
</body>

</html>