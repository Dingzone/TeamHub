<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md h-screen p-6">
        <h1 class="text-xl font-bold mb-8">CollabThink</h1>
        <ul class="space-y-4">
        <a href="{{ route('dashboard') }}" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
                <a href="{{ route('proyek') }}" class="block p-2 hover:bg-gray-200 rounded">📁 Proyek</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Daftar Tim</a>
                <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
                <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
                <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <h1 class="text-2xl font-bold mb-6">Penilaian Proyek</h1>

        <!-- Daftar Proyek yang akan dinilai -->
        <div class="bg-white shadow-md p-6 rounded-lg mb-6">
            <h2 class="text-lg font-bold mb-4">Daftar Proyek</h2>
            <ul class="space-y-3">
                <li class="p-4 bg-gray-50 rounded-lg flex justify-between items-center">
                    <span>Proyek 1 - Sistem Manajemen Bencana</span>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Nilai</button>
                </li>
                <li class="p-4 bg-gray-50 rounded-lg flex justify-between items-center">
                    <span>Proyek 2 - Aplikasi E-Learning</span>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Nilai</button>
                </li>
                <li class="p-4 bg-gray-50 rounded-lg flex justify-between items-center">
                    <span>Proyek 3 - Sistem Keuangan Kampus</span>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Nilai</button>
                </li>
            </ul>
        </div>

        <!-- Form Penilaian -->
        <div class="bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-lg font-bold mb-4">Form Penilaian</h2>
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700">Pilih Proyek</label>
                    <select class="w-full p-2 border rounded">
                        <option>Proyek 1 - Sistem Manajemen Bencana</option>
                        <option>Proyek 2 - Aplikasi E-Learning</option>
                        <option>Proyek 3 - Sistem Keuangan Kampus</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Nilai (1 - 100)</label>
                    <input type="number" class="w-full p-2 border rounded" min="1" max="100">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Komentar</label>
                    <textarea class="w-full p-2 border rounded" rows="3"></textarea>
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full">Simpan Penilaian</button>
            </form>
        </div>
    </div>

</body>
</html>
