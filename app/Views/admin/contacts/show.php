<div class="py-12 px-12">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6 mt-2">
        <h1 class="p-4 text-xl text-orange-500 font-medium">Contact Us Details</h1>
        <a href="/admin/contacts"
                  class="w-full mb-4 inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
                    ← Back to Table
            </a>
        <div class="flex flex-col-reverse gap-6 lg:flex-row">
            <div class="w-full lg:w-1/2">
                <div class="mb-4">
                    <label class="block text-gray-100 text-sm font-bold mb-2">Message:</label>
                    <div class="text-gray-700 bg-gray-700 dark:bg-gray-100 p-3 rounded shadow">
                        <?= nl2br(htmlspecialchars($contact->message)) ?>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="mb-4">
                    <label class="block text-gray-100 text-sm font-bold mb-2">User:</label>
                    <div class="text-gray-700 bg-gray-100 dark:bg-gray-100 p-3 rounded shadow">
                        <?= $contact->name ?> 
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-100 text-sm font-bold mb-2">User Email:</label>
                    <div class="text-gray-700 bg-gray-100 dark:bg-gray-100 p-3 rounded shadow">
                        <?= $contact->email ?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>