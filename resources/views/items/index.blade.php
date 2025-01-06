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

        /* Hover Animation for Cards */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Fade-In Animation for Products */
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
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold mb-8 text-center md:text-left">Catalog</h1>

        <!-- Mobile Dropdown for Categories -->
        <div class="md:hidden mb-6">
            <label for="category" class="block text-sm font-medium text-gray-700">Select Category</label>
            <select id="category" class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    onchange="window.location.href=this.value;">
                <option value="{{ route('items.index') }}" {{ !$selectedCategory ? 'selected' : '' }}>All</option>
                @foreach($categories as $category)
                <option value="{{ route('items.index', ['category' => $category->id]) }}"
                        {{ $selectedCategory == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col md:flex-row md:space-x-8">
            <!-- Sidebar for Desktop -->
            <div class="hidden md:block w-1/4 bg-white rounded-lg shadow-md p-4">
                <h2 class="text-lg font-semibold mb-4">Category</h2>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('items.index') }}" class="text-gray-700 hover:text-gray-900 block {{ !$selectedCategory ? 'font-bold' : '' }}">All</a>
                    </li>
                    @foreach($categories as $category)
                    <li>
                        <a href="{{ route('items.index', ['category' => $category->id]) }}"
                           class="text-gray-700 hover:text-gray-900 block {{ $selectedCategory == $category->id ? 'font-bold' : '' }}">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Product Grid -->
            <div class="w-full md:w-3/4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($items as $item)
                <div class="product-card bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300 fade-in">
                    <div class="relative">
                        <img src="{{ $item->imageUrl }}" alt="{{ $item->name }}" class="w-full h-36 sm:h-48 object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-sm font-medium text-gray-800 truncate">{{ $item->name }}</h3>
                        <p class="text-xs text-gray-500 mt-1">{{ $item->category->name }}</p>
                        <p class="text-sm font-semibold text-gray-800 mt-2">Rp {{ number_format($item->price, 0, ',', '.') }}/day</p>
                        <a href="{{ route('item.show', $item) }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700 text-center w-full">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            {{ $items->links() }}
        </div>
    </div>

    <!-- Footer -->
    @include('components.footer')
</body>
</html>
