<?php
// Navigation items
$navItems = [
    'home' => 'Home',
    'about' => 'About',
    'blog' => 'Blog',
    'contact' => 'Contact',
    'login' => 'Login'
];
?>

<header>
    <div class="header-container">
        <div class="logo-container">
            <a href="<?php echo $basePath; ?>/">
                <img src="https://cdn.pixabay.com/photo/2015/12/04/07/55/logodesign-1076200_1280.png" alt="Logo">
            </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
            <?php foreach ($navItems as $pageKey => $pageLabel): ?>
                <a href="<?php echo $basePath; ?>/<?php echo ($pageKey === 'home') ? '' : $pageKey; ?>"
                    <?php echo ($currentPage === $pageKey || ($pageKey === 'home' && $currentPage === 'home')) ? 'class="active"' : ''; ?>>
                    <?php echo $pageLabel; ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <!-- Burger Menu Button -->
        <div class="burger-menu" id="burgerMenu" aria-label="Toggle navigation menu" role="button" tabindex="0">
            <div class="burger-line"></div>
            <div class="burger-line"></div>
            <div class="burger-line"></div>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobileMenuOverlay" aria-hidden="true"></div>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu" role="navigation" aria-label="Mobile navigation menu">
    <div class="mobile-menu-header">
        <img src="https://cdn.pixabay.com/photo/2015/12/04/07/55/logodesign-1076200_1280.png" alt="Logo" style="height: 32px;">
        <button class="mobile-menu-close" id="mobileMenuClose" aria-label="Close navigation menu">&times;</button>
    </div>
    <nav class="mobile-nav">
        <?php foreach ($navItems as $pageKey => $pageLabel): ?>
            <a href="<?php echo $basePath; ?>/<?php echo ($pageKey === 'home') ? '' : $pageKey; ?>"
                <?php echo ($currentPage === $pageKey || ($pageKey === 'home' && $currentPage === 'home')) ? 'class="active"' : ''; ?>>
                <?php echo $pageLabel; ?>
            </a>
        <?php endforeach; ?>
    </nav>
</div>

<!-- Load Mobile Menu Script -->
<script src="<?php echo $basePath; ?>/scripts/menu.js"></script>