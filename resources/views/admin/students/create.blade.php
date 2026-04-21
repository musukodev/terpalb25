<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">Tambah Siswa</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8"><div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
        <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <x-input-label for="name" value="Nama Lengkap" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
            </div>
            <div class="mb-4">
                <x-input-label for="description" value="Deskripsi / Motto Singkat" />
                <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" />
            </div>
            <div class="mb-4">
                <x-input-label for="image" value="Foto (Wajib)" />
                <input type="file" name="image" id="image" class="mt-1 block w-full text-white" accept="image/*" required>
            </div>
            <x-primary-button>Simpan</x-primary-button>
        </form>
    </div></div></div>
</x-app-layout>