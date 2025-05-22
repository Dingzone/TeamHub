<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
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
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-lg" id="task-title">Task Management</h2>
                <button onclick="openSubtaskModal()" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Subtask</button>
            </div>
            
            <!-- Task Overview -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Task Overview</h3>
                <p><strong>Task Name:</strong> <span id="task-name">-</span></p>
                <p><strong>Duration:</strong> Start: <span id="start-date">-</span> | End: <span id="end-date">-</span></p>
            </section>
            
            <!-- Subtasks List -->
            <section>
                <h3 class="font-semibold text-lg text-gray-600 mb-4">Subtasks</h3>
                <div id="subtask-list" class="space-y-4"></div>
            </section>
        </main>
    </div>
    
    <!-- Subtask Modal -->
    <div id="subtask-modal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-bold mb-4">Add Subtask</h2>
            <label class="block">Subtask Name
                <input type="text" id="subtask-name" class="w-full p-2 border rounded">
            </label>
            <label class="block mt-2">Start Date
                <input type="date" id="subtask-start" class="w-full p-2 border rounded">
            </label>
            <label class="block mt-2">End Date
                <input type="date" id="subtask-end" class="w-full p-2 border rounded">
            </label>
            <label class="block mt-2">Assigned To
                <input type="text" id="subtask-assignee" class="w-full p-2 border rounded">
            </label>
            <label class="block mt-2">Description
                <textarea id="subtask-desc" class="w-full p-2 border rounded"></textarea>
            </label>
            <label class="block mt-2">Status
                <select id="subtask-status" class="w-full p-2 border rounded">
                    <option value="To-Do">To-Do</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Complete">Complete</option>
                </select>
            </label>
            <div class="flex justify-end mt-4">
                <button onclick="closeSubtaskModal()" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Cancel</button>
                <button onclick="saveSubtask()" class="px-4 py-2 bg-blue-500 text-white rounded">Save</button>
            </div>
        </div>
    </div>
    
    <script>
        // Load task name from URL
        const urlParams = new URLSearchParams(window.location.search);
        const task = urlParams.get('task');
        if (task) {
            document.getElementById("task-title").textContent = `Task Management: ${task}`;
            document.getElementById("task-name").textContent = task;
        }

        function openSubtaskModal() {
            document.getElementById("subtask-modal").classList.remove("hidden");
        }
        
        function closeSubtaskModal() {
            document.getElementById("subtask-modal").classList.add("hidden");
        }
        
        function saveSubtask() {
            const name = document.getElementById("subtask-name").value;
            const start = document.getElementById("subtask-start").value;
            const end = document.getElementById("subtask-end").value;
            const assignee = document.getElementById("subtask-assignee").value;
            const desc = document.getElementById("subtask-desc").value;
            const status = document.getElementById("subtask-status").value;
            
            if (!name || !start || !end || !assignee) {
                alert("Semua field harus diisi!");
                return;
            }
            
            const subtaskList = document.getElementById("subtask-list");
            const subtaskItem = document.createElement("div");
            subtaskItem.classList.add("bg-white", "shadow-md", "p-4", "rounded-lg");
            subtaskItem.innerHTML = `
                <h4 class="font-semibold">${name}</h4>
                <p><strong>Duration:</strong> ${start} - ${end}</p>
                <p><strong>Assigned To:</strong> ${assignee}</p>
                <p><strong>Description:</strong> ${desc}</p>
                <p><strong>Status:</strong> 
                    <select class="border p-1 rounded" onchange="updateStatus(this)">
                        <option value="To-Do" ${status === "To-Do" ? "selected" : ""}>To-Do</option>
                        <option value="In Progress" ${status === "In Progress" ? "selected" : ""}>In Progress</option>
                        <option value="Complete" ${status === "Complete" ? "selected" : ""}>Complete</option>
                    </select>
                </p>
            `;
            subtaskList.appendChild(subtaskItem);
            
            closeSubtaskModal();
        }
        
        function updateStatus(select) {
            alert(`Status diubah menjadi: ${select.value}`);
        }
    </script>
</body>
</html>
