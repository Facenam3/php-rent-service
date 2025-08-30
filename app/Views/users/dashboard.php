<main class="flex-1 p-12">
        <div class="py-12 px-12">            
            <div class="max-w-6xl mx-auto sm:px-6 mb-6">
                <div class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow-sm sm:rounded-lg">
                    <div class="p-6 text-s md:text-md lg:text-2xl text-gray-100">
                        Welcome back, <span class="text-orange-600"><?= $user->first_name ?></span>
                        <p class="text-md lg:text-lg text-gray-400 mt-2">Here’s an overview of your reservations.</p>
                    </div>
                </div>
            </div>
            <div class="hidden max-w-6xl mx-auto lg:block overflow-x-auto mt-6 rounded-md border border-gray-300">
                <table class="min-w-full divide-y divide-gray-300 text-sm sm:text-base">
                    <thead class="bg-white border-gray-200 dark:bg-gray-800 text-white uppercase font-medium  text-center">
                        <tr>
                        <th class="px-2 py-3 lg:px-8 lg:py-3">Car</th>
                        <th class="px-2 py-3 lg:px-8 lg:py-3">Start Date</th>
                        <th class="px-2 py-3 lg:px-8 lg:py-3">End Date</th>
                        <th class="px-2 py-3 lg:px-8 lg:py-3 max-w-xs">Total Price</th>
                        <th class="px-2 py-3 lg:px-8 lg:py-3 max-w-xs">Status</th>
                        <th class="px-2 py-3 lg:px-8 lg:py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 text-gray-900  text-center">
                        <?php if($reservations) :?>
                            <?php foreach($reservations as $reservation) :?>
                                <tr class="border-b">
                                <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars("$reservation->car_brand $reservation->car_model") ?></td>
                                <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars(ucfirst($reservation->start_date)) ?></td>
                                <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($reservation->end_date) ?> </td>
                                <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($reservation->total_price) ?> $ </td>
                                <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($reservation->status) ?> </td>
                                <td class="px-4 py-2">
                                    <div class="flex flex-wrap gap-2 ">
                                        <a href="#" class="text-green-600 whitespace-nowrap px-2" data-id="<?= $reservation->id ?>" id="reservation-show">
                                            <i class="fa-solid fa-pen-to-square"></i> Show
                                        </a>
                                    </div>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="sm:block md:block lg:hidden mt-6 space-y-4">
            <?php if ($reservations) : ?>
                <?php foreach ($reservations as $reservation) : ?>
                <div class="bg-gray-100 dark:bg-gray-300 p-4 rounded-md shadow">
                    <div class="flex justify-between items-center mb-2">
                        <div class="font-semibold text-lg text-orange-600">
                            <?= htmlspecialchars($reservation->car_brand . ' ' . $reservation->car_model) ?>
                        </div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">
                            by <?= htmlspecialchars($reservation->user_name ?? $reservation->guest_email ?? 'Guest') ?>
                        </div>
                    </div>
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
                        <div class="aspect-w-16 aspect-h-9">
                            <img 
                                src="/../<?= htmlspecialchars($reservation->image_path) ?>" 
                                alt="<?= htmlspecialchars($reservation->car_brand . ' ' . $reservation->car_model) ?>" 
                                class="rounded-t-xl w-full h-full object-cover"
                            />
                        </div>
                        <div class="p-5 space-y-3">
                            <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                <span><i class="fas fa-calendar-alt"></i> Start: <?= htmlspecialchars($reservation->start_date) ?></span>
                                <span><i class="fas fa-calendar-check"></i> End: <?= htmlspecialchars($reservation->end_date) ?></span>
                            </div>
                            <div class="flex justify-between text-sm text-gray-500 dark:text-gray-400">
                                <span><i class="fas fa-map-marker-alt"></i> Pickup: <?= htmlspecialchars($reservation->pickup_location) ?></span>
                                <span><i class="fas fa-map-marker"></i> Dropoff: <?= htmlspecialchars($reservation->dropoff_location) ?></span>
                            </div>
                            <div class="text-lg font-semibold text-orange-600 dark:text-orange-400">
                                <?= htmlspecialchars($reservation->total_price) ?> €
                            </div>

                            <div class="flex justify-end gap-3 mt-3">
                                <a href="#" class="text-green-600 whitespace-nowrap px-2" data-id="<?= $reservation->id ?>" id="reservation-show">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        </div>
</main>