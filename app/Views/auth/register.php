<div class="flex justify-center items-center min-h-screen bg-gray-200">
    <div class="w-full max-w-sm p-10 rounded-lg shadow-lg bg-white dark:bg-gray-800 border border-orange-500">     
        <h2 class="text-4xl font-bold mb-6 text-orange-500 text-center">Register</h2>
            <form class="space-y-5" method="POST" action="/register" id="register">
                <!-- CSRF -->
                 <?= csrf_token() ?>
                <div class="mb-4">
                    <label for="first_name" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">First name</label>
                    <input
                        type="first_name"
                        id="first_name"
                        name="first_name"
                        placeholder="John"
                        value="<?= htmlspecialchars($_SESSION['old']['first_name'] ?? '') ?>"
                        class="w-full p-3 text-base bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                        
                    />
                    <?php if (isset($_SESSION['errors']['first_name'])): ?>
                        <p class="mt-2 w-full text-red-600 bg-gray-200 rounded-md p-2"><?= htmlspecialchars($_SESSION['errors']['first_name']) ?></p>
                        
                    <?php endif; ?>
                </div>
                <div class="mb-4">
                    <label for="last_name" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Last name</label>
                    <input
                        type="last_name"
                        id="last_name"
                        name="last_name"
                        placeholder="Doe"
                        value="<?= htmlspecialchars($_SESSION['old']['last_name'] ?? '') ?>"
                        class="w-full p-3 text-base bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                        required
                    />
                    <?php if (isset($_SESSION['errors']['last_name'])): ?>
                        <p class="mt-2 w-full text-red-600 bg-gray-200 rounded-md p-2"><?= htmlspecialchars($_SESSION['errors']['last_name']) ?></p>
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="JohnDoe@example.com"
                        value="<?= htmlspecialchars($_SESSION['old']['email'] ?? '') ?>"
                        class="w-full p-3 text-base bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                        required
                    />
                    <?php if (isset($_SESSION['errors']['email'])): ?>
                        <p class="w-full mt-2 text-red-600 bg-gray-200 rounded-md p-2"><?= htmlspecialchars($_SESSION['errors']['email']) ?></p>
                        
                    <?php endif; ?>
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Your password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full p-3 text-base bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                        required
                    />
                    <?php if (isset($_SESSION['errors']['password'])): ?>
                        <p class="w-full mt-2 text-red-600 bg-gray-200 rounded-md p-2"><?= htmlspecialchars($_SESSION['errors']['password']) ?></p>
                        
                    <?php endif; ?>
                </div>
                <button type="submit"
                    class="w-full text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md mb-2">
                    Submit
                </button>
            </form>
            <div class="mt-3">
                 <a href="/auth/google/redirect" 
                    class="w-full text-sm font-medium text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md mb-2 flex items-center justify-center">
                    <i class="fa-brands fa-google mr-2"></i>
                    Register with Google
                </a>
            </div>
            <?php
                unset($_SESSION['errors']);
                unset($_SESSION['old']);
            ?>
    </div>
</div>