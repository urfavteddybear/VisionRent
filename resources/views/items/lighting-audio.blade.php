<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lighting & Audio Support - Vision Rent</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Inter:wght@400;600;700&display=swap');

    body {
    font-family: 'Roboto', sans-serif;
    }

    h1, h2, h3 {
    font-family: 'Inter', sans-serif;
    }
        .mobile-menu-enter {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, opacity 0.2s ease-out;
        }
        .mobile-menu-enter.show {
            max-height: 400px;
            opacity: 1;
        }
        @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
        }

        .animate-scroll {
            animation: scroll 45s linear infinite;
        }

        html {
            scroll-behavior: smooth;
        }

    </style>
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
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                    <div class="relative">
                        <img src="{{ $item->imageUrl }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                        @if($item->isNew)
                        <span class="absolute top-2 left-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">New</span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-sm font-medium text-gray-800 truncate">{{ $item->name }}</h3>
                        <p class="text-xs text-gray-500 mt-1">{{ $item->category->name }}</p>
                        <p class="text-sm font-semibold text-gray-800 mt-2">Rp {{ number_format($item->price, 0, ',', '.') }}/day</p>
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
