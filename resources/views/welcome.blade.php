{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vision Rent - Camera Equipment Rental</title>
    @vite('resources/css/app.css')
    <style>
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
    </style>
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="/" class="flex items-center">
                        <img src="{{ asset('images/2.png') }}" alt="Vision Rent" class="h-8 w-auto">
                    </a>
                </div>

                <!-- Desktop Menu (hidden on mobile) -->
                <div class="hidden md:block">
                    <div class="flex items-center space-x-4">
                        <a href="/" class="px-3 py-2 hover:text-gray-300">Homepage</a>
                        <a href="/equipment" class="px-3 py-2 hover:text-gray-300">Equipment</a>
                        <a href="/featured" class="px-3 py-2 hover:text-gray-300">Featured</a>
                        <a href="/about" class="px-3 py-2 hover:text-gray-300">About Us</a>
                        <a href="/contact" class="px-3 py-2 hover:text-gray-300">Contact Us</a>

                        @auth
                            <a href="{{ url('/dashboard') }}" class="bg-white text-gray-800 px-4 py-2 rounded-md hover:bg-gray-200">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="bg-white text-gray-800 px-4 py-2 rounded-md hover:bg-gray-200">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-gray-700 text-white px-4 py-2 rounded-md hover:bg-gray-600">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>

                <!-- Mobile menu button -->
                <button type="button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none transition-colors duration-200" id="mobile-menu-button">
                    <span class="sr-only">Open main menu</span>
                    <!-- Hamburger icon -->
                    <svg class="h-6 w-6 transition-transform duration-200 ease-in-out" id="menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Close icon (hidden by default) -->
                    <svg class="h-6 w-6 hidden transition-transform duration-200 ease-in-out" id="close-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu (hidden by default) -->
        <div class="mobile-menu-enter md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="/" class="block px-3 py-2 text-white hover:bg-gray-700 rounded-md">Homepage</a>
                <a href="/equipment" class="block px-3 py-2 text-white hover:bg-gray-700 rounded-md">Equipment</a>
                <a href="/featured" class="block px-3 py-2 text-white hover:bg-gray-700 rounded-md">Featured</a>
                <a href="/about" class="block px-3 py-2 text-white hover:bg-gray-700 rounded-md">About Us</a>
                <a href="/contact" class="block px-3 py-2 text-white hover:bg-gray-700 rounded-md">Contact Us</a>

                @auth
                    <a href="{{ url('/dashboard') }}" class="block px-3 py-2 bg-white text-gray-800 rounded-md">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="block px-3 py-2 bg-white text-gray-800 rounded-md">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block px-3 py-2 bg-gray-700 text-white rounded-md mt-1">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </nav>

    <!-- Featured Equipment Section -->
    <section class="py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Featured Equipment</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($featuredEquipment as $equipment)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $equipment['image'] }}" alt="{{ $equipment['name'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $equipment['name'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $equipment['description'] }}</p>
                        <a href="/equipment/{{ $equipment['id'] }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">View More</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Camera & Lens Support Section -->
    <section class="py-12 px-4 bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Camera & Lens Support</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($cameraSupport as $item)
                <div class="bg-white text-gray-800 rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $item['description'] }}</p>
                        <a href="/support/{{ $item['id'] }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">View More</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="/support" class="inline-block bg-white text-gray-800 px-6 py-3 rounded-md hover:bg-gray-200">VIEW MORE</a>
            </div>
        </div>
    </section>

    <!-- Lighting & Audio Support Section -->
    <section class="py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Lighting & Audio Support</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($lightingSupport as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $item['description'] }}</p>
                        <a href="/support/{{ $item['id'] }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">View More</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="/lighting-audio" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-md hover:bg-gray-700">VIEW MORE</a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <img src="{{ asset('images/2.png') }}" alt="Vision Rent" class="h-12 mb-4">
                <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 3.75a3.75 3.75 0 100 7.5 3.75 3.75 0 000-7.5zM12 9a3 3 0 11-6 0 3 3 0 016 0zm6 3a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/></svg>
                    </a>
                    <!-- Add other social icons similarly -->
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-400 hover:text-white">Homepage</a></li>
                    <li><a href="/equipment" class="text-gray-400 hover:text-white">Equipment</a></li>
                    <li><a href="/featured" class="text-gray-400 hover:text-white">Featured</a></li>
                    <li><a href="/about" class="text-gray-400 hover:text-white">About Us</a></li>
                    <li><a href="/contact" class="text-gray-400 hover:text-white">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Address</h3>
                <p class="text-gray-400">JL Testing Parlamentur No. 81<br>Denpasar, Bali, Indonesia</p>
            </div>
        </div>
    </footer>

    <!-- Mobile menu -->
    <div class="mobile-menu hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 bg-gray-800">
            <a href="/" class="block px-3 py-2 text-white hover:bg-gray-700">Homepage</a>
            <a href="/equipment" class="block px-3 py-2 text-white hover:bg-gray-700">Equipment</a>
            <a href="/featured" class="block px-3 py-2 text-white hover:bg-gray-700">Featured</a>
            <a href="/about" class="block px-3 py-2 text-white hover:bg-gray-700">About Us</a>
            <a href="/contact" class="block px-3 py-2 text-white hover:bg-gray-700">Contact Us</a>
            <a href="/login" class="block px-3 py-2 bg-white text-gray-800 rounded-md">Login</a>
        </div>
    </div>

    {{-- @push('scripts') --}}
    {{-- <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');
            let isMenuOpen = false;

            mobileMenuButton.addEventListener('click', () => {
                isMenuOpen = !isMenuOpen;

                // Animate icons
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');

                // Rotate the visible icon
                const visibleIcon = isMenuOpen ? closeIcon : menuIcon;
                visibleIcon.style.transform = isMenuOpen ? 'rotate(90deg)' : 'rotate(0)';

                // Animate menu
                if (isMenuOpen) {
                    mobileMenu.classList.add('show');
                } else {
                    mobileMenu.classList.remove('show');
                }

                // Add a slight bounce to the button
                mobileMenuButton.classList.add('scale-95');
                setTimeout(() => {
                    mobileMenuButton.classList.remove('scale-95');
                }, 100);
            });
        });
    </script>
    {{-- @endpush --}}
</body>
</html>
