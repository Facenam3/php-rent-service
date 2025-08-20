<div class="text-white p-4 sm:p-6 mt-5">
  <div class="py-4 sm:px-4 lg:px-8 max-w-full">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border shadow-md text-black p-4 sm:p-6">

      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h1 class="text-xl sm:text-2xl text-orange-600 font-semibold whitespace-nowrap">
          Car number <?= $car->id ?>
        </h1>
        <a href="/admin/cars"
            class="block lg:hidden sm:w-full md:w-2/5 mb-4 inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
            ← Back to Table
        </a>
        <a href="/admin/cars"
                class="hidden lg:block focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900" >
                Back To Cars
        </a>
      </div>

      <div class="mt-4 flex flex-col lg:flex-row w-full mx-auto bg-white shadow rounded-lg overflow-hidden">

        <div class="w-full lg:w-1/2 p-6">
            <img 
                src="/../<?= htmlspecialchars($car->image_path) ?>" 
                alt=" <?= htmlspecialchars($car->brand . ' ' . $car->model) ?>" 
                class="w-full h-64 lg:h-full object-cover"
            >            
        </div>

        <div class="w-full lg:w-1/2 flex flex-col p-6 space-y-4">

           <h1 class="text-3xl font-bold text-gray-800">
                <?= htmlspecialchars($car->brand) ?>
            </h1>
            <h2 class="text-xl font-semibold text-gray-600">
                <?= htmlspecialchars($car->model) ?>
            </h2>
            <p class="mt-2 text-gray-500 italic">
                <?= ucfirst(htmlspecialchars($car->type)) ?>
            </p>

            <div class="mt-6">
                <h3 class="text-lg font-bold text-gray-800 mb-2">Car Specifications</h3>
                <ul class="space-y-2 text-gray-700">
                    <li>
                        <i class="fas fa-gas-pump text-gray-500"></i>
                        <strong>Fuel consumption:</strong> <?= nl2br(htmlspecialchars($car->fuel_consumption)) ?>
                    </li>
                    <li>
                        <i class="fas fa-cogs text-gray-500"></i>
                        <strong>Transmission:</strong> <?= nl2br(htmlspecialchars($car->transmission)) ?>
                    </li>
                    <li>
                         <i class="fas fa-snowflake text-gray-500"></i>
                        <strong>Air Condition:</strong> <?= nl2br(htmlspecialchars($car->air_condition)) ?>
                    </li>
                    <li>
                        <i class="fas fa-door-closed text-gray-500"></i>
                        <strong>Doors:</strong> <?= nl2br(htmlspecialchars($car->doors ?? '4')) ?>
                    </li>
                    <li>
                       <i class="fas fa-users text-gray-500"></i>
                        <strong>Passengers:</strong> <?= nl2br(htmlspecialchars($car->max_passengers)) ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>

      
      
    </div>
  
  </div>
</div>
