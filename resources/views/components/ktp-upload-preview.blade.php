<div class="space-y-2" x-data="{
    previewUrl: null,
    uploading: false,
    progress: 0,
    handleFileChange(event) {
        const file = event.target.files[0];
        if (file) {
            this.previewUrl = URL.createObjectURL(file);
            this.simulateUpload();
        }
    },
    simulateUpload() {
        this.uploading = true;
        this.progress = 0;
        const interval = setInterval(() => {
            this.progress += 10;
            if (this.progress >= 100) {
                clearInterval(interval);
                setTimeout(() => {
                    this.uploading = false;
                }, 500);
            }
        }, 100);
    }
}">
    <div class="flex items-center justify-center w-full">
        <label class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500">
            <div class="flex flex-col items-center justify-center pt-5 pb-6" x-show="!previewUrl">
                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                </svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Klik untuk upload atau drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 2MB)</p>
            </div>
            <div x-show="previewUrl" class="relative w-full h-full">
                <img :src="previewUrl" class="w-full h-full object-contain rounded-lg" />
                <div x-show="uploading" class="absolute inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center rounded-lg">
                    <div class="w-3/4">
                        <div class="bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                            <div class="bg-blue-600 h-2.5 rounded-full transition-all duration-300" :style="{ width: progress + '%' }"></div>
                        </div>
                        <p class="text-white text-center mt-2" x-text="progress + '%'"></p>
                    </div>
                </div>
            </div>
            <input type="file" class="hidden" name="ktp_file" accept="image/*" @change="handleFileChange" />
        </label>
    </div>
    <div x-show="previewUrl" class="flex justify-end space-x-2 mt-2">
        <button type="button" @click="previewUrl = null" class="px-3 py-1 text-sm text-red-600 hover:text-red-700">
            Hapus
        </button>
    </div>
</div>
