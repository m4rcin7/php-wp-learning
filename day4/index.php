<?php
// Simple PHP Router
$basePath = "/php-wp-learning/day4";

// Get current path
$request = $_SERVER["REQUEST_URI"];
$path = str_replace($basePath, "", $request);
$path = strtok($path, '?'); // Remove query parameters  
$path = trim($path, '/');

// Debug: uncomment this line to see what path is being detected
// echo "Debug - Current path: '$path'<br>";

// Set default page to home if empty
if (empty($path)) {
    $path = 'home';
}

// Define valid pages
$validPages = ['home', 'about', 'blog', 'contact', 'login', 'register', 'dashboard'];

// Check if page exists
if (in_array($path, $validPages)) {
    $page = $path;
    $title = ucfirst($path);
} else {
    // 404 page
    http_response_code(404);
    $page = '404';
    $title = '404 - Page Not Found';
}

// Set current page for navigation
$currentPage = $page;

// Load the layout
include './includes/layout.php';
?>