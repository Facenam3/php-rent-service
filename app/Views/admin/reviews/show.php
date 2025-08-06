<div class="py-12 px-12">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6 mt-2">
        <h1 class="p-4 text-xl text-orange-500 font-medium">Review Details</h1>

        <div class="flex flex-col-reverse gap-6 lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="mb-4">
                    <label class="block text-gray-100 text-sm font-bold mb-2">Rating:</label>
                    <div class="text-gray-700 bg-gray-100 dark:bg-gray-100 p-3 rounded shadow">
                        <?= str_repeat('⭐', $review->rating) ?>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-100 text-sm font-bold mb-2">Comment:</label>
                    <div class="text-gray-700 bg-gray-700 dark:bg-gray-100 p-3 rounded shadow">
                        <?= nl2br(htmlspecialchars($review->comment)) ?>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <form action="/admin/reviews/<?= $review->id ?>/status" method="POST">
                        <?= csrf_token() ?>
                        <input type="hidden" name="status" value="approved">
                        <button type="submit"
                            class="focus:outline-none text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-lg px-5 py-2 dark:focus:ring-green-800">
                            Approve
                        </button>
                    </form>
                    <form action="/admin/reviews/<?= $review->id ?>/status" method="POST">
                        <?= csrf_token() ?>
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit"
                            class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-lg px-5 py-2 dark:focus:ring-red-800">
                            Reject
                        </button>
                    </form>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="mb-4">
                    <label class="block text-gray-100 text-sm font-bold mb-2">User:</label>
                    <div class="text-gray-700 bg-gray-100 dark:bg-gray-100 p-3 rounded shadow">
                        <?= $review->user_name ?> (ID: <?= $review->user_id ?>)
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-100 text-sm font-bold mb-2">Car:</label>
                    <div class="text-gray-700 bg-gray-100 dark:bg-gray-100 p-3 rounded shadow">
                        <?= $review->car_name . ' ' . $review->car_model ?> (ID: <?= $review->car_id ?>)
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-100 text-sm font-bold mb-2">Status:</label>
                    <div class="inline-block text-sm font-medium px-3 py-1 rounded-full
                        <?= $review->status === 'approved' ? 'bg-green-100 text-green-700' : ($review->status === 'rejected' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') ?>">
                        <?= ucfirst($review->status) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>