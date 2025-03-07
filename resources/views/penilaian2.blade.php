<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Mahasiswa - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex h-screen">
    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-white shadow-md p-4 hidden md:block">
        <h1 class="text-xl font-bold mb-6">CollabThink</h1>
        <nav class="space-y-4">
            <a href="{{ route('dashboard') }}" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
            <a href="{{ route('proyek') }}" class="block p-2 hover:bg-gray-200 rounded">📁 Proyek</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Daftar Tim</a>
            <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
            <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
            <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col items-center justify-center p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Penilaian Progres Mahasiswa</h1>
        
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Daftar Nama</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-blue-100 p-4 rounded-lg shadow">
                    <h3 class="font-semibold">Exaudi</h3>
                    <p class="text-sm">Durasi: 5 hari</p>
                    <p class="text-sm">Assigned to: Dosen</p>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" onclick="openRatingModal('Planning')">Beri Nilai</button>
                </div>
                <div class="bg-green-100 p-4 rounded-lg shadow">
                    <h3 class="font-semibold">Dini</h3>
                    <p class="text-sm">Durasi: 5 hari</p>
                    <p class="text-sm">Assigned to: Dosen</p>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" onclick="openRatingModal('Analisis')">Beri Nilai</button>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg shadow">
                    <h3 class="font-semibold">Fanny</h3>
                    <p class="text-sm">Durasi: 4 hari</p>
                    <p class="text-sm">Assigned to: Dosen</p>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" onclick="openRatingModal('Maintenance')">Beri Nilai</button>
                </div>
                <div class="bg-blue-100 p-4 rounded-lg shadow">
                    <h3 class="font-semibold">Fresky</h3>
                    <p class="text-sm">Durasi: 5 hari</p>
                    <p class="text-sm">Assigned to: Dosen</p>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" onclick="openRatingModal('Planning')">Beri Nilai</button>
                </div>

                <div class="bg-green-100 p-4 rounded-lg shadow">
                    <h3 class="font-semibold">Masnida</h3>
                    <p class="text-sm">Durasi: 5 hari</p>
                    <p class="text-sm">Assigned to: Dosen</p>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" onclick="openRatingModal('Planning')">Beri Nilai</button>
                </div>

                <div class="bg-yellow-100 p-4 rounded-lg shadow">
                    <h3 class="font-semibold">Yenisa</h3>
                    <p class="text-sm">Durasi: 5 hari</p>
                    <p class="text-sm">Assigned to: Dosen</p>
                    <button class="mt-2 bg-blue-500 text-white px-4 py-2 rounded" onclick="openRatingModal('Planning')">Beri Nilai</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
