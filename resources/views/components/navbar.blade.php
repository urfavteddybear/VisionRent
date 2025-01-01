<nav class="bg-gray-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('images/vision-rent-logo.png') }}" alt="Vision Rent" class="h-8 w-auto">
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
