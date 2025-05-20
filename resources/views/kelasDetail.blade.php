<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Kelas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-2xl">
        <h1 class="text-2xl font-bold mb-4">Detail Kelas</h1>
        <p><strong>Nama Kelas:</strong> {{ $kelas->nama_kelas }}</p>
        <p><strong>Kategori:</strong> {{ $kelas->kategori ?? 'Tidak ada' }}</p>

        <a href="{{ route('dashboard.dosen') }}" class="inline-block mt-6 text-blue-600 hover:underline">⬅ Kembali ke Dashboard Dosen</a>
    </div>
</body>
</html>
