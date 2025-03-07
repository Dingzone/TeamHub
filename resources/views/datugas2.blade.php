<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gantt Chart - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.5.0/frappe-gantt.css">
    <style>
        #gantt {
            width: 100%;
            height: 500px;
        }
    </style>
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
        
        <main class="flex-1 p-6">
            <h2 class="text-2xl font-bold mb-4">Gantt Chart - Daftar Tugas</h2>
            <div class="mb-4">
                <input type="text" id="taskName" placeholder="Nama Tugas" class="p-2 border rounded">
                <input type="date" id="taskStart" class="p-2 border rounded">
                <input type="date" id="taskEnd" class="p-2 border rounded">
                <button onclick="addTask()" class="bg-blue-500 text-white p-2 rounded">Tambah Tugas</button>
            </div>
            <svg id="gantt"></svg>
        </main>
    </div>
    <script src="https://unpkg.com/frappe-gantt@0.5.0/dist/frappe-gantt.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let tasks = JSON.parse(localStorage.getItem("ganttTasks")) || [
                {
                    id: "1",
                    name: "Analisis Kebutuhan",
                    start: "2025-02-20",
                    end: "2025-02-25",
                    progress: 30,
                    dependencies: "",
                },
                {
                    id: "2",
                    name: "Desain UI/UX",
                    start: "2025-02-26",
                    end: "2025-03-01",
                    progress: 50,
                    dependencies: "1",
                }
            ];
            
            function renderGantt() {
                document.getElementById("gantt").innerHTML = ""; // Reset Gantt sebelum menggambar ulang
                new Gantt("#gantt", tasks, {
                    on_click: (task) => {
                        let newName = prompt("Edit Nama Tugas:", task.name);
                        if (newName) {
                            task.name = newName;
                            saveTasks();
                        }
                    },
                    on_date_change: (task, start, end) => {
                        task.start = start;
                        task.end = end;
                        saveTasks();
                    },
                    on_progress_change: (task, progress) => {
                        task.progress = progress;
                        saveTasks();
                    },
                    on_view_change: (mode) => {
                        console.log("Mode tampilan berubah ke:", mode);
                    },
                });
            }
            
            function saveTasks() {
                localStorage.setItem("ganttTasks", JSON.stringify(tasks));
                renderGantt();
            }
            
            window.addTask = function () {
                let taskName = document.getElementById("taskName").value;
                let taskStart = document.getElementById("taskStart").value;
                let taskEnd = document.getElementById("taskEnd").value;
                
                if (!taskName || !taskStart || !taskEnd) {
                    alert("Semua data harus diisi!");
                    return;
                }
                
                let newTask = {
                    id: (tasks.length + 1).toString(),
                    name: taskName,
                    start: taskStart,
                    end: taskEnd,
                    progress: 0,
                    dependencies: "",
                };
                
                tasks.push(newTask);
                saveTasks();
                document.getElementById("taskName").value = "";
                document.getElementById("taskStart").value = "";
                document.getElementById("taskEnd").value = "";
            };
            
            renderGantt();
        });
    </script>
</body>
</html>