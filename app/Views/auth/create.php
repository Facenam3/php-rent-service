<?php
    $error = $_SESSION['error'] ?? null;
    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];

    unset($_SESSION['error'], $_SESSION['errors'], $_SESSION['old']);
?>
<div class="flex justify-center items-center min-h-screen bg-gray-200 flex-col">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="mb-3 p-3 rounded-md text-green-500 text-lg">
               <?= htmlspecialchars($_SESSION['success']) ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php elseif (!empty($error)) : ?>
            <div class="mb-3 p-3 rounded-md text-red-600 text-lg">
                <?= htmlspecialchars($error) ?>
            </div>
    <?php endif; ?>
    <div class="w-full max-w-sm p-6 rounded-lg shadow-lg bg-white dark:bg-gray-800 border border-orange-500">
        <h2 class="text-4xl font-bold mb-6 text-orange-500 text-center">Login</h2>
            <form class="space-y-5" method="POST" action="/login" id="login">
                <!-- CSRF -->
                 <?= csrf_token() ?>
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Your email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="name@example.com"
                        class="w-full p-3 text-base bg-white text-gray-900 border border-gray-300 rounded-lg focus:ring-orange-500 focus:border-orange-500"
                        required
                    />
                      <?php if (!empty($errors['email'])): ?>
                        <small class="block mt-2 text-red-600 bg-gray-200 rounded-md p-2">
                            <?= htmlspecialchars($errors['email']) ?>
                        </small>
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
                    <?php if (!empty($errors['password'])): ?>
                        <small class="block mt-2 text-red-600 bg-gray-200 rounded-md p-2">
                            <?= htmlspecialchars($errors['password']) ?>
                        </small>
                    <?php endif; ?>
                </div>

                <div class="flex items-center mb-4">
                    <input id="remember" name="remember" type="checkbox"
                        class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" />
                    <label for="remember" class="ml-2 text-sm font-medium text-gray-100 dark:text-gray-200">Remember me</label>
                </div>

                <button type="submit"
                    class="w-full text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md mb-2">
                    Submit
                </button>
            </form>
    </div>
</div>
