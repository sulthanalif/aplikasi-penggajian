<div class="">
    <div class="px-4 sm:px-6 lg:px-8">
      <div class="flex justify-start gap-4 items-center">
        <div class="px-6 py-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-inset ring-gray-900/5 dark:ring-gray-50/[0.125] sm:px-8">
          <dt class="text-sm font-semibold text-gray-900 dark:text-gray-300">Jumlah Guru</dt>
          <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $teachersCount }}</dd>
        </div>

        <div class="px-6 py-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-inset ring-gray-900/5 dark:ring-gray-50/[0.125] sm:px-8">
          <dt class="text-sm font-semibold text-gray-900 dark:text-gray-300">Jumlah User</dt>
          <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $usersCount }}</dd>
        </div>

        <div class="px-6 py-4 bg-white dark:bg-gray-800 rounded-lg shadow-lg ring-1 ring-inset ring-gray-900/5 dark:ring-gray-50/[0.125] sm:px-8">
          <dt class="text-sm font-semibold text-gray-900 dark:text-gray-300">Jumlah Guru Hadir Tgl {{ date('d M Y') }}</dt>
          <dd class="mt-1 text-3xl font-semibold text-gray-900 dark:text-white">{{ $absenceCount }}</dd>
        </div>
      </div>
    </div>
  </div>
