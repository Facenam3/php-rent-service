<article>
    <h1><?= htmlspecialchars($car->brand) ?></h1>
    <h2><?= htmlspecialchars($car->model) ?></h2>
    <p><?= htmlspecialchars($car->type) ?></p>

    <?php if (is_object($car_specifications)) : ?>
    <h2>Car Specification</h2>
    <p>Fuel type: <?= nl2br(htmlspecialchars($car_specifications->fuel_type)) ?></p>
    <p>Transmission: <?= nl2br(htmlspecialchars($car_specifications->transmission)) ?></p>
    <p>Air Condition: <?= nl2br(htmlspecialchars($car_specifications->air_condition)) ?> </p>
    <p>Seats: <?= nl2br(htmlspecialchars($car_specifications->seats)) ?> </p>
<?php else : ?>
    <p><em>No specifications available for this car.</em></p>
<?php endif; ?>
</article>

<section>
    <h2>Reviews</h2>
    <?php foreach($reviews as $review) : ?>
        <div>
            <p><?= nl2br(htmlspecialchars($review->rating)) ?></p>
            <p><?= nl2br(htmlspecialchars($review->comment)) ?></p>
            <p><?= nl2br(htmlspecialchars($review->created_at)) ?></p>
        </div>
    <?php endforeach; ?>
</section>