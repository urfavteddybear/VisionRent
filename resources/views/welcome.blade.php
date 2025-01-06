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
            <a href="#featured-equipment" class="bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-red-500 transition-all duration-200 text-lg font-semibold tracking-wide">
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
                    <svg class="w-8 h-8 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.1 0-2 .9-2 2s.9 2 2 2m0-4v12m-3.09 0a9.003 9.003 0 01-6.92-8.69V12c0-5.45 4.55-9.8 10.21-9.97C19.38 2.18 24 6.72 24 12v.31c0 4.97-4.16 9.19-9.09 9.69M12 18a6 6 0 006-6v-2a6 6 0 00-12 0v2c0 3.3 2.7 6 6 6z" />
                    </svg>
                    <h3 class="text-lg font-semibold">Mudah & Fleksibel</h3>
                </div>
                <p class="text-gray-600">
                    Identitas di luar daerah? tidak jadi masalah. Mau sewa mendadak hari ini tapi belum terdaftar? Bisa.
                    Mau sewa tanpa meninggalkan jaminan apapun? Bisa banget!
                </p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md border hover:shadow-lg transform transition duration-300">
                <div class="flex items-center space-x-4 mb-4">
                    <svg class="w-8 h-8 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12v-2a6 6 0 0112 0v2a6 6 0 01-12 0zm-4 6a8.1 8.1 0 0016 0v-2M8 14a8.1 8.1 0 0116 0" />
                    </svg>
                    <h3 class="text-lg font-semibold">Stok Realtime</h3>
                </div>
                <p class="text-gray-600">
                    Tidak perlu antri menunggu jawaban CS untuk cek ketersediaan produk. Cukup masukkan tanggal tujuanmu, langsung tahu stok alat realtime.
                </p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md border hover:shadow-lg transform transition duration-300">
                <div class="flex items-center space-x-4 mb-4">
                    <svg class="w-8 h-8 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 4H4v16h16V8m-6 0H4v16m4-6h10" />
                    </svg>
                    <h3 class="text-lg font-semibold">Cepat & Praktis</h3>
                </div>
                <p class="text-gray-600">
                    Booking online 24 jam, pengambilan & pengembalian alat 24 jam. Pembayaran instan dan notifikasi otomatis via WhatsApp.
                </p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-md border hover:shadow-lg transform transition duration-300">
                <div class="flex items-center space-x-4 mb-4">
                    <svg class="w-8 h-8 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18c1.1 0 2-.9 2-2m0-6v6m0 2c-1.1 0-2-.9-2-2m-3.09 0a9.003 9.003 0 01-6.92-8.69V12m6.09-6v4M10.1 14a5.997 5.997 0 01-3.19 1H4v-2m4 2h6" />
                    </svg>
                    <h3 class="text-lg font-semibold">Berpengalaman & Handal</h3>
                </div>
                <p class="text-gray-600">
                    Dengan pengalaman belasan tahun di industri foto dan video, kami akan menjadi rekan yang memahami kebutuhan kamu dengan baik.
                </p>
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
