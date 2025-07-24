<div class="min-h-screen bg-gray-200">
    <div class="p-10">
        <div class="max-w-6xl mx-auto p-6 bg-white border-gray-200 dark:bg-gray-800 text-gray-200 shadow rounded flex flex-col-reverse md:flex-row">
            <div class="md:w-1/2 p-4">
                <h2 class="text-3xl md:text-4xl text-center">Contact Us</h2>
                <form action="" method="POST" id="contact-form" class="w-full mt-5">
                     <?= csrf_token() ?>
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Name:</label>
                        <input type="text"
                        id="name"
                        name="name"
                        class="w-full p-3 text-base bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                        placeholder="John Doe"
                        required
                        >
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email:</label>
                        <input type="text"
                        id="email"
                        name="email"
                        class="w-full p-3 text-base bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                        placeholder="JohnDoe@example.com"
                        required
                        >
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email:</label>
                        <textarea
                        name="message"
                        id="message"
                        rows="5"
                        placeholder="Add your message here."
                        required
                        class="w-full p-3 text-base bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                          ></textarea>
                    </div>
                    <div class="mb-4">
                        <button type="submit" 
                        class="w-full mx-auto text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md mb-2">
                        Submit
                        </button>
                    </div>
                    
                </form>
            </div>
            <div class="md:w-1/2 p-4">
                <h2 class="text-3xl md:text-4xl text-center">Contact Info</h2>
                <div class="mt-12 p-5 border border-gray-300 rounded-lg">
                    <h3 class="text-md mb-2">Skopje Center Office</h3>
                    <p class="mb-2 text-gray-700 dark:text-gray-300">Mobile: 📞 +389 71 123 456 </p>
                    <p class="mb-2 text-gray-700 dark:text-gray-300">Email: 📧 r3ntacar3@gmail.com  </p>
                    <p class="mb-2 text-gray-700 dark:text-gray-300">Adress: 📍 Skopje, North Macedonia </p>
                </div>
                <div class="mt-8 p-5 border border-gray-300 rounded-lg">
                    <h3 class="text-md mb-2 text-gray-700 dark:text-gray-300">Skopje Airport Office</h3>
                    <p class="mb-2 text-gray-700 dark:text-gray-300">Mobile: 📞 +389 71 123 456 </p>
                    <p class="mb-2 text-gray-700 dark:text-gray-300">Email: 📧 r3ntacar3@gmail.com  </p>
                    <p class="mb-2 text-gray-700 dark:text-gray-300">Adress: 📍 Skopje Airport, North Macedonia </p>
                </div>
            </div>
        </div>
        <div class="max-w-6xl mx-auto mt-8 p-6 bg-white border-gray-200 dark:bg-gray-800 text-gray-200 shadow rounded ">
            <h2 class="text-3xl md:text-4xl text-center">Social Media</h2>
            <div class="flex text-center mt-5">
                <div class="w-1/3 facebook">
                    <p class="mb-2 text-gray-700 dark:text-gray-300">Facebook:</p>
                    <a href="https://www.facebook.com/">
                        <i class="fa-brands fa-square-facebook text-3xl"></i>
                    </a>                    
                </div>
                <div class="w-1/3 instagram">
                    <p class="mb-2 text-gray-700 dark:text-gray-300">Instagram:</p>
                    <a href="https://www.instagram.com/">
                        <i class="fa-brands fa-instagram text-3xl"></i>
                    </a>                    
                </div>
                <div class="w-1/3 google">
                    <p class="mb-2 text-gray-700 dark:text-gray-300">Google:</p>
                    <a href="https://www.google.com/">
                        <i class="fa-brands fa-google text-3xl"></i>
                    </a>                    
                </div>
            </div>
        </div>
    </div>
</div>