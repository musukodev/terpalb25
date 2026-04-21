<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Tambah Album</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('admin.albums.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-input-label for="title" value="Judul Kegiatan" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
            </div>
            <div class="mb-4">
                <x-input-label for="description" value="Cerita/Deskripsi" />
                <textarea id="description" name="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" rows="4" required></textarea>
            </div>
            <div class="mb-4">
                <x-input-label for="image" value="Foto (Wajib)" />
                <input type="file" name="image" id="image" class="mt-1 block w-full text-white" accept="image/*" required>
            </div>
            <x-primary-button>Simpan</x-primary-button>
        </form>
    </div></div></div>
</x-app-layout>