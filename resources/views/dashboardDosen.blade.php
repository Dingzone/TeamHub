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
      <a href="{{ route('penilaian') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
      <a href="#" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
      <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
    </nav>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6">
    <h1 class="text-3xl font-bold mb-6">Dashboard Dosen</h1>

    @if(session('success'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg mb-6">
    {{ session('success') }}
  </div>
@endif

<!-- Summary Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mb-8">
  <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
    <p class="font-semibold text-gray-600">Jumlah Kelas</p>
    <p class="text-4xl font-extrabold mt-4">{{ $jumlahKelas }}</p>
  </div>
 
  <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
    <p class="font-semibold text-gray-600">Jumlah Mahasiswa</p>
    <p class="text-4xl font-extrabold mt-4">1</p>
  </div>
  <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
    <p class="font-semibold text-gray-600">Jumlah Proyek</p>
    <p class="text-4xl font-extrabold mt-4">{{ $jumlahKelas }}</p>
  </div>
  <div class="bg-white p-6 rounded-2xl shadow-lg text-center">
    <p class="font-semibold text-gray-600">InProgress</p>
    <p class="text-4xl font-extrabold mt-4">{{ $jumlahKelas }}</p>
  </div>
</div>

<!-- Section Tambah Kelas -->
<div class="flex justify-between items-center mb-6">
  <h2 class="text-2xl font-semibold">Project Based Learning</h2>
  <a href="{{ route('dashboard.dosen.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full text-base">
    + Tambah Kelas
  </a>
</div>

<!-- Daftar Kelas -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
  @forelse($kelasList as $kelas)
  <div class="relative bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition duration-200">

    <!-- Tombol Hapus -->
    <form action="{{ route('dashboard.dosen.destroy', $kelas->id) }}" method="POST" class="absolute top-3 right-3">
      @csrf
      @method('DELETE')
      <button type="submit" onclick="return confirm('Yakin menghapus kelas {{ addslashes($kelas->nama_kelas) }}?')" class="text-red-500 hover:text-red-700 text-xl">
        🗑
      </button>
    </form>

    <!-- Konten Kartu -->
    <a href="{{ route('kelas.show', $kelas->id) }}" class="block text-center">
      <div class="h-32 w-full bg-blue-600 rounded-xl mb-4 flex items-center justify-center text-white text-2xl font-bold">
        {{ strtoupper(substr($kelas->kategori ?? 'PBL', 0, 5)) }}
      </div>
      <p class="font-semibold text-lg text-gray-800">{{ $kelas->nama_kelas }}</p>
      <p class="text-sm text-gray-500 mt-1">Kategori: {{ $kelas->kategori ?? 'Tanpa Kategori' }}</p>
    </a>

  </div>
  @empty
    <p class="text-gray-500">Tidak ada kelas tersedia.</p>
  @endforelse
</div>
    </div>
  </main>
</body>
</html>