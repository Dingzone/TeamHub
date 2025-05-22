<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('hidden');
      }
    </script>
</head>
<body class="bg-gray-100 font-sans flex min-h-screen">

    <!-- Sidebar -->
    <aside id="sidebar" class="w-64 bg-white shadow-md p-6 hidden md:block">
        <h1 class="text-xl font-bold mb-8">CollabThink</h1>
        <nav class="space-y-4">
            <a href="#" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
            <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
            <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Tugas & Deadline</a>
            <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Forum</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 p-8 flex flex-col">
        <!-- Mobile header -->
        <header class="md:hidden flex items-center mb-6">
          <button onclick="toggleSidebar()" class="mr-4 text-xl">☰</button>
          <h1 class="text-2xl font-bold">Penilaian Proyek</h1>
        </header>

        <div class="hidden md:flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold">Penilaian Proyek</h1>
        </div>

        <!-- Daftar Proyek yang akan dinilai -->
        <div class="bg-white shadow-md p-6 rounded-lg mb-6">
            <h2 class="text-lg font-bold mb-4">Daftar Proyek</h2>
            <ul id="projectList" class="space-y-3">
                <!-- Konten akan diisi oleh JS -->
            </ul>
        </div>

        <!-- Form Penilaian -->
        <div class="bg-white shadow-md p-6 rounded-lg mb-6">
            <h2 class="text-lg font-bold mb-4">Form Penilaian</h2>
            <form id="penilaianForm">
                <div class="mb-4">
                    <label for="project" class="block text-gray-700 mb-1">Pilih Proyek</label>
                    <select id="project" name="project" class="w-full p-2 border rounded" required>
                        <!-- Options diisi via JS -->
                    </select>
                </div>
                <div class="mb-4">
                    <label for="score" class="block text-gray-700 mb-1">Nilai (1 - 100)</label>
                    <input id="score" name="score" type="number" class="w-full p-2 border rounded" min="1" max="100" required>
                </div>
                <div class="mb-4">
                    <label for="comment" class="block text-gray-700 mb-1">Komentar</label>
                    <textarea id="comment" name="comment" class="w-full p-2 border rounded" rows="3"></textarea>
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded w-full">Simpan Penilaian</button>
            </form>
        </div>

        <!-- Riwayat Penilaian -->
        <div class="bg-white shadow-md p-6 rounded-lg">
            <h2 class="text-lg font-bold mb-4">Riwayat Penilaian</h2>
            <div id="riwayatContainer" class="space-y-4 text-gray-700">
                <!-- Riwayat akan diisi via JS -->
            </div>
        </div>
    </div>

    <script>
      const projects = [
        { id: 1, name: 'Proyek 1 - Sistem Manajemen Bencana' },
        { id: 2, name: 'Proyek 2 - Aplikasi E-Learning' },
        { id: 3, name: 'Proyek 3 - Sistem Keuangan Kampus' }
      ];

      const projectListEl = document.getElementById('projectList');
      const projectSelect = document.getElementById('project');
      const riwayatContainer = document.getElementById('riwayatContainer');

      function getStored() {
        return JSON.parse(localStorage.getItem('penilaian')) || [];
      }

      function saveStored(arr) {
        localStorage.setItem('penilaian', JSON.stringify(arr));
      }

      function renderProjectList() {
        projectListEl.innerHTML = '';
        const stored = getStored();
        projects.forEach(proj => {
          const entries = stored.filter(p => p.projectId === proj.id);
          const last = entries.length ? entries[entries.length - 1] : null;
          const li = document.createElement('li');
          li.className = 'p-4 bg-gray-50 rounded-lg flex justify-between items-center';
          li.innerHTML = `
            <div>
              <span>${proj.name}</span>
              ${ last ? `<span class="block text-sm text-gray-500">Nilai terakhir: ${last.score}</span>` : '' }
            </div>
            <button data-id="${proj.id}" class="nilaiBtn bg-blue-500 text-white px-4 py-2 rounded">Nilai</button>
          `;
          projectListEl.appendChild(li);
        });
        attachNilaiListeners();
      }

      function renderOptions() {
        projectSelect.innerHTML = '';
        projects.forEach(proj => {
          const opt = document.createElement('option');
          opt.value = proj.id;
          opt.textContent = proj.name;
          projectSelect.appendChild(opt);
        });
      }

      function renderRiwayat() {
        riwayatContainer.innerHTML = '';
        const stored = getStored();
        const filtered = stored.filter((_, idx) => _ && _.projectId === +projectSelect.value);
        if (filtered.length === 0) {
          riwayatContainer.innerHTML = '<p class="text-gray-500">Belum ada penilaian untuk proyek ini.</p>';
          return;
        }
        // iterate stored to preserve indexes
        stored.forEach((entry, index) => {
          if (entry.projectId !== +projectSelect.value) return;
          const div = document.createElement('div');
          div.className = 'p-4 bg-gray-50 rounded-lg flex justify-between items-start';
          div.innerHTML = `
            <div>
              <p><strong>Nilai:</strong> ${entry.score}</p>
              <p><strong>Komentar:</strong> ${entry.comment || '-'}</p>
              <p class="text-sm text-gray-500">${new Date(entry.date).toLocaleString('id-ID')}</p>
            </div>
            <button data-index="${index}" class="deleteBtn text-red-500 hover:text-red-700">Hapus</button>
          `;
          riwayatContainer.appendChild(div);
        });
        attachDeleteListeners();
      }

      function attachNilaiListeners() {
        document.querySelectorAll('.nilaiBtn').forEach(btn => {
          btn.onclick = () => {
            const pid = +btn.getAttribute('data-id');
            projectSelect.value = pid;
            document.getElementById('score').focus();
            window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            renderRiwayat();
          };
        });
      }

      function attachDeleteListeners() {
        document.querySelectorAll('.deleteBtn').forEach(btn => {
          btn.onclick = () => {
            const idx = +btn.getAttribute('data-index');
            const stored = getStored();
            stored.splice(idx, 1);
            saveStored(stored);
            renderProjectList();
            renderRiwayat();
          };
        });
      }

      // Initialize
      renderProjectList();
      renderOptions();
      projectSelect.value = projects[0].id;
      renderRiwayat();

      document.getElementById('penilaianForm').addEventListener('submit', e => {
        e.preventDefault();
        const id = +projectSelect.value;
        const score = +document.getElementById('score').value;
        const comment = document.getElementById('comment').value.trim();

        const stored = getStored();
        stored.push({ projectId: id, score, comment, date: new Date().toISOString() });
        saveStored(stored);

        e.target.reset();
        renderProjectList();
        renderRiwayat();
      });
    </script>
</body>
</html>
