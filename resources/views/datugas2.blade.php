<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Gantt Chart - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.5.0/frappe-gantt.css"/>
    <style>
        #gantt-container {
            overflow-x: auto;
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 1rem;
        }

        #gantt {
            min-width: 800px;
            height: 400px;
        }
    </style>
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
    <main class="flex-1 p-6 space-y-4">
        <h2 class="text-2xl font-bold mb-4">Gantt Chart - Daftar Tugas</h2>

        <!-- Form Tambah Tugas -->
        <div class="bg-white p-4 rounded shadow flex flex-wrap gap-2 items-center">
            <input type="text" id="taskName" placeholder="Nama Tugas" class="p-2 border rounded w-40"/>
            <input type="date" id="taskStart" class="p-2 border rounded w-36"/>
            <input type="date" id="taskEnd" class="p-2 border rounded w-36"/>
            <button onclick="addTask()" class="bg-blue-500 text-white px-3 py-2 rounded">Tambah</button>
        </div>

        <!-- Container Gantt Chart -->
        <div id="gantt-container">
            <svg id="gantt"></svg>
        </div>
    </main>
</div>

<script src="https://unpkg.com/frappe-gantt@0.5.0/dist/frappe-gantt.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let tasks = JSON.parse(localStorage.getItem("ganttTasks")) || [
            {
                id: "1",
                name: "Analisis Kebutuhan",
                start: "2025-05-01",
                end: "2025-05-03",
                progress: 40,
                dependencies: "",
            },
            {
                id: "2",
                name: "Desain UI/UX",
                start: "2025-05-04",
                end: "2025-05-07",
                progress: 60,
                dependencies: "1",
            }
        ];

        function getEndDateLimit() {
            const allDates = tasks.map(t => new Date(t.start));
            const minDate = new Date(Math.min(...allDates));
            const limitDate = new Date(minDate);
            limitDate.setMonth(minDate.getMonth() + 1); // batas 1 bulan ke depan
            return limitDate;
        }

        function renderGantt() {
            document.getElementById("gantt").innerHTML = "";
            const gantt = new Gantt("#gantt", tasks, {
                on_click: (task) => {
                    const action = confirm(`Hapus tugas "${task.name}"?`);
                    if (action) {
                        tasks = tasks.filter(t => t.id !== task.id);
                        saveTasks();
                    }
                },
                on_date_change: (task, start, end) => {
                    const limit = getEndDateLimit();
                    if (new Date(end) > limit) {
                        alert("Tugas tidak boleh lewat 1 bulan dari tanggal awal proyek.");
                        renderGantt();
                        return;
                    }
                    task.start = start;
                    task.end = end;
                    saveTasks();
                },
                on_progress_change: (task, progress) => {
                    task.progress = progress;
                    saveTasks();
                },
            });
        }

        function saveTasks() {
            localStorage.setItem("ganttTasks", JSON.stringify(tasks));
            renderGantt();
        }

        window.addTask = function () {
            const name = document.getElementById("taskName").value;
            const start = document.getElementById("taskStart").value;
            const end = document.getElementById("taskEnd").value;

            if (!name || !start || !end) {
                alert("Harap isi semua kolom tugas.");
                return;
            }

            const newTask = {
                id: Date.now().toString(),
                name,
                start,
                end,
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
