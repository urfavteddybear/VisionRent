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
        <!-- Banner Image -->
        <div class="absolute inset-0">
            <img
                src="{{ asset('images/visionrent-banner.jpg') }}"
                alt="Camera Equipment"
                class="w-full h-full object-cover"
            >
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-b from-black/50 via-black/30 to-black/70"></div>
        </div>

        <!-- Banner Content -->
        <div class="relative max-w-7xl mx-auto px-4 h-full flex flex-col justify-center items-start space-y-4">
            <!-- Main Heading -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white tracking-tight drop-shadow-lg">
                Professional Camera Equipment Rental
            </h1>

            <!-- Subheading -->
            <p class="text-lg md:text-xl text-gray-300 max-w-2xl leading-relaxed drop-shadow-md">
                High-quality cameras, lenses, and accessories for your creative projects.
            </p>

            <!-- CTA Button -->
            <a href="/items" class="bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-red-500 transition-all duration-200 text-lg font-semibold tracking-wide">
                Browse Equipment
            </a>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-red-600 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute top-0 right-0 w-48 h-48 bg-blue-500 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="h-10 bg-gray-800"></div>


   <!-- Create with us section -->
<section class="py-12 px-4 relative bg-cover bg-center" style="background-image: url('{{ asset('images/fotografi.jpg') }}');">
    <div class="absolute inset-0 bg-gray-900/70"></div> <!-- Overlay yang lebih gelap -->
    <div class="relative max-w-7xl mx-auto">
        <h2 class="text-4xl font-bold text-center text-white mb-8">
            Create With Us
        </h2>
        <p class="text-center text-gray-300 mb-8 max-w-2xl mx-auto">
            Take your creative projects to the next level with our premium rental services and reliable support.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative z-10">
            <div class="group relative rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('images/kreatife_gear.jpeg') }}" alt="Creative Gear" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white text-2xl font-bold">Creative Gear</h3>
                    <p class="text-gray-200 mt-2">Access the latest cameras, lenses, lighting, and audio equipment.</p>
                </div>
            </div>
            <div class="group relative rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('images/collab.jpeg') }}" alt="Collaboration" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white text-2xl font-bold">Seamless Collaboration</h3>
                    <p class="text-gray-200 mt-2">Collaborate with our expert team to ensure your shoot goes smoothly.</p>
                </div>
            </div>
            <div class="group relative rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('images/easyrent.webp') }}" alt="Easy Rentals" class="w-full h-64 object-cover">
                <div class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <h3 class="text-white text-2xl font-bold">Easy Rentals</h3>
                    <p class="text-gray-200 mt-2">Enjoy a hassle-free rental experience with our simple booking process.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Our Features -->
<section class="py-12 px-4 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold">Awesome Feature</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-6 bg-white rounded-lg shadow-md border hover:shadow-lg transform transition duration-300">
                <div class="flex items-center space-x-4 mb-4">
                    <svg class="w-8 h-8 text-gray-700" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.88 122.76" style="enable-background:new 0 0 122.88 122.76" xml:space="preserve"><g><path d="M114.89,89.82c0-2.21,1.79-4,4-4c2.21,0,4,1.79,4,4v28.75c0,2.21-1.79,4-4,4H89.67c-2.21,0-4-1.79-4-4c0-2.21,1.79-4,4-4 h19.18L74.49,82.09c-1.6-1.51-1.68-4.03-0.17-5.64c1.51-1.6,4.03-1.68,5.64-0.17l34.93,33.02V89.82L114.89,89.82z M89.82,7.99 c-2.21,0-4-1.79-4-4c0-2.21,1.79-4,4-4h28.75c2.21,0,4,1.79,4,4v29.21c0,2.21-1.79,4-4,4c-2.21,0-4-1.79-4-4V14.03L82.09,48.39 c-1.51,1.6-4.03,1.68-5.64,0.17c-1.6-1.51-1.68-4.03-0.17-5.64L109.3,7.99H89.82L89.82,7.99z M7.99,32.76c0,2.21-1.79,4-4,4 c-2.21,0-4-1.79-4-4V4.01c0-2.21,1.79-4,4-4h29.21c2.21,0,4,1.79,4,4c0,2.21-1.79,4-4,4H14.03l34.36,32.48 c1.6,1.51,1.68,4.03,0.17,5.64c-1.51,1.6-4.03,1.68-5.64,0.17L7.99,13.28V32.76L7.99,32.76z M32.94,114.77c2.21,0,4,1.79,4,4 c0,2.21-1.79,4-4,4H4.19c-2.21,0-4-1.79-4-4V89.55c0-2.21,1.79-4,4-4c2.21,0,4,1.79,4,4v19.18l32.48-34.36 c1.51-1.6,4.03-1.68,5.64-0.17c1.6,1.51,1.68,4.03,0.17,5.64l-33.02,34.93H32.94L32.94,114.77z"/></g></svg>
                    <h3 class="text-lg font-semibold">Easy & Flexible</h3>
                </div>
                <p class="text-gray-600">
                    Out-of-town ID? Not a problem. Need to rent something last minute today but haven’t registered yet? No worries, you absolutely can.
                </p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md border hover:shadow-lg transform transition duration-300">
                <div class="flex items-center space-x-4 mb-4">
                    <svg class="w-8 h-8 text-gray-700" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 513.11"><path fill-rule="nonzero" d="M210.48 160.8c0-14.61 11.84-26.46 26.45-26.46s26.45 11.85 26.45 26.46v110.88l73.34 32.24c13.36 5.88 19.42 21.47 13.54 34.82-5.88 13.35-21.47 19.41-34.82 13.54l-87.8-38.6c-10.03-3.76-17.16-13.43-17.16-24.77V160.8zM5.4 168.54c-.76-2.25-1.23-4.64-1.36-7.13l-4-73.49c-.75-14.55 10.45-26.95 25-27.69 14.55-.75 26.95 10.45 27.69 25l.74 13.6a254.258 254.258 0 0136.81-38.32c17.97-15.16 38.38-28.09 61.01-38.18 64.67-28.85 134.85-28.78 196.02-5.35 60.55 23.2 112.36 69.27 141.4 132.83.77 1.38 1.42 2.84 1.94 4.36 27.86 64.06 27.53 133.33 4.37 193.81-23.2 60.55-69.27 112.36-132.83 141.39a26.24 26.24 0 01-12.89 3.35c-14.61 0-26.45-11.84-26.45-26.45 0-11.5 7.34-21.28 17.59-24.92 7.69-3.53 15.06-7.47 22.09-11.8.8-.66 1.65-1.28 2.55-1.86 11.33-7.32 22.1-15.7 31.84-25.04.64-.61 1.31-1.19 2-1.72 20.66-20.5 36.48-45.06 46.71-71.76 18.66-48.7 18.77-104.46-4.1-155.72l-.01-.03C418.65 122.16 377.13 85 328.5 66.37c-48.7-18.65-104.46-18.76-155.72 4.1a203.616 203.616 0 00-48.4 30.33c-9.86 8.32-18.8 17.46-26.75 27.29l3.45-.43c14.49-1.77 27.68 8.55 29.45 23.04 1.77 14.49-8.55 27.68-23.04 29.45l-73.06 9c-13.66 1.66-26.16-7.41-29.03-20.61zM283.49 511.5c20.88-2.34 30.84-26.93 17.46-43.16-5.71-6.93-14.39-10.34-23.29-9.42-15.56 1.75-31.13 1.72-46.68-.13-9.34-1.11-18.45 2.72-24.19 10.17-12.36 16.43-2.55 39.77 17.82 42.35 19.58 2.34 39.28 2.39 58.88.19zm-168.74-40.67c7.92 5.26 17.77 5.86 26.32 1.74 18.29-9.06 19.97-34.41 3.01-45.76-12.81-8.45-25.14-18.96-35.61-30.16-9.58-10.2-25.28-11.25-36.11-2.39a26.436 26.436 0 00-2.55 38.5c13.34 14.2 28.66 27.34 44.94 38.07zM10.93 331.97c2.92 9.44 10.72 16.32 20.41 18.18 19.54 3.63 36.01-14.84 30.13-33.82-4.66-15-7.49-30.26-8.64-45.93-1.36-18.33-20.21-29.62-37.06-22.33C5.5 252.72-.69 262.86.06 274.14c1.42 19.66 5.02 39 10.87 57.83z"/></svg>
                    <h3 class="text-lg font-semibold">Real-Time Stock</h3>
                </div>
                <p class="text-gray-600">
                    No need to queue up waiting for a customer service response to check product availability. Simply go to the detail page, and you'll instantly know the real-time stock of the equipment.
                </p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md border hover:shadow-lg transform transition duration-300">
                <div class="flex items-center space-x-4 mb-4">
                    <svg class="w-8 h-8 text-gray-700" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 81.83 122.88" style="enable-background:new 0 0 81.83 122.88" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><polygon class="st0" points="33.05,63.12 0,60.01 27.4,0 64.86,0 43.62,34.43 81.83,38.66 11.69,122.88 33.05,63.12"/></g></svg>
                    <h3 class="text-lg font-semibold">Fast & Practical</h3>
                </div>
                <p class="text-gray-600">
                    Book online 24/7, enjoy 24/7 equipment pickup and return, and get quick support via WhatsApp.
                </p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md border hover:shadow-lg transform transition duration-300">
                <div class="flex items-center space-x-4 mb-4">
                    <svg class="w-8 h-8 text-gray-700" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="111.811px" height="122.88px" viewBox="0 0 111.811 122.88" enable-background="new 0 0 111.811 122.88" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M55.713,0c20.848,13.215,39.682,19.467,55.846,17.989 c2.823,57.098-18.263,90.818-55.63,104.891C19.844,109.708-1.5,77.439,0.083,17.123C19.058,18.116,37.674,14.014,55.713,0L55.713,0 z M33.784,66.775c-1.18-1.01-1.318-2.786-0.309-3.967c1.011-1.181,2.787-1.318,3.967-0.309l11.494,9.875l25.18-27.684 c1.047-1.15,2.828-1.234,3.979-0.188c1.149,1.046,1.233,2.827,0.187,3.978L51.262,78.188l-0.002-0.002 c-1.02,1.121-2.751,1.236-3.91,0.244L33.784,66.775L33.784,66.775z M55.735,7.055c18.454,11.697,35.126,17.232,49.434,15.923 c2.498,50.541-16.166,80.39-49.241,92.846C23.986,104.165,5.091,75.603,6.493,22.211C23.29,23.091,39.768,19.46,55.735,7.055 L55.735,7.055z"/></g></svg>
                    <h3 class="text-lg font-semibold">Experienced & Reliable</h3>
                </div>
                <p class="text-gray-600">
                    With over a decade of experience in the photo and video industry, we are your trusted partner who understands your needs perfectly.
                </p>
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
                        View Details
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
                    <a href="{{ route('item.show', $item['id']) }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="/items" class="inline-block bg-white text-gray-800 px-6 py-3 rounded-md hover:bg-gray-200">VIEW MORE</a>
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
                    <a href="{{ route('item.show', $item['id']) }}" class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded-md text-sm hover:bg-gray-700">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="/items" class="inline-block bg-gray-800 text-white px-6 py-3 rounded-md hover:bg-gray-700">VIEW MORE</a>
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
                    <svg class="w-8 h-8 mx-auto text-gray-700" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 120.96"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>bus</title><path class="cls-1" d="M105.5,104.64H99.44v9.53A6.81,6.81,0,0,1,92.65,121h-4a6.82,6.82,0,0,1-6.79-6.79v-9.53H40.82v9.53A6.82,6.82,0,0,1,34,121H30a6.81,6.81,0,0,1-6.78-6.79v-9.53H18.1c-3.54-.06-5.24-2-5.5-5.29V21.52c-2,.2-2.95.66-3.43,1.68V45.45H4.87A4.88,4.88,0,0,1,0,40.58V27.44a4.89,4.89,0,0,1,4.73-4.87c.41-3.82,2.06-4.93,8-5.21Q14,7.36,26.36,2.57C44.09-.68,77.73-1,96.52,2.57c8.28,3.19,12.8,8.12,13.62,14.79,6,.3,7.61,1.42,8,5.21a4.89,4.89,0,0,1,4.73,4.87V40.58A4.88,4.88,0,0,1,118,45.45h-4.3V23.14c-.48-1-1.47-1.44-3.43-1.63V98.59c0,4.46-1.44,6-4.78,6ZM16.13,84.87l.28-6.69c.16-1.17.78-1.69,1.89-1.5A129.9,129.9,0,0,1,34.39,86.85c1.09.72.66,2.11-.78,1.85L18.48,87.6a2.74,2.74,0,0,1-2.35-2.73ZM52,93.45H71.3a.94.94,0,0,1,.94.94v3.24a.94.94,0,0,1-.94.94H52a.94.94,0,0,1-.94-.94V94.39a.94.94,0,0,1,.94-.94Zm50.35,0A2.51,2.51,0,1,1,99.82,96a2.51,2.51,0,0,1,2.5-2.51Zm-82.65,0A2.51,2.51,0,1,1,17.16,96a2.51,2.51,0,0,1,2.51-2.51Zm87.08-8.63-.28-6.69c-.16-1.17-.78-1.69-1.88-1.5a129.28,129.28,0,0,0-16.1,10.17c-1.09.72-.66,2.11.78,1.85l15.13-1.1a2.73,2.73,0,0,0,2.35-2.73ZM48.19,6.11h26.5a1.63,1.63,0,0,1,1.62,1.62V12a1.63,1.63,0,0,1-1.62,1.62H48.19A1.63,1.63,0,0,1,46.57,12V7.73a1.63,1.63,0,0,1,1.62-1.62ZM20.32,18.91H102.2a2,2,0,0,1,2,2V64.09c0,1.08-.89,1.69-2,2-28.09,8.53-53.8,8.18-81.88,0-1.11-.3-2-.9-2-2V20.89a2,2,0,0,1,2-2Z"/></svg>
                    <h3 class="text-lg font-semibold text-gray-800 mt-4">Easy Access</h3>
                    <p class="text-sm text-gray-600 mt-2">Located in the heart of the city, easily accessible by public transport.</p>
                </div>
            </div>

            <!---map--->
            <div class="w-full md:w-1/2 h-96 bg-white shadow-lg rounded-lg overflow-hidden">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.6955150646155!2d115.21989231525955!3d-8.673439590924735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd241257db8a707%3A0x9b637d5e897e819e!2sINSTIKI%20-%20Institut%20Teknologi%20dan%20Bisnis%20Indonesia!5e0!3m2!1sen!2sid!4v1678439201230!5m2!1sen!2sid"
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
                    <svg class="w-8 h-8 mx-auto text-gray-700" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 84.74 122.88" style="enable-background:new 0 0 84.74 122.88" xml:space="preserve"><g><path d="M4.54,38.53c-0.03,0.34-0.06,0.7-0.08,1.09c-0.02,0.38-0.04,0.76-0.06,1.11c-0.01,0.39-0.02,0.77-0.03,1.14 c0,0.38,0,0.76,0,1.13c0.12,9.25,6.68,27.63,11.63,41.5l0.01,0.02c1.47,4.11,2.79,7.83,3.83,10.99c0.53,1.62,1.16,3.01,1.88,4.18 c0.72,1.16,1.53,2.1,2.43,2.83c0.86,0.69,1.81,1.19,2.87,1.51c1.07,0.32,2.24,0.45,3.51,0.4c0.03-0.01,0.06-0.01,0.09-0.01h25.46 c1.38-0.16,2.62-0.47,3.7-0.93c1.08-0.46,2.01-1.07,2.79-1.83c1.77-1.74,3.21-6.51,4.34-10.23c0.37-1.22,0.7-2.32,1-3.19 c0.53-1.5,1.08-3.05,1.65-4.65l0.04-0.12c4.65-13.05,10.39-29.15,10.75-39.18c0.1-2.78-0.01-5.43-0.32-7.94 c-0.31-2.51-0.83-4.88-1.54-7.1c-0.7-2.19-1.61-4.25-2.7-6.17c-1.1-1.93-2.4-3.73-3.88-5.39c-3.05-3.41-6.61-6.21-10.5-8.35 c-3.97-2.19-8.28-3.68-12.7-4.43c-4.37-0.74-8.85-0.74-13.25,0.05c-4.23,0.76-8.39,2.24-12.28,4.51c-2.61,1.52-5.04,3.34-7.22,5.42 c-2.16,2.06-4.07,4.37-5.7,6.91c-1.58,2.47-2.88,5.14-3.85,7.99C5.45,32.56,4.82,35.48,4.54,38.53L4.54,38.53z M32.6,96.42 c-0.63,0-1.2-0.26-1.62-0.67c-0.42-0.41-0.67-0.99-0.67-1.62c0-0.63,0.26-1.21,0.67-1.62l0.03-0.03c0.41-0.4,0.97-0.64,1.59-0.64 h18.35c0.63,0,1.21,0.26,1.62,0.67c0.42,0.42,0.67,0.99,0.67,1.62c0,0.63-0.26,1.21-0.67,1.62c-0.42,0.42-0.99,0.67-1.62,0.67H32.6 L32.6,96.42z M50.76,57.96c0-0.63,0.26-1.21,0.67-1.62l0.03-0.03c0.41-0.4,0.97-0.64,1.59-0.64c0.63,0,1.21,0.26,1.62,0.67 c0.42,0.41,0.67,0.99,0.67,1.62v4.06c1.02,0.41,1.89,1.11,2.52,1.99c0.68,0.95,1.09,2.12,1.09,3.38c0,1.26-0.4,2.42-1.09,3.37 c-0.63,0.88-1.5,1.57-2.52,1.99v3.96c0,0.63-0.26,1.21-0.67,1.62S53.68,79,53.05,79c-0.63,0-1.21-0.26-1.62-0.67L51.4,78.3 c-0.4-0.41-0.64-0.97-0.64-1.59v-4.06c-0.96-0.44-1.78-1.14-2.37-2c-0.64-0.93-1.01-2.06-1.01-3.27c0-1.21,0.37-2.34,1.01-3.27 c0.59-0.86,1.41-1.56,2.37-2V57.96L50.76,57.96z M26.97,57.96c0-0.63,0.26-1.21,0.67-1.62l0.03-0.03c0.41-0.4,0.97-0.64,1.59-0.64 c0.63,0,1.21,0.26,1.62,0.67c0.42,0.41,0.67,0.99,0.67,1.62v18.74c0,0.63-0.26,1.2-0.67,1.62C30.47,78.74,29.9,79,29.27,79 c-0.63,0-1.21-0.26-1.62-0.67c-0.41-0.42-0.67-0.99-0.67-1.62V57.96L26.97,57.96z M45.18,108.82v13.57c0,0.27-0.22,0.5-0.5,0.5 h-4.63c-0.27,0-0.5-0.22-0.5-0.5v-13.57h-8.95l-0.06,0c-1.76,0.06-3.41-0.14-4.92-0.62c-1.54-0.48-2.95-1.23-4.23-2.26 c-1.25-1.01-2.35-2.27-3.31-3.79c-0.95-1.51-1.75-3.26-2.41-5.28c-0.93-2.83-2.28-6.61-3.77-10.8l-0.03-0.09 C9.35,78.92,6.42,70.71,4.1,63C1.78,55.29,0.07,48.08,0,43.05C0,42.63,0,42.21,0,41.8c0-0.42,0.01-0.83,0.03-1.22 c0.02-0.42,0.04-0.83,0.06-1.22c0.02-0.38,0.06-0.79,0.1-1.22c0.31-3.42,1.02-6.68,2.07-9.76c1.09-3.19,2.54-6.18,4.31-8.94 c1.81-2.82,3.95-5.41,6.35-7.7c2.43-2.32,5.13-4.35,8.05-6.05c4.34-2.53,8.98-4.19,13.69-5.03c4.9-0.87,9.89-0.87,14.75-0.05 c4.91,0.83,9.68,2.48,14.08,4.91c4.31,2.37,8.26,5.48,11.65,9.27c1.69,1.89,3.17,3.94,4.42,6.12c1.25,2.19,2.28,4.53,3.08,7.01 c0.79,2.47,1.37,5.08,1.71,7.83c0.34,2.74,0.46,5.64,0.36,8.7c-0.19,5.37-1.75,12.18-3.86,19.3c-2.11,7.12-4.75,14.54-7.12,21.18 l-0.01,0.04c-1.4,3.91-2.69,7.56-3.71,10.64c-0.32,1.94-0.85,3.66-1.57,5.18c-0.73,1.55-1.67,2.88-2.81,4 c-1.15,1.13-2.49,2.02-4.02,2.69c-1.52,0.66-3.22,1.1-5.09,1.31l-0.17,0.02c-0.07,0.01-0.13,0.01-0.2,0.01H45.18L45.18,108.82z M40.98,32.9l10.68-6.8c0.2-0.15,0.48-0.13,0.65,0.06l1.03,1.1c0.17,0.18,0.18,0.47,0.02,0.66l-8.11,9.43 c-1.25,1.34-2.6,1.6-3.7,1.24c-0.55-0.18-1.03-0.51-1.39-0.93c-0.36-0.42-0.62-0.94-0.72-1.5c-0.2-1.11,0.2-2.35,1.53-3.25 L40.98,32.9L40.98,32.9z M23.25,41.93h38.22c0.24-0.81,0.43-1.64,0.56-2.48c0.13-0.79,0.21-1.59,0.24-2.41h-3.09 c-0.27,0-0.5-0.22-0.5-0.5v-2.38c0-0.27,0.22-0.5,0.5-0.5h2.92c-0.27-2.03-0.85-3.96-1.7-5.76c-0.87-1.86-2.02-3.56-3.4-5.06 l-1.97,1.97c-0.19,0.19-0.51,0.19-0.7,0l-1.68-1.68c-0.19-0.19-0.19-0.51,0-0.7l1.87-1.87c-1.57-1.22-3.32-2.21-5.21-2.92 c-1.84-0.69-3.8-1.12-5.84-1.23v2.68c0,0.27-0.22,0.5-0.5,0.5h-2.38c-0.27,0-0.5-0.22-0.5-0.5v-2.58 c-2.03,0.23-3.96,0.76-5.75,1.55c-1.85,0.81-3.56,1.9-5.06,3.21l1.96,1.96c0.19,0.19,0.19,0.51,0,0.7l-1.68,1.68 c-0.19,0.19-0.51,0.19-0.7,0l-1.93-1.93c-1.28,1.56-2.32,3.31-3.08,5.21c-0.74,1.85-1.21,3.83-1.37,5.9h3.04 c0.27,0,0.5,0.22,0.5,0.5v2.38c0,0.27-0.22,0.5-0.5,0.5h-3.02c0.06,0.62,0.14,1.22,0.25,1.82C22.91,40.65,23.07,41.3,23.25,41.93 L23.25,41.93z M63.97,45.19H20.81c-0.27,0-0.5-0.22-0.5-0.5l0-0.01c-0.06-1.2-0.31-2.3-0.56-3.44c-0.33-1.48-0.67-3.01-0.67-4.92 c0-3.15,0.63-6.16,1.76-8.9c1.18-2.85,2.91-5.42,5.06-7.56c2.14-2.14,4.71-3.87,7.56-5.06c2.75-1.14,5.75-1.76,8.9-1.76 c3.14,0,6.14,0.63,8.88,1.77c2.85,1.18,5.41,2.92,7.56,5.07c2.15,2.15,3.89,4.72,5.07,7.57c1.14,2.75,1.77,5.75,1.77,8.88 c0,1.78-0.34,3.32-0.66,4.77c-0.27,1.24-0.53,2.41-0.53,3.6C64.47,44.97,64.25,45.19,63.97,45.19L63.97,45.19z"/></g></svg>
                    <h3 class="text-lg font-semibold text-gray-800 mt-4">Free Parking</h3>
                    <p class="text-sm text-gray-600 mt-2">Ample parking space available for all visitors, free of charge.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Testimonials Section -->
<section class="py-12 px-4 bg-gray-50">
    <div class="max-w-7xl mx-auto text-center">
        <!-- Title -->
        <h2 class="text-3xl font-bold text-gray-800 mb-4">You're in Good Company</h2>
        <p class="text-gray-500 text-lg mb-8">Trusted by 10k+ Photographers & Videographers</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        <!-- Card 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6">
            <img src="{{ asset('images/customer1.jpeg') }}" alt="Alex Johnson" class="w-24 h-24 rounded-full mx-auto mb-4">
            <h3 class="text-xl font-bold text-gray-800">Alex Johnson</h3>
            <p class="text-gray-600 mt-2 text-sm">
                "The equipment was top-notch, and the service was beyond my expectations! I will definitely come back for my next project."
            </p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6">
            <img src="{{ asset('images/customer2.jpg') }}" alt="Maria Gonzales" class="w-24 h-24 rounded-full mx-auto mb-4">
            <h3 class="text-xl font-bold text-gray-800">Maria Gonzales</h3>
            <p class="text-gray-600 mt-2 text-sm">
                "Affordable pricing and an extensive selection of gear. The team was very helpful throughout the process!"
            </p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden text-center p-6">
            <img src="{{ asset('images/customer3.jpeg') }}" alt="David Lee" class="w-24 h-24 rounded-full mx-auto mb-4">
            <h3 class="text-xl font-bold text-gray-800">David Lee</h3>
            <p class="text-gray-600 mt-2 text-sm">
                "I've rented equipment multiple times, and the experience is always fantastic. Highly recommend their service!"
            </p>
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
