<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded">
                <h1 class="text-2xl font-bold mb-4">Tambah Proyek</h1>
                
                <!-- Form Create Project -->
                <div class="mb-6">
                    <form id="projectForm" class="space-y-4">
                        <input type="text" id="projectName" placeholder="Nama Proyek" class="w-full p-2 border rounded" required>
                        <div class="flex space-x-2">
                            <input type="date" id="startDate" placeholder="Tanggal Mulai" class="w-1/2 p-2 border rounded" required>
                            <input type="date" id="endDate" placeholder="Tanggal Selesai" class="w-1/2 p-2 border rounded" required>
                        </div>
                        <input type="text" id="team" placeholder="Tim" class="w-full p-2 border rounded" required>
                        <textarea id="description" placeholder="Deskripsi Proyek" class="w-full p-2 border rounded" required></textarea>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Proyek</button>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.getElementById("projectForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            let projectName = document.getElementById("projectName").value;
            let startDate = document.getElementById("startDate").value;
            let endDate = document.getElementById("endDate").value;
            let team = document.getElementById("team").value;
            let description = document.getElementById("description").value;
            
            let project = {
                name: projectName,
                start: startDate,
                end: endDate,
                team: team,
                description: description
            };

            let projects = JSON.parse(localStorage.getItem("projects")) || [];
            projects.push(project);
            localStorage.setItem("projects", JSON.stringify(projects));

            // Arahkan ke halaman proyek.blade.php menggunakan route Laravel
            window.location.href = "{{ route('proyek') }}";
        });
    </script>
</body>
</html>