 <nav class="bg-white border-gray-200 dark:bg-gray-800">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <p class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Rent a <span class="text-orange-500">Car</span></p>
            </a>
            <button 
                id="navbar-toggle" 
                type="button" 
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" 
                aria-controls="navbar-user" 
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            
            
       <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border md:flex-row md:space-x-8 md:mt-0 md:border-0 dark:border-gray-700">
                <li>
                    <a href="/" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-white">Home</a>
                </li>
                <li>
                    <a href="/cars" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-white">Vehicles</a>
                </li>
                <li>
                    <a href="/reservations" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-white">Reservations</a>
                </li>
                <li>
                    <a href="/about-us" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-white">About us</a>
                </li>
                <li>
                    <a href="#" class="block nav-link py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:p-0 dark:text-white">Contact</a>
                </li>

                <li class="md:hidden mt-2">
                    <a href="/login" class="block text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md mb-2">
                        Login
                    </a>
                    <a href="/register" class="block text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md">
                        Register
                    </a>
                </li>
            </ul>
        </div>
        <?php if(isset($user))  :?>
            <div class="hidden md:flex items-center md:order-2 space-x-4">
                <form action="/logout" method="POST">
                    <button class="text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md">Logout</button>
                </form>
            </div>
        <?php else : ?>
            <div class="hidden md:flex items-center md:order-2 space-x-4">
                <a href="/login" class="text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md">
                    Login
                </a>
                <a href="/register" class="text-sm font-medium text-white bg-orange-600 hover:bg-orange-700 px-4 py-2 rounded-md">
                    Register
                </a>
            </div>
       <?php endif; ?>
    </nav>
