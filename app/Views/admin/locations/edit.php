<div class="py-12 px-12">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6 mt-2">
            <h1 class="p-4 text-xl text-orange-500 font-medium ">Edit Location</h1>
            <form action="/admin/locations/<?= $location->id ?>/update" id="location-update" method="POST" class="w-full mx-auto" data-id="<?= $location->id?>">
                    <?= csrf_token() ?>
                    <div class="flex">
                        <div class="w-full px-2">
                            <div class="mb-4">
                                <label for="name" class="block text-gray-100 text-sm font-bold mb-2" ">
                                    Name:
                                </label>
                                <input type="text" id="name" name="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Give a name to your location."
                                    value="<?= $location->name ?>"
                                    required>
                            </div>
                            <input type="submit" value="Submit"
                                class="focus:outline-none text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900">
                        </div>
                    </div>
            </form>
    </div>
</div>