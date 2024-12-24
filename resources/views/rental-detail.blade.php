<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Rental') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-6 text-gray-800 dark:text-gray-200">Detail Barang</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Nama Barang</p>
                        <p class="text-lg font-medium text-gray-800 dark:text-gray-200">{{ $rental->item->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Mulai</p>
                        <p class="text-lg font-medium text-gray-800 dark:text-gray-200">{{ $rental->start_date }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Tanggal Selesai</p>
                        <p class="text-lg font-medium text-gray-800 dark:text-gray-200">{{ $rental->end_date }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Total Biaya</p>
                        <p class="text-lg font-medium text-gray-800 dark:text-gray-200">{{ $rental->end_date }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Status</p>
                        <p class="text-lg font-medium text-gray-800 dark:text-gray-200">
                            {{ $rental->status === 'rented' ? 'Dipinjam' : 'Dikembalikan' }}
                        </p>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
