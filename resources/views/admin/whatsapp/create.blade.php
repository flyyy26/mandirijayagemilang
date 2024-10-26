@extends('layouts.app')

@section('title', 'Product')

@section('content')
<div class="container mx-auto mt-10">

    <!-- Modal Tambah Nomor Whatsapp -->
    <div id="kategoriModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <h2 class="text-2xl font-medium mb-4">Tambah Nomor Baru</h2>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.whatsapp.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="distributor" class="block text-gray-700 text-base font-normal mb-2">Nama Distributor :</label>
                    <input type="text" name="distributor" id="distributor" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Distributor">
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-base font-normal mb-2">Nomor Whatsapp:</label>
                    <input type="text" name="name" id="name" value="62" oninput="setDefaultValue(this)" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nomor Whatsapp">
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal()" class="bg-red-500 hover:bg-red-700 text-white text-base font-normal py-2 px-4 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
                        Tambah Nomor
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Nomor Whatsapp -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <h2 class="text-2xl font-medium mb-4">Edit Nomor Whatsapp</h2>
            <form id="editWhatsappForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="editDistributor" class="block text-gray-700 text-base font-normal mb-2">Nama Distributor :</label>
                    <input type="text" name="distributor" id="editDistributor" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Distributor">
                </div>

                <div class="mb-4">
                    <label for="editName" class="block text-gray-700 text-base font-normal mb-2">Nomor Whatsapp:</label>
                    <input type="text" name="name" id="editName" value="62" oninput="setDefaultValue(this)" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nomor Whatsapp">
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeEditModal()" class="bg-red-500 hover:bg-red-700 text-white text-base font-normal py-2 px-4 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Daftar Nomor Whatsapp -->
    <div class="mt-10">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-medium">Daftar Nomor Whatsapp</h2>
            <div class="flex gap-4">
                <input type="text" id="searchInput" onkeyup="filterWhatsapps()" placeholder="Cari Nama Toko..." class="text-sm px-4 py-2 border rounded-md">
                <button onclick="openModal()" class="bg-blue-500 text-sm text-white px-3 py-2 rounded-md flex items-center gap-1">
                    Tambah Nomor Whatsapp <iconify-icon icon="octicon:plus-16"></iconify-icon>
                </button>
            </div>
        </div>
        <table class="min-w-full bg-white border border-gray-300 rounded-md">
            <thead>
                <tr>
                    <th class="px-2 w-11 py-4 text-center border text-base font-medium">No</th>
                    <th class="px-2 w-36 py-4 text-center border text-base font-medium">Nama Distributor</th>
                    <th class="px-2 w-16 py-4 text-center border text-base font-medium">Nomor Whatsapp</th>
                    <th class="px-2 w-11 py-4 text-center border text-base font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody id="whatsappTableBody">
                @forelse ($whatsapps as $index => $whatsapp)
                    <tr class="border-b border-gray-300">
                        <td class="px-2 max-w-0 py-2 text-center border">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border text-center">{{ $whatsapp->distributor }}</td>
                        <td class="px-2 py-2 text-center border">+{{ $whatsapp->name }}</td>
                        <td class="px-2 max-w-0 py-2 text-center border text-center border-0">
                            <div class="flex justify-center items-center">
                                <button onclick="openEditModal({{ $whatsapp->id }})" class="bg-yellow-500 font-normal hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-1">
                                    Edit
                                </button>
                                <form action="{{ route('admin.whatsapp.destroy', $whatsapp->id) }}" method="POST" class="inline-block mx-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus nomor ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-normal bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                    </button>
                                </form>
                            <div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-gray-500 py-4">Belum ada nomor whatsapp.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    

    <!-- Daftar Kategori -->
    <div class="mt-10">
        <div class="flex items-center justify-between mb-4">
            <div class="block">
                <h2 class="text-xl font-medium mb-1">Nomor Hotline Website</h2>
            </div>
            
            <!-- Button Tambah Kategori -->
                <div class="flex gap-4">
                <button onclick="openModalHotline()" class="bg-blue-500 text-sm text-white px-3 py-2 rounded-md flex items-center gap-1">
                    Tambah Hotline Baru<iconify-icon icon="octicon:plus-16"></iconify-icon>
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
                        <td class="px-2 max-w-0 py-2 text-center border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border text-center">+{{ $hotline->name }}</td>
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

<!-- Modal Edit Nomor Whatsapp -->
<div id="editModalHotline" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <h2 class="text-2xl font-medium mb-4">Edit Nomor Whatsapp</h2>
        <form id="editWhatsappFormHotline" action="" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="editNameHotline" class="block text-gray-700 text-base font-normal mb-2">Nama Hotline:</label>
                <input type="text" name="name" id="editNameHotline" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nama Hotline">
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
                <label for="name" class="block text-gray-700 text-base font-normal mb-2">Nomor Hotline:</label>
                <input type="text" name="name" id="name" value="62" oninput="setDefaultValue(this)" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan nomor hotline" required>
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

<script>
    function openModalHotline() {
        document.getElementById('hotlineModal').classList.remove('hidden');
    }

    function closeModalHotline() {
        document.getElementById('hotlineModal').classList.add('hidden');
    }

    function openEditModalHotline(hotlineId) {
        const modal = document.getElementById('editModalHotline');
        const form = document.getElementById('editWhatsappFormHotline');
        fetch(`/admin/hotline/${hotlineId}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('editNameHotline').value = data.name;
                form.action = `/admin/hotline/${hotlineId}`;
                modal.classList.remove('hidden');
            });
    }

    function closeEditModalHotline() {
        document.getElementById('editModalHotline').classList.add('hidden');
    }
</script>

<!-- Script untuk modal dan AJAX -->
<script>
    function setDefaultValue(input) {
        // Pastikan value selalu dimulai dengan "62"
        if (!input.value.startsWith("62")) {
            input.value = "62";
        }
    }

    document.getElementById('searchInput').addEventListener('keyup', function() {
        const query = this.value;
        fetch(`/admin/whatsapps/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('whatsappTableBody');
                tableBody.innerHTML = '';
                if (data.data.length > 0) {
                    data.data.forEach((whatsapp, index) => {
                        const row = `
                            <tr class="border-b border-gray-300">
                                <td class="px-2 max-w-0 py-2 text-center border">${index + 1}</td>
                                <td class="py-2 px-4 border">${whatsapp.distributor}</td>
                                <td class="px-2 py-2 text-center border">+${whatsapp.name}</td>
                                <td class="px-2 max-w-0 py-2 text-center border text-center border-0">
                                    <div class="flex justify-center items-center">
                                        <button onclick="openEditModal(${whatsapp.id})" class="bg-yellow-500 font-normal hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-1">Edit</button>
                                        <form action="/admin/whatsapp/destroy/${whatsapp.id}" method="POST" class="inline-block mx-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus nomor ini?');" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="font-normal bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        `;
                        tableBody.innerHTML += row;
                    });
                } else {
                    tableBody.innerHTML = '<tr><td colspan="4" class="text-center text-gray-500 py-4">Nomor Whatsapp tidak ditemukan.</td></tr>';
                }
            });
    });

    function openModal() {
        document.getElementById('kategoriModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('kategoriModal').classList.add('hidden');
    }

    function openEditModal(whatsappId) {
        const modal = document.getElementById('editModal');
        const form = document.getElementById('editWhatsappForm');
        fetch(`/admin/whatsapp/${whatsappId}/edit`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('editDistributor').value = data.distributor;
                document.getElementById('editName').value = data.name;
                form.action = `/admin/whatsapp/${whatsappId}`;
                modal.classList.remove('hidden');
            });
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection
