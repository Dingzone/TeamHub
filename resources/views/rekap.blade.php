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
        function showDetailNilai(proyek) {
            document.getElementById('detailNilaiPopup').classList.remove('hidden');
            document.getElementById('popupTitle').innerText = 'Nilai Proyek ' + proyek + ' - Manajemen Proyek';
        }
        function closePopup() {
            document.getElementById('detailNilaiPopup').classList.add('hidden');
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
        <main class="flex-1 p-6 overflow-auto">
            <h1 class="text-2xl font-bold mb-6">Rekap Nilai</h1>
            
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-bold mb-4">Daftar Proyek</h2>
                
                <div class="space-y-4">
                    <!-- Proyek 1 -->
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded">
                        <div class="text-sm">Proyek 1 - Manajemen Proyek</div>
                        <div class="flex space-x-2">
                            <button onclick="showDetailNilai(1)" class="bg-blue-500 text-white px-3 py-1 text-sm rounded">Detail Nilai</button>
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 text-sm rounded inline-block">Nilai</a>
                        </div>
                    </div>
                    
                    <!-- Proyek 2 -->
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded">
                        <div class="text-sm">Proyek 2 - Aplikasi Distribusi Pasar</div>
                        <div class="flex space-x-2">
                            <button onclick="showDetailNilai(2)" class="bg-blue-500 text-white px-3 py-1 text-sm rounded">Detail Nilai</button>
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 text-sm rounded inline-block">Nilai</a>
                        </div>
                    </div>
                    
                    <!-- Proyek 3 -->
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded">
                        <div class="text-sm">Proyek 3 - Pengembangan Website Da Cafe</div>
                        <div class="flex space-x-2">
                            <button onclick="showDetailNilai(3)" class="bg-blue-500 text-white px-3 py-1 text-sm rounded">Detail Nilai</button>
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 text-sm rounded inline-block">Nilai</a>
                        </div>
                    </div>
                    
                    <!-- Proyek 4 -->
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded">
                        <div class="text-sm">Proyek 4 - Pengembangan Website Laundry</div>
                        <div class="flex space-x-2">
                            <button onclick="showDetailNilai(4)" class="bg-blue-500 text-white px-3 py-1 text-sm rounded">Detail Nilai</button>
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 text-sm rounded inline-block">Nilai</a>
                        </div>
                    </div>
                    
                    <!-- Proyek 5 -->
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded">
                        <div class="text-sm">Proyek 5 - Pengembangan Aplikasi Perpajakan</div>
                        <div class="flex space-x-2">
                            <button onclick="showDetailNilai(5)" class="bg-blue-500 text-white px-3 py-1 text-sm rounded">Detail Nilai</button>
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 text-sm rounded inline-block">Nilai</a>
                        </div>
                    </div>
                    
                    <!-- Proyek 6 -->
                    <div class="flex items-center justify-between bg-gray-50 p-4 rounded">
                        <div class="text-sm">Proyek 6 - Pengembangan Website Drax Learn</div>
                        <div class="flex space-x-2">
                            <button onclick="showDetailNilai(6)" class="bg-blue-500 text-white px-3 py-1 text-sm rounded">Detail Nilai</button>
                            <a href="#" class="bg-blue-500 text-white px-3 py-1 text-sm rounded inline-block">Nilai</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Nilai Popup -->
            <div id="detailNilaiPopup" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                    <h3 id="popupTitle" class="text-lg font-bold mb-4">Nilai Proyek 1 - Manajemen Proyek</h3>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex justify-between">
                            <span>Nilai Dosen:</span>
                            <span>60</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Nilai Teaching Assistant:</span>
                            <span>80</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Rata-Rata Nilai dari Anggota:</span>
                            <span>85</span>
                        </div>
                        <div class="flex justify-between font-bold">
                            <span>Total Nilai:</span>
                            <span>80</span>
                        </div>
                    </div>
                    
                    <div class="flex justify-center space-x-2">
                        <button class="bg-gray-200 px-2 py-1 rounded">&lt;</button>
                        <span class="px-2 py-1">1</span>
                        <button class="bg-gray-200 px-2 py-1 rounded">&gt;</button>
                    </div>
                    
                    <div class="mt-6 text-center">
                        <button onclick="closePopup()" class="bg-blue-500 text-white px-4 py-2 rounded">Tutup</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
