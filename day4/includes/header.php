<?php
$basePath = '/php-wp-learning/day4';
$currentUrl = $_SERVER["REQUEST_URI"];
?>

<header>
    <div class="container">
        <div class="logo">
            <a href="<?php echo $basePath; ?>/">
                <img src="https://cdn.pixabay.com/photo/2015/12/04/07/55/logodesign-1076200_1280.png" alt="Logo">
            </a>
        </div>
        <nav>
            <a href="<?php echo $basePath; ?>/" <?php echo (strpos($currentUrl, $basePath . '/') === false || $currentUrl === $basePath . '/') ? 'class="active"' : ''; ?>>Home</a>
            <a href="<?php echo $basePath; ?>/about" <?php echo (strpos($currentUrl, '/about.php') !== false) ? 'class="active"' : ''; ?>>About Us</a>
            <a href="<?php echo $basePath; ?>/blog" <?php echo (strpos($currentUrl, '/blog') !== false) ? 'class="active"' : ''; ?>>Blog</a>
            <a href="<?php echo $basePath; ?>/contact" <?php echo (strpos($currentUrl, '/contact') !== false) ? 'class="active"' : ''; ?>>Contact</a>
            <a href="<?php echo $basePath; ?>/login" <?php echo (strpos($currentUrl, '/login') !== false) ? 'class="active"' : ''; ?>>Login</a>
        </nav>
    </div>
</header>