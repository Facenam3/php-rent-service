<div x-data="reservationWizard()" class="py-12 px-12">
  <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6 mt-2">
    <h1 class="p-4 text-xl text-orange-500 font-medium">Edit Reservation</h1>
    <a href="/admin/reservations"
       class="block sm:hidden w-full mb-4 inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
      ← Back to Table
    </a>
    
    <div class="flex justify-between text-sm font-semibold mb-4">
      <div :class="step >= 1 ? 'text-orange-500' : 'text-gray-300'">Step 1: Reservation Details</div>
      <div :class="step >= 2 ? 'text-orange-500' : 'text-gray-300'">Step 2: Payment Details</div>
    </div>

    <form action="/admin/reservations/<?= $reservation->id?>/update" method="POST" class="w-full mx-auto" data-id="<?= $reservation->id ?>" id="reservation-update" @submit.prevent="if(step === 1) step = 2; else $el.submit()">
      <?= csrf_token() ?>
      <div x-show="step === 1" x-transition>
         <div class="flex flex-col gap-2 lg:flex-row">
                <div class="w-full lg:w-1/2">
                    <div class="mb-4">
                        <label for="car_id" class="block text-gray-100 text-sm font-bold mb-2">
                            Car id:
                        </label>
                        <select 
                            id="car_id" 
                            name="car_id"
                            class="w-full border rounded p-2 text-black"
                            @change="
                                let id = $event.target.value;
                                selectedCar = id && window.carsData[id] 
                                    ? { id: id, ...window.carsData[id] } 
                                    : null;
                            ">
                            <option value="<?= $reservation->car()->id ?>" selected><?= $reservation->car()->brand . " " . $reservation->car()->model ?></option>
                           <?php if($cars) :?>
                                <?php foreach($cars as $car): ?>
                                    <option value='<?= $car->id ?>'>
                                        <?= htmlspecialchars($car->brand . ' ' . $car->model) ?> - <?= $car->price_per_day ?> €/day
                                    </option>
                                <?php endforeach; ?>
                            <?php endif ; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="start_date" class="block mb-1 font-medium text-gray-200">
                            Pickup Date & Time
                        </label>
                        <input 
                        id="start_date"
                        type="datetime-local" 
                        name="start_date" 
                        min="now" 
                        value="<?= date('Y-m-d\TH:i', strtotime($reservation->start_date)) ?>"
                        class="w-full border rounded p-2 text-black">
                    </div>

                    <div class="mb-4">
                        <label for="pickup_location_id" class="block text-sm font-medium text-gray-200">Pickup Location</label>
                        <select name="pickup_location_id" class="w-full border rounded p-2 text-black" id="pickup_location_id">
                            <option selected value="<?= $reservation->pickup_location_id ?>"><?= $reservation->pickup_location ?></option>
                             <?php foreach ($locations as $loc): ?>
                                <option value="<?= $loc->id ?>"><?= htmlspecialchars($loc->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block text-gray-100 text-sm font-bold mb-2">
                            Status:
                        </label>
                        <input type="text" name="status" id="status" value="<?= $reservation->status ?>"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" />
                    </div>                 
                            
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="mb-4">
                        <label for="user_id" class="block text-gray-100 text-sm font-bold mb-2">
                            User id:
                        </label>
                         <select name="user_id" id="user_id"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="<?= $reservation->user_id ?>" selected><?= $reservation->user_name ?></option>
                            <?php foreach ($users as $user): ?>
                                <option  value="<?= $user->id ?>"><?= htmlspecialchars("$user->first_name $user->last_name") ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                   <div class="mb-4">
                        <label for="end_date" class="block mb-1 font-medium text-gray-200">
                            Return Date & Time
                        </label>
                        <input 
                            id="end_date"
                            type="datetime-local" 
                            name="end_date" 
                            min="pickupDate || now"
                            value="<?= date('Y-m-d\TH:i', strtotime($reservation->end_date)) ?>"
                            class="w-full border rounded p-2 text-black"
                        >
                    </div>
                           
                    <div class="mb-4">
                        <label for="dropoff_location_id" class="block text-sm font-medium text-gray-200">Drop-off Location</label>
                        <select id="dropoff_location_id" name="dropoff_location_id" class="w-full border rounded p-2 text-black">
                            <option selected value="<?= $reservation->dropoff_location_id ?>"><?= $reservation->dropoff_location ?></option>
                            <?php foreach ($locations as $loc): ?>
                                <option value="<?= $loc->id ?>"><?= htmlspecialchars($loc->name) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="hidden" name="price_per_day" value="<?= $reservation->price_per_day ?>">
                    <input type="hidden" name="total_price" value="<?= $reservation->total_price ?>">

                    <div class="mb-4">
                        <label for="email" class="block text-gray-100 text-sm font-bold mb-2">
                            Email:
                        </label>
                        <input type="email" id="email" name="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="<?= $reservation->email ?>"
                            placeholder="If you are not using User id use email."
                            >
                    </div>
                </div>
            </div>
            <a href="/admin/reservations"
                class="inline-block focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900" >
                Back To Reservations
            </a>
            <input type="button" value="Next Step" 
                @click="step = 2"
                class="focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900" />
                
      </div>
    
      <div x-show="step === 2" x-transition>
        <div class="flex flex-col-reverse gap-6 lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="mb-4">
                    <label for="payment_method" class="block text-gray-100 font-semibold mb-1">Payment Method:</label>
                    <select id="payment_method" name="payment_method" class="shadow border rounded w-full py-2 px-3">
                        <option value="<?= $payment->payment_method ?>" selected> <?= $payment->payment_method ?> </option>
                        <option value="cash">Cash</option>
                        <option value="card">Card</option>
                    </select>
                </div>
                <input type="hidden" name="amount" value="<?= $payment->amount ?>">
                 <div class="mt-4 flex gap-4">
                    <button type="button" @click="step = 1" class="bg-gray-300 text-gray-700 rounded px-4 py-2">Back</button>
                    <button type="submit" class="bg-orange-500 text-white rounded px-4 py-2 hover:bg-orange-600">Submit</button>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="mb-4">
                    <label for="payment_status" class="block text-gray-100 font-semibold mb-1">Payment Status:</label>
                    <input type="text" id="payment_status" name="payment_status" value="<?= $payment->status ?>" class="shadow border rounded w-full py-2 px-3" />
                </div>
                
            </div>
        </div>
        
        </div>
    </form>
  </div>
</div>

<script>
    window.carsData = <?= json_encode(
        array_reduce($cars, function($carry, $car) {
            $carry[$car->id] = [
                'price' => (float) $car->price_per_day,
                'brand' => $car->brand,
                'model' => $car->model
            ];
            return $carry;
        }, []),
        JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
    ); ?>;
</script>