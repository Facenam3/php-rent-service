<?php if ($_SERVER['REQUEST_URI'] === '/reservation/create'): ?>
  <script src="/js/reservation.js"></script>
<?php endif; ?>

<div x-data="reservationWizard()" class="p-10">
  <form method="POST" action="/reservations/store" class="max-w-6xl mx-auto p-10 bg-white border-gray-200 dark:bg-gray-800 text-gray-200 shadow rounded space-y-6">
    <?= csrf_token() ?>
    <div class="flex justify-between text-sm font-semibold mb-4">
      <div :class="step >= 1 ? 'text-orange-600' : 'text-gray-500'">Step 1: Details</div>
      <div :class="step >= 2 ? 'text-orange-600' : 'text-gray-500'">Step 2: Car</div>
      <div :class="step >= 3 ? 'text-orange-600' : 'text-gray-500'">Step 3: Your Info</div>
      <div :class="step >= 4 ? 'text-orange-600' : 'text-gray-500'">Step 4: Payment</div>
      <div :class="step >= 5 ? 'text-orange-600' : 'text-gray-500'">Step 5: Confirm</div>
    </div>

    <div x-show="step === 1" x-transition>
      <h2 class="text-xl font-bold mb-4">Step 1: Reservation Details</h2>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="pickup_location_id" class="block text-sm font-medium text-gray-200">Pickup Location</label>
          <select name="pickup_location_id" class="w-full border rounded p-2 text-black">
            <option selected disabled>Choose Location</option>
            <?php foreach ($locations as $loc): ?>
              <option value="<?= $loc->id ?>"><?= htmlspecialchars($loc->name) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label for="dropoff_location_id" class="block text-sm font-medium text-gray-200">Drop-off Location</label>
          <select name="dropoff_location_id" class="w-full border rounded p-2 text-black">
            <option selected disabled>Choose Location</option>
            <?php foreach ($locations as $loc): ?>
              <option value="<?= $loc->id ?>"><?= htmlspecialchars($loc->name) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      
      <div 
            x-data="{ 
                now: (new Date()).toISOString().slice(0,16) 
            }"
            class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4"
        >
          <div>
            <label for="start_date" class="block mb-1 font-medium text-gray-200">
              Pickup Date & Time
            </label>
            <input 
              type="datetime-local" 
              x-model="pickupDate" 
              name="start_date" 
              :min="now" 
              class="w-full border rounded p-2 text-black"
            >
          </div>

          <div>
            <label for="end_date" class="block mb-1 font-medium text-gray-200">
              Return Date & Time
            </label>
            <input 
              type="datetime-local" 
              x-model="returnDate" 
              name="end_date" 
              :min="pickupDate || now"
              class="w-full border rounded p-2 text-black"
            >
          </div>

      </div>

      <button type="button" @click="step = 2" class="mt-4 w-full bg-orange-600 text-white py-2 rounded hover:bg-orange-700">
        Next → Choose Car
      </button>
    </div>

    <div x-show="step === 2" x-transition>
      <h2 class="text-xl font-bold mb-4">Step 2: Choose Your Car</h2>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <?php foreach ($cars as $car): ?>
         <div 
            class="border bg-gray-200 rounded p-4 shadow hover:shadow-md cursor-pointer"
            @click="
              selectedCar = {
                id: <?= $car->id ?>,
                name: '<?= $car->brand . ' ' . $car->model ?>',
                price: <?= $car->price_per_day ?>
              };
              step = 3
            "
            :class="selectedCar?.id === <?= $car->id ?> ? 'border-blue-500' : ''"
          >
            <img src="<?= $car->image_path ?>" class="w-full h-40 object-cover rounded mb-2">
            <h3 class="font-bold text-gray-900"><?= $car->brand ?> <?= $car->model ?></h3>
            <p class="text-sm text-gray-700"><?= $car->fuel_type ?> • <?= $car->max_passengers ?> passengers</p>
            <p class="text-blue-700 font-semibold"><?= $car->price_per_day ?> € / day</p>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="flex justify-between mt-4">
        <button type="button" @click="step = 1" class="bg-gray-200 text-gray-800 px-4 py-2 rounded">← Back</button>
      </div>
    </div>

    <div x-show="step === 3" x-transition>
      <h2 class="text-xl font-bold text-white mb-4">Step 3: Your Information</h2>
      <?php if (isset($_SESSION['user_id'])): ?>
        <p class="text-green-600">You are logged in. Your account will be linked.</p>
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
      <?php else: ?>
        <label for="email" class="block text-sm font-medium text-white">Your Email</label>
        <input type="email" name="email" class="w-full border rounded p-2 text-black" required>
      <?php endif; ?>

      <div class="flex justify-between mt-4">
        <button type="button" @click="step = 2" class="bg-gray-200 text-gray-800 px-4 py-2 rounded">← Back</button>
        <button type="button" @click="step = 4" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">Next → Payment</button>
      </div>
    </div>

   <div x-show="step === 4" x-transition>
      <h2 class="text-xl font-bold text-white mb-4">Step 4: Review & Choose Payment</h2>
      <div class="bg-gray-700 p-4 rounded mb-4">
      <p class="text-gray-200">🚗 Selected Car: <span x-text="selectedCar?.name || 'None selected'"></span></p>
      <p class="text-gray-200">📅 Total Days: <span x-text="totalDays"></span></p>
      <p class="text-gray-200">💰 Total Price: <span x-text="totalPrice"></span> €</p>
      </div>

      <div class="space-y-3">
        <label class="flex items-center space-x-2">
          <input type="radio" name="payment_method" value="cash" x-model="paymentMethod">
          <span class="text-white">💵 Pay with Cash on Pickup</span>
        </label>
        <label class="flex items-center space-x-2">
          <input type="radio" name="payment_method" value="card" x-model="paymentMethod">
          <span class="text-white">💳 Pay with Card (Stripe)</span>
        </label>
      </div>

      <div class="flex justify-between mt-4">
        <button type="button" @click="step = 3" class="bg-gray-200 text-gray-800 px-4 py-2 rounded">← Back</button>
        <button type="button" @click="step = 5" class="bg-orange-600 text-white px-4 py-2 rounded hover:bg-orange-700">
          Next → Confirm
        </button>
      </div>
    </div>

    <div x-show="step === 5" x-transition>
      <h2 class="text-xl font-bold text-white mb-4">Step 5: Confirm Reservation</h2>
      <p class="text-gray-400">✅ Car: <span x-text="selectedCar?.name"></span></p>
      <p class="text-gray-400">✅ Price/Day: <span x-text="selectedCar?.price"></span> €</p>
      <p class="text-gray-400">✅ Total Days: <span x-text="totalDays"></span></p>
      <p class="text-gray-400">✅ Total Price: <span x-text="totalPrice"></span> €</p>

      <input type="hidden" name="car_id" :value="selectedCar?.id">
      <input type="hidden" name="price_per_day" :value="selectedCar?.price">
      <input type="hidden" name="total_price" :value="totalPrice">

      <div class="flex justify-between mt-4">
        <button type="button" @click="step = 4" class="bg-gray-200 text-gray-800 px-4 py-2 rounded">← Back</button>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Confirm Reservation</button>
      </div>
    </div>
  </form>
</div>
<script>
  window.carsData = <?= json_encode(array_reduce($cars, function($carry, $car) {
    $carry[$car->id] = ['price' => floatval($car->price_per_day)];
    return $carry;
}, [])); ?>;
</script>