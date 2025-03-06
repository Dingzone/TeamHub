<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4">Daftar Proyek</h1>
        
        <!-- Form Create Task -->
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Buat Tugas Baru</h2>
            <form class="space-y-4">
                <input type="text" placeholder="Nama Tugas" class="w-full p-2 border rounded">
                <textarea placeholder="Deskripsi" class="w-full p-2 border rounded"></textarea>
                <a href="{{ route('proyek') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Tugas</a>
            </form>
        </div>
        
        <!-- Daftar Proyek -->
        <div>
            <h2 class="text-lg font-semibold mb-2">Proyek yang Ada</h2>
            <div class="space-y-2">
                <div class="p-4 bg-gray-100 shadow rounded flex justify-between items-center">
                    <span>Proyek 1</span>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                </div>
                <div class="p-4 bg-gray-100 shadow rounded flex justify-between items-center">
                    <span>Proyek 2</span>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>