<?php
    // pages/logout.php
    session_start();
    session_destroy();
    header("Location: $basePath/login");
    exit();
?>