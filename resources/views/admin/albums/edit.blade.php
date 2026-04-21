<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Edit Album</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('admin.albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-4">
                <x-input-label for="title" value="Judul Kegiatan" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ $album->title }}" required />
            </div>
            <div class="mb-4">
                <x-input-label for="description" value="Cerita/Deskripsi" />
                <textarea id="description" name="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 rounded-md shadow-sm mt-1 block w-full" rows="4" required>{{ $album->description }}</textarea>
            </div>
            <div class="mb-4">
                <x-input-label for="image" value="Ganti Foto (Opsional)" />
                <input type="file" name="image" id="image" class="mt-1 block w-full text-white" accept="image/*">
                <div class="mt-2"><img src="{{ $album->image_url }}" class="w-32 rounded"></div>
            </div>
            <x-primary-button>Update</x-primary-button>
        </form>
    </div></div></div>
</x-app-layout>