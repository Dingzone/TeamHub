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
                <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
                <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
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
                    <!-- Task Cards -->
                    @php
                        $phases = [
                            'Planning'    => 'taskplanning',
                            'Analysis'    => 'taskanalysis',
                            'Design'      => 'taskdesign',
                            'Implementation' => 'taskimplementation',
                            'Testing'     => 'tasktesting',
                            'Maintenance' => 'taskmaintenance',
                        ];
                    @endphp

                    @foreach ($phases as $phaseName => $routeName)
                        <div class="bg-white shadow-md p-4 rounded-lg hover:shadow-lg transition-all relative cursor-pointer" 
                             onclick="window.location.href='{{ route($routeName) }}'">
                            <h4 class="font-semibold text-gray-700">{{ $phaseName }}</h4>
                            <p class="text-sm text-gray-500" id="duration-{{ $phaseName }}">Start: - | End: -</p>
                            <button onclick="event.stopPropagation(); editDuration('{{ $phaseName }}')" 
                                    class="absolute top-2 right-2 text-gray-500">⋮</button>
                        </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }

        function editDuration(phase) {
            let startDate = prompt(`Masukkan tanggal mulai untuk ${phase} (YYYY-MM-DD):`);
            let endDate = prompt(`Masukkan tanggal selesai untuk ${phase} (YYYY-MM-DD):`);
            if (startDate && endDate) {
                document.getElementById(`duration-${phase}`).innerText = `Start: ${startDate} | End: ${endDate}`;
            }
        }
    </script>
</body>
</html>