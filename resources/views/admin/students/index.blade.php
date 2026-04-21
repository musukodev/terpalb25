<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Daftar Siswa</h2>
            <a href="{{ route('admin.students.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Siswa</a>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if(session('success')) <div class="text-green-500 mb-4">{{ session('success') }}</div> @endif
                <table class="w-full text-left text-gray-300">
                    <thead><tr><th>Foto</th><th>Nama</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr class="border-t border-gray-700">
                            <td class="py-2"><img src="{{ $student->image_url }}" class="w-16 h-16 object-cover rounded"></td>
                            <td>{{ $student->name }}</td>
                            <td>
                                <a href="{{ route('admin.students.edit', $student->id) }}" class="text-yellow-500">Edit</a> | 
                                <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500" onclick="return confirm('Hapus siswa ini?')">Hapus</button>
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