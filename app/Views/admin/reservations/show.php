<div class="text-white p-4 sm:p-6 mt-5">
  <div class="py-4 sm:px-4 lg:px-8 max-w-full">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border shadow-md text-black p-4 sm:p-6">

      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h1 class="text-xl sm:text-2xl text-orange-600 font-semibold whitespace-nowrap">
          Reservation number <?= $reservation->id ?>
        </h1>
        <a href="/admin/reservations"
            class="block lg:hidden sm:w-full md:w-2/5 mb-4 inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
        ← Back to Table
        </a>
        <a href="/admin/reservations"
            class="hidden lg:inline-block focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900" >
            Back To Reservations
        </a>
      </div>

      <div class="mt-4 flex flex-col lg:flex-row w-full mx-auto bg-white shadow rounded-lg overflow-hidden">

        <div class="w-full lg:w-1/2 p-6">
            <img 
                src="/../<?= htmlspecialchars($reservation->image_path) ?>" 
                alt=" <?= htmlspecialchars($reservation->car_brand . ' ' . $reservation->car_model) ?>" 
                class="w-full h-64 lg:h-full object-cover"
            >
        </div>

        <div class="w-full lg:w-1/2 flex flex-col p-6 space-y-4">

            <div>
                <h1 class="text-3xl font-bold text-gray-800"><?= htmlspecialchars($reservation->car_brand ) ?></h1>
                <h2 class="text-xl font-semibold text-gray-600"><?= htmlspecialchars($reservation->car_model) ?></h2>
            </div>
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">Reservation Details</h3>
                <ul class="space-y-1 text-gray-700 text-sm">
                    <li><strong>Pickup:</strong> <?= date('d M Y, H:i', strtotime($reservation->start_date)) ?> at <?= htmlspecialchars($reservation->pickup_location) ?></li>
                    <li><strong>Return:</strong> <?= date('d M Y, H:i', strtotime($reservation->end_date)) ?> at <?= htmlspecialchars($reservation->dropoff_location) ?></li>
                    <li><strong>Price Per Day:</strong> €<?= htmlspecialchars($reservation->price_per_day) ?></li>
                    <li><strong>Total Price:</strong> €<?= htmlspecialchars($reservation->total_price) ?></li>
                    <li><strong>Status:</strong> <?= htmlspecialchars($reservation->status) ?></li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">User</h3>
                <ul class="space-y-1 text-gray-700 text-sm">
                    <li><strong>Name:</strong> <?= htmlspecialchars($reservation->user_name) ?></li>
                    <li><strong>Email:</strong> <?= htmlspecialchars($reservation->email) ?></li>
                </ul>
            </div>

        </div>
    </div>

    </div>
  
  </div>
</div>
