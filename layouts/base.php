<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?php echo $pageTitle ?? 'Kronik-X Health'; ?></title>
    <?php require __DIR__ . '/head.php'; ?>
</head>

<body>
    <!-- Preloader -->
    <?php require __DIR__ . '/preloader.php'; ?>

    <!-- Navbar -->
    <?php require __DIR__ . '/header.php'; ?>

    <main>
        <?php echo $content ?? ''; ?>
    </main>

    <!-- Footer -->
    <?php require __DIR__ . '/footer.php'; ?>

    <!-- Scroll top -->
    <div class="btn-scroll-top">
        <svg class="progress-square svg-content" width="100%" height="100%" viewBox="0 0 40 40">
            <path d="M8 1H32C35.866 1 39 4.13401 39 8V32C39 35.866 35.866 39 32 39H8C4.13401 39 1 35.866 1 32V8C1 4.13401 4.13401 1 8 1Z" />
        </svg>
    </div>

    <?php require __DIR__ . '/scripts.php'; ?>
</body>

</html>
