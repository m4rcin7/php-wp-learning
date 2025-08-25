<?php
$request = $_SERVER["REQUEST_URI"];

$basePath = "/php-wp-learning/day4";
$path = str_replace($basePath, "", $request);

$path = strtok($path, '?');

$path = trim($path, '/');

switch ($path) {
    case '':
    case 'home':
        if (file_exists('./pages/home.php')) {
            include './pages/home.php';
        } else {
            echo "home.php file not found!";
        }
        break;

    case 'about':
        if (file_exists('./pages/about.php')) {
            include './pages/about.php';
        } else {
            echo "about.php file not found!";
        }
        break;

    case 'blog':
        if (file_exists('./pages/blog.php')) {
            include './pages/blog.php';
        } else {
            echo "blog.php file not found!";
        }
        break;

    case 'contact':
        if (file_exists('./pages/contact.php')) {
            include './pages/contact.php';
        } else {
            echo "contact.php file not found!";
        }
        break;

    case 'login':
        if (file_exists('./pages/login.php')) {
            include './pages/login.php';
        } else {
            echo "login.php file not found!";
        }
        break;

    default:
        http_response_code(404);
        if (file_exists('./404.php')) {
            include './404.php';
        } else {
            echo "<h1>404 - Page Not Found</h1>";
            echo "<p>The page '$path' was not found.</p>";
            echo "<a href='$basePath/'>Go Home</a>";
        }
        break;
}
