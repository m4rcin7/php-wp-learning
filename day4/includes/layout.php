<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/header.css">
    <?php if ($page !== '404'): ?>
        <link rel="stylesheet" href="./css/<?php echo $page; ?>.css">
    <?php endif; ?>
</head>

<body>
    <?php include './includes/header.php'; ?>

    <main class="container">
        <?php
        $pageFile = "./pages/{$page}.php";
        if (file_exists($pageFile)) {
            include $pageFile;
        } else {
            include "./pages/404.php";
        }
        ?>
    </main>

    <?php include './includes/footer.php'; ?>
</body>

</html>