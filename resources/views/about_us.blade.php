<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Vision Rent</title>
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

    <!-- Hero Section -->
    <section class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-bold mb-4">About Vision Rent</h1>
            <p class="text-lg text-gray-300">
                Your trusted partner for professional camera and equipment rental services.
            </p>
        </div>
    </section>

    <!-- Company Overview -->
    <section class="py-12 px-4 bg-white">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
            <!-- Image -->
            <div>
                <img src="{{ asset('images/visonrent-monocrhome.png') }}" alt="About Us" class="rounded-lg shadow-md">
            </div>
            <!-- Content -->
            <div>
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Who We Are</h2>
                <p class="text-gray-600 mb-6">
                    Vision Rent is dedicated to providing high-quality camera equipment and accessories for professionals and enthusiasts. Established in 2020, we aim to make premium gear accessible and affordable for creative projects of all sizes.
                </p>
                <p class="text-gray-600">
                    Our experienced team ensures that every piece of equipment is well-maintained and ready for use. Whether you're a filmmaker, photographer, or content creator, we are here to support your vision.
                </p>
            </div>
        </div>
    </section>

    <!-- Vision and Mission -->
    <section class="py-12 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Vision -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Our Vision</h3>
                <p class="text-gray-600">
                    To be the leading provider of high-quality camera and equipment rentals, empowering creativity and innovation across industries.
                </p>
            </div>
            <!-- Mission -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Our Mission</h3>
                <ul class="list-disc list-inside text-gray-600 space-y-2">
                    <li>Deliver premium equipment and exceptional service to our clients.</li>
                    <li>Support creative projects with reliable and affordable solutions.</li>
                    <li>Continuously innovate and expand our offerings to meet industry needs.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-12 px-4 bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Why Choose Vision Rent?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-700 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Wide Range of Equipment</h3>
                    <p class="text-gray-300">Access cameras, lenses, and accessories for every project.</p>
                </div>
                <div class="bg-gray-700 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Affordable Pricing</h3>
                    <p class="text-gray-300">Get premium gear at competitive rental rates.</p>
                </div>
                <div class="bg-gray-700 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Trusted by Professionals</h3>
                    <p class="text-gray-300">Join hundreds of satisfied clients in the industry.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-12 px-4 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready to Start Your Project?</h2>
            <p class="text-gray-600 mb-8">
                Explore our wide range of camera equipment and get started today!
            </p>
            <a href="/items" class="bg-gray-800 text-white px-6 py-3 rounded-md hover:bg-gray-700 transition text-lg font-semibold">
                Browse Equipment
            </a>
        </div>
    </section>

    @include('components.footer')
</body>
</html>
