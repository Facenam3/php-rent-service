<div class="m-5 p-10">
    <h1 class="text-2xl font-bold text-center">🎉 Thank you for your reservation!</h1>
    <p class="text-center mt-2">
        We’ve sent a confirmation email to <strong><?= htmlspecialchars($reservation->email) ?></strong>.
    </p>

    <div class="mt-6 p-4 bg-gray-800 rounded shadow text-white max-w-md mx-auto">
        <p>🚗 Car: <?= $reservation->car()->brand ?> <?= $reservation->car()->model ?></p>
        <p>📅 Pickup: <?= $reservation->start_date ?></p>
        <p>📅 Drop-off: <?= $reservation->end_date ?></p>
        <p>💰 Total Price: €<?= $reservation->total_price ?></p>
    </div>

    <div class="text-center mt-6">
        <a href="/" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">Back to Homepage</a>
    </div>

</div>