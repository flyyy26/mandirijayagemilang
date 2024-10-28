@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <div class="container mx-auto mt-10">

        <!-- Modal untuk Input Produk -->
        <div id="kategoriModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden overflow-y-auto">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-6xl p-6">
                <h2 class="text-2xl font-medium mb-4">Tambah Produk Baru</h2>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="addProductForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-2 gap-x-6">
                        <!-- Input Nama Produk -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-base font-normal mb-2">Nama Produk</label>
                            <input type="text" name="name" id="name" class="w-full px-4 py-2 border rounded-md" required>
                        </div>

                        <!-- Upload Gambar Produk -->
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-base font-normal mb-2">Gambar Produk</label>
                            <input type="file" name="image" id="image" class="w-full px-4 py-2 border rounded-md" onchange="checkFileSize(this, 'image-error')">
                            
                            <span id="image-error" class="text-red-500 text-sm hidden"></span> <!-- Error message span -->
                        </div>
                    </div>

                    <!-- Input Deskripsi Produk -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-base font-normal mb-2">Deskripsi Produk</label>
                        <textarea name="description" id="description" class="w-full px-4 py-2 border rounded-md"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-x-6">
                        <!-- Input Harga Produk -->
                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 text-base font-normal mb-2">Harga Produk</label>
                            <input type="number" name="price" id="price" class="w-full px-4 py-2 border rounded-md" required>
                        </div>

                        <!-- Pilih Kategori Produk -->
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 text-base font-normal mb-2">Kategori Produk</label>
                            <select name="category_id" id="category_id" class="w-full px-4 py-2 border rounded-md" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="closeModal()" class="bg-red-500 hover:bg-red-700 text-white text-base font-normal py-2 px-4 rounded">
                            Batal
                        </button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
                            Tambah Produk
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-medium">Daftar Produk</h2>
            <div class="flex gap-4">
                <form action="{{ route('admin.products.create') }}" method="GET" class="flex items-center gap-2">
                    <input type="text" id="searchInput" placeholder="Cari Produk..." class="text-sm px-4 py-2 border rounded-md">
                </form>
                <button onclick="openModal()" class="bg-blue-500 text-sm text-white px-3 py-2 rounded-md flex items-center gap-1">
                    Tambah Produk <iconify-icon icon="octicon:plus-16"></iconify-icon>
                </button>
            </div>
        </div>
        <table class="min-w-full bg-white border border-gray-300 rounded-md">
            <thead>
                <tr>
                    <th class="px-2 w-16 py-4 text-center border text-base font-medium">No</th>
                    <th class="px-4 w-48 py-4 text-left border text-base font-medium">Gambar Produk</th>
                    <th class="px-4 w-52 py-2 text-center border text-base font-medium">Nama Produk</th>
                    <th class="px-4 py-2 w-48 text-center border text-base font-medium">Harga</th>
                    <th class="px-4 py-2 w-55 py-4 text-center border text-base font-medium">Deskripsi</th>
                    <th class="px-4 py-2 w-52 py-4 text-center border text-base font-medium">Kategori</th>
                    <th class="px-4 py-2 w-48 py-4 text-center border text-base font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody id="productTableBody">
                @forelse($products as $index => $product)
                    <tr class="border">
                        <td class="px-4 py-2 border text-center">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border text-center">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-20 h-20 object-cover block m-auto">
                        </td>
                        <td class="px-4 py-2 border text-center">{{ $product->name }}</td>
                        <td class="px-4 py-2 border text-center">Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 border text-center">
                            <div class="h-16 overflow-y-auto scrollbar-none">{{ $product->description }}</div>
                        </td>
                        <td class="px-4 py-2 border text-center">{{ $product->category->name }}</td>

                        <td class="px-4 py-2 border text-center border-0">
                            <div class="flex justify-center gap-3 items-center">
                                <button onclick="openEditModal({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->description }}', {{ $product->category_id }}, {{ $product->whatsapp_id }})" class="bg-yellow-500 font-normal hover:bg-yellow-700 text-white text-sm font-bold py-2 px-4 rounded">
                                    Edit
                                </button>

                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirmDelete(event, this);">
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
                        <td colspan="8" class="text-center py-4">Tidak ada produk yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
        <div class="flex items-center justify-center min-h-screen px-4 text-center">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div class="bg-white rounded-lg overflow-hidden shadow-lg transform transition-all w-full max-w-6xl p-6">
                <h2 class="text-2xl text-start font-medium mb-4">Edit Produk</h2>
                <form id="editProductForm" action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-x-6">
                        <!-- Nama Produk -->
                        <div class="mb-4 text-start">
                            <label for="editProductName" class="block text-gray-700 text-base font-normal mb-2">Nama Produk:</label>
                            <input type="text" name="name" id="editProductName" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                         <!-- Gambar Sampul -->
                        <div class="mb-4 text-start">
                            <label for="editImage" class="block text-gray-700 text-base font-normal mb-2">Gambar Cover:</label>
                            <input type="file" name="image" id="editImage" onchange="checkFileSize(this, 'image-error2')" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                            <span  id="image-error2" class="text-red-500 text-sm hidden"></span>
                        </div>
                    </div>

                    <div class="mb-4 text-start">
                        <label for="editProductDescription" class="block text-gray-700 text-base font-normal mb-2">Deskripsi Produk:</label>
                        <textarea name="description" id="editProductDescription" class="w-full px-4 py-2 border rounded-md"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-x-6">
                        <!-- Harga -->
                        <div class="mb-4 text-start">
                            <label for="editProductPrice" class="block text-gray-700 text-base font-normal mb-2">Harga:</label>
                            <input type="text" name="price" id="editProductPrice" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <!-- Kategori -->
                        <div class="mb-4 text-start">
                            <label for="editProductCategory" class="block text-gray-700 text-base font-normal mb-2">Kategori:</label>
                            <select name="category_id" id="editProductCategory" class="shadow text-base appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <!-- Nanti akan diisi dengan data kategori dari JavaScript -->
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3">
                        <button type="button" onclick="closeEditModal()" class="bg-red-500 hover:bg-red-700 text-white text-base font-normal py-2 px-4 rounded">
                            Batal
                        </button>
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function toggleWhatsappDropdown() {
        const dropdown = document.getElementById('whatsappDropdown');
        dropdown.classList.toggle('hidden');
    }

    function toggleWhatsappEditDropdown() {
        const dropdown = document.getElementById('editWhatsappDropdown');
        dropdown.classList.toggle('hidden');
    }

    function updateWhatsappButtonLabel() {
        const button = document.getElementById('whatsappButton');
        const checkboxes = document.querySelectorAll('input[name="whatsapp_ids_add[]"]:checked');
        const names = Array.from(checkboxes).map(cb => cb.nextElementSibling.textContent.trim());
        button.textContent = names.length > 0 ? names.join(', ') : 'Pilih Nomor WhatsApp';
    }

    function updateEditWhatsappButtonLabel() {
        const checkboxes = document.querySelectorAll('input[name="whatsapp_ids_edit[]"]:checked');
        const selectedNames = [];

        checkboxes.forEach(checkbox => {
            const label = document.querySelector(`label[for="${checkbox.id}"]`);
            if (label) {
                selectedNames.push(label.textContent.trim());
            }
        });

        const editWhatsappButton = document.getElementById('editWhatsappButton');
        if (selectedNames.length > 0) {
            editWhatsappButton.textContent = selectedNames.join(', '); // Show selected names
        } else {
            editWhatsappButton.textContent = 'Pilih Nomor WhatsApp'; // Default text if none selected
        }
    }

    // Function to initialize button label and checkboxes on page load
    function initializeEditWhatsapp() {
        updateEditWhatsappButtonLabel(); // Update button label on page load
    }

    window.onload = initializeEditWhatsapp;

        // Optional: Close the dropdown when clicking outside of it
        window.onclick = function(event) {
    const whatsappDropdown = document.getElementById('whatsappDropdown');
    const editWhatsappDropdown = document.getElementById('editWhatsappDropdown');
    const whatsappButton = document.getElementById('whatsappButton');
    const editWhatsappButton = document.getElementById('editWhatsappButton');

    // Hide the WhatsApp dropdown if clicked outside
    if (!event.target.matches('#whatsappButton') && !whatsappDropdown.contains(event.target)) {
        whatsappDropdown.classList.add('hidden');
    }

    // Hide the Edit WhatsApp dropdown if clicked outside
    if (!event.target.matches('#editWhatsappButton') && !editWhatsappDropdown.contains(event.target)) {
        editWhatsappDropdown.classList.add('hidden');
    }
};


    </script>

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

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const query = this.value;

            // Kirim request AJAX ke server
            fetch(`/admin/products/search?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('productTableBody');
                    tableBody.innerHTML = ''; // Kosongkan tabel sebelum menampilkan hasil

                    // Jika ada produk yang ditemukan
                    if (data.data.length > 0) {
                        data.data.forEach((product, index) => {
                            const row = `
                                <tr class="border border-gray-300">
                                    <td class="px-4 py-2 border text-center"">${index + 1}</td>
                                    <td class="px-4 py-2 border text-center"">
                                        <img src="/storage/${product.image}" alt="${product.name}" class="w-20 h-20 object-cover block m-auto">
                                    </td>
                                    <td class="px-4 py-2 border text-center"">${product.name}</td>
                                    <td class="px-4 py-2 border text-center"">Rp. ${new Intl.NumberFormat('id-ID').format(product.price)}</td>
                                    <td class="px-4 py-2 border text-center""><div class="h-16 overflow-y-auto scrollbar-none">${product.description}</div></td>
                                    <td class="px-4 py-2 border text-center"">${product.category ? product.category.name : '-'}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <div class="flex justify-center gap-3 items-center">
                                            <button onclick="openEditModal(${product.id}, '${product.name}', ${product.price}, '${product.description}')" class="bg-yellow-500 font-normal hover:bg-yellow-700 text-white text-sm font-bold py-2 px-4 rounded">
                                                Edit
                                            </button>
                                            <form action="/admin/products/${product.id}" method="POST" onsubmit="return confirmDelete(event, this);">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-normal bg-red-500 hover:bg-red-700 text-white text-sm font-bold py-2 px-4 rounded">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            `;
                            tableBody.innerHTML += row;
                        });
                    } else {
                        tableBody.innerHTML = '<tr><td colspan="7" class="text-center text-gray-500 py-4">Produk tidak ditemukan.</td></tr>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching products:', error);
                });
        });
    </script>

    <script>
        function openModal() {
            document.getElementById('kategoriModal').classList.remove('hidden');
        }

        function closeModal() {
            console.log("Closing modal..."); // Debug log
            document.getElementById('kategoriModal').classList.add('hidden');

            // Reset form fields
            const form = document.getElementById('addProductForm');
            form.reset(); // Resets all form fields to their default values

            // Reset WhatsApp checkboxes
            const whatsappCheckboxes = document.querySelectorAll('input[name="whatsapp_ids_add[]"]');
            whatsappCheckboxes.forEach(checkbox => {
                console.log(`Resetting checkbox: ${checkbox.id}`); // Debug log
                checkbox.checked = false; // Uncheck each checkbox
            });

            // Reset the WhatsApp button label
            document.getElementById('whatsappButton').textContent = 'Pilih Nomor WhatsApp';

            // Optional: Reset error messages
            const errorSpan = document.getElementById('image-error');
            errorSpan.classList.add('hidden'); // Hide error message if visible
            errorSpan.textContent = ''; // Clear the error message
        }

    </script>
     <script>
        function openEditModal(id, name, price, description, categoryId, whatsappId) {
            const modal = document.getElementById('editModal');
            document.getElementById('editProductName').value = name;
            document.getElementById('editProductPrice').value = price;
            document.getElementById('editProductDescription').value = description;

            // Set action form untuk update produk
            const form = document.getElementById('editProductForm');
            form.action = `/admin/products/${id}`; // Update route sesuai dengan produk yang dipilih

            // Ambil data kategori dari server dan isi dropdown
            fetch('/admin/categories') // Pastikan route ini mengembalikan daftar kategori
                .then(response => response.json())
                .then(data => {
                    const categorySelect = document.getElementById('editProductCategory');
                    categorySelect.innerHTML = ''; // Kosongkan opsi kategori sebelumnya

                    // Tambahkan opsi kategori ke dropdown
                    data.forEach(category => {
                        const selected = category.id === categoryId ? 'selected' : ''; // Tentukan kategori yang dipilih
                        categorySelect.innerHTML += `<option value="${category.id}" ${selected}>${category.name}</option>`;
                    });
                });

            // Ambil data WhatsApp dari server dan isi dropdown
            fetch('/admin/whatsapps') // Pastikan route ini mengembalikan daftar WhatsApp
                .then(response => response.json())
                .then(data => {
                    const whatsappSelect = document.getElementById('editProductWhatsapp');
                    whatsappSelect.innerHTML = ''; // Kosongkan opsi WhatsApp sebelumnya

                    // Tambahkan opsi WhatsApp ke dropdown
                    data.forEach(whatsapp => {
                        const selectedWhatsapp = whatsapp.id === whatsappId ? 'selected' : ''; // Tentukan WhatsApp yang dipilih
                        whatsappSelect.innerHTML += `<option value="${whatsapp.id}" ${selectedWhatsapp}>${whatsapp.distributor} - ${whatsapp.name}</option>`;
                    });
                });

            modal.classList.remove('hidden');
        }



        function closeEditModal() {
            resetEditProductForm();

            const modal = document.getElementById('editModal');
            modal.classList.add('hidden');
        }

        function confirmDelete(event, form) {
            event.preventDefault();
            if (confirm('Apakah Anda yakin ingin menghapus produk ini?')) {
                form.submit();
            }
        }
    </script>
    <script>
        function resetEditProductForm() {
            // Reset text inputs
            document.getElementById('editProductName').value = '';
            document.getElementById('editProductDescription').value = '';
            document.getElementById('editProductPrice').value = '';
            
            // Reset file input
            document.getElementById('editImage').value = '';
            
            // Reset select input
            document.getElementById('editProductCategory').selectedIndex = 0; // Assuming you want to select the first option

            // Uncheck all checkboxes
            const checkboxes = document.querySelectorAll('input[name="whatsapp_ids_edit[]"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });

            // Reset button text
            document.getElementById('editWhatsappButton').textContent = 'Pilih Nomor WhatsApp';

            // Reset error messages
            const errorSpan = document.getElementById('image-error2');
            errorSpan.classList.add('hidden'); // Hide error message if any
            errorSpan.textContent = ''; // Clear error message
        }
    </script>

@endsection
