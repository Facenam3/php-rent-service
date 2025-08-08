<div x-data="{ step: 1 }" class="py-12 px-12">
  <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6 mt-2">
    <h1 class="p-4 text-xl text-orange-500 font-medium">Edit Car</h1>
    <a href="/admin/cars"
       class="block sm:hidden w-full mb-4 inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
      ← Back to Table
    </a>
    
    <div class="flex justify-between text-sm font-semibold mb-4">
      <div :class="step >= 1 ? 'text-orange-500' : 'text-gray-300'">Step 1: Edit Details</div>
      <div :class="step >= 2 ? 'text-orange-500' : 'text-gray-300'">Step 2: Edit Car Specification</div>
    </div>

    <form action="/admin/cars/<?= $car->id ?>/update" method="POST" class="w-full mx-auto" id="car-edit-form" @submit.prevent="if(step === 1) step = 2; else $el.submit()">
      <?= csrf_token() ?>
      <div x-show="step === 1" x-transition>
        <div class="flex flex-col-reverse gap-6 lg:flex-row">
          <div class="w-full lg:w-1/2">
            <div class="mb-4">
              <label for="brand" class="block text-gray-100 text-sm font-bold mb-2">Brand:</label>
              <input type="text" id="brand" name="brand"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                     placeholder="Add the brand of the car."
                     value="<?= htmlspecialchars($car->brand) ?>"
                     required>
            </div>
            <div class="mb-4">
              <label for="type" class="block text-gray-100 text-sm font-bold mb-2">Type:</label>
              <input type="text" id="type" name="type"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                     placeholder="Add the type of this car."
                     value="<?= htmlspecialchars($car->type) ?>" required>
            </div>
            <div class="mb-4">
              <label for="price_per_day" class="block text-gray-100 text-sm font-bold mb-2">Price per day:</label>
              <input type="text" id="price_per_day" name="price_per_day"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                     placeholder="Add your price per day for this car."
                     value="<?= htmlspecialchars($car->price_per_day) ?>"
                      required>
            </div>
          </div>

          <div class="w-full lg:w-1/2">
            <div class="mb-4">
              <label for="model" class="block text-gray-100 text-sm font-bold mb-2">Model:</label>
              <input type="text" id="model" name="model"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                     placeholder="Add the model of the car."
                     value="<?= htmlspecialchars($car->model) ?>" required>
            </div>
            <div class="mb-4">
              <label for="year" class="block text-gray-100 text-sm font-bold mb-2">Year:</label>
              <input type="text" id="year" name="year"
                     class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                     placeholder="Add the year of the car."
                     value="<?= htmlspecialchars($car->year) ?>" required>
            </div>
            <div class="mb-4">
                <label for="image_path" class="block text-gray-100 text-sm font-bold mb-2">Image:</label>
                <input type="text" id="image_path" name="image_path"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Paste new image URL here or leave empty.">
                <div class="mt-2">
                    <img src="/../<?= htmlspecialchars($car->image_path) ?>" 
                        alt="Car image" 
                        class="h-24 rounded shadow">
                </div>
                <input type="hidden" name="current_image" value="<?= htmlspecialchars($car->image_path) ?>">
                
            </div>
          </div>
        </div>
        <input type="button" value="Next Step" 
            @click="step = 2"
            class="focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900" />
      </div>
    
      <div x-show="step === 2" x-transition>
        <div class="flex flex-col-reverse gap-6 lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="mb-4">
                    <label for="doors" class="block text-gray-700 font-semibold mb-1">Doors:</label>
                    <input type="number" id="doors" name="doors" min="1" max="10" 
                     value="<?= htmlspecialchars($car->doors) ?>" required class="shadow border rounded w-full py-2 px-3" />
                </div>

                <div class="mb-4">
                    <label for="fuel_type" class="block text-gray-700 font-semibold mb-1">Fuel Type:</label>
                    <input type="text" id="fuel_type" name="fuel_type" 
                     value="<?= htmlspecialchars($car->fuel_type) ?>" required class="shadow border rounded w-full py-2 px-3" />
                </div>

                <div class="mb-4">
                    <label for="fuel_consumption" class="block text-gray-700 font-semibold mb-1">Fuel Consumption (L/100km):</label>
                    <input type="number" step="0.1" id="fuel_consumption" name="fuel_consumption" 
                     value="<?= htmlspecialchars($car->fuel_consumption) ?>" required class="shadow border rounded w-full py-2 px-3" />
                </div>
                 <div class="mt-4 flex gap-4">
                    <button type="button" @click="step = 1" class="bg-gray-300 text-gray-700 rounded px-4 py-2">Back</button>
                    <button type="submit" class="bg-orange-500 text-white rounded px-4 py-2 hover:bg-orange-600">Submit</button>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="mb-4">
                    <label for="transmission" class="block text-gray-700 font-semibold mb-1">Transmission:</label>
                    <select id="transmission" name="transmission" class="shadow border rounded w-full py-2 px-3">
                    <option 
                     value="<?= htmlspecialchars($car->brand) ?>" selected><?= htmlspecialchars($car->brand) ?></option>
                    <option value="manual" >Manual</option>
                    <option value="automatic">Automatic</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="air_condition" class="block text-gray-700 font-semibold mb-1">Air Conditioning:</label>
                    <select id="air_condition" name="air_condition" class="shadow border rounded w-full py-2 px-3">
                    <option 
                     value="<?= htmlspecialchars($car->air_condition) ?>" selected><?= htmlspecialchars($car->air_condition) ?></option>
                    <option value="no">No</option>
                    <option value="yes">Yes</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="max_passengers" class="block text-gray-700 font-semibold mb-1">Max Passengers:</label>
                    <input type="number" id="max_passengers" name="max_passengers" value="<?= htmlspecialchars($car->max_passengers) ?>" required class="shadow border rounded w-full py-2 px-3" />
                </div>
            </div>
        </div>
        
        </div>
    </form>
  </div>
</div>
