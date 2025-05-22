<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabThink Maintenance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }

        // Fungsi untuk menampilkan hasil input setelah submit
        function submitReport(event) {
            event.preventDefault();

            let taskName = document.getElementById('task-name').value;
            let priority = document.querySelector('input[name="priority"]:checked').value;
            let description = document.getElementById('description').value;
            let assignee = document.getElementById('assignee').value;
            let date = new Date().toLocaleDateString();

            let reportSection = document.getElementById('report-section');
            let report = document.createElement('div');
            report.classList.add('bg-white', 'shadow', 'rounded', 'p-4', 'my-2');
            report.innerHTML = `
                <h4 class="font-semibold text-gray-600">Tugas Pemeliharaan: ${taskName}</h4>
                <p class="text-gray-500">Prioritas: <span class="font-semibold">${priority}</span></p>
                <p class="text-gray-400">Deskripsi: ${description}</p>
                <p class="text-gray-400">Ditugaskan kepada: ${assignee}</p>
                <p class="text-sm text-gray-300">Tanggal: ${date}</p>
            `;
            reportSection.appendChild(report);

            // Clear the form
            document.getElementById('maintenance-form').reset();
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
                <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
                <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
                <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Maintenance Dashboard</h1>
            </div>

            <!-- Maintenance Features -->
            <section class="mb-6">
                <h2 class="font-bold text-lg mb-4">Form Tugas Pemeliharaan</h2>
                <!-- Formulir untuk Pelaporan Tugas Pemeliharaan -->
                <form id="maintenance-form" class="bg-white shadow-md p-6 rounded" onsubmit="submitReport(event)">
                    <div class="mb-4">
                        <label for="task-name" class="block text-sm font-semibold text-gray-600">Nama Tugas Pemeliharaan</label>
                        <input type="text" id="task-name" name="task-name" class="w-full p-2 mt-2 border border-gray-300 rounded" placeholder="Misal: Memperbaiki bug login" required />
                    </div>
                    <div class="mb-4">
                        <label for="priority" class="block text-sm font-semibold text-gray-600">Prioritas</label>
                        <div class="flex space-x-4 mt-2">
                            <label><input type="radio" name="priority" value="Tinggi" class="mr-2"> Tinggi</label>
                            <label><input type="radio" name="priority" value="Sedang" class="mr-2"> Sedang</label>
                            <label><input type="radio" name="priority" value="Rendah" class="mr-2"> Rendah</label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-semibold text-gray-600">Deskripsi Tugas</label>
                        <textarea id="description" name="description" class="w-full p-2 mt-2 border border-gray-300 rounded" rows="4" placeholder="Deskripsi detail tugas pemeliharaan" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="assignee" class="block text-sm font-semibold text-gray-600">Ditugaskan Kepada</label>
                        <input type="text" id="assignee" name="assignee" class="w-full p-2 mt-2 border border-gray-300 rounded" placeholder="Nama Anggota Tim" required />
                    </div>
                    <button type="submit" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Kirim Laporan</button>
                </form>

                <!-- Hasil Laporan Pemeliharaan -->
                <div id="report-section" class="mt-8">
                    <h2 class="font-bold text-lg mb-2">Hasil Laporan Pemeliharaan</h2>
                    <!-- Laporan Pemeliharaan yang telah disubmit akan ditampilkan di sini -->
                </div>
            </section>
        </main>
    </div>
</body>
</html>
