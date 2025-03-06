<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showDosenLogin() {
            document.getElementById('dosenLoginForm').classList.remove('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 font-sans flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md h-screen p-4">
        <h1 class="text-xl font-bold mb-6">CollabThink</h1>
        <ul>
            <li class="mb-4"><a href="{{ route('dashboard') }}" class="flex items-center"><span class="mr-2">🏠</span> Home</a></li>
            <li class="mb-4"><a href="{{ route('proyek') }}" class="flex items-center"><span class="mr-2">📂</span> Proyek</a></li>
            <li class="mb-4"><a href="#" class="flex items-center"><span class="mr-2">📝</span> Notes</a></li>
            <li class="mb-4"><a href="#" class="flex items-center"><span class="mr-2">👥</span> Daftar Tim</a></li>
            <li class="mb-4 font-bold"><a href="{{ route('rekap') }}" class="flex items-center"><span class="mr-2">📊</span> Rekap</a></li>
            <li class="mb-4"><a href="#" class="flex items-center"><span class="mr-2">📅</span> Daftar Tugas dan Deadline</a></li>
            <li><a href="#" class="flex items-center"><span class="mr-2">💬</span> Diskusi Tim</a></li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Pilih Peran Anda</h1>
        
        <!-- Pilihan peran -->
        <div class="flex space-x-4">
            <button onclick="showDosenLogin()" class="bg-blue-500 text-white px-4 py-2 rounded">Masuk sebagai Dosen</button>
            <a href="{{ route('dashboard') }}" class="bg-green-500 text-white px-4 py-2 rounded">Masuk sebagai Mahasiswa</a>
        </div>

        <!-- Form Login Dosen (Hidden secara default) -->
        <div id="dosenLoginForm" class="hidden bg-white shadow-md rounded-lg p-6 mt-6 w-96">
            <h2 class="text-lg font-bold mb-4">Login Dosen</h2>
            <form action="{{ route('penilaian') }}" method="GET">
                <div class="mb-4">
                    <label class="block text-gray-700">Username</label>
                    <input type="text" name="username" required class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Password</label>
                    <input type="password" name="password" required class="w-full p-2 border rounded">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Login</button>
            </form>
        </div>
    </div>

</body>
</html>
