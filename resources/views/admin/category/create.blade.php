@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="container mx-auto mt-10">

        <!-- Modal untuk Input Kategori -->
        <div id="kategoriModal" class="fixed h-screen inset-0 flex items-center w-screen justify-center bg-gray-800 bg-opacity-50 hidden overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-6xl p-6 ">
                <h2 class="text-2xl font-medium mb-4">Tambah Kategori Baru</h2>

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
                    <div class="grid grid-cols-2 gap-x-6">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-base font-normal mb-2">Nama Kategori:</label>
                            <input type="text" name="name" id="name" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan nama kategori" required>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-base font-normal mb-2">Gambar Cover:</label>
                            <input type="file" name="image" id="image" onchange="checkFileSize(this, 'image-error')" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*" required>
                            <span id="image-error" class="text-red-500 text-sm hidden"></span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-x-6">
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-normal mb-2 text-base">Deskripsi Kategori:</label>
                            <textarea name="description" id="description" rows="10" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="excellence" class="block text-gray-700 font-normal mb-2 text-base">Keunggulan Kategori:</label>
                            <textarea name="excellence" id="excellence" rows="10" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                        </div>
                    </div>
                    

                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="closeModal()" class="bg-red-500 hover:bg-red-700 text-white text-base font-normal py-2 px-4 rounded">
                            Batal
                        </button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
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
                <div class="bg-white rounded-lg overflow-hidden shadow-lg transform transition-all w-full max-w-6xl p-6">
                    <h2 class="text-2xl text-start font-medium mb-4">Edit Kategori</h2>
                    <form id="editCategoryForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-x-6">
                            <!-- Nama Kategori -->
                            <div class="mb-4 text-start">
                                <label for="editName" class="block text-gray-700 text-base font-normal mb-2">Nama Kategori:</label>
                                <input type="text" name="name" id="editName" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <!-- Gambar Sampul -->
                            <div class="mb-4 text-start	">
                                <label for="editImage" class="block text-gray-700 text-base font-normal mb-2">Gambar Cover:</label>
                                <input type="file" name="image" id="editImage" onchange="checkFileSize(this, 'image-error2')" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <span id="image-error2" class="text-red-500 text-sm hidden"></span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-x-6">
                            <!-- Deskripsi Kategori -->
                            <div class="mb-4 text-start	">
                                <label for="editDescription" class="block text-gray-700 text-base font-normal mb-2">Deskripsi Kategori:</label>
                                <textarea name="description" id="editDescription" class="description_editor text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>

                            <!-- Keunggulan Kategori -->
                            <div class="mb-4 text-start">
                                <label for="editExcellence" class="block text-gray-700 text-base font-normal mb-2">Keunggulan Kategori:</label>
                                <textarea name="excellence" id="editExcellence" class="excellence_editor text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>
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
        </div>


        <!-- Daftar Kategori -->
        <div class="mt-10">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-medium">Daftar Kategori</h2>
                <!-- Button Tambah Kategori -->
                 <div class="flex gap-4">
                    <form action="{{ route('admin.category.create') }}" method="GET" class="flex items-center gap-2">
                        <input type="text" id="searchInput" placeholder="Cari Kategori..." class="text-sm px-4 py-2 border rounded-md">
                    </form>
                    <button onclick="openModal()" class="bg-blue-500 text-sm text-white px-3 py-2 rounded-md flex items-center gap-1">
                        Tambah Kategori <iconify-icon icon="octicon:plus-16"></iconify-icon>
                    </button>
                 </div>
            </div>
            <table class="min-w-full bg-white border border-gray-300 rounded-md">
                <thead>
                    <tr>
                        <th class="px-2 w-16 py-4 text-center border text-base font-medium">No</th>
                        <th class="px-4 w-52 py-4 text-left border text-base font-medium">Cover Kategori</th>
                        <th class="px-4 w-64 py-4 text-left border text-base font-medium">Nama Kategori</th>
                        <th class="px-4 w-80 py-4 text-left border text-base font-medium">Deskripsi Kategori</th>
                        <th class="px-4 w-80 py-4 text-left border text-base font-medium">Keunggulan Kategori</th>
                        <th class="px-4 w-24 py-4 text-center border text-base font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody  id="categoryTableBody">
                    @forelse ($categories as $index => $category)
                        <tr class="border-b border-gray-300">
                            <td class="px-2 max-w-0 py-2 text-center border text-sm">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="w-100 h-20 object-cover rounded">
                            </td>
                            <td class="px-4 py-2 border text-sm">{{ $category->name }}</td>
                            <td class="py-2 px-4 border text-sm"><div class="h-16 overflow-y-auto scrollbar-none">{!! $category->description !!}</div></td>
                            <td class="py-2 px-4 border text-sm"><div class="h-16 overflow-y-auto scrollbar-none">{!! $category->excellence !!}</div></td>
                            <td class="px-4 py-2 text-center border-0">
                                <div class="flex justify-center gap-3 items-center">
                                    <button onclick="openEditModal({{ $category->id }})" class="bg-yellow-500 font-normal hover:bg-yellow-700 text-white text-sm font-bold py-2 px-4 rounded">
                                        Edit
                                    </button>

                                    <!-- Form untuk delete -->
                                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                            <td colspan="2" class="px-4 py-2 text-center text-gray-500">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <script>
        function checkFileSize(input, errorId) {
            const file = input.files[0];
            const errorElement = document.getElementById(errorId);
            
            if (file) {
                const maxSize = 1024 * 1024; // 1 MB in bytes
                
                if (file.size > maxSize) {
                    errorElement.textContent = 'Maksimal gambar 1mb'; // Set error message
                    errorElement.classList.remove('hidden'); // Show error message
                    input.value = ''; // Clear the input
                } else {
                    errorElement.textContent = ''; // Clear any previous error message
                    errorElement.classList.add('hidden'); // Hide error message
                }
            }
        }
    </script>
    <!-- JavaScript untuk membuka dan menutup modal tambah kategori -->
    <script>
        function openModal() {
            const modal = document.getElementById('kategoriModal');
            
            // Tampilkan modal
            modal.classList.remove('hidden');

            // Inisialisasi ulang TinyMCE setelah modal dibuka, jika belum ada editor aktif
            if (!tinymce.get('description') || !tinymce.get('excellence')) {
                tinymce.init({
                    selector: '#description',  // Target textarea dengan ID "description"
                    plugins: 'lists link image code',
                    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code'
                });
                tinymce.init({
                    selector: '#excellence',  // Target textarea dengan ID "excellence"
                    plugins: 'lists link image code',
                    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code'
                });
            }
        }

        function closeModal() {
            const modal = document.getElementById('kategoriModal');

            // Sembunyikan modal
            modal.classList.add('hidden');

            // Hapus TinyMCE untuk memastikan tidak ada duplikasi
            tinymce.remove('#description');
            tinymce.remove('#excellence');
        }
    </script>


    <!-- Edit Button -->
    <!-- Script untuk modal edit kategori -->
    <script>
        function openEditModal(categoryId) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editCategoryForm');

            // Ambil data kategori berdasarkan ID
            fetch(`/admin/category/${categoryId}/edit`)
                .then(response => response.json())
                .then(data => {
                    // Isi form dengan data kategori yang akan diedit
                    document.getElementById('editName').value = data.name;
                    document.getElementById('editDescription').value = data.description;
                    document.getElementById('editExcellence').value = data.excellence;

                    // Set action form untuk update kategori
                    form.action = `/admin/category/${categoryId}`;

                    // Tampilkan modal edit
                    modal.classList.remove('hidden');

                    // Hapus editor TinyMCE sebelumnya jika ada
                    if (tinymce.get('editDescription')) {
                        tinymce.remove('#editDescription');
                    }
                    if (tinymce.get('editExcellence')) {
                        tinymce.remove('#editExcellence');
                    }

                    // Inisialisasi ulang TinyMCE setelah modal dibuka
                    tinymce.init({
                        selector: '#editDescription',
                        plugins: 'lists link image code',
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code'
                    });
                    tinymce.init({
                        selector: '#editExcellence',
                        plugins: 'lists link image code',
                        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code'
                    });
                })
                .catch(error => console.error('Error fetching category:', error));
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');

            // Sembunyikan modal edit
            modal.classList.add('hidden');

            // Hapus editor TinyMCE saat modal ditutup
            tinymce.remove('#editDescription');
            tinymce.remove('#editExcellence');
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
                                <td class="py-2 px-4 border"><div class="h-16 overflow-y-auto scrollbar-none">${category.description}</div></td>
                                <td class="py-2 px-4 border"><div class="h-16 overflow-y-auto scrollbar-none">${category.excellence}</div></td>
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