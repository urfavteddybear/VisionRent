<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lighting & Audio Support - Vision Rent</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold mb-8">Lighting & Audio Support</h1>

        <div class="flex space-x-8">
            <!-- Sidebar: Categories -->
            <div class="w-1/4 bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold mb-4">Category</h2>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-700 hover:text-gray-900 block">All</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900 block">Lighting Continuous</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900 block">Lighting Flash / Strobes</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900 block">Lighting Accessories</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900 block">Audio / Mic Support</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900 block">Monitors / Video Wireless</a></li>
                    <li><a href="#" class="text-gray-700 hover:text-gray-900 block">Live Streaming / Multimedia</a></li>
                </ul>
            </div>

            <!-- Product Grid -->
            <div class="w-3/4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($items as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $item->imageUrl }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $item->name }}</h3>
                        <p class="text-sm text-gray-600">{{ $item->category->name }}</p>
                        <p class="text-sm text-gray-600">Rp {{ number_format($item->price, 0, ',', '.') }}/day</p>
                        <a href="{{ route('item.show', $item) }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-8">
            {{ $items->links() }}
        </div>
    </div>

    @include('components.footer')
</body>
</html>
