<main class="flex-1 p-12">
        <div class="py-12 px-12">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <div class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow-sm sm:rounded-lg">
                    <div class="p-6 text-s md:text-md lg:text-2xl text-gray-100">
                        Welcome back, <span class="text-orange-600"><?= $user->first_name ?></span>
                        <p class="text-md lg:text-lg text-gray-400 mt-2">Here’s an overview of your platform’s latest activity and performance.</p>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 <h2 class="text-xl lg:text-2xl font-bold text-gray-800 mb-4">📊 Analytics Overview</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">
                    
                    <div class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow p-6">
                        <h3 class="text-lg lg:text-2xl font-semibold text-orange-400">
                           <i class="fa-solid fa-user"></i> Users
                        </h3>
                        <p class="text-md lg:text-2xl font-bold text-orange-600 dark:text-orange-200">Total Users: <?= $data['users']['allUsers'] ?> </p>
                        <p class="text-md lg:text-2xl font-bold text-orange-600 dark:text-orange-200">Users this month: <?= $data['users']['monthlyUsers'] ?> </p>
                    </div>

                    <div class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow p-6">
                        <h3 class="text-lg lg:text-2xl font-semibold text-green-600">
                            <i class="fa-solid fa-car"></i> Cars</h3>
                        <p class="text-md lg:text-2xl font-bold text-green-600 dark:text-green-200">Total Cars: <?= $data['cars']['allCars'] ?></p>
                        <p class="text-md lg:text-2xl font-bold text-green-600 dark:text-green-200">Booked Cars: <?= $data['cars']['bookedCars'] ?></p>
                        <p class="text-md lg:text-2xl font-bold text-green-600 dark:text-green-200">Available Cars: <?= $data['cars']['availableCars'] ?></p>
                    </div>

                    <div class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow p-6">
                        <h3 class="text-lg lg:text-2xl font-semibold text-purple-600">
                            <i class="fa-solid fa-book mx-2"></i> Reservations</h3>
                        <p class="text-md lg:text-2xl font-bold text-purple-600 dark:text-purple-200">Total Reservations: <?= $data['reservations']['allReservations'] ?></p>
                        <p class="text-md lg:text-2xl font-bold text-purple-600 dark:text-purple-200">Total Pending Reservations: <?= $data['reservations']['pendingRes'] ?></p>
                        <p class="text-md lg:text-2xl font-bold text-purple-600 dark:text-purple-200">Total Complete Reservations: <?= $data['reservations']['completeRes'] ?></p>
                    </div>

                    <div class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow p-6">
                        <h3 class="text-lg lg:text-2xl font-semibold text-yellow-600 ">
                            <i class="fa-solid fa-money-check mx-2"></i> Payments</h3>
                        <p class="text-md lg:text-2xl font-bold text-yellow-600 dark:text-yellow-200">Total Payments: <?= $data['payments']['totalPayments'] ?></p>
                        <p class="text-md lg:text-2xl font-bold text-yellow-600 dark:text-yellow-200">Monthly Revenue: <?= $data['payments']['monthlyRev'] ?></p>
                        <p class="text-md lg:text-2xl font-bold text-yellow-600 dark:text-yellow-200">Monthly Pending Revenue: <?= $data['payments']['pendingRev'] ?></p>
                    </div>

                    <div class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow p-6">
                        <h3 class="text-lg lg:text-2xl font-semibold text-blue-600 ">
                           <i class="fa-solid fa-envelope mx-2"></i> Contact Us</h3>
                        <p class="text-md lg:text-2xl font-bold text-blue-600 dark:text-blue-200">Total Contacts: <?= $data['contact-us']['allContacts'] ?></p>
                        <p class="text-md lg:text-2xl font-bold text-blue-600 dark:text-blue-200">Monthly Contacts: <?= $data['contact-us']['monthlyContacts'] ?></p>
                    </div>

                    <div class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow p-6">
                        <h3 class="text-lg lg:text-2xl font-semibold text-red-600">
                            <i class="fa-solid fa-comment mx-2"></i> Reviews</h3>
                        <p class="text-md lg:text-2xl font-bold text-red-600 dark:text-red-200">Total Reviews: <?= $data['reviews']['allReviews'] ?></p>
                        <p class="text-md lg:text-2xl font-bold text-red-600 dark:text-red-200">Monthly Reviews: <?= $data['reviews']['monthlyReviews'] ?></p>
                    </div>

                </div>
            </div>
        </div>
</main>