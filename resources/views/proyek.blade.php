<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabThink - Proyek</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">
<div class="flex h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md p-4">
        <h1 class="text-xl font-bold mb-6">CollabThink</h1>
        <nav class="space-y-4">
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
            <a href="{{ route('proyek.index') }}" class="block p-2 bg-gray-200 rounded">📁 Proyek</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Doku-Tim</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📊 Mae-Wai</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📅 Yam-Du Dudas</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">💬 Shad Tim</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
        <header class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Proyek</h2>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600">Fanny</span>
                <img src="https://i.pravatar.cc/40" alt="Profile" class="rounded-full w-10 h-10" />
            </div>
        </header>

        <!-- Summary -->
        <div class="bg-white p-4 rounded shadow mb-6">
            <h3 class="text-lg font-semibold mb-2">Sooti Project</h3>
            <p class="text-3xl font-bold">40</p>
            <p class="text-gray-500">PROJECT BASED LEARNING</p>
        </div>

        <!-- Status Proyek -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-white p-4 rounded shadow text-center">
                <p class="font-semibold text-gray-600">Is Program</p>
                <p class="text-2xl font-bold mt-2">15</p>
            </div>
            <div class="bg-white p-4 rounded shadow text-center">
                <p class="font-semibold text-gray-600">Completed</p>
                <p class="text-2xl font-bold mt-2">20</p>
            </div>
            <div class="bg-white p-4 rounded shadow text-center">
                <p class="font-semibold text-gray-600">Pending</p>
                <p class="text-2xl font-bold mt-2">5</p>
            </div>
        </div>

        <!-- Daftar Proyek -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4">Daftar Proyek</h3>
            <div class="grid grid-cols-3 gap-4">
                @foreach([1, 2, 3] as $project)
                <div class="bg-white rounded shadow p-4">
                    <div class="h-32 bg-blue-100 rounded mb-3 flex flex-col items-center justify-center relative">
                        <span class="text-blue-600 font-bold text-xl">TSPL 2023</span>
                        
                        <!-- Dropdown Tahun Ajaran -->
                        <div class="absolute top-2 right-2">
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open" class="px-2 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-600">
                                    Tahun Ajaran ▼
                                </button>
                                <div x-show="open" @click.away="open = false" 
                                     class="absolute right-0 mt-1 w-40 bg-white rounded shadow-lg z-10">
                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">2023/2024</a>
                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">2022/2023</a>
                                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">2021/2022</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="font-medium">Hang an individual update: 2022</p>
                    <p class="text-xs text-gray-500">www.halamanproyek.com</p>
                    <a href="{{ route('enroll.show', $project) }}" class="mt-2 inline-block w-full text-center bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition-colors">
                        Pilih Proyek
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</div>

<!-- Alpine JS untuk dropdown -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>