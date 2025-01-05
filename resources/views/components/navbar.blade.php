<nav class="bg-gray-800 text-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/vision-rent-logo.png') }}" alt="Vision Rent" class="h-12 w-auto"> <!-- Logo sedikit diperbesar -->
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-6">
                <a href="/" class="hover:text-gray-300 text-lg font-medium {{ request()->is('/') ? 'text-red-500' : '' }}">Home</a>
                <a href="{{ url('/') }}#featured-equipment" class="hover:text-gray-300 text-lg font-medium">Featured</a>
                <a href="/about" class="hover:text-gray-300 text-lg font-medium">About Us</a>
                <a href="https://wa.me/{{ config('app.whatsapp_number') }}?text=Halo VisionRent" class="hover:text-gray-300 text-lg font-medium">Contact Us</a>

                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-red-500 text-white px-6 py-2 rounded-full text-lg font-semibold hover:bg-red-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="bg-gray-700 text-white px-6 py-2 rounded-full text-lg font-medium hover:bg-gray-600">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-gray-700 text-white px-6 py-2 rounded-full text-lg font-medium hover:bg-gray-600">Register</a>
                    @endif
                @endauth
            </div>

            <!-- Mobile Menu Button -->
            <button type="button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none" id="mobile-menu-button">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" id="menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="h-6 w-6 hidden" id="close-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu-enter md:hidden" id="mobile-menu">
        <div class="px-4 pt-4 pb-6 space-y-2">
            <a href="/" class="hover:text-gray-300 text-lg font-semibold {{ request()->is('/') ? 'text-red-500' : '' }}">Home</a>
            <a href="{{ url('/') }}#featured-equipment" class="hover:text-gray-300 text-lg font-semibold {{ request()->is('featured-equipment') ? 'text-red-500' : '' }}">Featured</a>
            <a href="/about" class="hover:text-gray-300 text-lg font-semibold {{ request()->is('about') ? 'text-red-500' : '' }}">About Us</a>
            <a href="https://wa.me/{{ config('app.whatsapp_number') }}?text=Halo VisionRent" class="hover:text-gray-300 text-lg font-semibold">Contact Us</a>

            @auth
                <a href="{{ url('/dashboard') }}" class="block px-3 py-2 bg-red-500 text-white rounded-md text-lg font-medium">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 bg-gray-700 text-white rounded-md text-lg font-medium">Login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block px-3 py-2 bg-gray-700 text-white rounded-md text-lg font-medium">Register</a>
                @endif
            @endauth
        </div>
    </div>
</nav>

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

            // Animate menu
            if (isMenuOpen) {
                mobileMenu.classList.add('show');
            } else {
                mobileMenu.classList.remove('show');
            }
        });
    });
</script>
