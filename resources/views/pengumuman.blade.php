<<<<<<< HEAD
<!-- resources/views/pengumuman.blade.php -->
=======
>>>>>>> d9243db9a32094849ef1e20113e1f87d871603d3
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengumuman - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
<<<<<<< HEAD
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-4">
        <h1 class="text-xl font-bold mb-6">CollabThink</h1>
        <nav class="space-y-2">
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📁 Proyek</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Daftar Tim</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📅 Tugas & Deadline</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="flex-1 p-6 overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <input type="text" placeholder="Search" class="w-1/2 p-2 border rounded" />
            <div class="flex items-center space-x-2">
                <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full" />
                <span class="font-medium text-gray-700">Mony Roy</span>
            </div>
        </div>

        <h2 class="text-2xl font-bold mb-4">📢 Pengumuman Proyek PBL - UI/UX</h2>

        <div class="bg-white p-6 rounded shadow">
            <p class="text-sm text-gray-500 mb-4">🕒 Diumumkan pada: 11-01-2025 08.00</p>
            <p class="text-gray-700 mb-2">
                Kepada semua mahasiswa yang mengambil mata kuliah PASTI,<br/>
                Harap memperhatikan pembagian kelompok dan kerja sama dalam proyek ini.
            </p>
            <ul class="list-disc ml-6 text-sm text-gray-800 mb-4">
                <li>Ikuti kelompok yang sudah ditentukan.</li>
                <li>Komunikasi aktif sangat penting.</li>
                <li>Info tambahan akan diberikan kemudian.</li>
            </ul>
            <p class="text-sm text-gray-700">Terima kasih atas perhatian dan kerja samanya.</p>
            <div class="mt-4">
                <strong>Nama File:</strong><br/>
                <span class="italic text-gray-600 text-sm">Informasi_nama_anggota_kelompok_mata_kuliah_ui/ux_angkatan_2022.xlsx</span>
            </div>
        </div>
    </main>
</div>
=======
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-md p-4 hidden md:block">
            <h1 class="text-xl font-bold mb-6">CollabThink</h1>
            <nav class="space-y-4">
                <a href="Dashboard.html" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">📁 Proyek</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Daftar Tim</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">🔔 Notifikasi</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">📅 Tugas & Deadline</a>
                <a href="forum.html" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
            </nav>
        </aside>

       <!-- Main Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <button onclick="toggleSidebar()" class="md:hidden bg-blue-500 text-white px-4 py-2 rounded">☰</button>
                <input type="text" placeholder="Search" class="w-1/2 p-2 border rounded">
                <div class="flex items-center space-x-2">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
                    <span class="font-medium text-gray-700">Mony Roy</span>
                </div>
            </div>

    <section class="mb-2">
    <p class="text-2xl font-bold text-gray-800 mb-2">PBL - UI/UX</p>
</section>
            </header>

            <!-- Pengumuman -->
<section>
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Pengumuman</h2>
    <div onclick="toggleDetail()" class="cursor-pointer bg-gray-50 border border-gray-200 p-4 rounded shadow-sm hover:bg-gray-100 transition">
        <div class="flex items-start mb-2">
            <span class="text-xl text-gray-700 mr-2">📌</span>
            <div>
                <p class="font-medium text-black">Informasi Terkait Anggota Kelompok PBL - UI/UX</p>
                <div class="flex items-center mt-1 text-sm text-gray-500">
                    <span class="mr-1">🕒</span> 11-01-2025 08.00
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Pengumuman -->
    <div id="detailPengumuman" class="mt-4 p-6 bg-white rounded shadow hidden">
        <h3 class="text-md font-bold mb-2">Informasi Terkait Anggota Kelompok PBL PASTI</h3>
        <p class="text-sm text-gray-700 mb-4">
            Kepada semua mahasiswa yang mengambil mata kuliah PASTI,<br>
            Sehubungan dengan pelaksanaan proyek pada mata kuliah ini...<br><br>
            Mohon untuk memperhatikan beberapa hal berikut:
            <ol class="list-decimal ml-6">
                <li>Setiap mahasiswa wajib mengikuti pembagian kelompok yang telah ditentukan.</li>
                <li>Kerja sama dan komunikasi aktif antar anggota kelompok sangat diharapkan.</li>
                <li>Informasi teknis lebih lanjut akan diumumkan resmi melalui kanal komunikasi kelas.</li>
            </ol><br>
            Diharapkan seluruh mahasiswa dapat mempersiapkan diri dan bersikap proaktif...<br>
            Atas perhatian dan kerja samanya, saya ucapkan terima kasih.
        </p>

        <p class="font-semibold">Nama File</p>
        <div class="flex justify-between items-center text-gray-500 text-sm">
            <span class="italic">Informasi_nama_anggota_kelompok_mata_kuliah_ui/ux_angkatan_2022.xlsx</span>
            <span class="font-semibold text-black">Size:</span>
        </div>
    </div>
</section>

<!-- Tambahkan di akhir <body> -->
<script>
function toggleDetail() {
    const detail = document.getElementById("detailPengumuman");
    detail.classList.toggle("hidden");
}
</script>

        </main>
    </div>
>>>>>>> d9243db9a32094849ef1e20113e1f87d871603d3
</body>
</html>
