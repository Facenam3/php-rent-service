<main class="flex-1 p-12">
        <div class="py-12 px-12">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <div class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow-sm">
                    <div class="p-6 text-s md:text-md lg:text-2xl text-gray-100">
                        Welcome back, <span class="text-orange-600"><?= $user->first_name ?></span>
                        <p class="text-md lg:text-lg text-gray-400 mt-2">Here’s an overview of your profile.</p>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <form action="" class="bg-white border-gray-200 dark:bg-gray-800 rounded-lg shadow-sm">
                    <div class="flex flex-col gap-6 lg:flex-row">
                        <div class="w-full lg:w-1/2">
                             <div class="mb-2 p-3">
                                <label for="first_name" class="block text-gray-100 text-sm font-bold mb-2">
                                    First name:
                                </label>
                                <input type="text" id="first_name" name="first_name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="John"
                                    value="<?= $user->first_name ?>"
                                    required>
                            </div>                             
                             <div class="mb-2 p-3">
                                <label for="email" class="block text-gray-100 text-sm font-bold mb-2">
                                    Email
                                </label>
                                <input type="text" id="email" name="email"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="John"
                                    value="<?= $user->email ?>"
                                    required>
                            </div>
                            <div class="mb-2 p-3">
                                    <label for="gender" class="block text-gray-100 text-sm font-bold mb-2">
                                        Gender:
                                    </label>
                                    <select name="gender" id="gender"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                        <option value="<?= $user->gender ?>" selected><?= ucfirst($user->gender) ?></option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                            </div>
                            <div class="mb-2 p-3">
                                <label for="locale" class="block text-gray-100 text-sm font-bold mb-2">
                                    Your Adress
                                </label>
                                <input type="text" id="locale" name="locale"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="You can update your adress location."
                                    value="<?= $user->locale ?>"
                                    required>
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <div class="mb-2 p-3">
                                <label for="last_name" class="block text-gray-100 text-sm font-bold mb-2">
                                    Last name:
                                </label>
                                <input type="text" id="last_name" name="last_name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="John"
                                    value="<?= $user->last_name ?>"
                                    required>
                            </div>
                            
                            <div class="mb-2 p-3">
                                <label for="password" class="block text-gray-100 text-sm font-bold mb-2">
                                    Password
                                </label>
                                <input type="text" id="password" name="password"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="*********** You can update your password."
                                    value="<?= $user->password ?>"
                                    required>
                            </div>
                            <div class="mb-2 p-3">
                                <label for="picture" class="block text-gray-100 text-sm font-bold mb-2">
                                    Picture
                                </label>
                                <input type="text" id="picture" name="picture"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    placeholder="You can update your picture."
                                    value="<?= $user->picture ?>"
                                    required>
                            </div>
                            <div class="mt-8 p-4">
                                    <a href="/user/dashboard"
                                        class="block w-full text-center lg:hidden focus:outline-none text-white bg-orange-500 hover:bg-orange-600 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900" >
                                        Back To Dashboard
                                    </a>
                                    <input type="submit" value="Submit"
                                    class="w-full focus:outline-none text-white bg-orange-500 hover:bg-orange-500 focus:ring-4 focus:ring-orange-300 font-medium rounded-lg text-lg px-5 py-2 me-2 mb-2 dark:focus:ring-orange-900">
                            </div>
                            
                        </div>
                    </div>                    
                </form>
            </div>
        </div>
</main>