<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->name }} - Vision Rent</title>
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

        .modal-enter {
        opacity: 0;
        transform: translateY(-10px);
        }
        .modal-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 300ms, transform 300ms;
        }
        .modal-exit {
            opacity: 1;
            transform: translateY(0);
        }
        .modal-exit-active {
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 300ms, transform 300ms;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-white">
    @include('components.navbar')
<main class="flex-grow">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="md:flex md:space-x-8">
            <!-- Image Gallery -->
            <div class="md:w-1/2">
                <!-- Main Image -->
                <div class="max-w-sm mx-auto rounded-lg shadow-md overflow-hidden">
                    <img
                        id="mainImage"
                        src="{{ $images[0] }}"
                        alt="{{ $item->name }}"
                        class="object-cover w-full"
                    >
                </div>

                <!-- Thumbnails -->
                @if(count($images) > 1)
                <div class="grid grid-cols-4 gap-2 mt-4">
                    @foreach($images as $image)
                    <div class="aspect-w-1 aspect-h-1 cursor-pointer">
                        <img
                            src="{{ $image }}"
                            alt="{{ $item->name }}"
                            class="object-cover rounded-lg border border-gray-300 hover:ring-2 hover:ring-gray-500 transition"
                            onclick="changeMainImage(this.src)"
                        >
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Item Details -->
            <div class="md:w-1/2">
                <!-- Title and Price -->
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $item->name }}</h1>
                <p class="text-2xl font-semibold text-gray-700 mb-6">Rp {{ number_format($item->price, 0, ',', '.') }}</p>

                <!-- Product Info -->
                <div class="space-y-3">
                    <div class="flex items-center">
                        <span class="w-36 text-gray-600 font-medium">Minimum Order:</span>
                        <span class="text-gray-900">1 Piece</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-36 text-gray-600 font-medium">Category:</span>
                        <span class="text-gray-900">{{ $item->category->name }}</span>
                    </div>
                    <div class="flex items-center">
                        <span class="w-36 text-gray-600 font-medium">Stock:</span>
                        <span class="text-gray-900">{{ $item->stock }} units</span>
                    </div>
                </div>

                <!-- Product Highlights -->
                <div class="mt-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">Product Highlights:</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        @foreach(explode("\n", $item->description) as $highlight)
                        <li>{{ $highlight }}</li>
                        @endforeach
                    </ul>
                </div>

                <!-- Call to Action Buttons -->
                <div class="mt-8">
                    @auth
                    <a
                        href="https://wa.me/{{ config('app.whatsapp_number') }}?text=Halo VisionRent, saya ingin menyewa {{ $item->name }}"
                        target="_blank"
                        class="inline-flex items-center justify-center bg-green-500 text-white px-6 py-3 rounded-lg shadow hover:bg-green-600 transition"
                    >
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 509 511.514"><path fill="#fff" d="M434.762 74.334C387.553 26.81 323.245 0 256.236 0h-.768C115.795.001 2.121 113.696 2.121 253.456l.001.015a253.516 253.516 0 0033.942 126.671L0 511.514l134.373-35.269a253.416 253.416 0 00121.052 30.9h.003.053C395.472 507.145 509 393.616 509 253.626c0-67.225-26.742-131.727-74.252-179.237l.014-.055zM255.555 464.453c-37.753 0-74.861-10.22-107.293-29.479l-7.72-4.602-79.741 20.889 21.207-77.726-4.984-7.975c-21.147-33.606-32.415-72.584-32.415-112.308 0-116.371 94.372-210.743 210.741-210.743 56.011 0 109.758 22.307 149.277 61.98a210.93 210.93 0 0161.744 149.095c0 116.44-94.403 210.869-210.844 210.869h.028zm115.583-157.914c-6.363-3.202-37.474-18.472-43.243-20.593-5.769-2.121-10.01-3.202-14.315 3.203-4.305 6.404-16.373 20.593-20.063 24.855-3.69 4.263-7.401 4.815-13.679 1.612-6.278-3.202-26.786-9.883-50.899-31.472a192.748 192.748 0 01-35.411-43.867c-3.712-6.363-.404-9.777 2.82-12.873 3.224-3.096 6.363-7.381 9.48-11.092a41.58 41.58 0 006.357-10.597 11.678 11.678 0 00-.508-11.09c-1.718-3.18-14.444-34.357-19.534-47.06-5.09-12.703-10.37-10.603-14.272-10.901-3.902-.297-7.911-.19-12.089-.19a23.322 23.322 0 00-16.964 7.911c-5.707 6.298-22.1 21.673-22.1 52.849s22.671 61.249 25.852 65.532c3.182 4.284 44.663 68.227 108.288 95.649 15.099 6.489 26.891 10.392 36.053 13.403a87.504 87.504 0 0025.216 3.718c4.905 0 9.82-.416 14.65-1.237 12.174-1.782 37.453-15.291 42.776-30.073s5.303-27.57 3.711-30.093c-1.591-2.524-5.704-4.369-12.088-7.615l-.038.021z"/></svg>
                        Book Now via WhatsApp
                    </a>
                    @else
                    <a
                        href="{{ route('login') }}"
                        class="inline-flex items-center justify-center bg-gray-800 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700 transition"
                    >
                        Login to Rent
                    </a>
                    @endauth
                </div>
                <button
                    onclick="showAvailability()"
                    class="inline-flex items-center justify-center bg-blue-500 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-600 transition mt-4"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    Cek Ketersediaan
                </button>
            </div>
        </div>
    </div>
                <!-- Modal -->
                <div id="availabilityModal" style="display: none;" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
                    <div class="modal-container relative top-20 mx-auto p-5 border w-[400px] shadow-lg rounded-md bg-white">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-medium">Ketersediaan {{ $item->name }}</h3>
                            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-500">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <div id="modalContent" class="mt-4">
                            <!-- Content will be loaded here -->
                        </div>
                    </div>
                </div>
</main>
    @include('components.footer')
    <script>
        function changeMainImage(src) {
            document.getElementById('mainImage').src = src;
        }
        let currentMonth = new Date().getMonth() + 1;
        let currentYear = new Date().getFullYear();

        function changeMonth(delta) {
            const newDate = new Date(currentYear, currentMonth - 1 + delta, 1);
            currentMonth = newDate.getMonth() + 1;
            currentYear = newDate.getFullYear();
            loadAvailability();
        }

        async function loadAvailability() {
            const modalContent = document.getElementById('modalContent');

            try {
                const response = await fetch(`{{ route("items.check-availability", $item) }}?month=${currentMonth}&year=${currentYear}`);
                const html = await response.text();
                modalContent.innerHTML = html;
            } catch (error) {
                console.error('Error:', error);
                modalContent.innerHTML = '<p class="text-red-500">Terjadi kesalahan saat memuat data</p>';
            }
        }

        function showAvailability() {
            const modal = document.getElementById('availabilityModal');
            const modalContent = document.getElementById('modalContent');

            if (!modal || !modalContent) {
                console.error('Modal elements not found');
                return;
            }

            modal.style.display = 'block';
            modal.querySelector('.modal-container').classList.add('modal-enter');

            requestAnimationFrame(() => {
                modal.querySelector('.modal-container').classList.remove('modal-enter');
                modal.querySelector('.modal-container').classList.add('modal-enter-active');
            });

            loadAvailability();
        }

        function closeModal() {
            const modal = document.getElementById('availabilityModal');
            const container = modal.querySelector('.modal-container');

            container.classList.remove('modal-enter-active');
            container.classList.add('modal-exit');

            requestAnimationFrame(() => {
                container.classList.remove('modal-exit');
                container.classList.add('modal-exit-active');

                setTimeout(() => {
                    modal.style.display = 'none';
                    container.classList.remove('modal-exit-active');
                }, 300);
            });
        }

        window.onclick = function(event) {
            const modal = document.getElementById('availabilityModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
