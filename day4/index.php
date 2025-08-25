<?php

$request = $_SERVER["REQUEST_URI"];

switch ($request) {
    case "":
    case "/":
        require "./home.php";
        break;
    case "/about":
        require "./about.php";
    case "/blog":
        require "./blog.php";
    case "/contact":
        require "./contact.php";
    case "/login":
        require "./login.php";
    default:
        http_response_code(404);
        require "./404.php";
        break;
}
