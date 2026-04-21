<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Edit Siswa</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-4">
                <x-input-label for="name" value="Nama Lengkap" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ $student->name }}" required />
            </div>
            <div class="mb-4">
                <x-input-label for="description" value="Deskripsi / Motto Singkat" />
                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" value="{{ $student->description }}" />
            </div>
            <div class="mb-4">
                <x-input-label for="image" value="Ganti Foto (Opsional)" />
                <input type="file" name="image" id="image" class="mt-1 block w-full text-white" accept="image/*">
                <div class="mt-2"><img src="{{ $student->image_url }}" class="w-16 h-16 rounded"></div>
            </div>
            <x-primary-button>Update</x-primary-button>
        </form>
    </div></div></div>
</x-app-layout>