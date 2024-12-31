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
        @keyframes scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(-100%); }
        }

        .animate-scroll {
            animation: scroll 45s linear infinite;
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

    <div class="relative h-[300px] md:h-[400px] lg:h-[500px] overflow-hidden">
        <!-- Banner image -->
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/visionrent-banner.jpg') }}"
                alt="Camera Equipment"
                class="w-full h-full object-cover"
            >
            <!-- Dark overlay -->
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <!-- Banner content -->
        <div class="relative max-w-7xl mx-auto px-4 h-full flex flex-col justify-center items-start">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-white mb-4">
                Professional Camera Equipment Rental
            </h1>
            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-2xl">
                High-quality cameras, lenses, and accessories for your creative projects
            </p>
            <a href="/equipment" class="bg-white text-gray-800 px-6 py-3 rounded-md hover:bg-gray-100 transition-colors duration-200 text-lg font-semibold">
                Browse Equipment
            </a>
        </div>
    </div>

    <div class="h-16 bg-gray-800"></div>

    <section class="py-12 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Our Brands</h2>

            <!-- Logo slider container -->
            <div class="relative w-full overflow-hidden">
                <!-- Gradient overlays -->
                <div class="absolute left-0 top-0 bottom-0 w-20 bg-gradient-to-r from-white to-transparent z-10"></div>
                <div class="absolute right-0 top-0 bottom-0 w-20 bg-gradient-to-l from-white to-transparent z-10"></div>

                <!-- Scrolling container -->
                <div class="relative flex overflow-x-hidden">
                    <!-- First set of logos -->
                    <div class="flex animate-scroll py-8 shrink-0">
                        @php
                        $brands = [
                            ['image' => asset('images/sony.png'), 'name' => 'Sony'],
                            ['image' => asset('images/canon.png'), 'name' => 'Canon'],
                            ['image' => asset('images/gopro.png'), 'name' => 'GoPro'],
                            ['image' => asset('images/godox.png'), 'name' => 'GoDox'],
                            ['image' => asset('images/nikon.png'), 'name' => 'Nikon'],
                            ['image' => asset('images/sandisk.png'), 'name' => 'Sandisk'],
                        ];
                        @endphp

                        @foreach($brands as $brand)
                            <div class="flex-shrink-0 w-52 mx-12 grayscale hover:grayscale-0 transition-all duration-300">
                                <img src="{{ $brand['image'] }}" alt="{{ $brand['name'] }}" class="w-full h-24 object-contain">
                            </div>
                        @endforeach
                    </div>

                    <!-- Duplicate for seamless scroll -->
                    <div class="flex animate-scroll py-8 shrink-0">
                        @foreach($brands as $brand)
                            <div class="flex-shrink-0 w-52 mx-12 grayscale hover:grayscale-0 transition-all duration-300">
                                <img src="{{ $brand['image'] }}" alt="{{ $brand['name'] }}" class="w-full h-24 object-contain">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        <p class="text-sm text-gray-600">Rp {{ number_format($equipment['price'], 0, ',', '.') }}</p>
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
                        <p class="text-sm text-gray-600">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
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
                        <p class="text-sm text-gray-600">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
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
                <img src="{{ asset('images/vision-rent-logo.png') }}" alt="Vision Rent" class="h-12 mb-4">
                <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <div class="flex space-x-4 mt-4">
                    <a href="#" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Instagram</span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512"><path fill="#fff" fill-rule="nonzero" d="M170.663 256.157c-.083-47.121 38.055-85.4 85.167-85.483 47.121-.092 85.407 38.03 85.499 85.16.091 47.129-38.047 85.4-85.176 85.492-47.112.09-85.399-38.039-85.49-85.169zm-46.108.091c.141 72.602 59.106 131.327 131.69 131.186 72.592-.141 131.35-59.09 131.209-131.692-.141-72.577-59.114-131.335-131.715-131.194-72.585.141-131.325 59.115-131.184 131.7zm237.104-137.091c.033 16.953 13.817 30.681 30.772 30.648 16.961-.033 30.689-13.811 30.664-30.764-.033-16.954-13.818-30.69-30.78-30.657-16.962.033-30.689 13.818-30.656 30.773zm-208.696 345.4c-24.958-1.087-38.511-5.234-47.543-8.709-11.961-4.629-20.496-10.178-29.479-19.094-8.966-8.95-14.532-17.46-19.202-29.397-3.508-9.032-7.73-22.569-8.9-47.527-1.269-26.982-1.559-35.077-1.683-103.432-.133-68.339.116-76.434 1.294-103.441 1.069-24.942 5.242-38.512 8.709-47.536 4.628-11.977 10.161-20.496 19.094-29.479 8.949-8.982 17.459-14.532 29.403-19.202 9.025-3.525 22.561-7.714 47.511-8.9 26.998-1.277 35.085-1.551 103.423-1.684 68.353-.132 76.448.108 103.456 1.295 24.94 1.086 38.51 5.217 47.527 8.709 11.968 4.628 20.503 10.144 29.478 19.094 8.974 8.95 14.54 17.443 19.21 29.412 3.524 9 7.714 22.553 8.892 47.494 1.285 26.999 1.576 35.095 1.7 103.433.132 68.355-.117 76.451-1.302 103.441-1.087 24.958-5.226 38.52-8.709 47.561-4.629 11.952-10.161 20.487-19.103 29.471-8.941 8.949-17.451 14.531-29.403 19.201-9.009 3.517-22.561 7.714-47.494 8.9-26.998 1.269-35.086 1.559-103.448 1.684-68.338.132-76.424-.125-103.431-1.294zM149.977 1.773c-27.239 1.285-45.843 5.648-62.101 12.018-16.829 6.561-31.095 15.354-45.286 29.604C28.381 57.653 19.655 71.944 13.144 88.79c-6.303 16.299-10.575 34.912-11.778 62.168C.172 178.264-.102 186.973.031 256.489c.133 69.508.439 78.234 1.741 105.547 1.302 27.231 5.649 45.828 12.019 62.093 6.569 16.83 15.353 31.088 29.611 45.288 14.25 14.201 28.55 22.918 45.404 29.438 16.282 6.295 34.902 10.583 62.15 11.778 27.305 1.203 36.022 1.468 105.521 1.335 69.532-.132 78.25-.439 105.555-1.733 27.239-1.303 45.826-5.665 62.1-12.019 16.829-6.586 31.095-15.353 45.288-29.611 14.191-14.251 22.917-28.55 29.428-45.405 6.304-16.282 10.592-34.903 11.777-62.134 1.195-27.322 1.478-36.048 1.344-105.556-.133-69.516-.447-78.225-1.741-105.523-1.294-27.255-5.657-45.844-12.019-62.118-6.577-16.829-15.352-31.079-29.602-45.287-14.25-14.192-28.55-22.935-45.404-29.429-16.29-6.305-34.903-10.601-62.15-11.779C333.747.164 325.03-.102 255.506.031c-69.507.133-78.224.431-105.529 1.742z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 510.125"><path fill="#fff" fill-rule="nonzero" d="M512 256C512 114.615 397.385 0 256 0S0 114.615 0 256c0 120.059 82.652 220.797 194.157 248.461V334.229h-52.79V256h52.79v-33.709c0-87.134 39.432-127.521 124.977-127.521 16.218 0 44.202 3.18 55.651 6.36v70.916c-6.042-.635-16.537-.954-29.575-.954-41.977 0-58.196 15.901-58.196 57.241V256h83.619l-14.365 78.229h-69.254v175.896C413.771 494.815 512 386.885 512 256z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <span class="sr-only">X</span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 462.799"><path fill="#fff" fill-rule="nonzero" d="M403.229 0h78.506L310.219 196.04 512 462.799H354.002L230.261 301.007 88.669 462.799h-78.56l183.455-209.683L0 0h161.999l111.856 147.88L403.229 0zm-27.556 415.805h43.505L138.363 44.527h-46.68l283.99 371.278z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white">
                        <span class="sr-only">TikTok</span>
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 447 512.57"><path fill="#fff" fill-rule="nonzero" d="M380.23 102.74c-27.61-18-47.53-46.81-53.75-80.38-1.34-7.25-2.09-14.72-2.09-22.36h-88.12l-.14 353.16c-1.48 39.55-34.03 71.29-73.93 71.29-12.4 0-24.08-3.1-34.36-8.51-23.58-12.41-39.72-37.12-39.72-65.56 0-40.85 33.24-74.08 74.07-74.08 7.63 0 14.94 1.26 21.86 3.42v-89.96c-7.16-.98-14.44-1.58-21.86-1.58C72.76 188.18 0 260.93 0 350.38c0 54.87 27.41 103.43 69.25 132.8 26.34 18.5 58.39 29.39 92.95 29.39 89.44 0 162.2-72.76 162.2-162.19l-.01-179.09c34.56 24.81 76.92 39.42 122.61 39.42v-88.12c-24.61 0-47.53-7.31-66.77-19.85z"/></svg>
                    </a>
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
</body>
</html>
