<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Galeri Album</h2>
            <a href="{{ route('admin.albums.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Album</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success')) <div class="text-green-500 mb-4">{{ session('success') }}</div> @endif
                <table class="w-full text-left text-gray-300">
                    <thead><tr><th>Foto</th><th>Judul</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @foreach($albums as $album)
                        <tr class="border-t border-gray-700">
                            <td class="py-2"><img src="{{ $album->image_url }}" class="w-24 h-16 object-cover rounded"></td>
                            <td>{{ $album->title }}</td>
                            <td>
                                <a href="{{ route('admin.albums.edit', $album->id) }}" class="text-yellow-500">Edit</a> | 
                                <form action="{{ route('admin.albums.destroy', $album->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500" onclick="return confirm('Hapus album ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>