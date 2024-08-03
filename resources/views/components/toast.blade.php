<div x-data="{ show: false, message: '', type: 'success' }"
     x-show="show"
     class="fixed top-0 right-0 p-4 z-10 sm:p-6"
     x-init="setTimeout(() => show = false, 3000)"
>
    <div class="bg-{{ type }}-500 text-white rounded-lg shadow dark:bg-{{ type }}-700"
         x-transition:enter="transform ease-out duration-300 translate-y-2 opacity-0 sm:translate-y-0 sm:scale-95"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transform ease-in duration-300 translate-y-2 opacity-0 sm:translate-y-0 sm:scale-95"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
    >
        <div class="flex">
            <div class="flex-grow flex items-center">
                <div class="ml-3">
                    <div class="text-sm font-medium text-white truncate">{{ message }}</div>
                </div>
            </div>
            <button @click="show = false" class="flex-shrink-0 ml-3 inline-flex text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                <span class="sr-only">Close</span>
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
</div>
