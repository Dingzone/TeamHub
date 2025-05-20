<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Kelas PBL</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Tambah Kelas PBL</h2>
    <form method="POST" action="{{ route('kelas.store') }}">
      @csrf
      <div class="mb-4">
        <label class="block mb-1 font-medium">Nama Kelas</label>
        <input type="text" name="nama_kelas" class="w-full border border-gray-300 p-2 rounded" required>
      </div>
      <div class="mb-4">
        <label class="block mb-1 font-medium">Kategori</label>
        <input type="text" name="kategori" class="w-full border border-gray-300 p-2 rounded">
      </div>
      <div class="flex justify-between items-center">
        <a href="{{ route('dashboard.dosen') }}" class="text-blue-600 hover:underline">Kembali ke Dashboard</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>
</body>
</html>
