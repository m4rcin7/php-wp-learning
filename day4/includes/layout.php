<?php
// Cache-busting timestamps
$globalVersion = file_exists('./css/global.css') ? filemtime('./css/global.css') : time();
$headerVersion = file_exists('./css/header.css') ? filemtime('./css/header.css') : time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo $basePath; ?>/css/global.css?v=<?php echo $globalVersion; ?>">
    <link rel="stylesheet" href="<?php echo $basePath; ?>/css/header.css?v=<?php echo $headerVersion; ?>">
    <link rel="stylesheet" href="<?php echo $basePath; ?>/css/footer.css?v=<?php echo $headerVersion; ?>">
    <?php if ($page !== '404'): ?>
        <?php $pageVersion = file_exists("./css/{$page}.css") ? filemtime("./css/{$page}.css") : time(); ?>
        <link rel="stylesheet" href="<?php echo $basePath; ?>/css/<?php echo $page; ?>.css?v=<?php echo $pageVersion; ?>">
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