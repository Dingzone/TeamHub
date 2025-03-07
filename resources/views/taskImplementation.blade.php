<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Implementasi - SDLC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">
    
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

    <div class="w-full max-w-5xl p-6 mx-auto">
        <h1 class="text-center text-3xl font-bold mb-6 text-gray-800">Tahap Implementasi</h1>
        
        <div class="bg-white p-4 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold mb-2">Tambah Tugas</h2>
            <form id="addTaskForm" class="space-y-2">
                <input type="text" id="taskName" placeholder="Nama Tugas" class="w-full p-2 border rounded" required>
                <textarea id="taskDesc" placeholder="Deskripsi Tugas" class="w-full p-2 border rounded" required></textarea>
                <input type="date" id="taskStartDate" class="w-full p-2 border rounded" required>
                <input type="date" id="taskEndDate" class="w-full p-2 border rounded" required>
                <input type="text" id="taskAssigned" placeholder="Dikerjakan Oleh" class="w-full p-2 border rounded" required>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah</button>
            </form>
        </div>
        
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-2">Daftar Tugas</h2>
            <div id="taskList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"></div>
        </div>
    </div>
    
    <script>
        document.getElementById("addTaskForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let taskName = document.getElementById("taskName").value;
            let taskDesc = document.getElementById("taskDesc").value;
            let taskStartDate = document.getElementById("taskStartDate").value;
            let taskEndDate = document.getElementById("taskEndDate").value;
            let taskAssigned = document.getElementById("taskAssigned").value;
            
            let taskCard = document.createElement("div");
            taskCard.className = "p-4 rounded-lg shadow-lg bg-gray-200 relative";
            taskCard.setAttribute("data-status", "To Do");

            taskCard.innerHTML = `
                <h3 class="text-lg font-bold">${taskName}</h3>
                <p class="text-sm">${taskDesc}</p>
                <p class="text-xs mt-2"><strong>Tanggal Mulai:</strong> ${taskStartDate}</p>
                <p class="text-xs"><strong>Tanggal Selesai:</strong> ${taskEndDate}</p>
                <p class="text-xs"><strong>Dikerjakan Oleh:</strong> ${taskAssigned}</p>
                <button class="absolute top-2 right-2 text-gray-600" onclick="toggleMenu(this)">⋮</button>
                <div class="hidden absolute right-2 top-8 bg-white shadow-lg rounded p-2" style="min-width: 120px;">
                    <button onclick="changeStatus(this, 'To Do')" class="block w-full text-left px-2 py-1 hover:bg-gray-300">To Do</button>
                    <button onclick="changeStatus(this, 'In Progress')" class="block w-full text-left px-2 py-1 hover:bg-yellow-300">In Progress</button>
                    <button onclick="changeStatus(this, 'Complete')" class="block w-full text-left px-2 py-1 hover:bg-green-300">Complete</button>
                    <button onclick="deleteTask(this)" class="block w-full text-left px-2 py-1 text-red-600 hover:bg-red-300">Hapus</button>
                </div>
            `;

            document.getElementById("taskList").appendChild(taskCard);
            document.getElementById("addTaskForm").reset();
        });
        
        function toggleMenu(button) {
            let menu = button.nextElementSibling;
            menu.classList.toggle("hidden");
        }
        
        function changeStatus(button, status) {
            let taskCard = button.closest("div.p-4");
            taskCard.setAttribute("data-status", status);

            if (status === "Complete") {
                taskCard.className = "p-4 rounded-lg shadow-lg bg-green-200 relative";
            } else if (status === "In Progress") {
                taskCard.className = "p-4 rounded-lg shadow-lg bg-yellow-200 relative";
            } else {
                taskCard.className = "p-4 rounded-lg shadow-lg bg-gray-200 relative";
            }
        }
        
        function deleteTask(button) {
            let taskCard = button.closest("div.p-4");
            taskCard.remove();
        }
    </script>
</body>
</html>