<div class="bg-gray-50 p-10">

    <div class="flex flex-col lg:flex-row max-w-8xl mx-auto bg-white shadow rounded-lg overflow-hidden">
    
        <div class="w-full lg:w-1/2 p-6">
            <img 
                src="../<?= htmlspecialchars($car->image_path) ?>" 
                alt="<?= htmlspecialchars($car->brand . ' ' . $car->model) ?>" 
                class="w-full h-64 lg:h-full object-cover"
            >
        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-center p-6">
            <h1 class="text-3xl font-bold text-gray-800">
                <?= htmlspecialchars($car->brand) ?>
            </h1>
            <h2 class="text-xl font-semibold text-gray-600">
                <?= htmlspecialchars($car->model) ?>
            </h2>
            <p class="mt-2 text-gray-500 italic">
                <?= ucfirst(htmlspecialchars($car->type)) ?>
            </p>

            <div class="mt-6">
                <?php if (is_object($car_specifications)) : ?>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Car Specifications</h3>
                <ul class="space-y-2 text-gray-700">
                    <li>
                        <i class="fas fa-gas-pump text-gray-500"></i>
                        <strong>Fuel consumption:</strong> <?= nl2br(htmlspecialchars($car_specifications->fuel_consumption)) ?>
                    </li>
                    <li>
                        <i class="fas fa-cogs text-gray-500"></i>
                        <strong>Transmission:</strong> <?= nl2br(htmlspecialchars($car_specifications->transmission)) ?>
                    </li>
                    <li>
                         <i class="fas fa-snowflake text-gray-500"></i>
                        <strong>Air Condition:</strong> <?= nl2br(htmlspecialchars($car_specifications->air_condition)) ?>
                    </li>
                    <li>
                        <i class="fas fa-door-closed text-gray-500"></i>
                        <strong>Doors:</strong> <?= nl2br(htmlspecialchars($car->doors ?? '4')) ?>
                    </li>
                    <li>
                       <i class="fas fa-users text-gray-500"></i>
                        <strong>Passengers:</strong> <?= nl2br(htmlspecialchars($car->max_passengers)) ?>
                    </li>
                </ul>
                <?php else : ?>
                <p class="text-gray-400"><em>No specifications available for this car.</em></p>
                <?php endif; ?>
            </div>

            <div class="mt-6">
                <a href="/reservations" 
                class="inline-block px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600">
                🚗 Reserve Now
                </a>
            </div>
        </div>
  </div>

    <div class="m-5 p-6 rounded-lg">

        <h2 class="text-2xl font-bold text-center mb-4">Customer Reviews</h2>

            <?php if (!empty($reviews)) : ?>
                <div class="space-y-4">
                <?php foreach ($reviews as $review): ?>
                    <div class="bg-white p-4 rounded-lg shadow">
                    <div class="flex justify-between">
                        <p class="font-semibold"><?= htmlspecialchars($review['user_name']) ?></p>
                        <!-- Show stars -->
                        <div class="flex space-x-1">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <svg class="w-4 h-4 <?= $i <= $review['rating'] ? 'text-yellow-400' : 'text-gray-300' ?>" 
                                fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                        <?php endfor; ?>
                        </div>
                    </div>
                    <p class="text-gray-600 mt-2"><?= nl2br(htmlspecialchars($review['comment'])) ?></p>
                    <p class="text-xs text-gray-400 mt-1">Posted on <?= date('d M Y', strtotime($review['created_at'])) ?></p>
                    </div>
                <?php endforeach; ?>
                </div>

            <?php else: ?>
                <p class="text-center text-gray-500">No reviews yet for this car.</p>
            <?php endif; ?>

            <?php if ($user): ?>
                <div class="mt-6">
                <h3 class="text-lg font-semibold mb-2">Leave a Review</h3>
                <form action="/reviews/store" method="POST" class="space-y-3">
                    <input type="hidden" name="car_id" value="<?= $car->id ?>">
                    <input type="hidden" name="user_id" value="<?= $user->id ?>">
                    <label class="block">
                    <span class="text-gray-700">Your Rating</span>
                    <select name="rating" class="w-full border rounded p-2">
                        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                        <option value="4">⭐⭐⭐⭐ Good</option>
                        <option value="3">⭐⭐⭐ Average</option>
                        <option value="2">⭐⭐ Poor</option>
                        <option value="1">⭐ Terrible</option>
                    </select>
                    </label>
                    <textarea name="comment" placeholder="Write your review..." class="w-full border rounded p-2"></textarea>
                    <button class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                    Submit Review
                    </button>
                </form>
                </div>
            <?php else: ?>
                <p class="mt-4 text-center">
                <a href="/login" class="block text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md mb-2">Log in</a> to leave a review.
                </p>
            <?php endif; ?>

    </div>

</div>