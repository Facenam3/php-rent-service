<div class=" text-white p-6">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6">
            <div class="flex justify-between items-center">
                <h1 class="sm:text-md lg:text-2xl text-orange-600 font-medium">Locations</h1>
                <a href="/admin/locations/create" class="p-3 focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 dark:focus:ring-orange-800">
                    Add New Location
                </a>
            </div>

            <div class="body border border-gray-400 rounded-md mt-6">
                <form method="GET" action="#" class="p-4 bg-gray-200 rounded-md flex flex-wrap gap-2 flex justify-between">
                    <input type="text" name="search" class="rounded-md p-2 text-black" placeholder="Search locations..." value="">
                    <button type="submit"
                        class="p-3 focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 dark:focus:ring-orange-800">
                        Search
                    </button>
                </form>
                <table class="w-full bg-gray-100 text-lg text-gray-900 rounded-md table-fixed">
                    <thead class="text-md text-white capitalize bg-orange-500 font-medium">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Name</th>
                            <th></th>
                            <th></th>
                            <th class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($locations) :?>
                            <?php foreach($locations as $location) :?>
                                <tr class="border-b-2">
                                    <td class="px-6 py-2 text-center"><?= $location->id ?></td>
                                    <td class="px-6 py-2 text-center"><?= htmlspecialchars($location->name)?></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href="#" class="text-blue-600 mx-2" data-id="<?= $location->id ?>" id="location-edit">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <form id="location-delete" data-id="<?= $location->id ?>">
                                            <?= csrf_token() ?>
                                             <button type="submit" class="location-delete text-red-600">
                                                <i class="fa-solid fa-trash-can"></i> Delete
                                            </button>
                                        </form>
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
