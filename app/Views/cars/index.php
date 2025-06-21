<div class="m-5">

    <div class="flex items-center justify-center  bg-grey-300">
        <div class="p-3">
            <h1 class="text-4xl text-center m-6 capitalize font-extrabold ">Our Vehicles</h1>
            <div class="w-full mb-2">
                    <form class="max-w-full mx-auto" action="" method="GET">   
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input 
                                type="search" 
                                name="search" 
                                id="default-search" 
                                value="<?= htmlspecialchars($search) ?>"
                                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500" 
                                placeholder="Search Cars..." 
                            />
                            <button 
                                type="submit" 
                                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2"
                            >
                                Search
                            </button>
                        </div>
                    </form>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                 <?php foreach($cars as $car) :?>
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                    <img class="rounded-t-lg car-image" 
                    src="<?= $car->image_path ?>" 
                    alt="<?= htmlspecialchars($car->brand ?? 'Car') ?>" />
                    </a>
                    <div class="p-5 ">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= htmlspecialchars($car->brand) ?></h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 capitalize">Model: <?= htmlspecialchars($car->model) ?></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 capitalize">Type: <?= htmlspecialchars($car->type) ?></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 ">Year: <?= htmlspecialchars($car->year) ?></p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Registration: <?= htmlspecialchars($car->registration_no) ?></p>
                        <div class="flex justify-between">
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: <?= htmlspecialchars($car->price_per_day) ?> €</p>    
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            View Details
                        </a>
                        </div>
                        
                    </div>
                </div>

            <?php endforeach; ?>

            </div>
            <?= partial('_pagination', ['currentPage' => $currentPage, 'totalPages' => $totalPages]) ?>
        </div>
    </div>

</div>