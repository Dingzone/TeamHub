<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Dosen</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

  <!-- Sidebar -->
  <aside id="sidebar" class="w-64 bg-white shadow-md p-4 hidden md:block">
    <h1 class="text-xl font-bold mb-6">CollabThink</h1>
    <nav class="space-y-4">
      <a href="#" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
      <a href="#" class="block p-2 hover:bg-gray-200 rounded">📁 Proyek</a>
      <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
      <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Daftar Tim</a>
      <a href="#" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
      <a href="#" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
      <a href="#" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    <h1 class="text-3xl font-bold mb-6">Dashboard Dosen</h1>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
      {{ session('success') }}
    </div>
    @endif

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-6">
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Kelas</p>
        <p class="text-3xl font-bold mt-2">{{ $jumlahKelas }}</p>
      </div>
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Mahasiswa</p>
        <p class="text-3xl font-bold mt-2">–</p>
      </div>
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Proyek</p>
        <p class="text-3xl font-bold mt-2">–</p>
      </div>
      <div class="bg-white p-4 rounded shadow text-center">
        <p class="font-semibold text-gray-600">Jumlah Tugas</p>
        <p class="text-3xl font-bold mt-2">–</p>
      </div>
    </div>

    <!-- Project Based Learning Section -->
    <div class="flex justify-between items-center mb-3">
      <h2 class="text-xl font-semibold">Project Based Learning</h2>
      <a href="{{ route('dashboard.dosen.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        + Tambah Kelas
      </a>
    </div>

    <!-- Kelas List -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
      @forelse ($kelasList as $kelas)
      <a href="{{ route('kelas.show', $kelas->id) }}" class="block bg-white rounded shadow p-3 hover:shadow-lg transition">
        <div class="h-24 bg-blue-600 rounded mb-2 flex items-center justify-center text-white font-bold">
          {{ strtoupper(substr($kelas->kategori ?? 'PBL', 0, 5)) }}
        </div>
        <p class="font-medium">{{ $kelas->nama_kelas }}</p>
        <p class="text-xs text-gray-500">PBL - {{ $kelas->kategori ?? 'Tanpa Kategori' }}</p>
      </a>
      @empty
      <p>Tidak ada kelas tersedia.</p>
      @endforelse
    </div>
  </main>

</body>
</html>
