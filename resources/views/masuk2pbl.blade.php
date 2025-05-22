<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <title>CollabThink</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
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
        <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
        <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
        <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
      </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6">
      <!-- Top bar -->
      <div class="flex items-center justify-between mb-6">
        <div class="relative w-80">
          <input class="w-full rounded-full border border-gray-200 bg-gray-100 text-gray-500 text-sm px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Search" type="search" />
          <i class="fas fa-search absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
        </div>
        <div class="flex items-center space-x-3">
     <div class="flex items-center space-x-4">
      <span class="text-gray-600">Moni Roy</span>
      <img src="https://i.pravatar.cc/40" alt="Profile" class="rounded-full w-10 h-10" />
    </div>
        </div>
      </div>

      <!-- Content -->
      <section>
        <h2 class="text-base font-semibold mb-4 flex items-center space-x-2">
          <i class="fas fa-users"></i>
          <span>Kategori Pembelajaran Berbasis Proyek - Program Studi Dan Angkatan</span>
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
         @php
    $kategori = [
        'PBL - UI/UX' => 'Mahasiswa yang mengikuti mata kuliah UI/UX.',
        'PBL - Back End' => 'Mahasiswa yang mengikuti mata kuliah Back End.',
        'PBL - Front End' => 'Mahasiswa yang mengikuti mata kuliah Front End.',
        'PBL - Mobile Development' => 'Mahasiswa yang mengikuti mata kuliah Mobile Development.',
        'PBL - Data Science' => 'Mahasiswa yang mengikuti mata kuliah Data Science.',
        'PBL - Cyber Security' => 'Mahasiswa yang mengikuti mata kuliah Cyber Security.',
    ];
@endphp

@foreach($kategori as $nama => $deskripsi)
<article class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col w-full h-72">
    <div class="w-full h-28 bg-blue-600 rounded-t-lg"></div>
    <div class="p-4 flex flex-col flex-grow">
        <p class="text-xs text-gray-400 mb-2">{{ $nama }}</p>
        <p class="text-xs font-semibold text-gray-900 mb-6 leading-snug">
            Hanya mahasiswa angkatan 2022 yang<br/>
            mengikuti kelas {{ strtolower($nama) }}.
        </p>
        <div class="mt-auto flex items-center justify-between">
            <i class="fas fa-sign-in-alt text-black text-sm"></i>
            <a href="{{ route('kuncikelas', ['kelas' => $nama]) }}">
                <button class="bg-blue-600 text-white text-xs px-4 py-1 rounded shadow-sm hover:bg-blue-700 transition">
                    Akses
                </button>
            </a>
        </div>
    </div>
</article>
@endforeach

        </div>
      </section>
    </main>
  </div>
</body>
</html>