<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabThink - Enroll PBL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-4">
        <h1 class="text-xl font-bold mb-6">CollabThink</h1>
        <nav class="space-y-4">
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
            <a href="{{ route('proyek.index') }}" class="block p-2 hover:bg-gray-200 rounded">📁 Proyek</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Doku-Tim</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📊 Mae-Wai</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📅 Yam-Du Dudas</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">💬 Shad Tim</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        <header class="flex justify-between items-center mb-6">
            <div class="flex items-center">
                <a href="{{ route('proyek.index') }}" class="mr-2 p-2 rounded-full hover:bg-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold">Enroll PBL-PRODIBANGKATAN</h2>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Fanny</span>
                <img src="https://i.pravatar.cc/40" alt="Profile" class="rounded-full w-10 h-10" />
            </div>
        </header>

        <!-- Konten Enroll -->
        <div class="bg-white p-6 rounded shadow">
            <h3 class="text-xl font-semibold mb-4">TSPL 2023</h3>
            <p class="mb-4">Hang an individual update: 2022</p>
            <p class="text-sm text-gray-500 mb-6">www.halamanproyek.com</p>
            
            <!-- Form Enroll -->
            <form action="{{ route('enroll.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="nama" class="block text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label for="nim" class="block text-gray-700 mb-2">NIM</label>
                        <input type="text" id="nim" name="nim" class="w-full p-2 border rounded" required>
                    </div>
                    <div>
                        <label for="prodi" class="block text-gray-700 mb-2">Program Studi</label>
                        <input type="text" id="prodi" name="prodi" class="w-full p-2 border rounded" value="D4 Sarjana Terapan Teknologi" readonly>
                    </div>
                    <div>
                        <label for="angkatan" class="block text-gray-700 mb-2">Angkatan</label>
                        <select id="angkatan" name="angkatan" class="w-full p-2 border rounded" required>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <option value="2021">2021</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                        Enroll Sekarang
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>