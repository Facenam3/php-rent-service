<div class="text-white p-4 sm:p-6 mt-5">
    <div class="py-4 sm:px-4 lg:px-8">
        <div class="w-full bg-white dark:bg-gray-800 rounded-md border shadow-md text-black p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <h1 class="text-xl sm:text-2xl text-orange-600 font-semibold">Users</h1>
                <a href="/admin/users/create"
                   class="inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3">
                    Add New User
                </a>
            </div>

            <form method="GET" action="#" class="mt-6 bg-gray-200 p-4 rounded-md flex flex-col sm:flex-row gap-4 sm:items-center">
                <input type="text" name="search" class="flex-1 rounded-md p-2 text-black" placeholder="Search users..." value="">
                <button type="submit"
                        class="text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-md text-sm px-4 py-2 sm:text-base sm:px-6 sm:py-3">
                    Search
                </button>
            </form>

            <div class="overflow-x-auto mt-6 rounded-md border border-gray-300 hidden lg:block">
                <table class="min-w-full divide-y divide-gray-300 text-sm sm:text-base">
                    <thead class="bg-orange-500 text-white uppercase font-medium">
                        <tr>
                            <th class="px-8 py-3 text-left">ID</th>
                            <th class="px-8 py-3 text-left">Full Name</th>
                            <th class="px-8 py-3 text-left">Email</th>
                            <th class="px-8 py-3 text-left">Role</th>
                            <th class="px-8 py-3 text-left">Created</th>
                            <th class="px-8 py-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-100 text-gray-900">
                        <?php if ($users): ?>
                            <?php foreach ($users as $user): ?>
                                <tr class="border-b">
                                    <td class="px-8 py-2"><?= $user->id ?></td>
                                    <td class="px-8 py-2"><?= htmlspecialchars("$user->first_name $user->last_name") ?></td>
                                    <td class="px-8 py-2"><?= htmlspecialchars($user->email) ?></td>
                                    <td class="px-8 py-2"><?= htmlspecialchars($user->role) ?></td>
                                    <td class="px-8 py-2"><?= htmlspecialchars($user->created) ?></td>
                                    <td class="px-8 py-2">
                                        <div class="flex flex-wrap gap-2">
                                            <a href="#" class="text-blue-600" data-id="<?= $user->id ?>" id="user-edit">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </a>
                                            <form id="user-delete" data-id="<?= $user->id ?>" class="inline">
                                                <?= csrf_token() ?>
                                                <button type="submit" class="user-delete text-red-600">
                                                    <i class="fa-solid fa-trash-can"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="mt-6 grid grid-cols-1 gap-4 md:block lg:hidden">
                <?php if ($users): ?>
                    <?php foreach ($users as $user): ?>
                        <div class="bg-gray-100 border rounded-lg shadow p-4 flex flex-col justify-between mb-4">
                            <div>
                                <h2 class="text-lg font-semibold text-orange-600"><?= htmlspecialchars("$user->first_name $user->last_name") ?></h2>
                                <p class="text-sm text-gray-700 mt-1"><?= htmlspecialchars($user->email) ?></p>
                                <p class="text-sm text-gray-600 mt-1">
                                    Role: <span class="font-medium"><?= htmlspecialchars($user->role) ?></span>
                                </p>
                                <p class="text-xs text-gray-500 mt-1">Created: <?= htmlspecialchars($user->created) ?></p>
                            </div>
                            <div class="mt-4 flex justify-start gap-4">
                                <a href="#" class="text-blue-600 hover:underline text-sm" data-id="<?= $user->id ?>" id="user-edit">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <form id="user-delete" data-id="<?= $user->id ?>" class="inline">
                                    <?= csrf_token() ?>
                                    <button type="submit" class="user-delete text-red-600 hover:underline text-sm">
                                        <i class="fa-solid fa-trash-can"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-gray-600">No users found.</p>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
