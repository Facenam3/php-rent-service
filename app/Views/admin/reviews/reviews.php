<div class="text-white p-4 sm:p-6 mt-5">
  <div class="py-4 sm:px-4 lg:px-8 max-w-full">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border shadow-md text-black p-4 sm:p-6">

      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h1 class="text-xl sm:text-2xl text-orange-600 font-semibold whitespace-nowrap">
          Reviews
        </h1>
        <a href="/admin/reviews/create"
          class="inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
          Add New Review
        </a>
      </div>

      <form class="mt-6 max-w-full" method="GET" action="">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search Reviews</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            </div>
            <input 
                type="search" 
                name="search" 
                id="default-search" 
                value="<?= htmlspecialchars($search ?? '') ?>"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" 
                placeholder="Search Reviews..." 
                />
                <button 
                type="submit" 
                class="text-white absolute end-2.5 bottom-2.5 bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2"
                >
                Search
            </button>
          </div>
        </form>

      <div class="hidden sm:block overflow-x-auto mt-6 rounded-md border border-gray-300">
        <table class="min-w-full divide-y divide-gray-300 text-sm sm:text-base">
          <thead class="bg-orange-500 text-white uppercase font-medium  text-center">
            <tr>
              <th class="px-2 py-3 lg:px-8 lg:py-3">ID</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">User Name</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Car</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Rating</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3 max-w-xs">Message</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-gray-100 text-gray-900  text-center">
            <?php if($reviews) :?>
              <?php foreach($reviews as $review) :?>
                <tr class="border-b">
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= $review->id ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($review->user_name) ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars("$review->car_name $review->car_model") ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($review->rating) ?>
                    <i class="fa-solid fa-star text-yellow-500"></i>
                  </td>
                    <?php 
                        $maxLength = 30;
                        $comment = $review->comment;
                        $shortComment = mb_strlen($comment) > $maxLength 
                            ? mb_substr($comment, 0, $maxLength) . "..." 
                                : $comment;
                    ?>
                    <td class="px-8 py-2 max-w-xs truncate" title="<?= htmlspecialchars($comment) ?>">
                        <?= htmlspecialchars($shortComment) ?>
                    </td>
                  <td class="px-4 py-2">
                    <div class="flex flex-wrap gap-2 ">
                       <a href="#" class="text-green-600 whitespace-nowrap px-2" data-id="<?= $review->id ?>" id="review-show">
                        <i class="fa-solid fa-pen-to-square"></i> Show
                      </a>
                      <a href="#" class="text-blue-600 whitespace-nowrap px-2" data-id="<?= $review->id ?>" id="review-edit">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                      </a>
                      <form id="review-delete" data-id="<?= $review->id ?>" class="inline">
                        <?= csrf_token() ?>
                        <button type="submit" class="review-delete text-red-600 whitespace-nowrap">
                          <i class="fa-solid fa-trash-can"></i> Delete
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <div class="sm:hidden mt-6 space-y-4">
        <?php if($reviews) :?>
            <?php foreach($reviews as $review) :?>
            <div class="bg-gray-100 dark:bg-gray-300 p-4 rounded-md shadow">
                <div class="flex justify-between items-center mb-2">
                <div class="font-semibold text-lg text-orange-600">Review #<?= $review->id ?></div>
                <div class="flex gap-3">
                    <a href="#" class="text-green-600 whitespace-nowrap px-2" data-id="<?= $review->id ?>" id="review-show">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="#" class="text-blue-600" data-id="<?= $review->id ?>" id="review-edit">
                    <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form id="review-delete" data-id="<?= $review->id ?>">
                    <?= csrf_token() ?>
                    <button type="submit" class="review-delete text-red-600">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                    </form>
                </div>
                </div>
                <div><strong>User: </strong> <?= htmlspecialchars($review->user_name) ?></div>
                <div><strong>Car: </strong> <?= htmlspecialchars("$review->car_name $review->car_model") ?></div>
                <div><strong>Rating: </strong><?= htmlspecialchars($review->rating) ?>
                    <i class="fa-solid fa-star text-yellow-500"></i></div>
                <div class="mt-2 whitespace-pre-wrap"><?= htmlspecialchars($review->comment) ?></div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
                  
    </div>
    <?= partial('_pagination', ['currentPage' => $currentPage, 'totalPages' => $totalPages]) ?>
  </div>
</div>
