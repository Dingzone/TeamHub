<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning Detail - CollabThink</title>
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
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Daftar Tim</a>
                <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
                <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
                <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-4">
                <button onclick="toggleSidebar()" class="md:hidden bg-blue-500 text-white px-4 py-2 rounded">☰</button>
                <h2 class="font-bold text-lg">Planning Detail</h2>
                <a href="proyekDetail.html" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
            </div>

            <!-- Planning Overview -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Planning Overview</h3>
                <p><strong>Task Name:</strong> Planning</p>
                <p><strong>Duration:</strong> 5 days</p>
                <p><strong>Assigned to:</strong> Exaudi</p>
                <p><strong>Status:</strong> In Progress</p>
            </section>

            <!-- Task Description -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Task Description</h3>
                <p>Pembuatan perencanaan proyek termasuk timeline, pembagian tugas, dan alur kerja.</p>
            </section>

            <!-- Sub Tasks -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Sub Task Planning</h3>
                <div class="mb-4">
                    <input type="text" id="subTaskInput" class="w-full p-2 border rounded" placeholder="Tambahkan sub task...">
                    <input type="datetime-local" id="startTimeInput" class="w-full p-2 border rounded mt-2">
                    <input type="datetime-local" id="endTimeInput" class="w-full p-2 border rounded mt-2">
                    <button onclick="addSubTask()" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">+ Add Sub Task</button>
                </div>
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2">Sub Task</th>
                            <th class="border border-gray-300 px-4 py-2">Start Time</th>
                            <th class="border border-gray-300 px-4 py-2">End Time</th>
                        </tr>
                    </thead>
                    <tbody id="subTaskTable">
                        <!-- Sub task items will be added here -->
                    </tbody>
                </table>
            </section>

            <!-- Notes -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Notes</h3>
                <textarea id="noteInput" class="w-full p-2 border rounded" rows="4" placeholder="Tambahkan catatan..."></textarea>
                <button onclick="saveNote()" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Save Note</button>
                <ul id="noteList" class="list-disc pl-5 text-gray-700 mt-2">
                    <!-- Saved notes will appear here -->
                </ul>
            </section>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }

        function addSubTask() {
            const taskInput = document.getElementById("subTaskInput");
            const startTimeInput = document.getElementById("startTimeInput");
            const endTimeInput = document.getElementById("endTimeInput");
            const table = document.getElementById("subTaskTable");
            
            if (taskInput.value.trim() !== "" && startTimeInput.value && endTimeInput.value) {
                const row = table.insertRow();
                row.insertCell(0).textContent = taskInput.value;
                row.insertCell(1).textContent = startTimeInput.value;
                row.insertCell(2).textContent = endTimeInput.value;
                
                taskInput.value = "";
                startTimeInput.value = "";
                endTimeInput.value = "";
            }
        }

        function saveNote() {
            const input = document.getElementById("noteInput");
            const list = document.getElementById("noteList");
            
            if (input.value.trim() !== "") {
                const li = document.createElement("li");
                li.textContent = input.value;
                list.appendChild(li);
                input.value = "";
            }
        }
    </script>
</body>
</html>