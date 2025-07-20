<section class="bg-gray-300 w-full py-12 px-4">
  <div class="max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold text-center mb-8">Frequently Asked Questions</h1>

    <div class="space-y-4">
  
      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between w-full text-left">
          <span class="text-lg font-semibold text-gray-800">1. What documents do I need to rent a car?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          You’ll need a valid driver’s license, a credit card, and a government-issued ID (passport or ID card).
        </div>
      </div>

      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between w-full text-left">
          <span class="text-lg font-semibold text-gray-800">2. Can I pay with cash?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          Yes, you can pay with cash on pickup or securely online using Stripe.
        </div>
      </div>

      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between w-full text-left">
          <span class="text-lg font-semibold text-gray-800">3. Is insurance included?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          Basic insurance is included. Extra coverage can be added for more protection.
        </div>
      </div>

      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between w-full text-left">
          <span class="text-lg font-semibold text-gray-800">4. Can I cancel my reservation?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          Yes, free cancellation is available up to 24 hours before pickup.
        </div>
      </div>
      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
      <button @click="open = !open" class="flex justify-between items-center w-full text-left">
        <span class="text-lg font-semibold text-gray-800">5. Is a security deposit required?</span>
        <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        <svg x-show="open" x-cloak class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
        </svg>
      </button>
      <div x-show="open" x-transition class="mt-2 text-gray-700">
        Yes, a refundable security deposit is required to cover any potential damages or late returns.
      </div>
    </div>

      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
          <span class="text-lg font-semibold text-gray-800">6. Do I need to fill the tank with petrol?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" x-cloak class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          Yes, please return the car with the same fuel level as at pickup to avoid extra charges.
        </div>
      </div>

      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
          <span class="text-lg font-semibold text-gray-800">7. What happens if I cancel my reservation?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" x-cloak class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          Free cancellation is available up to 24 hours before pickup. After that, cancellation fees may apply.
        </div>
      </div>

      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
          <span class="text-lg font-semibold text-gray-800">8. What happens if I arrive late than the scheduled time for delivery of the car?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" x-cloak class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          Please inform us as soon as possible. Late arrival may result in a shortened rental period or additional fees.
        </div>
      </div>

      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
          <span class="text-lg font-semibold text-gray-800">9. Will the rental cost be refunded if I deliver the car early?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" x-cloak class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          Rental fees are typically non-refundable for early returns, but please contact us for special arrangements.
        </div>
      </div>
  
      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
          <span class="text-lg font-semibold text-gray-800">10. How long have you been in the car rental business?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" x-cloak class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          We have proudly served customers for over 5 years, delivering quality vehicles and excellent customer service.
        </div>
      </div>

      <div x-data="{ open: false }" class="bg-white rounded-lg shadow p-4">
        <button @click="open = !open" class="flex justify-between items-center w-full text-left">
          <span class="text-lg font-semibold text-gray-800">11. Can I extend my rental period after pickup?</span>
          <svg x-show="!open" class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
          </svg>
          <svg x-show="open" x-cloak class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
          </svg>
        </button>
        <div x-show="open" x-transition class="mt-2 text-gray-700">
          Yes, you can extend your rental by contacting us directly, subject to vehicle availability and possible additional fees.
        </div>
      </div>

    </div>
  </div>
</section>

