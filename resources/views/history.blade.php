<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if ($histories->isEmpty())
                    <p class="text-center text-gray-600 dark:text-gray-400">Tidak ada barang yang pernah dipinjam.</p>
                @else
                    <h3 class="text-lg font-bold mb-4 text-gray-800 dark:text-gray-200">Riwayat Peminjaman Barang</h3>
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
                                @foreach ($histories as $history)
                                    <tr class="border-b dark:border-gray-600">
                                        <td class="px-4 py-2 text-gray-800 dark:text-gray-200">
                                            {{ $history->item->name }}
                                        </td>
                                        <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $history->start_date }}</td>
                                        <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $history->end_date }}</td>
                                        <td class="px-4 py-2 text-gray-600 dark:text-gray-400">{{ $history->status }}</td>
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
