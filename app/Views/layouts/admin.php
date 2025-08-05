<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://kit.fontawesome.com/8c0d052db3.js" crossorigin="anonymous"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <link href="/styles.css" rel="stylesheet">
    </head>
    <body>
        <?php include __DIR__ . "/../partials/navbar.php" ; ?>
            <div class="min-h-screen">
                <button id="sidebar-toggle" class="lg:hidden p-3 m-3 text-white bg-orange-600 rounded-md">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="flex">
                    <?php include __DIR__ . "/../partials/sidebar.php" ;?>
                    <main class="flex-1 min-h-screen">
                        <?= $content ?>
                    </main>             
            </div>    
        <?php include __DIR__ . "/../partials/footer.php" ;?>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/js/admin.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/reservation.js"></script>
    </body>
</html>