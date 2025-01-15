<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kirim Ulang Verifikasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4">
                        <p class="font-bold">Alasan Penolakan Sebelumnya:</p>
                        <p class="italic">{{ $rejectionReason }}</p>
                    </div>

                    <form action="{{ route('verification.resubmit.submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="full_name" value="Nama Lengkap (Sesuai KTP)" />
                                <x-text-input id="full_name" name="full_name" type="text"
                                    class="mt-1 block w-full"
                                    required
                                    value="{{ $user->full_name }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('full_name')" />
                            </div>

                            <div>
                                <x-input-label for="nik" value="NIK" />
                                <x-text-input id="nik" name="nik" type="text"
                                    class="mt-1 block w-full"
                                    required
                                    value="{{ $user->nik }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('nik')" />
                            </div>

                            <div>
                                <x-input-label for="phone" value="Nomor Telepon" />
                                <x-text-input id="phone" name="phone" type="text"
                                    class="mt-1 block w-full"
                                    required
                                    value="{{ $user->phone }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                            </div>

                            <div class="md:col-span-2">
                                <x-input-label for="address" value="Alamat Lengkap" />
                                <textarea id="address" name="address"
                                    class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    required rows="3">{{ $user->address }}</textarea>
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <div class="md:col-span-2">
                                <x-input-label for="ktp_file" value="Foto KTP (Upload ulang jika ingin mengubah)" />
                                @if($user->ktp_path)
                                    <div class="mb-4">
                                        <img src="{{ Storage::url($user->ktp_path) }}" alt="KTP Preview" class="max-w-md rounded-lg shadow-sm">
                                    </div>
                                @endif
                                @include('components.ktp-upload-preview')
                                <x-input-error class="mt-2" :messages="$errors->get('ktp_file')" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <x-secondary-button type="button" class="mr-3" onclick="window.location.href='{{ route('dashboard') }}'">
                                {{ __('Batal') }}
                            </x-secondary-button>
                            <x-primary-button>
                                {{ __('Kirim Ulang Verifikasi') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
