@extends('layouts.app')

@section('title', 'Product')

@section('content')
<div class="container mx-auto mt-10">

    <!-- Modal Tambah Nomor Whatsapp -->
    <div id="kategoriModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <h2 class="text-2xl font-medium mb-4">Tambah Sosial Media Baru</h2>
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.social.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="icon" class="block text-gray-700 text-base font-normal mb-2">Sosial Media :</label>
                    <select name="icon" id="icon" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="mdi:facebook">Facebook</option>
                        <option value="mdi:twitter">Twitter</option>
                        <option value="mdi:instagram">Instagram</option>
                        <option value="mdi:linkedin">LinkedIn</option>
                        <option value="mdi:youtube">YouTube</option>
                        <option value="mdi:tiktok">TikTok</option>
                        <option value="mdi:whatsapp">WhatsApp</option>
                        <option value="mdi:telegram">Telegram</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-base font-normal mb-2">Link Sosial Media:</label>
                    <input type="text" name="name" id="name" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Link Sosial Media">
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button" onclick="closeModal()" class="bg-red-500 hover:bg-red-700 text-white text-base font-normal py-2 px-4 rounded">
                        Batal
                    </button>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-base text-white font-normal py-2 px-4 rounded">
                        Tambah Sosial Media
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Sosial Media -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <h2 class="text-2xl font-medium mb-4">Edit Sosial Media</h2>
            <form id="editSocialForm" action="" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="editIcon" class="block text-gray-700 text-base font-normal mb-2">Sosial Media :</label>
                    <select name="icon" id="editIcon" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="mdi:facebook">Facebook</option>
                        <option value="mdi:twitter">Twitter</option>
                        <option value="mdi:instagram">Instagram</option>
                        <option value="mdi:linkedin">LinkedIn</option>
                        <option value="mdi:youtube">YouTube</option>
                        <option value="mdi:tiktok">TikTok</option>
                        <option value="mdi:whatsapp">WhatsApp</option>
                        <option value="mdi:telegram">Telegram</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="editName" class="block text-gray-700 text-base font-normal mb-2">Link Sosial Media :</label>
                    <input type="text" name="name" id="editName" class="text-base shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan Nomor Whatsapp">
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


    <!-- Daftar Sosial Media -->
    <div class="mt-10">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-medium">Daftar Sosial Media</h2>
            <div class="flex gap-4">
                <input type="text" id="searchInput" onkeyup="filterWhatsapps()" placeholder="Cari Nama Sosial Media..." class="text-sm px-4 py-2 border rounded-md">
                <button onclick="openModal()" class="bg-blue-500 text-sm text-white px-3 py-2 rounded-md flex items-center gap-1">
                    Tambah Sosial Media <iconify-icon icon="octicon:plus-16"></iconify-icon>
                </button>
            </div>
        </div>
        <table class="min-w-full bg-white border border-gray-300 rounded-md">
            <thead>
                <tr>
                    <th class="px-2 w-11 py-4 text-center border text-base font-medium">No</th>
                    <th class="px-2 w-36 py-4 text-center border text-base font-medium">Sosial Media</th>
                    <th class="px-2 w-16 py-4 text-center border text-base font-medium">Link Sosial Media</th>
                    <th class="px-2 w-11 py-4 text-center border text-base font-medium">Aksi</th>
                </tr>
            </thead>
            <tbody id="socialTableBody">
                @forelse ($socials as $index => $social)
                    <tr class="border-b border-gray-300">
                        <td class="px-2 max-w-0 py-2 text-center border">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border text-center">{{ str_replace('mdi:', '', $social->icon) }}</td>
                        <td class="px-2 py-2 text-center border"><a href="{{ $social->name ?? '#' }}" target="_blank" rel="noopener noreferrer">{{ Str::limit($social->name, 20) }}</a></td>
                        <td class="px-2 max-w-0 py-2 text-center border text-center border-0">
                            <div class="flex justify-center items-center">
                                <button onclick="openEditModal({{ $social->id }})" class="bg-yellow-500 font-normal hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-1">
                                    Edit
                                </button>
                                <form action="{{ route('admin.social.destroy', $social->id) }}" method="POST" class="inline-block mx-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sosial media ini?');">
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
                        <td colspan="4" class="text-center text-gray-500 py-4">Belum ada sosial media.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    

<!-- Script untuk modal dan AJAX -->
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const query = this.value;
        fetch(`/admin/social/search?query=${query}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('socialTableBody');
                tableBody.innerHTML = '';
                if (data.data.length > 0) {
                    data.data.forEach((social, index) => {
                        const row = `
                            <tr class="border-b border-gray-300">
                                <td class="px-2 max-w-0 py-2 text-center border">${index + 1}</td>
                                <td class="py-2 px-4 border">${social.icon}</td>
                                <td class="px-2 py-2 text-center border">+${social.name}</td>
                                <td class="px-2 max-w-0 py-2 text-center border text-center border-0">
                                    <div class="flex justify-center items-center">
                                        <button onclick="openEditModal(${social.id})" class="bg-yellow-500 font-normal hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mx-1">Edit</button>
                                        <form action="/admin/social/destroy/${social.id}" method="POST" class="inline-block mx-1" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sosial media ini?');" class="inline-block">
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
                    tableBody.innerHTML = '<tr><td colspan="4" class="text-center text-gray-500 py-4">Sosial Media tidak ditemukan.</td></tr>';
                }
            });
    });

    function openModal() {
        document.getElementById('kategoriModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('kategoriModal').classList.add('hidden');
    }

    function openEditModal(socialId) {
        const modal = document.getElementById('editModal');
        const form = document.getElementById('editSocialForm');
        const selectIcon = document.getElementById('editIcon');
        const inputName = document.getElementById('editName');

        fetch(`/admin/social/${socialId}/edit`)
            .then(response => response.json())
            .then(data => {
                if (!data) {
                    console.error("Data tidak ditemukan!");
                    return;
                }

                // Set default value untuk select
                selectIcon.value = data.icon;

                // Pastikan opsi yang sesuai dipilih (backup jika value tidak bekerja)
                selectIcon.querySelectorAll('option').forEach(option => {
                    option.selected = option.value === data.icon;
                });

                // Set default value untuk input name
                inputName.value = data.name;

                // Set action form
                form.action = `/admin/social/${socialId}`;

                // Tampilkan modal
                modal.classList.remove('hidden');
            })
            .catch(error => console.error("Gagal mengambil data sosial media:", error));
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }
</script>
@endsection
