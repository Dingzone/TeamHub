<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabThink Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
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
            <section class="mb-6">
                <h2 class="font-bold text-lg mb-2">Total Proyek</h2>
                <div class="flex space-x-4">
                    <!-- TO DO Section -->
                    <div class="w-1/3 p-6 bg-white shadow rounded text-center">
                        <h3 class="font-semibold text-gray-600">Total Proyek To Do</h3>
                        <p class="text-sm text-gray-400">20 - 30 Februari 2025</p>
                        <p class="text-2xl font-bold">10</p>
                        <p class="text-green-500 font-semibold">⬆ 33.87%</p>
                    </div>
                    
                    <!-- In Progress Section -->
                    <div class="w-1/3 p-6 bg-white shadow rounded text-center">
                        <h3 class="font-semibold text-gray-600">Total Tasks In Progress</h3>
                        <p class="text-sm text-gray-400">01 - 20 Februai 2025</p>
                        <p class="text-2xl font-bold">5</p>
                        <p class="text-red-500 font-semibold">⬇ 13.87% </p>
                    </div>
                    
                    <!-- Complete Section -->
                    <div class="w-1/3 p-6 bg-white shadow rounded text-center">
                        <h3 class="font-semibold text-gray-600">Total Tasks Completed</h3>
                        <p class="text-sm text-gray-400">10 - 19 Februari 2025</p>
                        <p class="text-2xl font-bold">15</p>
                        <p class="text-green-500 font-semibold">⬆ 20.45% </p>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
</html>