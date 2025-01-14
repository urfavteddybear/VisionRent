<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (auth()->user()->needsVerification())
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
                <p class="font-bold">Verifikasi Data Diperlukan</p>
                <p>Untuk dapat menggunakan layanan kami sepenuhnya, silakan lengkapi data diri Anda.
                    <a href="{{ route('verification.form') }}" class="underline font-semibold">Klik di sini untuk verifikasi</a>
                </p>
            </div>
        </div>
    @endif

    @if (auth()->user()->isPending())
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4" role="alert">
                <p class="font-bold">Verifikasi Sedang Diproses</p>
                <p>Data verifikasi Anda sedang dalam proses review oleh admin. Kami akan mengirimkan email setelah proses selesai.</p>
            </div>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($rentals->isEmpty())
                    <div class="text-center">
                        <p class="text-gray-600 dark:text-gray-400">Tidak ada barang yang sedang dipinjam.</p>
                        <a href="{{ route('items.index') }}"
                           class="inline-block mt-4 bg-red-500 text-white px-6 py-2 rounded-md shadow-md hover:bg-red-400 transition duration-200">
                            Kunjungi Katalog
                        </a>
                    </div>
                @else
                    <h3 class="text-lg font-bold mb-4 text-gray-800 dark:text-gray-200">Barang yang Sedang Dipinjam</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto border-collapse">
                            <thead>
                                <tr class="bg-gray-100 dark:bg-gray-700">
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Nama Barang</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal Mulai</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Tanggal Selesai</th>
                                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700 dark:text-gray-300">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rentals as $rental)
                                    <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 cursor-pointer"
                                        onclick="window.location.href='{{ route('rental.show', $rental->id) }}'">
                                        <td class="px-4 py-2 text-gray-800 dark:text-gray-200">
                                            {{ $rental->item->name }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $rental->start_date }}</td>
                                        <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $rental->end_date }}</td>
                                        <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $rental->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
