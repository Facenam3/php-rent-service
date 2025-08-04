<div class=" text-white p-6">
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6">
            <div class="flex justify-between items-center">
                <h1 class="sm:text-md lg:text-2xl text-orange-600 font-medium">Locations</h1>
                <a href="#" class="p-3 focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 dark:focus:ring-orange-800">
                    Add New Location
                </a>
            </div>

            <div class="body border border-gray-400 rounded-md mt-6">
                <form method="GET" action="#" class="p-4 bg-gray-200 rounded-md flex flex-wrap gap-2 flex justify-between">
                    <input type="text" name="search" class="rounded-md p-2 text-black" placeholder="Search tickets..." value="">
                    <button type="submit"
                        class="p-3 focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 dark:focus:ring-orange-800">
                        Search
                    </button>
                </form>
                <table class="w-full text-lg text-left text-white rounded-md table-fixed">
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
                        <tr class="border-b-2">
                            <td class="px-6 py-2">2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#" class="text-blue-600 mx-2" id="edit">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <a href="#" class="text-red-600" id="delete">
                                    <i class="fa-solid fa-trash-can"></i> Delete
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
