<div class="py-12 px-12">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6 mt-2">
            <h1 class="p-4 text-xl text-orange-500 font-medium ">Edit Review</h1>
            <a href="/admin/reviews"
                class="block sm:hidden w-full mb-4 inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
                    ← Back to Table
            </a>
                <form action="/admin/reviews/<?= $review->id ?>/update" method="POST" class="w-full mx-auto" id="review-update" data-id="<?= $review->id ?>">
                        <?= csrf_token() ?>
                        <div class="flex flex-col-reverse gap-6 lg:flex-row">
                            <div class="w-full lg:w-1/2">
                                <div class="mb-4">
                                    <label for="rating" class="block text-gray-100 text-sm font-bold mb-2">
                                        Rating:
                                    </label>
                                    <select name="rating" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="" disabled>Select your rating.</option>
                                        <option value="5" <?= $review->rating == 5 ? 'selected' : '' ?>>⭐⭐⭐⭐⭐ Excellent</option>
                                        <option value="4" <?= $review->rating == 4 ? 'selected' : '' ?>>⭐⭐⭐⭐ Good</option>
                                        <option value="3" <?= $review->rating == 3 ? 'selected' : '' ?>>⭐⭐⭐ Average</option>
                                        <option value="2" <?= $review->rating == 2 ? 'selected' : '' ?>>⭐⭐ Poor</option>
                                        <option value="1" <?= $review->rating == 1 ? 'selected' : '' ?>>⭐ Terrible</option>
                                    </select>

                                </div>
                                <div class="mb-4">
                                    <label for="comment" class="block text-gray-100 text-sm font-bold mb-2">
                                        Comment:
                                    </label>
                                    <textarea id="comment" name="comment"
                                        rows="5"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        placeholder="Enter your review comment here."
                                        ><?= $review->comment ?></textarea>   
                                </div>
                                <input type="submit" value="Submit"
                                    class="focus:outline-none text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900">
                            </div>
                            <div class="w-full lg:w-1/2">
                                <div class="mb-4">
                                    <label for="user_id" class="block text-gray-100 text-sm font-bold mb-2">
                                        User id:
                                    </label>
                                    <select name="user_id" id="user_id"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="<?= $review->user_id ?>" selected><?= $review->user_name ?></option>
                                        <?php if($users) :?>
                                            <?php foreach($users as $user) : ?>
                                                <option value="<?= $user->id ?>"><?= $user->first_name ?></option>
                                            <?php endforeach ; ?>
                                        <?php endif ;?>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="car_id" class="block text-gray-100 text-sm font-bold mb-2">
                                        Car id:
                                    </label>
                                    <select name="car_id" id="car_id"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="<?= $review->car_id ?>" selected><?= "$review->car_name $review->car_model" ?></option>
                                        <?php if($cars) : ?>
                                            <?php foreach($cars as $car) :?>
                                                <option value="<?= $car->id ?>"><?= "$car->brand $car->model"?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                </form>
    </div>
</div>