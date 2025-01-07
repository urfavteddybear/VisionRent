<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items - Vision Rent</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Inter:wght@400;600;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
        }

        h1, h2, h3 {
            font-family: 'Inter', sans-serif;
        }

        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .fade-in {
            opacity: 0;
            transform: translateY(10px);
            animation: fadeInUp 0.6s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .search-container {
            transition: all 0.3s ease;
        }

        .search-input {
            transition: all 0.3s ease;
        }

        .search-input:focus {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-gray-100">
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header and Search Section -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <h1 class="text-3xl font-bold text-center md:text-left mb-6 md:mb-0">Catalog</h1>

            <!-- Enhanced Search Bar -->
            <div class="w-full md:w-72">
                <form action="{{ route('items.index') }}" method="GET" class="search-container">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <input type="text"
                               name="search"
                               placeholder="Search items..."
                               value="{{ request('search') }}"
                               class="search-input w-full pl-9 pr-8 py-2 rounded-full border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 text-sm"
                        >
                        @if(request('search'))
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <a href="{{ route('items.index', ['category' => request('category')]) }}"
                                   class="p-2 text-gray-400 hover:text-gray-600 focus:outline-none">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <!-- Mobile Dropdown for Categories -->
        <div class="md:hidden mb-6">
            <label for="category" class="block text-sm font-medium text-gray-700">Select Category</label>
            <select id="category"
                    class="mt-1 block w-full bg-white border-2 border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    onchange="window.location.href=this.value;">
                <option value="{{ route('items.index', ['search' => request('search')]) }}"
                        {{ !$selectedCategory ? 'selected' : '' }}>
                    All Categories
                </option>
                @foreach($categories as $category)
                <option value="{{ route('items.index', ['category' => $category->id, 'search' => request('search')]) }}"
                        {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col md:flex-row md:space-x-8">
            <!-- Sidebar for Desktop -->
            <div class="hidden md:block w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Categories</h2>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('items.index', ['search' => request('search')]) }}"
                               class="text-gray-700 hover:text-red-500 {{ !$selectedCategory ? 'font-semibold text-red-500' : '' }}">
                                All Categories
                            </a>
                        </li>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('items.index', ['category' => $category->id, 'search' => request('search')]) }}"
                               class="text-gray-700 hover:text-red-500 {{ $selectedCategory == $category->id ? 'font-semibold text-red-500' : '' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="w-full md:w-3/4">
                @if($items->isEmpty())
                    <div class="bg-white rounded-lg shadow-md p-8 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01M12 12h.01"></path>
                        </svg>
                        <h3 class="mt-4 text-lg font-medium text-gray-900">No items found</h3>
                        <p class="mt-2 text-gray-500">Try adjusting your search or filter to find what you're looking for.</p>
                    </div>
                @else
                    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($items as $item)
                        <div class="product-card bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="relative">
                                <img src="{{ $item->imageUrl }}" alt="{{ $item->name }}" class="w-full h-36 sm:h-48 object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="text-sm font-medium text-gray-800 truncate">{{ $item->name }}</h3>
                                <p class="text-xs text-gray-500 mt-1">{{ $item->category->name }}</p>
                                <p class="text-sm font-semibold text-gray-800 mt-2">Rp {{ number_format($item->price, 0, ',', '.') }}/day</p>
                                <a href="{{ route('item.show', $item) }}"
                                   class="mt-4 block text-center px-4 py-2 border border-gray-800 text-gray-800 rounded-lg hover:bg-gray-800 hover:text-white transition-colors duration-300">
                                    View Details
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $items->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html>
