{{-- resources/views/home.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vision Rent - Camera Equipment Rental</title>
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

    <section class="py-12 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Create With Us</h2>
            <p class="text-center text-gray-600 mb-8 max-w-2xl mx-auto">
                Take your creative projects to the next level with our premium rental services and reliable support.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-md p-6 transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/creative-gear.jpg') }}" alt="Creative Gear" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Creative Gear</h3>
                    <p class="text-gray-600">Access the latest cameras, lenses, lighting, and audio equipment.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/collaboration.jpg') }}" alt="Collaboration" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Seamless Collaboration</h3>
                    <p class="text-gray-600">Collaborate with our expert team to ensure your shoot goes smoothly.</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('images/easy-rentals.jpg') }}" alt="Easy Rentals" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold mb-2">Easy Rentals</h3>
                    <p class="text-gray-600">Enjoy a hassle-free rental experience with our simple booking process.</p>
                </div>
            </div>
        </div>
    </section>

<!--promotion--->
<section class="py-12 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">On Promotion</h2>
        <div class="relative">
            <!-- Carousel Container -->
            <div class="overflow-hidden group">
                <div class="flex transition-transform duration-300 ease-in-out cursor-grab" id="carousel" style="transform: translateX(0);">
                    @foreach($featuredEquipment as $equipment)
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/5 flex-shrink-0 p-4">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            <img src="{{ $equipment['image'] }}" alt="{{ $equipment['name'] }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold">{{ $equipment['name'] }}</h3>
                                <p class="text-sm font-semibold text-gray-600">Rp {{ number_format($equipment['price'], 0, ',', '.') }}</p>
                                <a href="{{ route('item.show', $equipment['id']) }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">
                                    View More
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    const carousel = document.getElementById('carousel');
    let isDragging = false;
    let startX, scrollLeft;

    carousel.addEventListener('mousedown', (e) => {
        isDragging = true;
        carousel.classList.add('cursor-grabbing');
        startX = e.pageX - carousel.offsetLeft;
        scrollLeft = carousel.scrollLeft;
    });

    carousel.addEventListener('mouseleave', () => {
        isDragging = false;
        carousel.classList.remove('cursor-grabbing');
    });

    carousel.addEventListener('mouseup', () => {
        isDragging = false;
        carousel.classList.remove('cursor-grabbing');
    });

    carousel.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - carousel.offsetLeft;
        const walk = (x - startX) * 2; // Adjust scroll speed
        carousel.scrollLeft = scrollLeft - walk;
    });
</script>


   <!-- Featured Equipment Section -->
   <section class="py-12 px-4">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Featured Equipment</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($featuredEquipment as $equipment)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <img src="{{ $equipment['image'] }}" alt="{{ $equipment['name'] }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $equipment['name'] }}</h3>
                    <p class="text-sm font-semibold text-gray-600">Rp {{ number_format($equipment['price'], 0, ',', '.') }}</p>
                    <a href="{{ route('item.show', $equipment['id']) }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">
                        View More
                    </a>
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
            <div class="bg-white text-gray-800 rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
                    <p class="text-sm font-semibold text-gray-600">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
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
<section class="py-12 px-4 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Lighting & Audio Support</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($lightingSupport as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold">{{ $item['name'] }}</h3>
                    <p class="text-sm font-semibold text-gray-600">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
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

<!-- Our Features -->
<section class="py-12 px-4 bg-gray-800">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-white mb-8">Why Choose Vision Rent?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="text-center p-6 bg-gray-100 rounded-lg shadow transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-xl font-bold mb-2 text-gray-800">Wide Selection</h3>
                <p class="text-gray-600">Access top-notch cameras, lenses, and accessories.</p>
            </div>
            <div class="text-center p-6 bg-gray-100 rounded-lg shadow transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-xl font-bold mb-2 text-gray-800">Affordable Pricing</h3>
                <p class="text-gray-600">High-quality equipment at the best rates.</p>
            </div>
            <div class="text-center p-6 bg-gray-100 rounded-lg shadow transform hover:scale-105 transition-transform duration-300">
                <h3 class="text-xl font-bold mb-2 text-gray-800">Trusted by Professionals</h3>
                <p class="text-gray-600">Join thousands of satisfied photographers and videographers.</p>
            </div>
        </div>
    </div>
</section>



<!-- Our Location -->
<section class="py-12 px-4 bg-slate-100">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center mb-6">Our Location</h2>
        <p class="text-center text-gray-600 mb-8 max-w-2xl mx-auto">
            Come visit us at our location! We are always ready to assist you with high-quality camera equipment and professional service.
        </p>
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8">
            <!-- Left Column -->
            <div class="hidden md:block w-full md:w-1/4 text-center">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <svg class="w-12 h-12 mx-auto text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 12m-1.414-1.414L9.343 8.343M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-800 mt-4">Easy Access</h3>
                    <p class="text-sm text-gray-600 mt-2">Located in the heart of the city, easily accessible by public transport.</p>
                </div>
            </div>

            <!-- Map -->
            <div class="w-full md:w-1/2 h-96 bg-white shadow-lg rounded-lg overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3162.920558788654!2d-122.08385128500032!3d37.38605197983209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb71e8d24a2c5%3A0x40088f7b2e30db4c!2sGoogleplex!5e0!3m2!1sen!2sus!4v1618420645311!5m2!1sen!2sus"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>

            <!-- Right Column -->
            <div class="hidden md:block w-full md:w-1/4 text-center">
                <div class="bg-gray-100 p-6 rounded-lg shadow-md">
                    <svg class="w-12 h-12 mx-auto text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h1m4 0h10M6 10V5a1 1 0 00-1-1H4a1 1 0 00-1 1v5m15-5h-1a1 1 0 00-1 1v5m4 0h-1M3 10h1m4 0h10M6 10V5a1 1 0 00-1-1H4a1 1 0 00-1 1v5m15-5h-1a1 1 0 00-1 1v5m4 0h-1" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-800 mt-4">Free Parking</h3>
                    <p class="text-sm text-gray-600 mt-2">Ample parking space available for all visitors, free of charge.</p>
                </div>
            </div>
        </div>
    </div>
</section>



     <!-- Trusted Photographers Reviews -->
     <section class="py-12 px-4 bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-8">Trusted Photographers Say</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-700 p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold">John Doe</h3>
                    <p class="text-sm mb-2">"Great service and excellent equipment!"</p>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-gray-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                    </div>
                </div>
                <div class="bg-gray-700 p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold">Jane Smith</h3>
                    <p class="text-sm mb-2">"Affordable and reliable! Highly recommend."</p>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                    </div>
                </div>
                <div class="bg-gray-700 p-4 rounded-lg shadow-md">
                    <h3 class="text-lg font-bold">Michael Brown</h3>
                    <p class="text-sm mb-2">"Excellent customer service and great variety!"</p>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-yellow-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                        <svg class="w-4 h-4 fill-current text-gray-500" viewBox="0 0 20 20"><path d="M10 15l-5.39 2.82L6.7 12.65l-4.15-4.04 5.42-.79L10 2l2.03 5.81 5.42.79-4.15 4.04 1.09 5.17z" /></svg>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Brands -->
    <section class="py-8 px-4 bg-white">
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
                    <div class="flex animate-scroll py-6 shrink-0">
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
                            <div class="flex-shrink-0 w-40 mx-6 grayscale hover:grayscale-0 transition-all duration-300">
                                <img src="{{ $brand['image'] }}" alt="{{ $brand['name'] }}" class="w-full h-20 object-contain">
                            </div>
                        @endforeach
                    </div>

                    <!-- Duplicate for seamless scroll -->
                    <div class="flex animate-scroll py-8 shrink-0">
                        @foreach($brands as $brand)
                            <div class="flex-shrink-0 w-40 mx-6 grayscale hover:grayscale-0 transition-all duration-300">
                                <img src="{{ $brand['image'] }}" alt="{{ $brand['name'] }}" class="w-full h-20 object-contain">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

</body>
</html>
