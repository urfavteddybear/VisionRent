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
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-100">
    @include('components.navbar')

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
            <a href="#featured-equipment" class="bg-white text-gray-800 px-6 py-3 rounded-md hover:bg-gray-100 transition-colors duration-200 text-lg font-semibold">
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
    <section id="featured-equipment" class="py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Featured Equipment</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($featuredEquipment as $equipment)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ $equipment['image'] }}" alt="{{ $equipment['name'] }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $equipment['name'] }}</h3>
                        <p class="text-sm text-gray-600">Rp {{ number_format($equipment['price'], 0, ',', '.') }}</p>
                        <a href="{{ route('item.show', $equipment['id']) }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">View More</a>
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
                        <a href="{{ route('item.show', $item['id']) }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">View More</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('camera-support.index') }}" class="inline-block bg-white text-gray-800 px-6 py-3 rounded-md hover:bg-gray-200">VIEW MORE</a>
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
                        <a href="{{ route('item.show', $item['id']) }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">View More</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-8">
                <a href="{{ route('lighting-audio.index') }}" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-md hover:bg-gray-700">VIEW MORE</a>
            </div>
        </div>
    </section>

    @include('components.footer')

</body>
</html>
