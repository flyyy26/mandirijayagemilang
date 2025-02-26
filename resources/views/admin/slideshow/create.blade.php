@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <div class="container mx-auto mt-10">

        <!-- Modal untuk Input Kategori -->
        <div id="slideModal" class="fixed h-screen inset-0 flex items-center w-screen justify-center bg-gray-800 bg-opacity-50 hidden overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-6xl p-6 ">
                <h2 class="text-2xl font-medium mb-4">Tambah Slide Baru</h2>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.slideshow.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid grid-cols-2 gap-x-6">
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-base font-normal mb-2">Gambar Slide:</label>
                            <input type="file" name="image" id="image" onchange="checkFileSize(this, 'image-error')" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*" required>
                            <span id="image-error" class="text-red-500 text-sm hidden"></span>
                        </div>
                        
                        <div class="mb-4">
                            <label for="image_mobile" class="block text-gray-700 text-base font-normal mb-2">Gambar Slide Mobile:</label>
                            <input type="file" name="image_mobile" id="image_mobile" onchange="checkFileSize(this, 'image-error')" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*" required>
                            <span id="image-error" class="text-red-500 text-sm hidden"></span>
                        </div>

                        <div class="mb-4">
                            <label for="heading" class="block text-gray-700 text-base font-normal mb-2">Judul Slide :</label>
                            <input type="text" name="heading" id="heading" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan judul slide">
                        </div>
                        
                        <div class="mb-4">
                            <label for="link" class="block text-gray-700 text-base font-normal mb-2">Link Slide :</label>
                            <input type="text" name="link" id="link" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan link slide">
                        </div>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="closeModal()" class="bg-red-500 hover:bg-red-700 text-white text-base font-normal py-2 px-4 rounded">
                            Batal
                        </button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
                            Tambah Slide
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
                    <h2 class="text-2xl text-start font-medium mb-4" style="text-align:start !important;">Edit Slide</h2>
                    <form id="editSlideForm" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-x-6">
                            <!-- Gambar Sampul -->
                            <div class="mb-4 text-start" style="text-align:start !important;">
                                <label for="editImage" class="block text-gray-700 text-base font-normal mb-2">Gambar Slide:</label>
                                <input type="file" name="image" id="editImage" onchange="checkFileSize(this, 'image-error2')" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <span id="image-error2" class="text-red-500 text-sm hidden"></span>
                            </div>

                            <!-- Gambar Sampul -->
                            <div class="mb-4 text-start" style="text-align:start !important;">
                                <label for="editImageSecond" class="block text-gray-700 text-base font-normal mb-2">Gambar Slide Mobile:</label>
                                <input type="file" name="image_mobile" id="editImageSecond" onchange="checkFileSize(this, 'image-error2')" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <span id="image-error2" class="text-red-500 text-sm hidden"></span>
                            </div>

                            <!-- Nama Kategori -->
                            <div class="mb-4 text-start" style="text-align:start !important;">
                                <label for="editHeading" class="block text-gray-700 text-base font-normal mb-2">Judul Slide :</label>
                                <input type="text" name="heading" id="editHeading" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4 text-start" style="text-align:start !important;">
                                <label for="editLink" class="block text-gray-700 text-base font-normal mb-2">Link Slide :</label>
                                <input type="text" name="link" id="editLink" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
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
                <h2 class="text-xl font-medium">Daftar Slideshow</h2>
                <!-- Button Tambah Kategori -->
                 <div class="flex gap-4">
                    <button onclick="openModal()" class="bg-blue-500 text-sm text-white px-3 py-2 rounded-md flex items-center gap-1">
                        Tambah Slide <iconify-icon icon="octicon:plus-16"></iconify-icon>
                    </button>
                 </div>
            </div>
            <table class="min-w-full bg-white border border-gray-300 rounded-md">
                <thead>
                    <tr>
                        <th class="px-2 w-16 py-4 text-center border text-base font-medium">No</th>
                        <th class="px-4 w-52 py-4 text-left border text-base font-medium">Gambar Slide</th>
                        <th class="px-4 w-52 py-4 text-left border text-base font-medium">Gambar Slide Mobile</th>
                        <th class="px-4 w-64 py-4 text-left border text-base font-medium">Judul Slide</th>
                        <th class="px-4 w-80 py-4 text-left border text-base font-medium">Link Slide</th>
                        <th class="px-4 w-24 py-4 text-center border text-base font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody  id="slideTableBody">
                    @forelse ($slideshows as $index => $slideshow)
                        <tr class="border-b border-gray-300">
                            <td class="px-2 max-w-0 py-2 text-center border text-sm">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">
                                <img src="{{ asset('storage/' . $slideshow->image) }}" alt="{{ $slideshow->heading }}" class="w-100 h-20 object-cover rounded">
                            </td>
                            <td class="px-4 py-2 border">
                                <img src="{{ asset('storage/' . $slideshow->image_mobile) }}" alt="{{ $slideshow->heading }}" class="w-100 h-20 object-cover rounded">
                            </td>
                            <td class="px-4 py-2 border text-sm">{{ $slideshow->heading ?? 'Tidak ada judul' }}</td>
                            <td class="py-2 px-4 border text-sm">
                                    {{ $slideshow->link ?? 'Tidak ada link' }}
                            </td>
                            <td class="px-4 py-2 text-center border-0">
                                <div class="flex justify-center gap-3 items-center">
                                    <button onclick="openEditModal({{ $slideshow->id }})" class="bg-yellow-500 font-normal hover:bg-yellow-700 text-white text-sm py-2 px-4 rounded">
                                        Edit
                                    </button>

                                    <!-- Form untuk delete -->
                                    <form action="{{ route('admin.slideshow.destroy', $slideshow->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-normal bg-red-500 hover:bg-red-700 text-white text-sm py-2 px-4 rounded">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-2 text-center text-gray-500">Belum ada slide.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="my-7">
            <h2 class="text-xl font-medium mb-4">Video</h2>
            <div class="bg-white rounded-lg shadow-lg w-1/2 p-6">

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.video.store') }}" method="POST">
                    @csrf

                    <div class="w-full">
                        <div class="mb-4 w-full">
                            <label for="video" class="block text-gray-700 text-base font-normal mb-2">Link Video :</label>
                            <input type="text" name="video" id="video" 
                            class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                            placeholder="Masukkan link video" 
                            value="{{ old('video', $video->video ?? '') }}">


                        </div>
                    </div>

                    <div class="flex justify-start gap-3">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
                            Simpan Video
                        </button>
                    </div>
                </form>
            </div>
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
            const modal = document.getElementById('slideModal');
            
            // Tampilkan modal
            modal.classList.remove('hidden');
        }

        function closeModal() {
            const modal = document.getElementById('slideModal');

            // Sembunyikan modal
            modal.classList.add('hidden');
        }
    </script>


    <!-- Edit Button -->
    <!-- Script untuk modal edit kategori -->
    <script>
        function openEditModal(slideId) {
            const modal = document.getElementById('editModal');
            const form = document.getElementById('editSlideForm');

            // Ambil data kategori berdasarkan ID
            fetch(`/admin/slideshow/${slideId}/edit`)
                .then(response => response.json())
                .then(data => {
                    // Isi form dengan data kategori yang akan diedit
                    document.getElementById('editHeading').value = data.heading;
                    document.getElementById('editLink').value = data.link;

                    // Set action form untuk update kategori
                    form.action = `/admin/slideshow/${slideId}`;

                    // Tampilkan modal edit
                    modal.classList.remove('hidden');
                })
                .catch(error => console.error('Error fetching category:', error));
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');

            // Sembunyikan modal edit
            modal.classList.add('hidden');
        }
    </script>


<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const query = this.value;

        // Kirim request AJAX ke server
        fetch(`/admin/slideshow/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('slideTableBody');
                tableBody.innerHTML = ''; // Kosongkan tabel sebelum menampilkan hasil

                // Jika ada kategori yang ditemukan
                if (data.data.length > 0) {
                    data.data.forEach((slideshow, index) => {
                        const row = `
                            <tr class="border-b border-gray-300">
                                <td class="px-2 max-w-0 py-2 text-center border">${index + 1}</td>
                                <td class="px-4 py-2">
                                    <img src="/storage/${slideshow.image}" alt="${slideshow.heading}" class="w-100 h-20 object-cover rounded">
                                </td>
                                <td class="px-4 py-2">
                                    <img src="/storage/${slideshow.image_mobile}" alt="${slideshow.heading}" class="w-100 h-20 object-cover rounded">
                                </td>
                                <td class="px-4 py-2 border">${slideshow.heading}</td>
                                <td class="py-2 px-4 border"><div class="h-16 overflow-y-auto scrollbar-none">${slideshow.link}</div></td>
                                <td class="px-4 py-2 text-center border">
                                    <button onclick="openEditModal(${slideshow.id})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                        Edit
                                    </button>

                                    <form action="/admin/slideshow/destroy/${slideshow.id}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus slide ini?');">
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
                    tableBody.innerHTML = '<tr><td colspan="6" class="text-center text-gray-500 py-4">slide tidak ditemukan.</td></tr>';
                }
            });
    });
</script>

@endsection