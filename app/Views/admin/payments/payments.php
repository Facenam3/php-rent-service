<div class="text-white p-4 sm:p-6 mt-5">
  <div class="py-4 sm:px-4 lg:px-8 max-w-full">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border shadow-md text-black p-4 sm:p-6">

      <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h1 class="text-xl sm:text-2xl text-orange-600 font-semibold whitespace-nowrap">
          Payments
        </h1>
      </div>

      <form class="mt-6 max-w-full" method="GET" action="">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search Payments</label>
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
                placeholder="Search Payments..." 
                />
                <button 
                type="submit" 
                class="text-white absolute end-2.5 bottom-2.5 bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-4 py-2"
                >
                Search
            </button>
          </div>
        </form>

      <div class="hidden sm:block overflow-x-auto mt-6 rounded-md border border-gray-300">
        <table class="min-w-full divide-y divide-gray-300 text-sm sm:text-base">
          <thead class="bg-orange-500 text-white uppercase font-medium  text-center">
            <tr>
              <th class="px-2 py-3 lg:px-8 lg:py-3">ID</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Reservation Id</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Payment Method</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Status</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3 max-w-xs">Amount</th>
              <th class="px-2 py-3 lg:px-8 lg:py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-gray-100 text-gray-900  text-center">
            <?php if($payments) :?>
              <?php foreach($payments as $payment) :?>
                <tr class="border-b">
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= $payment->id ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($payment->reservation_id) ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($payment->payment_method) ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($payment->status) ?></td>
                  <td class="px-2 py-3 lg:px-8 lg:py-2"><?= htmlspecialchars($payment->amount) ?></td>
                  
                  <td class="px-4 py-2">
                    <div class="flex flex-wrap gap-2 ">
                      <a href="#" class="text-green-600 whitespace-nowrap px-2" data-id="<?= $payment->id ?>" id="payment-show">
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

      <div class="sm:hidden mt-6 space-y-4">
        <?php if($payments) :?>
            <?php foreach($payments as $payment) :?>
            <div class="bg-gray-100 dark:bg-gray-300 p-4 rounded-md shadow">
                <div class="flex justify-between items-center mb-2">
                <div class="font-semibold text-lg text-orange-600">Payment #<?= $payment->id ?></div>
                <div class="flex gap-3">
                    <a href="#" class="text-green-600 whitespace-nowrap px-2" data-id="<?= $payment->id ?>" id="payment-show">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>
                </div>
                <div><strong>Reservation_id: </strong> <?= htmlspecialchars($payment->reservation_id) ?></div>
                <div><strong>Payment_method: </strong> <?= htmlspecialchars($payment->payment_method) ?></div>
                <div><strong>Status: </strong> <?= htmlspecialchars($payment->status) ?></div>
                <div><strong>Amount: </strong> <?= htmlspecialchars($payment->amount) ?></div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
                  
    </div>
    <?= partial('_pagination', ['currentPage' => $currentPage, 'totalPages' => $totalPages]) ?>
  </div>
</div>