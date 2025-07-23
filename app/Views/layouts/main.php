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
        <main class="min-h-screen">
            <?= $content ?>
        </main>    
    <?php include __DIR__ . "/../partials/footer.php" ;?>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="/script.js"></script>
<script src="/reservation.js"></script>
</body>
</html>