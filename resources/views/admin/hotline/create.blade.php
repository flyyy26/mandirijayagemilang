@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="container mx-auto mt-10">

        <!-- Modal untuk Input Kategori -->
        <div id="hotlineModal" class="fixed h-screen inset-0 flex items-center w-screen justify-center bg-gray-800 bg-opacity-50 hidden overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 ">
                <h2 class="text-2xl font-medium mb-4">Tambah Hotline</h2>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.hotline.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-base font-normal mb-2">Nama Hotline:</label>
                        <input type="text" name="name" id="name" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan nama hotline" required>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="closeModalHotline()" class="bg-red-500 hover:bg-red-700 text-white text-base font-normal py-2 px-4 rounded">
                            Batal
                        </button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
                            Tambah Hotline
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Edit Nomor Whatsapp -->
        <div id="editModalHotline" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                <h2 class="text-2xl font-medium mb-4">Edit Nomor Whatsapp</h2>
                <form id="editWhatsappForm" action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="editName" class="block text-gray-700 text-base font-normal mb-2">Nama Hotline:</label>
                        <input type="text" name="name" id="editName" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Hotline">
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="closeEditModalHotline()" class="bg-red-500 hover:bg-red-700 text-white text-base font-normal py-2 px-4 rounded">
                            Batal
                        </button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daftar Kategori -->
        <div class="mt-10">
            <div class="flex items-center justify-between mb-4">
                <div class="block">
                    <h2 class="text-xl font-medium mb-1">Daftar Hotline</h2>
                    <p class="text-base">Nomor Whatsapp untuk disimpan di website, hanya 1 yang ditampilkan</p>
                </div>
                
                <!-- Button Tambah Kategori -->
                 <div class="flex gap-4">
                    <button onclick="openModalHotline()" class="bg-blue-500 text-sm text-white px-3 py-2 rounded-md flex items-center gap-1">
                        Tambah Hotline <iconify-icon icon="octicon:plus-16"></iconify-icon>
                    </button>
                 </div>
            </div>
            <table class="min-w-full bg-white border border-gray-300 rounded-md">
                <thead>
                    <tr>
                        <th class="px-2 w-16 py-4 text-center border text-base font-medium">No</th>
                        <th class="px-4 w-52 py-4 text-left border text-base font-medium">Nomor Whatsapp Hotline</th>
                        <th class="px-4 w-24 py-4 text-center border text-base font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody id="categoryTableBody">
                    @forelse ($hotlines as $index => $hotline)
                        <tr class="border-b border-gray-300">
                            <td class="px-2 max-w-0 py-2 text-center border text-sm">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border text-sm">+{{ $hotline->name }}</td>
                            <td class="px-4 py-2 text-center border-0">
                                <div class="flex justify-center gap-3 items-center">
                                    <button onclick="openEditModalHotline({{ $hotline->id }})" class="bg-yellow-500 font-normal hover:bg-yellow-700 text-white text-sm font-bold py-2 px-4 rounded">
                                        Edit
                                    </button>

                                    <form action="{{ route('admin.hotline.destroy', $hotline->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus hotline ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-normal bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-2 text-center text-gray-500">Belum ada hotline.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- JavaScript untuk membuka dan menutup modal -->
    <script>
        function openModalHotline() {
            document.getElementById('hotlineModal').classList.remove('hidden');
        }

        function closeModalHotline() {
            document.getElementById('hotlineModal').classList.add('hidden');
        }

        function openEditModalHotline(hotlineId) {
            const modal = document.getElementById('editModalHotline');
            const form = document.getElementById('editWhatsappForm');
            fetch(`/admin/hotline/${hotlineId}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editName').value = data.name;
                    form.action = `/admin/hotline/${hotlineId}`;
                    modal.classList.remove('hidden');
                });
        }

        function closeEditModalHotline() {
            document.getElementById('editModalHotline').classList.add('hidden');
        }
    </script>

@endsection
