<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahap Testing - CollabThink</title>
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
                <button onclick="toggleSidebar()" class="md:hidden bg-blue-500 text-white px-4 py-2 rounded">☰</button>
                <h2 class="font-bold text-lg" id="taskTitle">Tahap Testing - Durasi Total: 0 Hari</h2>
            </div>

            <!-- Form to add subtask -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Tambah Subtask</h3>
                <form id="subtaskForm" class="space-y-4">
                    <div>
                        <label for="subtaskName" class="block text-sm font-medium text-gray-700">Nama Subtask</label>
                        <input type="text" id="subtaskName" name="subtaskName" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="duration" class="block text-sm font-medium text-gray-700">Durasi (hari)</label>
                        <input type="number" id="duration" name="duration" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="assignee" class="block text-sm font-medium text-gray-700">Nama yang Mengerjakan</label>
                        <input type="text" id="assignee" name="assignee" required class="mt-1 p-2 w-full border border-gray-300 rounded-md">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Subtask</button>
                </form>
            </section>

            <!-- Subtask List -->
            <section id="subtaskList" class="p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Subtasks</h3>
                <ul id="subtaskContainer" class="space-y-4">
                    <!-- Subtask items will be appended here -->
                </ul>
            </section>
        </main>
    </div>

    <script>
        // Toggle sidebar visibility on mobile
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }

        let totalDuration = 0;  // Initialize total duration variable

        // Function to add a subtask
        document.getElementById('subtaskForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get the input values
            const subtaskName = document.getElementById('subtaskName').value;
            const duration = parseInt(document.getElementById('duration').value);
            const assignee = document.getElementById('assignee').value;

            // Create a new list item for the subtask
            const subtaskItem = document.createElement('li');
            subtaskItem.classList.add('bg-white', 'shadow-md', 'p-4', 'rounded-lg', 'hover:shadow-lg', 'transition-all');
            
            // Create a dropdown for status
            const statusDropdown = document.createElement('select');
            statusDropdown.classList.add('mt-2', 'p-2', 'border', 'border-gray-300', 'rounded-md');
            const statuses = ['To Do', 'In Progress', 'Completed'];
            statuses.forEach(status => {
                const option = document.createElement('option');
                option.value = status;
                option.textContent = status;
                statusDropdown.appendChild(option);
            });

            // Set the default status to 'To Do'
            statusDropdown.value = 'To Do';

            // Event listener to handle status change
            statusDropdown.addEventListener('change', function() {
                subtaskItem.querySelector('.status').textContent = `Status: ${statusDropdown.value}`;
            });

            subtaskItem.innerHTML = `
                <h4 class="font-semibold text-gray-700">${subtaskName}</h4>
                <p class="text-sm text-gray-500">Durasi: ${duration} hari</p>
                <p class="text-sm text-gray-500">Dikerjakan oleh: ${assignee}</p>
                <p class="text-sm text-gray-500 status">Status: To Do</p>
            `;

            // Append the status dropdown to the subtask
            subtaskItem.appendChild(statusDropdown);

            // Append the new subtask to the list
            document.getElementById('subtaskContainer').appendChild(subtaskItem);

            // Update the total duration
            totalDuration += duration;

            // Update the title with the new total duration
            document.getElementById('taskTitle').textContent = `Tahap Testing - Durasi Total: ${totalDuration} Hari`;

            // Clear the form fields
            document.getElementById('subtaskForm').reset();
        });
    </script>
</body>
</html>