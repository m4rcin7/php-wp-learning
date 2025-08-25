<?php

function renderHeader($currentPage = '')
{
    echo '<link rel="stylesheet" href="./css/header.css">';

?>
    <header>
        <div class="container">
            <div>
                <img src="https://cdn.pixabay.com/photo/2015/12/04/07/55/logodesign-1076200_1280.png" alt="logo-agency">
            </div>
            <nav>
                <a href="./home" <?php echo ($currentPage === 'home') ? 'class="active"' : ''; ?>>Home</a>
                <a href="./about" <?php echo ($currentPage === 'about') ? 'class="active"' : ''; ?>>About us</a>
                <a href="./blog" <?php echo ($currentPage === 'blog') ? 'class="active"' : ''; ?>>Blog</a>
                <a href="./contact" <?php echo ($currentPage === 'contact') ? 'class="active"' : ''; ?>>Contact</a>
                <a href="./login" <?php echo ($currentPage === 'login') ? 'class="active"' : ''; ?>>Log in</a>
            </nav>
        </div>
    </header>
<?php
}
?>