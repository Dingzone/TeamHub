<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details - CollabThink</title>
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
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">🔔 Notifikasi</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
                <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <div class="flex justify-between items-center mb-4">
                <button onclick="toggleSidebar()" class="md:hidden bg-blue-500 text-white px-4 py-2 rounded">☰</button>
                <h2 class="font-bold text-lg">Project Details: Project 1</h2>
                <a href="{{ route('addTask') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Add Task</a>
            </div>

            <!-- Project Overview -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Project Overview</h3>
                <p><strong>Project Name:</strong> Project 1</p>
                <p><strong>Duration:</strong> 10 days</p>
                <p><strong>Team Members:</strong> John, Jane</p>
            </section>

            <!-- Tasks Section -->
            <section>
                <h3 class="font-semibold text-lg text-gray-600 mb-4">Tasks</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <!-- Task Card -->
                    <div class="bg-white shadow-md p-4 rounded-lg hover:shadow-lg transition-all">
                        <a href="#" class="block">
                            <h4 class="font-semibold text-gray-700">Task 1</h4>
                            <p class="text-sm text-gray-500">Duration: 3 days</p>
                            <p class="text-sm text-gray-500">Assigned to: John</p>
                            <p class="text-sm text-gray-500">Status: In Progress</p>
                        </a>
                    </div>

                    <!-- Task Card -->
                    <div class="bg-white shadow-md p-4 rounded-lg hover:shadow-lg transition-all">
                        <a href="#" class="block">
                            <h4 class="font-semibold text-gray-700">Task 2</h4>
                            <p class="text-sm text-gray-500">Duration: 5 days</p>
                            <p class="text-sm text-gray-500">Assigned to: Jane</p>
                            <p class="text-sm text-gray-500">Status: Completed</p>
                        </a>
                    </div>

                    <!-- Task Card -->
                    <div class="bg-white shadow-md p-4 rounded-lg hover:shadow-lg transition-all">
                        <a href="#" class="block">
                            <h4 class="font-semibold text-gray-700">Task 3</h4>
                            <p class="text-sm text-gray-500">Duration: 4 days</p>
                            <p class="text-sm text-gray-500">Assigned to: John</p>
                            <p class="text-sm text-gray-500">Status: To Do</p>
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }
    </script>
</body>
</html>