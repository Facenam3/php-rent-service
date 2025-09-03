<div class="py-12 px-12">
    <div class="w-full bg-white dark:bg-gray-800 rounded-md border-2 shadow-md text-black p-6 mt-2">
            <h1 class="p-4 text-xl text-orange-500 font-medium ">Edit User</h1>
           <a href="/admin/users"
                class="block lg:hidden w-full mb-4 inline-block text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-800 font-medium rounded-lg text-sm sm:text-base px-4 py-2 sm:px-6 sm:py-3 whitespace-nowrap">
                    ← Back to Table
            </a>
            <form action="/admin/users/<?= $user->id?>/update" method="POST" data-id="<?= $user->id ?>" class="w-full mx-auto" id="user-update">
                    <?= csrf_token() ?>
                    <div class="flex flex-col-reverse gap-6 lg:flex-row">
                        <div class="w-full lg:w-1/2">
                             <div class="mb-4">
                                <label for="first_name" class="block text-gray-100 text-sm font-bold mb-2">
                                    First name:
                                </label>
                                <input type="text" id="first_name" name="first_name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="John"
                                    value="<?= $user->first_name ?>"
                                    required>
                            </div>
                           
                              <div class="mb-4">
                                    <label for="role" class="block text-gray-100 text-sm font-bold mb-2">
                                        Role:
                                    </label>
                                    <select name="role" id="role"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="<?= $user->role ?>" selected><?= ucfirst($user->role) ?></option>
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="gender" class="block text-gray-100 text-sm font-bold mb-2">
                                        Gender:
                                    </label>
                                    <select name="gender" id="gender"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="<?= $user->gender ?>" selected><?= $user->gender ?></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <a href="/admin/users"
                                    class="hidden lg:inline-block focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900" >
                                    Back To Users
                                </a>
                                <input type="submit" value="Submit"
                                    class="focus:outline-none text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900">
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div class="mb-4">
                                <label for="last_name" class="block text-gray-100 text-sm font-bold mb-2">
                                    Last name:
                                </label>
                                <input type="text" id="last_name" name="last_name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="Doe"
                                    value="<?= $user->last_name ?>"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-gray-100 text-sm font-bold mb-2">
                                    Email:
                                </label>
                                <input type="email" id="email" name="email"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="JohnDoe@example.com"
                                    value="<?= $user->email ?>"
                                    required>
                            </div>
                        </div>
                    </div>
            </form>
    </div>
</div>