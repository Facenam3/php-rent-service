<div class="py-12 px-12">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6 mt-2">
        <h1 class="p-4 text-xl text-orange-500 font-medium ">Edit Contact Us</h1>
            <a href="/admin/contacts"
                class="block lg:hidden w-full mb-4 inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
                    ← Back to Table
            </a>
        <form action="/admin/contacts/<?= $contact->id ?>/update" method="POST" class="w-full mx-auto"
            data-id="<?= $contact->id ?>" id="contact-edit-form">
            <?= csrf_token() ?>
            <div class="flex flex-col-reverse gap-6 lg:flex-row">
                <div class="w-full lg:w-1/2">

                    <div class="mb-4">
                        <label for="message" class="block text-gray-100 text-sm font-bold mb-2">
                            Message:
                        </label>
                        <textarea id="message" name="message" rows="5"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="Enter your contact us message."><?= $contact->message ?></textarea>
                    </div>
                    <a href="/admin/contacts"
                        class="hidden lg:inline-block focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900" >
                        Back To Contacts
                    </a>
                    <input type="submit" value="Submit"
                        class="focus:outline-none text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900">
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-100 text-sm font-bold mb-2">
                            Name:
                        </label>
                        <input type="text" id="name" name="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="John Doe." value="<?= $contact->name ?>" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-100 text-sm font-bold mb-2">
                            Email:
                        </label>
                        <input type="text" id="email" name="email"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            placeholder="JohnDoe@example.com" value="<?= $contact->email ?>" required>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>