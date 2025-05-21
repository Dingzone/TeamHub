<!DOCTYPE html>

<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Proyek</title>
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
            <a href="{{ route(name:'dashboard') }}" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
            <a href="{{ route('proyek') }}" class="block p-2 hover:bg-gray-200 rounded">📁 Proyek</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Daftar Tim</a>
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
      <span class="text-gray-600">Roy</span>
      <span class="text-sm text-gray-400">mahasiswa</span>
      <img src="https://i.pravatar.cc/40" alt="Profile" class="rounded-full w-10 h-10" />
    </div>
  </header>

  <!-- Summary Cards -->
 <!-- Summary Cards -->
 <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Kelas</p>
        <p class="text-3xl font-bold mt-2">{{ $jumlahKelas }}</p>
      </div>
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Proyek</p>
        <p class="text-3xl font-bold mt-2">{{ $jumlahKelas }}</p>
        <p class="text-3xl font-bold mt-2">–</p>
      </div>
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">In Progress</p>
        <p class="text-3xl font-bold mt-2">–</p>
      </div>
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Tugas</p>
        <p class="text-3xl font-bold mt-2">–</p>
      </div>
    </div>

  <!-- Proyek Berbasis -->
  <div id="projectBasedLearning" class="mb-6">
  <div class="grid grid-cols-4 gap-4">
    @forelse ($kelas as $item)
      <!-- Ganti <div> jadi <a> dengan route ke detail -->
      <a href="{{ route('kelas.show', $item->id) }}"
         class="block bg-white rounded shadow p-3 hover:shadow-lg transition">
        <div class="h-24 bg-blue-600 rounded mb-2 flex items-center justify-center text-white font-bold">
          {{ strtoupper(substr($item->nama_kelas, 0, 2)) }}
        </div>
        <p class="font-medium">{{ $item->nama_kelas }}</p>
        <p class="text-xs text-gray-500">Kategori: {{ $item->kategori }}</p>
      </a>
    @empty
      <p class="col-span-4 text-center text-gray-500">Belum ada kelas tersedia.</p>
    @endforelse
  </div>
</div>

</main>
  </div>

</body>
</html>