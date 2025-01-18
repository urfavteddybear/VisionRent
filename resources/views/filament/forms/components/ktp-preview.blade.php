<div class="space-y-2">
    <div class="font-medium text-gray-900 dark:text-gray-200">Preview KTP</div>
    @if($getRecord()->ktp_path)
        <div>
            <img
                src="{{ Storage::url($getRecord()->ktp_path) }}"
                alt="KTP Preview"
                class="max-w-lg rounded-lg shadow-sm"
            >
        </div>
    @else
        <div class="text-sm text-gray-500">
            Tidak ada file KTP
        </div>
    @endif
</div>
