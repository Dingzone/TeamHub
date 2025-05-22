<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }

        // Fungsi untuk navigasi
        function navigateTo(route) {
            if (route) {
                window.location.href = route;
            }
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
                <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
                <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
                <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Daftar Tugas</h1>

            <!-- Form Input Proyek -->
            <div class="bg-white p-4 shadow-md rounded mb-4">
                <h3 class="font-bold mb-2">Tambah Tugas</h3>
                <input type="text" id="projectName" placeholder="Nama Tugas" class="w-full p-2 border rounded">
                <button onclick="addProject()" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
            </div>

            <!-- Daftar Proyek -->
            <div id="projectList" class="space-y-4"></div>
        </main>
    </div>

    <script>
        let projects = JSON.parse(localStorage.getItem("projects")) || [];

        function renderProjects() {
            const list = document.getElementById("projectList");
            list.innerHTML = "";
            projects.forEach((p, index) => {
                list.innerHTML += `
                    <div class="p-4 bg-white shadow-md rounded flex justify-between items-center">
                        <span class="font-semibold">${p.name}</span>
                        <div class="flex gap-4">
                            <a href="{{ route('datugas2') }}?projectId=${p.id}" class="text-blue-500 hover:underline">Lihat Gantt Chart</a>
                            <button onclick="deleteProject(${index})" class="text-red-500 hover:underline">Hapus</button>
                        </div>
                    </div>
                `;
            });
        }

        function addProject() {
            let name = document.getElementById("projectName").value;
            if (name) {
                let newProject = { id: Date.now(), name, tasks: [] };
                projects.push(newProject);
                localStorage.setItem("projects", JSON.stringify(projects));
                renderProjects();
                document.getElementById("projectName").value = "";
            }
        }

        function deleteProject(index) {
            if (confirm("Yakin ingin menghapus tugas ini?")) {
                projects.splice(index, 1);
                localStorage.setItem("projects", JSON.stringify(projects));
                renderProjects();
            }
        }

        renderProjects();
    </script>
</body>
</html>
