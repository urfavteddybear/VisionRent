<div class="p-4">
    {{-- <h2 class="text-xl font-semibold mb-4">Ketersediaan {{ $item->name }}</h2> --}}

    <div class="mb-4 flex justify-between items-center">
        <button onclick="changeMonth(-1)" class="p-2 hover:bg-gray-100 rounded-full">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <h3 class="text-lg font-medium">
            {{ $currentDate->format('F Y') }}
        </h3>
        <button onclick="changeMonth(1)" class="p-2 hover:bg-gray-100 rounded-full">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <div class="grid grid-cols-7 gap-2">
        <div class="text-center font-medium text-sm text-gray-600">Min</div>
        <div class="text-center font-medium text-sm text-gray-600">Sen</div>
        <div class="text-center font-medium text-sm text-gray-600">Sel</div>
        <div class="text-center font-medium text-sm text-gray-600">Rab</div>
        <div class="text-center font-medium text-sm text-gray-600">Kam</div>
        <div class="text-center font-medium text-sm text-gray-600">Jum</div>
        <div class="text-center font-medium text-sm text-gray-600">Sab</div>

        @php
            $startOfMonth = $currentDate->copy()->startOfMonth();
            $endOfMonth = $currentDate->copy()->endOfMonth();

            // Get the start of the first week
            $calendar_start = $startOfMonth->copy()->startOfWeek();

            // Get the end of the last week
            $calendar_end = $endOfMonth->copy()->endOfWeek();

            $currentDay = $calendar_start->copy();
        @endphp

        @while ($currentDay <= $calendar_end)
            @php
                $dateString = $currentDay->format('Y-m-d');
                $isCurrentMonth = $currentDay->month === $currentDate->month;

                if (isset($availability[$dateString])) {
                    $data = $availability[$dateString];
                    if ($data['available'] === 0) {
                        $bgClass = 'bg-red-100 text-red-900';
                    } elseif ($data['available'] <= $data['total'] / 3) {
                        $bgClass = 'bg-yellow-100 text-yellow-900';
                    } else {
                        $bgClass = 'bg-green-100 text-green-900';
                    }
                } else {
                    $bgClass = '';
                }
            @endphp

            <div class="aspect-square p-1 border rounded {{ $isCurrentMonth ? $bgClass : 'bg-gray-50' }}
                      {{ $currentDay->isToday() ? 'ring-2 ring-blue-500' : '' }}
                      transition-all duration-200">
                <div class="text-center text-sm {{ $isCurrentMonth ? 'font-medium' : 'text-gray-400' }}">
                    {{ $currentDay->format('d') }}
                </div>
                @if($isCurrentMonth && isset($availability[$dateString]))
                <div class="text-center text-xs">
                    {{ $availability[$dateString]['available'] }}/{{ $availability[$dateString]['total'] }}
                </div>
                @endif
            </div>

            @php
                $currentDay->addDay();
            @endphp
        @endwhile
    </div>

    <div class="mt-4 space-y-2">
        <div class="flex items-center">
            <div class="w-4 h-4 bg-green-100 border rounded mr-2"></div>
            <span class="text-sm">Many units available</span>
        </div>
        <div class="flex items-center">
            <div class="w-4 h-4 bg-yellow-100 border rounded mr-2"></div>
            <span class="text-sm">Limited stock</span>
        </div>
        <div class="flex items-center">
            <div class="w-4 h-4 bg-red-100 border rounded mr-2"></div>
            <span class="text-sm">Not available</span>
        </div>
    </div>
</div>
