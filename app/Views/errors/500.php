<div>
    <h1>Oops! Something went wrong!</h1>
    <p><?= htmlspecialchars($errorMessage) ?></p>
</div>

<?php if($isDebug) : ?>
    <h2>Stack Trace :</h2>
    <pre><?= htmlspecialchars($trace) ?></pre>
<?php endif; ?>

<p>
    <a href="/">Return to homepage</a>
</p>