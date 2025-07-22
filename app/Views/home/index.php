<div>
    <div class="hero flex items-end justify-center text-white">
        <div class="p-6 w-full bg-orange-600/75 flex items-center justify-center">
            <div class="w-full md:w-3/5 text-center md:text-left">
                <h1 class="text-3xl md:text-5xl capitalize font-extrabold">Explore your dream car</h1>
                <p class="text-2xl md:text-lg mt-4">Explore our wide selection of cars at unbeatable prices. Whether it's for business or adventure, we offer the best service, flexible bookings, and hassle-free rentals to get you on the road smoothly.</p>
            </div>     
        </div>
    </div>
</div>

<article class="promotion bg-gray-50 p-6 md:p-8 w-full">
    <div class="flex justify-center">
        <div class="flex flex-col md:flex-row items-start md:items-center w-full md:w-3/4 space-y-6 md:space-y-0 md:space-x-4">
            <div class="md:w-1/3 p-3">
                <i class="fa-solid fa-car"></i>
                <span class="ml-2 font-semibold">Better cars</span>
                <p class="text-lg md:text-2xl font-bold mt-2">Discover and drive the largest selection of new, premium rental cars.</p>
            </div> 
            <div class="md:w-1/3 p-3">
                <i class="fa-solid fa-suitcase-rolling"></i>
                <span class="ml-2 font-semibold">Drive across borders</span>
                <p class="text-lg md:text-2xl font-bold mt-2">Unleash your wanderlust with our Republic of North Macedonia rentals.</p>
            </div>     
            <div class="md:w-1/3 p-3">
                <i class="fa-solid fa-hand-holding-heart"></i>
                <span class="ml-2 font-semibold">Better service</span>
                <p class="text-lg md:text-2xl font-bold mt-2">Enjoy easy pickups, no hidden costs, and 24/7 customer support.</p>
            </div> 
        </div>
    </div>
</article>

<div class="bg-gray-200 w-full p-6">
    <div class="flex justify-center">
        <div class="flex flex-col lg:flex-row items-center w-full lg:w-3/4 space-y-6 lg:space-y-0 lg:space-x-6">
            <div class="w-full lg:w-1/2 flex justify-center items-center flex-col p-4 text-center lg:text-left">
                <h3 class="text-3xl md:text-4xl font-bold mb-4 w-full md:w-3/4">What do you need to pick up <span class="text-orange-500">the car?</span></h3>
                <p class="text-gray-500 text-base md:text-xl">All information you need to rent a car from our fleet.</p>
            </div>
            <div class="w-full lg:w-1/2 grid grid-cols-1 sm:grid-cols-2 gap-4 p-4">
                <div class="bg-gray-50 p-5 rounded-md shadow text-gray-700 border-b-2 border-transparent hover:border-orange-500 hover:text-orange-500 transition duration-300">
                    <div class="flex justify-between mb-3">
                        <h4 class="text-xl md:text-2xl">Driver's License</h4>
                        <i class="fa-solid fa-id-card text-4xl md:text-5xl"></i>
                    </div>
                    <p>A valid driver's license in the name of the main driver.</p>
                </div>
                <div class="bg-gray-50 p-5 rounded-md shadow text-gray-700 border-b-2 border-transparent hover:border-orange-500 hover:text-orange-500 transition duration-300">
                    <div class="flex justify-between mb-3">
                        <h4 class="text-xl md:text-2xl">Receipt</h4>
                        <i class="fa-solid fa-receipt text-4xl md:text-5xl"></i>
                    </div>
                    <p>An electronic receipt with reservation confirmation where available.</p>
                </div>
                <div class="bg-gray-50 p-5 rounded-md shadow text-gray-700 border-b-2 border-transparent hover:border-orange-500 hover:text-orange-500 transition duration-300">
                    <div class="flex justify-between mb-3">
                        <h4 class="text-xl md:text-2xl">Identification</h4>
                        <i class="fa-solid fa-id-badge text-4xl md:text-5xl"></i>
                    </div>
                    <p>National ID or identification card/document (ID).</p>
                </div>
                <div class="bg-gray-50 p-5 rounded-md shadow text-gray-700 border-b-2 border-transparent hover:border-orange-500 hover:text-orange-500 transition duration-300">
                    <div class="flex justify-between mb-3">
                        <h4 class="text-xl md:text-2xl">Credit/Debit Card</h4>
                        <i class="fa-solid fa-credit-card text-4xl md:text-5xl"></i>
                    </div>
                    <p>A credit card in the main driver's name with sufficient funds.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="relative w-full max-w-full mx-auto px-4 py-8">
        
            <div 
                x-data="{
                current: 0,
                slides: [
                    <?php foreach ($reviews as $review): ?>
                    {
                        img: '<?= $review->car_image ?>',
                        user: '<?= htmlspecialchars($review->user_name) ?>',
                        review: '<?= htmlspecialchars($review->comment) ?>',
                        rating: <?= (int) $review->rating ?>
                    },
                    <?php endforeach; ?>
                ]
                }" 
                class="relative w-full max-w-full mx-auto px-4"
            >
                
                <template x-for="(slide, index) in slides" :key="index">
                <div x-show="current === index" class="text-center p-4 bg-white rounded-lg shadow">
                    
                   <img 
                    :src="slide.img" 
                    alt="Car image"
                    class="w-full h-48 sm:h-64 md:h-80 lg:h-96 object-contain rounded-lg shadow mb-4"
                    />
                    <p class="text-lg italic text-gray-700">“<span x-text="slide.review"></span>”</p>
                    
                    <p class="text-sm text-gray-500 mt-2">— <span x-text="slide.user"></span></p>

                    <div class="flex justify-center mt-3 space-x-1">
                    <template x-for="star in 5" :key="star">
                        <svg 
                        class="w-5 h-5" 
                        :class="star <= slide.rating ? 'text-yellow-400' : 'text-gray-300'" 
                        fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.176 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </template>
                    </div>
                </div>
                </template>

                <!-- Prev/Next Buttons -->
                <button 
                    @click="current = (current - 1 + slides.length) % slides.length"
                    class="absolute top-1/2 left-2 -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full z-10"
                    >
                    ‹
                    </button>

                    <button 
                    @click="current = (current + 1) % slides.length"
                    class="absolute top-1/2 right-2 -translate-y-1/2 bg-gray-800 text-white px-3 py-1 rounded-full z-10"
                    >
                    ›
                </button>

                <!-- Dots -->
                <div class="flex justify-center mt-4 space-x-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button 
                    @click="current = index"
                    class="w-3 h-3 rounded-full"
                    :class="current === index ? 'bg-blue-500' : 'bg-gray-400'">
                    </button>
                </template>
                </div>
            </div>
</div>

