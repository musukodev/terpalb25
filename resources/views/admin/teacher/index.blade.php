<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Wali Kelas</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success')) <div class="text-green-500 mb-4">{{ session('success') }}</div> @endif
                <form action="{{ route('admin.teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-4">
                        <x-input-label for="name" value="Nama Wali Kelas" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $teacher->name }}" required />
                    </div>
                    <div class="mb-4">
                        <x-input-label for="quotes" value="Quotes" />
                        <textarea id="quotes" name="quotes" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full" rows="3" required>{{ $teacher->quotes }}</textarea>
                    </div>
                    <div class="mb-4">
                        <x-input-label for="image" value="Ganti Foto (Opsional, JPG/PNG/WEBP)" />
                        <input type="file" name="image" id="image" class="mt-1 block w-full text-white" accept="image/*">
                        <div class="mt-2"><img src="{{ $teacher->image_url }}" alt="Wali Kelas" class="w-32 rounded"></div>
                    </div>
                    <x-primary-button>Simpan Perubahan</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>