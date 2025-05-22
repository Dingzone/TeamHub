<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CollabThink Proyek</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .project-card-container {
      position: relative;
      cursor: pointer;
    }
    .project-card-container:hover {
      transform: translateY(-2px);
      transition: transform 0.2s ease;
    }
  </style>
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
            <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
            <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
            <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
      <header class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Proyek Based Learning</h2>
        <div class="flex items-center space-x-4">
          <span class="text-gray-600">Moni Roy</span>
          <span class="text-sm text-gray-400">mahasiswa</span>
          <img src="https://i.pravatar.cc/40" alt="Profile" class="rounded-full w-10 h-10" />
        </div>
      </header>

      <!-- Summary Cards -->
 <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Kelas</p>
        <p class="text-3xl font-bold mt-2">{{ $jumlahKelas }}</p>
      </div>
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">In Progress</p>
        <p class="text-3xl font-bold mt-2">{{ $jumlahKelas }}</p>
        <p class="text-3xl font-bold mt-2">–</p>
      </div>
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Proyek</p>
        <p class="text-3xl font-bold mt-2">{{ $jumlahKelas }}</p>
        <p class="text-3xl font-bold mt-2">–</p>
      </div>
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Tugas</p>
        <p class="text-3xl font-bold mt-2">–</p>
      </div>
    </div>

      <!-- Project Based Learning -->
      <div class="mb-6">
        <div class="flex justify-between items-center mb-3">
          <h3 class="text-xs font-semibold text-gray-900 uppercase">Project Based Learning</h3>
          <a href="{{ route('masukpbl') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-1 rounded">
            Masuk PBL +
          </a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
          @forelse ($kelas as $item)
            <a href="{{ route('halamandetailproyek', ['kategori' => urlencode($item->kategori)]) }}" class="block project-card-container">
              <div class="bg-white rounded-lg shadow w-full p-2">
                <div class="bg-blue-600 rounded h-20 w-full mb-2 flex items-center justify-center text-white font-bold">
                  {{ strtoupper(substr($item->nama_kelas, 0, 2)) }}
                </div>
                <div class="flex items-center space-x-1">
                  <button class="star-toggle text-yellow-400 focus:outline-none" onclick="event.stopPropagation(); event.preventDefault();">
                    <i class="far fa-star"></i>
                  </button>
                  <p class="text-xs text-gray-700 leading-normal">
                    {{ $item->nama_kelas }}
                    <br/>
                    Kategori: {{ $item->kategori }}
                  </p>
                </div>
                <div class="flex justify-end text-gray-400 text-xs mt-1">
                  <button class="menu-button focus:outline-none" onclick="event.stopPropagation(); event.preventDefault();">
                    <i class="fas fa-ellipsis-h"></i>
                  </button>
                </div>
              </div>
            </a>
          @empty
            <p class="col-span-4 text-center text-gray-500">Belum ada kelas tersedia.</p>
          @endforelse
        </div>
      </div>
    </main>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize star toggle functionality
      document.querySelectorAll('.star-toggle').forEach(button => {
        button.addEventListener('click', function(e) {
          e.stopPropagation();
          e.preventDefault();
          const icon = this.querySelector('i');
          icon.classList.toggle('far');
          icon.classList.toggle('fas');
        });
      });

      // Initialize menu buttons
      document.querySelectorAll('.menu-button').forEach(button => {
        button.addEventListener('click', function(e) {
          e.stopPropagation();
          e.preventDefault();
          // Add your menu toggle logic here
        });
      });
    });
  </script>
</body>
</html>