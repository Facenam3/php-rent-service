<div class="text-white p-4 sm:p-6 mt-5">
    <div class="py-4 sm:px-4 lg:px-8">
        <div class="w-full bg-white dark:bg-gray-800 rounded-md border shadow-md text-black p-4 sm:p-6">

            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <h1 class="text-xl sm:text-2xl text-orange-600 font-semibold">Locations</h1>
                <a href="/admin/locations/create"
                   class="inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3">
                    Add New Location
                </a>
            </div>
            <form method="GET" action="#" class="mt-6 bg-gray-200 p-4 rounded-md flex flex-col sm:flex-row gap-4 sm:items-center">
                <input type="text" name="search" class="flex-1 rounded-md p-2 text-black" placeholder="Search locations..." value="">
                <button type="submit"
                        class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-md text-sm px-4 py-2 sm:text-base sm:px-6 sm:py-3">
                    Search
                </button>
            </form>
            <div class="overflow-x-auto mt-6 rounded-md border border-gray-300">
                <table class="min-w-full divide-y divide-gray-300 text-sm sm:text-base">
                    <thead class="bg-orange-500 text-white uppercase font-medium">
                        <tr>
                            <th class="px-8 py-3 text-left">ID</th>
                            <th class="px-8 py-3 text-left">Name</th>
                            <th class="px-8 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 text-gray-900">
                        <?php if($locations) :?>
                            <?php foreach($locations as $location) :?>
                                <tr class="border-b">
                                    <td class="px-8 py-2"><?= $location->id ?></td>
                                    <td class="px-8 py-2"><?= htmlspecialchars($location->name) ?></td>
                                    <td class="px-8 py-2">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="#" class="text-blue-600" data-id="<?= $location->id ?>" id="location-edit">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </a>
                                            <form id="location-delete" data-id="<?= $location->id ?>" class="inline">
                                                <?= csrf_token() ?>
                                                <button type="submit" class="location-delete text-red-600">
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

        </div>
    </div>
</div>