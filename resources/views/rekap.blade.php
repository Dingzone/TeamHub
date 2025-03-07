<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }
        function showDosenLogin() {
            document.getElementById('dosenLoginForm').classList.remove('hidden');
            document.getElementById('mahasiswaLoginForm').classList.add('hidden');
        }
        function showMahasiswaLogin() {
            document.getElementById('mahasiswaLoginForm').classList.remove('hidden');
            document.getElementById('dosenLoginForm').classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-md p-4 hidden md:block">
            <h1 class="text-xl font-bold mb-6">CollabThink</h1>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
                <a href="{{ route('proyek') }}" class="block p-2 hover:bg-gray-200 rounded">📁 Proyek</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Daftar Tim</a>
                <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded font-bold">📊 Rekap</a>
                <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
                <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 flex flex-col justify-center items-center p-6">
            <h1 class="text-2xl font-bold mb-6">Pilih Peran Anda</h1>
            
            <!-- Pilihan peran -->
            <div class="flex space-x-4 mb-6">
                <button onclick="showDosenLogin()" class="bg-blue-500 text-white px-6 py-3 rounded">Masuk sebagai Dosen</button>
                <button onclick="showMahasiswaLogin()" class="bg-green-500 text-white px-6 py-3 rounded">Masuk sebagai Mahasiswa</button>
            </div>

            <!-- Form Login Dosen (Hidden secara default) -->
            <div id="dosenLoginForm" class="hidden bg-white shadow-md rounded-lg p-6 w-96 text-center">
                <h2 class="text-lg font-bold mb-4">Login Dosen</h2>
                <form action="{{ route('penilaian') }}" method="GET">
                    <div class="mb-4 text-left">
                        <label class="block text-gray-700">Username</label>
                        <input type="text" name="username" required class="w-full p-2 border rounded">
                    </div>
                    <div class="mb-4 text-left">
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" required class="w-full p-2 border rounded">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Login</button>
                </form>
            </div>

            <!-- Form Login Mahasiswa (Hidden secara default) -->
            <div id="mahasiswaLoginForm" class="hidden bg-white shadow-md rounded-lg p-6 w-96 text-center">
                <h2 class="text-lg font-bold mb-4">Login Mahasiswa</h2>
                <form action="{{ route('penilaian2') }}" method="GET">
                    <div class="mb-4 text-left">
                        <label class="block text-gray-700">Username</label>
                        <input type="text" name="username" required class="w-full p-2 border rounded">
                    </div>
                    <div class="mb-4 text-left">
                        <label class="block text-gray-700">Password</label>
                        <input type="password" name="password" required class="w-full p-2 border rounded">
                    </div>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full">Login</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
