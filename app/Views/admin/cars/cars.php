<div class="text-white p-4 sm:p-6 mt-5">
  <div class="py-4 sm:px-4 lg:px-8 max-w-full">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border shadow-md text-black p-4 sm:p-6">

      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h1 class="text-xl sm:text-2xl text-orange-600 font-semibold whitespace-nowrap">
          Cars
        </h1>
        <a href="/admin/cars/create"
          class="inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
          Add New Car
        </a>
      </div>

      <form class="mt-6 max-w-full" method="GET" action="">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search Cars</label>
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
                placeholder="Search Cars..." 
                />
                <button 
                type="submit" 
                class="text-white absolute end-2.5 bottom-2.5 bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2"
                >
                Search
            </button>
          </div>
        </form>

      <div class="hidden lg:block overflow-x-auto mt-6 rounded-md border border-gray-300">
        <table class="min-w-full divide-y divide-gray-300 text-sm sm:text-base">
          <thead class="bg-orange-500 text-white uppercase font-medium  text-center">
            <tr>
              <th class="px-2 py-3 lg:px-8 lg:py-3">ID</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Car Name</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Type</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Year</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Status</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3 max-w-xs">Price</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-gray-100 text-gray-900  text-center">
            <?php if($cars) :?>
              <?php foreach($cars as $car) :?>
                <tr class="border-b">
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= $car->id ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars("$car->brand $car->model") ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars(ucfirst($car->type)) ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($car->year) ?>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($car->status) ?>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($car->price_per_day) ?> $
                  <td class="px-4 py-2">
                    <div class="flex flex-wrap gap-2 ">
                      <a href="#" class="text-green-600 whitespace-nowrap px-2" data-id="<?= $car->id ?>" id="car-show">
                        <i class="fa-solid fa-pen-to-square"></i> Show
                      </a>
                      <a href="#" class="text-blue-600 whitespace-nowrap px-2" data-id="<?= $car->id ?>" id="car-edit">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                      </a>
                      <form id="car-delete" data-id="<?= $car->id ?>" class="inline">
                        <?= csrf_token() ?>
                        <button type="submit" class="car-delete text-red-600 whitespace-nowrap">
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

      <div class="block lg:hidden mt-6 space-y-4">
        <?php if($cars) :?>
            <?php foreach($cars as $car) :?>
            <div class="bg-gray-100 dark:bg-gray-300 p-4 rounded-md shadow">
                <div class="flex justify-between items-center mb-2">
                <div class="font-semibold text-lg text-orange-600">Car #<?= $car->id ?></div>
                <div class="flex gap-3">
                    <a href="#" class="text-green-600 whitespace-nowrap px-2" data-id="<?= $car->id ?>" id="car-show">
                        <i class="fa-solid fa-pen-to-square"></i>
                     </a>
                    <a href="#" class="text-blue-600" data-id="<?= $car->id ?>" id="car-edit">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form id="car-delete" data-id="<?= $car->id ?>">
                    <?= csrf_token() ?>
                    <button type="submit" class="car-delete text-red-600">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                    </form>
                </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 border border-gray-200 dark:border-gray-700">
                        <img 
                            src="/../<?= htmlspecialchars($car->image_path) ?>" 
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
                                    <?= $car->max_passengers ?? '5' ?> persons
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
                        </div>
                    </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
                  
    </div>
    <?= partial('_pagination', ['currentPage' => $currentPage, 'totalPages' => $totalPages]) ?>
  </div>
</div>
