<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->name }} - Vision Rent</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white">
    @include('components.navbar')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="md:flex">
            <!-- Image Gallery -->
            <div class="md:w-1/3 p-4">
                <!-- Main Image Preview -->
                <div class="aspect-square w-full mb-4">
                    <img
                        id="mainImage"
                        src="{{ $images[0] }}"
                        alt="{{ $item->name }}"
                        class="w-full h-full object-cover rounded-lg"
                    >
                </div>

                <!-- Thumbnails -->
                @if(count($images) > 0)
                    <div class="grid grid-cols-4 gap-2">
                        @foreach($images as $image)
                            <div class="aspect-square cursor-pointer">
                                <img
                                    src="{{ $image }}"
                                    alt="{{ $item->name }}"
                                    class="w-full h-full object-cover rounded-lg thumbnail-img"
                                    onclick="changeMainImage(this.src)"
                                >
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Item Details -->
            <div class="md:w-2/3 p-8 md:pl-16">
                <!-- Title and Price -->
                <h1 class="text-3xl font-bold mb-3">{{ $item->name }}</h1>
                <div class="text-4xl font-bold text-gray-900 mb-8">
                    Rp {{ number_format($item->price, 0, ',', '.') }}
                </div>

                <!-- Details -->
                <div class="space-y-3 max-w-xl">
                    <div class="flex">
                        <span class="text-gray-600 w-40">Min. Pemesanan:</span>
                        <span>1 Buah</span>
                    </div>
                    <div class="flex">
                        <span class="text-gray-600 w-40">Kategori:</span>
                        <span>{{ $item->category->name }}</span>
                    </div>
                    <div class="flex">
                        <span class="text-gray-600 w-40">Stok:</span>
                        <span>{{ $item->stock }} unit</span>
                    </div>
                </div>

                <!-- Product Highlight -->
                <div class="mt-8 max-w-xl">
                    <h2 class="text-gray-600 mb-2">Product Highlight:</h2>
                    <div class="space-y-2">
                        @foreach(explode("\n", $item->description) as $highlight)
                            <div>{{ $highlight }}</div>
                        @endforeach
                    </div>
                </div>

                <!-- WhatsApp Button -->
                <div class="mt-8">
                    <a
                        href="https://wa.me/{{ config('app.whatsapp_number') }}?text=Halo VisionRent"
                        target="_blank"
                        class="inline-flex items-center bg-green-500 text-white px-8 py-3 rounded-md hover:bg-green-600 transition-colors"
                    >
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 509 511.514"><path fill="#fff" d="M434.762 74.334C387.553 26.81 323.245 0 256.236 0h-.768C115.795.001 2.121 113.696 2.121 253.456l.001.015a253.516 253.516 0 0033.942 126.671L0 511.514l134.373-35.269a253.416 253.416 0 00121.052 30.9h.003.053C395.472 507.145 509 393.616 509 253.626c0-67.225-26.742-131.727-74.252-179.237l.014-.055zM255.555 464.453c-37.753 0-74.861-10.22-107.293-29.479l-7.72-4.602-79.741 20.889 21.207-77.726-4.984-7.975c-21.147-33.606-32.415-72.584-32.415-112.308 0-116.371 94.372-210.743 210.741-210.743 56.011 0 109.758 22.307 149.277 61.98a210.93 210.93 0 0161.744 149.095c0 116.44-94.403 210.869-210.844 210.869h.028zm115.583-157.914c-6.363-3.202-37.474-18.472-43.243-20.593-5.769-2.121-10.01-3.202-14.315 3.203-4.305 6.404-16.373 20.593-20.063 24.855-3.69 4.263-7.401 4.815-13.679 1.612-6.278-3.202-26.786-9.883-50.899-31.472a192.748 192.748 0 01-35.411-43.867c-3.712-6.363-.404-9.777 2.82-12.873 3.224-3.096 6.363-7.381 9.48-11.092a41.58 41.58 0 006.357-10.597 11.678 11.678 0 00-.508-11.09c-1.718-3.18-14.444-34.357-19.534-47.06-5.09-12.703-10.37-10.603-14.272-10.901-3.902-.297-7.911-.19-12.089-.19a23.322 23.322 0 00-16.964 7.911c-5.707 6.298-22.1 21.673-22.1 52.849s22.671 61.249 25.852 65.532c3.182 4.284 44.663 68.227 108.288 95.649 15.099 6.489 26.891 10.392 36.053 13.403a87.504 87.504 0 0025.216 3.718c4.905 0 9.82-.416 14.65-1.237 12.174-1.782 37.453-15.291 42.776-30.073s5.303-27.57 3.711-30.093c-1.591-2.524-5.704-4.369-12.088-7.615l-.038.021z"/></svg>
                        &nbsp;Book now through WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>

<script>
function changeMainImage(src) {
    document.getElementById('mainImage').src = src;
}
</script>
</html>
