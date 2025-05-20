<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>CollabThink - @isset($kelas) {{ $kelas }} @endisset</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Inter', sans-serif;
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
        <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi</a>
      </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6">
      <!-- Top bar -->
      <div class="flex items-center justify-between mb-6">
        <form class="flex items-center w-full max-w-md border border-gray-300 rounded-full px-4 py-2 text-gray-400 text-sm">
          <input class="flex-grow bg-transparent outline-none text-gray-900 text-sm" placeholder="Search" type="search"/>
          <i class="fas fa-search text-gray-400"></i>
        </form>
        <div class="flex items-center space-x-3 ml-6">
          
    <div class="flex items-center space-x-4">
      <span class="text-gray-600">Moni Roy</span>
      <img src="https://i.pravatar.cc/40" alt="Profile" class="rounded-full w-10 h-10" />
    </div>
        </div>
      </div>

      <!-- Content header -->
      <div class="flex items-center space-x-2 mb-4 text-sm font-semibold text-gray-900">
        <i class="fas fa-users"></i>
        <span>{{ $kelas ?? 'Kategori Tidak Ditemukan' }}</span>
      </div>

      <!-- Card dan form -->
      <div class="flex flex-col md:flex-row md:space-x-12">
        <!-- Card -->
        <div class="bg-white rounded-lg shadow-md w-64 mb-6 md:mb-0 flex flex-col">
          <div class="h-40 bg-blue-600 rounded-t-lg"></div>
          <div class="p-4 flex flex-col flex-grow">
            <div class="text-xs text-gray-500 mb-2">{{ $kelas ?? 'Tidak ada kelas' }}</div>
            <p class="text-xs font-semibold text-gray-900 mb-6 leading-tight">
              Hanya mahasiswa yang memiliki kunci kelas yang dapat mengakses halaman ini.
            </p>
            <div class="flex justify-between items-center mt-auto">
              <button class="text-gray-600 text-sm focus:outline-none"><i class="fas fa-volume-up"></i></button>
              <button class="bg-blue-600 text-white text-xs px-3 py-1 rounded focus:outline-none">Akses</button>
            </div>
          </div>
        </div>

        <!-- Form -->
        <form class="flex flex-col space-y-2 w-full max-w-xs">
          <label class="text-xs font-semibold text-gray-900" for="class-key">Masukkan Kunci Kelas</label>
          <div class="relative">
            <input class="w-full border border-gray-300 rounded px-3 py-1 text-xs text-gray-900 focus:outline-none focus:ring-1 focus:ring-blue-600" id="class-key" type="text"/>
            <i class="fas fa-lock absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
          </div>
          <button class="bg-blue-600 text-white text-xs px-3 py-1 rounded w-20" type="submit">Masuk</button>
        </form>
      </div>
    </main>
  </div>
</body>
</html>
