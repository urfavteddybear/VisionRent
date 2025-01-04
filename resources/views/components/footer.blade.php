<footer class="bg-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Logo and Social Links -->
        <div>
            <img src="{{ asset('images/vision-rent-logo.png') }}" alt="Vision Rent" class="h-12 mb-4">
            <p class="text-gray-400">High-quality camera equipment rental service with professional support.</p>
            <div class="flex space-x-4 mt-4">
                <a href="https://www.instagram.com/" class="text-gray-400 hover:text-gray-200 transition">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M170.663 256.157c-.083-47.121..."/></svg>
                </a>
                <a href="https://facebook.com/" class="text-gray-400 hover:text-gray-200 transition">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 510.125"><path fill="currentColor" d="M512 256C512..."/></svg>
                </a>
                <a href="https://x.com/" class="text-gray-400 hover:text-gray-200 transition">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 462.799"><path fill="currentColor" d="M403.229 0h..."/></svg>
                </a>
                <a href="https://www.tiktok.com/" class="text-gray-400 hover:text-gray-200 transition">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 447 512.57"><path fill="currentColor" d="M380.23..."/></svg>
                </a>
            </div>
        </div>

        <!-- Quick Links -->
        <div>
            <h3 class="text-lg font-semibold mb-4 text-gray-200">Quick Links</h3>
            <ul class="space-y-2">
                <li><a href="/" class="text-gray-400 hover:text-gray-200 transition">Homepage</a></li>
                <li><a href="{{ url('/') }}#featured-equipment" class="text-gray-400 hover:text-gray-200 transition">Featured</a></li>
                <li><a href="/about" class="text-gray-400 hover:text-gray-200 transition">About Us</a></li>
                <li><a href="https://wa.me/{{ config('app.whatsapp_number') }}?text=Halo VisionRent" class="text-gray-400 hover:text-gray-200 transition">Contact Us</a></li>
            </ul>
        </div>

        <!-- Address -->
        <div>
            <h3 class="text-lg font-semibold mb-4 text-gray-200">Address</h3>
            <p class="text-gray-400 leading-relaxed">
                Jl. Tukad Pakerisan No.97<br>Panjer, Denpasar Selatan, Kota Denpasar
            </p>
        </div>
    </div>
    <div class="border-t border-gray-700 mt-8 pt-4 text-center">
        <p class="text-gray-400 text-sm">© {{ date('Y') }} Vision Rent. All rights reserved.</p>
    </div>
</footer>
