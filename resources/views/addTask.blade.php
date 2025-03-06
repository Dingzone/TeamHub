<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-lg p-6 hidden md:block">
            <h1 class="text-2xl font-bold mb-8 text-center">CollabThink</h1>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block p-2 hover:bg-gray-200 rounded-lg text-gray-700">🏠 Home</a>
                <a href="{{ route('proyek') }}" class="block p-2 hover:bg-gray-200 rounded-lg text-gray-700">📁 Proyek</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded-lg text-gray-700">📝 Notes</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded-lg text-gray-700">👥 Daftar Tim</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded-lg text-gray-700">🔔 Rekap Nilai</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded-lg text-gray-700">📅 Daftar Tugas Dan Deadline</a>
                <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded-lg text-gray-700">💬 Diskusi Tim</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <button onclick="toggleSidebar()" class="md:hidden bg-blue-600 text-white px-4 py-2 rounded-full">☰</button>
                <h2 class="font-bold text-xl text-gray-800">Project Details: Project 1</h2>
            </div>

            <!-- Project Overview -->
            <section class="mb-8 bg-white shadow-lg rounded-lg p-6">
                <h3 class="font-semibold text-lg text-gray-800 mb-4">Project Overview</h3>
                <div class="space-y-3 text-gray-700">
                    <p><strong>Project Name:</strong> Project 1</p>
                    <p><strong>Duration:</strong> 10 days</p>
                    <p><strong>Team Members:</strong> John, Jane</p>
                </div>
            </section>

            <!-- Task Section -->
            <section class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <h4 class="font-semibold text-xl text-gray-800 mb-4">Create New Task</h4>

                <!-- Task Form -->
                <form id="create-task-form" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" id="task-name" placeholder="Task Name" class="w-full p-3 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <input type="number" id="task-duration" placeholder="Duration (days)" class="w-full p-3 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg w-full">Create Task</button>
                </form>
            </section>

            <!-- Sub-task Section -->
            <section class="bg-white shadow-lg rounded-lg p-6">
                <h5 class="font-semibold text-lg text-gray-800 mb-4">Add Sub-tasks</h5>

                <!-- Sub-task Form -->
                <form id="add-subtask-form" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" id="subtask-name" placeholder="Sub-task Name" class="w-full p-3 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <input type="number" id="subtask-duration" placeholder="Duration (days)" class="w-full p-3 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <input type="text" id="subtask-assignee" placeholder="Assigned to" class="w-full p-3 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg w-full">Add Sub-task</button>
                </form>

                <!-- Sub-task List -->
                <div class="mt-6">
                    <h6 class="font-semibold text-lg text-gray-800 mb-4">Sub-tasks for Task 1</h6>
                    <ul id="subtask-list" class="space-y-3">
                        <!-- Dynamically added sub-tasks will appear here -->
                    </ul>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Function to toggle sidebar visibility
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }

        // Handle task creation
        document.getElementById('create-task-form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const taskName = document.getElementById('task-name').value;
            const taskDuration = document.getElementById('task-duration').value;

            // You can later add functionality to save the task details.

            alert(`Task Created: ${taskName}, Duration: ${taskDuration} days`);

            // Clear the task input fields
            document.getElementById('task-name').value = '';
            document.getElementById('task-duration').value = '';
        });

        // Sub-task form submission
        document.getElementById('add-subtask-form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const subtaskName = document.getElementById('subtask-name').value;
            const subtaskDuration = document.getElementById('subtask-duration').value;
            const subtaskAssignee = document.getElementById('subtask-assignee').value;

            // Create a new list item for the sub-task
            const li = document.createElement('li');
            li.classList.add('p-3', 'bg-gray-100', 'border', 'rounded-lg', 'flex', 'justify-between', 'items-center');
            li.innerHTML = `
                <div>
                    <strong>${subtaskName}</strong> - ${subtaskDuration} days - Assigned to: ${subtaskAssignee}
                </div>
            `;

            // Append the new sub-task to the list
            document.getElementById('subtask-list').appendChild(li);

            // Clear the sub-task input fields
            document.getElementById('subtask-name').value = '';
            document.getElementById('subtask-duration').value = '';
            document.getElementById('subtask-assignee').value = '';
        });
    </script>
</body>
</html>