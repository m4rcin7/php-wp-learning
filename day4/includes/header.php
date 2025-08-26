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
    <div class="container">
        <div class="logo">
            <a href="<?php echo $basePath; ?>/">
                <img src="https://cdn.pixabay.com/photo/2015/12/04/07/55/logodesign-1076200_1280.png" alt="Logo">
            </a>
        </div>
        <nav>
            <?php foreach ($navItems as $pageKey => $pageLabel): ?>
                <a href="<?php echo $basePath; ?>/<?php echo ($pageKey === 'home') ? '' : $pageKey; ?>" 
                   <?php echo ($currentPage === $pageKey || ($pageKey === 'home' && $currentPage === 'home')) ? 'class="active"' : ''; ?>>
                    <?php echo $pageLabel; ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>