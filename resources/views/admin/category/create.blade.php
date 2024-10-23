@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="container mx-auto mt-10">

        <!-- Menu Navigasi -->
        <div class="flex justify-between gap-2">
            <div class="flex gap-2">
                <a href="{{ route('admin.dashboard') }}">
                    <button class="bg-green-400 text-white px-4 py-2 rounded-md mb-4 flex items-center gap-1">
                        Dashboard
                    </button>
                </a>
                <a href="{{ route('admin.products.create') }}">
                    <button class="bg-green-400 text-white px-4 py-2 rounded-md mb-4 flex items-center gap-1">
                        Produk
                    </button>
                </a>
                <a href="{{ route('admin.category.create') }}">
                    <button class="bg-green-400 text-white px-4 py-2 rounded-md mb-4 flex items-center gap-1">
                        Kategori
                    </button>
                </a>
            </div>
        </div>

        <!-- Modal untuk Input Kategori -->
        <div id="kategoriModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Tambah Kategori Baru</h2>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nama Kategori:</label>
                        <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan nama kategori" required>
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 font-bold mb-2">Deskripsi Kategori:</label>
                        <textarea name="description" id="description" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="excellence" class="block text-gray-700 font-bold mb-2">Keunggulan Kategori:</label>
                        <textarea name="excellence" id="excellence" rows="10" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="image" class="block text-gray-700 font-bold mb-2">Gambar Sampul:</label>
                        <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*" required>
                    </div>

                    <div class="flex justify-between">
                        <button type="button" onclick="closeModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Batal
                        </button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Kategori
                        </button>
                    </div>
                </form>
            </div>
        </div>


        <!-- Modal Edit Kategori -->
        <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen px-4 text-center">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- Modal Content -->
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full p-6">
                    <h2 class="text-2xl font-bold mb-4">Edit Kategori</h2>
                    <form id="editCategoryForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Kategori -->
                        <div class="mb-4">
                            <label for="editName" class="block text-gray-700 font-bold mb-2">Nama Kategori:</label>
                            <input type="text" name="name" id="editName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- Deskripsi Kategori -->
                        <div class="mb-4">
                            <label for="editDescription" class="block text-gray-700 font-bold mb-2">Deskripsi Kategori:</label>
                            <textarea name="description" id="editDescription" class="description_editor shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>

                        <!-- Keunggulan Kategori -->
                        <div class="mb-4">
                            <label for="editExcellence" class="block text-gray-700 font-bold mb-2">Keunggulan Kategori:</label>
                            <textarea name="excellence" id="editExcellence" class="excellence_editor shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>

                        <!-- Gambar Sampul -->
                        <div class="mb-4">
                            <label for="editImage" class="block text-gray-700 font-bold mb-2">Gambar Sampul:</label>
                            <input type="file" name="image" id="editImage" class="block w-full text-sm text-gray-900 bg-gray-50 rounded border border-gray-300 cursor-pointer focus:outline-none">
                        </div>

                        <div class="flex justify-end">
                            <button type="button" onclick="closeEditModal()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Batal
                            </button>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Daftar Kategori -->
        <div class="mt-10">
            <div class="flex justify-between">
                <h2 class="text-2xl font-bold mb-4">Daftar Kategori</h2>
                <!-- Button Tambah Kategori -->
                 <div class="flex">
                    <form action="{{ route('admin.category.create') }}" method="GET" class="flex items-center gap-2 mb-4">
                        <input type="text" id="searchInput" placeholder="Cari Kategori..." class="px-4 py-2 border rounded-md">
                    </form>
                    <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4 flex items-center gap-1">
                        Tambah Kategori <iconify-icon icon="octicon:plus-16"></iconify-icon>
                    </button>
                 </div>
            </div>
            <table class="min-w-full bg-white border border-gray-300 rounded-md">
                <thead>
                    <tr>
                        <th class="px-2 w-12 py-4 text-center border-b">No</th>
                        <th class="px-4 w-28 py-4 text-left border-b">Sampul Kategori</th>
                        <th class="px-4 w-52 py-4 text-left border-b">Nama Kategori</th>
                        <th class="px-4 w-80 py-4 text-left border-b">Deskripsi Kategori</th>
                        <th class="px-4 w-80 py-4 text-left border-b">Keunggulan Kategori</th>
                        <th class="px-4 py-4 text-center border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody  id="categoryTableBody">
                    @forelse ($categories as $index => $category)
                        <tr class="border-b border-gray-300">
                            <td class="px-2 max-w-0 py-2 text-center border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-100 h-20 object-cover rounded">
                            </td>
                            <td class="px-4 py-2 border">{{ $category->name }}</td>
                            <td class="py-2 px-4 border"><div class="h-16 overflow-y-auto">{!! $category->description !!}</div></td>
                            <td class="py-2 px-4 border"><div class="h-16 overflow-y-auto">{!! $category->excellence !!}</div></td>
                            <td class="px-4 py-2 text-center border">
                                <button onclick="openEditModal({{ $category->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                    Edit
                                </button>

                                <!-- Form untuk delete -->
                                <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-2 text-center text-gray-500">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        tinymce.init({
            selector: '#description',  // Target textarea dengan ID "description"
            plugins: 'lists link image code',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code'
        });
        tinymce.init({
            selector: '#excellence',  // Target textarea dengan ID "description"
            plugins: 'lists link image code',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code'
        });
    </script>

    <!-- JavaScript untuk membuka dan menutup modal -->
    <script>
        function openModal() {
            document.getElementById('kategoriModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('kategoriModal').classList.add('hidden');
        }
    </script>

    <!-- Edit Button -->
    <script>
        function openEditModal(categoryId) {
            // Ambil elemen modal dan form
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editCategoryForm');

            // Ambil data kategori berdasarkan ID (misalnya dengan API atau langsung dari backend)
            fetch(`/admin/category/${categoryId}/edit`)
                .then(response => response.json())
                .then(data => {
                    // Isi form dengan data kategori yang akan diedit
                    document.getElementById('editName').value = data.name;
                    document.getElementById('editDescription').value = data.description;
                    document.getElementById('editExcellence').value = data.excellence;

                    // Set action form untuk update kategori
                    form.action = `/admin/category/${categoryId}`;

                    // Tampilkan modal
                    modal.classList.remove('hidden');

                    // Inisialisasi ulang TinyMCE setelah modal dibuka
                    tinymce.remove();  // Hapus semua editor TinyMCE yang ada sebelumnya
                    tinymce.init({
                        selector: '.description_editor',
                        plugins: 'lists link image code',
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code'
                    });
                    tinymce.init({
                        selector: '.excellence_editor',
                        plugins: 'lists link image code',
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code'
                    });
                })
                .catch(error => console.error('Error fetching category:', error));
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
            tinymce.remove();  // Hapus editor TinyMCE saat modal ditutup
        }

    </script>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const query = this.value;

        // Kirim request AJAX ke server
        fetch(`/admin/categories/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('categoryTableBody');
                tableBody.innerHTML = ''; // Kosongkan tabel sebelum menampilkan hasil

                // Jika ada kategori yang ditemukan
                if (data.data.length > 0) {
                    data.data.forEach((category, index) => {
                        const row = `
                            <tr class="border-b border-gray-300">
                                <td class="px-2 max-w-0 py-2 text-center border">${index + 1}</td>
                                <td class="px-4 py-2">
                                    <img src="/storage/${category.image}" alt="${category.name}" class="w-100 h-20 object-cover rounded">
                                </td>
                                <td class="px-4 py-2 border">${category.name}</td>
                                <td class="py-2 px-4 border"><div class="h-16 overflow-y-auto">${category.description}</div></td>
                                <td class="py-2 px-4 border"><div class="h-16 overflow-y-auto">${category.excellence}</div></td>
                                <td class="px-4 py-2 text-center border">
                                    <button onclick="openEditModal(${category.id})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </button>

                                    <form action="/admin/category/destroy/${category.id}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        `;

                        tableBody.innerHTML += row;
                    });
                } else {
                    tableBody.innerHTML = '<tr><td colspan="6" class="text-center text-gray-500 py-4">Kategori tidak ditemukan.</td></tr>';
                }
            });
    });
</script>

@endsection