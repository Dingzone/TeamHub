<!DOCTYPE html>

<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
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
    <h2 class="text-2xl font-bold">Dashboard</h2>
    <div class="flex items-center space-x-4">
      <span class="text-gray-600">Moni Roy</span>
      <span class="text-sm text-gray-400">Admin</span>
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

  <!-- Proyek Berbasis -->
  <div id="projectBasedLearning" class="mb-6">
  <div class="flex justify-between items-center mb-2">
    <h3 class="text-lg font-semibold">Pembelajaran Berbasis Proyek</h3>
    <a href="{{ route('masukpbl') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
      Masuk PBL +
    </a>
  </div>
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



  <!-- Tugas Diberikan -->
  <div id="assignedTasks" class="mb-6">
    <h3 class="text-lg font-semibold mb-2">Tugas Diberikan Kepada Saya (1)</h3>
    <div class="overflow-x-auto">
      <table class="min-w-full bg-white rounded shadow text-left">
        <thead class="bg-gray-200 text-gray-600">
          <tr>
            <th class="px-4 py-2">Sub-Tugasas</th>
            <th class="px-4 py-2">Mulai</th>
            <th class="px-4 py-2">Berakhir</th>
            <th class="px-4 py-2">Diberikan</th>
            <th class="px-4 py-2">Prioritas</th>
            <th class="px-4 py-2">Status</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t">
            <td class="px-4 py-2">Requirement Gathering</td>
            <td class="px-4 py-2">11/03/2025</td>
            <td class="px-4 py-2">11/06/2025</td>
            <td class="px-4 py-2">
              <div class="flex space-x-2">
                <span class="bg-blue-500 text-white px-2 py-1 rounded-full text-xs">Y</span>
                <span class="bg-purple-500 text-white px-2 py-1 rounded-full text-xs">DN</span>
              </div>
            </td>
            <td class="px-4 py-2">🔽</td>
            <td class="px-4 py-2">
              <div class="flex space-x-2">
                <button onclick="handleDeleteTask()" class="text-red-500 hover:text-red-700" title="Hapus">🗑</button>
                <button onclick="handleEditTask()" class="text-yellow-500 hover:text-yellow-700" title="Edit">✏️</button>
                <button onclick="handleUploadAttachment()" class="text-blue-500 hover:text-blue-700" title="Upload Lampiran">📎</button>
                <button onclick="handleCommentTask()" class="text-green-500 hover:text-green-700" title="Komentar">📤</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Komentar -->
  <div id="comments">
    <h3 class="text-lg font-semibold mb-2">Komentar Diberikan Kepada Saya (1)</h3>
    <div class="bg-white p-4 rounded shadow flex items-start space-x-4">
      <div class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center font-bold">Y</div>
      <div>
        <p class="font-semibold">Hasil Wawancara Kurang Lengkap</p>
        <p class="text-sm text-gray-500">Requirement Gathering</p>
      </div>
    </div>
  </div>
</main>
  </div>

  <!-- Dummy JavaScript Actions -->
  <script>
    function handleDeleteTask() {
      alert("Tugas akan dihapus.");
    }

    function handleEditTask() {
      alert("Form edit tugas akan dibuka.");
    }

    function handleUploadAttachment() {
      alert("Fungsi upload akan dijalankan.");
    }

    function handleCommentTask() {
      alert("Buka komentar atau kirim laporan.");
    }
  </script>

</body>
</html>