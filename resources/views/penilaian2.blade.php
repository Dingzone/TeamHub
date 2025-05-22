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
            <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
            <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
            <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col items-center justify-center p-6">
        <h1 class="text-3xl font-bold text-center mb-6">Penilaian Progres Mahasiswa</h1>
        
        <div class="bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-xl font-semibold mb-4">Daftar Nama</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-8 rounded-lg shadow text-lg">
                    <h3 class="font-semibold">Exaudi</h3>
                    <p>Durasi: 5 hari</p>
                    <p>Assigned to: Dosen</p>
                    <button class="mt-4 bg-blue-500 text-white px-6 py-3 rounded" onclick="openRatingModal('Planning')">Beri Nilai</button>
                </div>
                <div class="bg-green-100 p-8 rounded-lg shadow text-lg">
                    <h3 class="font-semibold">Dini</h3>
                    <p>Durasi: 5 hari</p>
                    <p>Assigned to: Dosen</p>
                    <button class="mt-4 bg-blue-500 text-white px-6 py-3 rounded" onclick="openRatingModal('Analisis')">Beri Nilai</button>
                </div>
                <div class="bg-yellow-100 p-8 rounded-lg shadow text-lg">
                    <h3 class="font-semibold">Fanny</h3>
                    <p>Durasi: 4 hari</p>
                    <p>Assigned to: Dosen</p>
                    <button class="mt-4 bg-blue-500 text-white px-6 py-3 rounded" onclick="openRatingModal('Maintenance')">Beri Nilai</button>
                </div>
                <div class="bg-blue-100 p-8 rounded-lg shadow text-lg">
                    <h3 class="font-semibold">Fresky</h3>
                    <p>Durasi: 5 hari</p>
                    <p>Assigned to: Dosen</p>
                    <button class="mt-4 bg-blue-500 text-white px-6 py-3 rounded" onclick="openRatingModal('Planning')">Beri Nilai</button>
                </div>
                <div class="bg-green-100 p-8 rounded-lg shadow text-lg">
                    <h3 class="font-semibold">Masnida</h3>
                    <p>Durasi: 5 hari</p>
                    <p>Assigned to: Dosen</p>
                    <button class="mt-4 bg-blue-500 text-white px-6 py-3 rounded" onclick="openRatingModal('Planning')">Beri Nilai</button>
                </div>
                <div class="bg-yellow-100 p-8 rounded-lg shadow text-lg">
                    <h3 class="font-semibold">Yenisa</h3>
                    <p>Durasi: 5 hari</p>
                    <p>Assigned to: Dosen</p>
                    <button class="mt-4 bg-blue-500 text-white px-6 py-3 rounded" onclick="openRatingModal('Planning')">Beri Nilai</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Penilaian -->
    <div id="ratingModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 id="taskTitle" class="text-xl font-semibold mb-4">Menilai Proyek</h2>
            <label for="ratingValue" class="block mb-2">Masukkan Nilai (1-10):</label>
            <input type="number" id="ratingValue" class="border p-2 w-full mb-4" min="1" max="10">
            <div class="flex justify-end space-x-2">
                <button class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeModal()">Batal</button>
                <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="submitRating()">Kirim</button>
            </div>
        </div>
    </div>

    <script>
        function openRatingModal(task) {
            document.getElementById('taskTitle').innerText = 'Menilai Proyek: ' + task;
            document.getElementById('ratingModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('ratingModal').classList.add('hidden');
        }

        function submitRating() {
            let rating = document.getElementById('ratingValue').value;
            if (rating < 1 || rating > 10) {
                alert('Nilai harus antara 1 dan 10');
                return;
            }
            alert('Nilai berhasil dikirim!');
            closeModal();
        }
    </script>
</body>
</html>