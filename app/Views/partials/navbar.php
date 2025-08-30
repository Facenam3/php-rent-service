 <nav  class="bg-white border-gray-200 dark:bg-gray-800">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <p class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Rent a <span class="text-orange-500">Car</span></p>
            </a>
            <button 
                id="navbar-toggle" 
                type="button" 
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" 
                aria-controls="navbar-user" 
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            

       <div  class="hidden w-full lg:order-1 lg:flex lg:w-auto" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 lg:p-0 mt-4 border lg:flex-row lg:space-x-8 lg:mt-0 lg:border-0 dark:border-gray-700">
                <li>
                    <a href="/" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0 dark:text-white">Home</a>
                </li>
                <li>
                    <a href="/cars" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0 dark:text-white">Vehicles</a>
                </li>
                <li>
                    <a href="/reservations" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0 dark:text-white">Reservations</a>
                </li>
                <li>
                    <a href="/about-us" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0 dark:text-white">About us</a>
                </li>
                <li>
                    <a href="/contact" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:p-0 dark:text-white">Contact</a>
                </li>
                <?php if(isset($user)) :?>
                  <div class="lg:hidden mt-2">
                     <?php if(check('dashboard')) : ?>
                            <li>
                                <a href="/admin/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Admin Dashboard</a>
                            </li>
                        <?php else :?>
                            <li>
                                <a href="/user/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>                            
                        <?php endif ; ?>  
                        <form action="/logout" method="POST" class="m-0">
                            <?= csrf_token() ?>
                            <button type="submit" class="block text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md mb-2">Sign out</button>
                        </form>
                  </div>
                <?php else :?>
                    <li class="md:hidden mt-2">
                    <a href="/login" class="block text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md mb-2">
                        Login
                    </a>
                    <a href="/register" class="block text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md">
                        Register
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if(isset($user)) : ?>
            <div class="hidden lg:flex items-center md:order-2 space-x-4 relative">
                <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-orange-300 dark:focus:ring-orange-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQf1fiSQO7JfDw0uv1Ae_Ye-Bo9nhGNg27dwg&s" alt="user photo">
                </button>
                <div class="z-50 hidden absolute top-full right-0 mt-1 w-48 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-500 dark:text-white"><?= htmlspecialchars($user->name ?? $user->email) ?></span>
                    <span class="block text-sm text-gray-500 truncate dark:text-gray-400"><?= htmlspecialchars($user->email) ?></span>
                </div>
                <ul class="py-2 bg-white border-gray-200 dark:bg-gray-800 rounded shadow-lg shadow-gray-600" aria-labelledby="user-menu-button">
                    
                        <?php if(check('dashboard')) : ?>
                            <li>
                                <a href="/admin/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Admin Dashboard</a>
                            </li>
                        <?php else :?>
                            <li>
                                <a href="/user/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>                            
                        <?php endif ; ?>                
                    <li>
                    <form action="/logout" method="POST" class="m-0">
                        <?= csrf_token() ?>
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</button>
                    </form>
                    </li>
                </ul>
                </div>
            </div>
        <?php else : ?>
            <div class="hidden md:flex items-center md:order-2 space-x-4">
                <a href="/login" class="text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md">Login</a>
                <a href="/register" class="text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md">Register</a>
            </div>
        <?php endif; ?>

</nav>
