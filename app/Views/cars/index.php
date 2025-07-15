<div class="m-5">

    <div class="flex items-center justify-center  bg-gray-300">
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
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <?php foreach($cars as $car): ?>
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200 dark:border-gray-700">
                        
                        <img 
                            src="<?= htmlspecialchars($car->image_path) ?>" 
                            alt="<?= htmlspecialchars($car->brand . ' ' . $car->model) ?>" 
                            class="rounded-t-xl w-full h-48 object-cover"
                        >

                        <div class="p-5 space-y-3">
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">
                                <?= htmlspecialchars($car->brand) ?> 
                                <span class="font-medium text-gray-600 dark:text-gray-300">
                                    <?= htmlspecialchars($car->model) ?>
                                </span>
                                <span class="inline-block ml-2 text-sm px-2 py-0.5 bg-orange-100 text-orange-700 dark:bg-orange-900 dark:text-orange-300 rounded">
                                    <?= htmlspecialchars(ucfirst($car->type)) ?>
                                </span>
                            </h2>
                            <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                <span><i class="fas fa-calendar-alt"></i> <?= htmlspecialchars($car->year) ?></span>
                                <span class="font-semibold text-orange-600 dark:text-orange-400"><?= htmlspecialchars($car->price_per_day) ?> € / day</span>
                            </div>
                            <div class="grid grid-cols-3 gap-3 text-gray-700 dark:text-gray-300 text-sm mt-2">
                               
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-door-closed text-gray-500"></i>
                                    <?= $car->doors ?? '4' ?> doors
                                </div>

                                <div class="flex items-center gap-2">
                                    <i class="fas fa-users text-gray-500"></i>
                                    <?= $car->max_passengers ?? '5' ?> pax
                                </div>

                                <div class="flex items-center gap-2">
                                    <i class="fas fa-gas-pump text-gray-500"></i>
                                    <?= $car->fuel_consumption ?? '6.5' ?> L/100km
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-3 text-gray-600 dark:text-gray-400 text-sm mt-2">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-cogs text-gray-500"></i>
                                    <?= ucfirst($car->transmission ?? 'manual') ?>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-snowflake text-gray-500"></i>
                                    <?= $car->air_condition === 'yes' ? 'A/C' : 'No A/C' ?>
                                </div>
                            </div>

                            <div class="flex justify-between items-center mt-4">
                                <a href="#" class="px-4 py-2 text-sm font-semibold text-white bg-orange-600 rounded-lg hover:bg-orange-700 transition">
                                    <i class="fas fa-info-circle mr-1"></i> View Details
                                </a>
                                <a href="#" class="text-orange-600 dark:text-orange-400 text-sm hover:underline">
                                    Book Now →
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