<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PBL - {{ $kategori ?? 'UI/UX' }} | CollabThink</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .project-card {
      transition: all 0.2s ease;
      cursor: pointer;
    }
    .project-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
      <h2 class="text-2xl font-bold mb-4">PBL - {{ $kategori ?? 'UI/UX' }}</h2>
      
      <!-- Pengumuman Section -->
      <section class="mb-6">
        <a href="{{ route('pengumuman') }}" class="flex items-center space-x-2 text-gray-800 hover:bg-gray-200 rounded p-2">
            📢 Pengumuman
        </a>
      </section>

      <!-- Add Proyek Button -->
      <section class="mb-6">
        <button onclick="openModal()" class="flex items-center space-x-2 text-gray-800 hover:bg-gray-200 rounded p-2">
          <i class="fas fa-plus"></i>
          <span>Tambah Proyek</span>
        </button>
      </section>

      <!-- Daftar Proyek -->
      <section>
        <h3 class="text-lg font-semibold mb-4">Daftar Proyek</h3>
        <div id="projectList" class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Contoh Proyek 1 -->
          <div class="project-card bg-white p-4 rounded shadow relative" onclick="navigateToAddTask('Pelaporan Bencana')">
            <h4 class="font-medium">Pelaporan Bencana</h4>
            <div class="text-sm text-gray-600 mt-2">
              <p><i class="far fa-calendar-alt mr-1"></i> Mulai: 2025-05-23</p>
              <p><i class="far fa-calendar-check mr-1"></i> Selesai: 2025-05-21</p>
              <p><i class="fas fa-users mr-1"></i> Anggota: Fresky,John,Exaudi,Mike,Lisa</p>
            </div>
            <div class="absolute top-2 right-2 flex space-x-2" onclick="event.stopPropagation()">
              <button class="text-black hover:text-blue-600" onclick="openEditPopup(this)" title="Edit">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-500 hover:text-red-700" onclick="confirmDelete(this)" title="Hapus">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
          
          <!-- Contoh Proyek 2 -->
          <div class="project-card bg-white p-4 rounded shadow relative" onclick="navigateToAddTask('Proyek Contoh')">
            <h4 class="font-medium">Proyek Contoh</h4>
            <div class="text-sm text-gray-600 mt-2">
              <p><i class="far fa-calendar-alt mr-1"></i> Mulai: 2025-06-01</p>
              <p><i class="far fa-calendar-check mr-1"></i> Selesai: 2025-06-30</p>
              <p><i class="fas fa-users mr-1"></i> Anggota: user1, user2</p>
            </div>
            <div class="absolute top-2 right-2 flex space-x-2" onclick="event.stopPropagation()">
              <button class="text-black hover:text-blue-600" onclick="openEditPopup(this)" title="Edit">
                <i class="fas fa-edit"></i>
              </button>
              <button class="text-red-500 hover:text-red-700" onclick="confirmDelete(this)" title="Hapus">
                <i class="fas fa-trash"></i>
              </button>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>

  <!-- Modal Tambah Proyek -->
  <div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-md">
      <h3 class="text-xl font-semibold mb-4">Tambah Proyek</h3>
      <form id="projectForm" onsubmit="addProject(event)">
        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Nama Proyek</label>
            <input id="projectName" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Mulai</label>
              <input id="startDate" type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Selesai</label>
              <input id="endDate" type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Anggota</label>
            <input id="members" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3" placeholder="Pisahkan dengan koma">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"></textarea>
          </div>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
          <button type="button" onclick="closeModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            Batal
          </button>
          <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
            Tambah Proyek
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Edit Proyek -->
  <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-md">
      <h3 class="text-xl font-semibold mb-4">Edit Proyek</h3>
      <form id="editProjectForm" onsubmit="saveEditedProject(event)">
        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Nama Proyek</label>
            <input id="editProjectName" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Mulai</label>
              <input id="editStartDate" type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Selesai</label>
              <input id="editEndDate" type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Anggota</label>
            <input id="editMembers" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3" placeholder="Pisahkan dengan koma">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="editDescription" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"></textarea>
          </div>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
          <button type="button" onclick="closeEditModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            Batal
          </button>
          <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Konfirmasi Hapus -->
  <div id="deleteConfirmModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-md text-center">
      <p class="text-lg font-semibold text-gray-800 mb-4">Apakah Anda yakin ingin menghapus proyek ini?</p>
      <div class="flex justify-center space-x-4">
        <button onclick="closeDeleteConfirmModal()" class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Batal</button>
        <button id="confirmDeleteBtn" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
      </div>
    </div>
  </div>

  <script>
    // Ambil kategori dari URL
    const urlParams = new URLSearchParams(window.location.search);
    const kategori = urlParams.get('kategori') || 'UI/UX';
    
    // Update title jika diperlukan
    document.title = `PBL - ${kategori} | CollabThink`;
    document.querySelector('h2').textContent = `PBL - ${kategori}`;

    let editingCard = null;
    let deleteCard = null;

    // Fungsi untuk navigasi ke halaman addTask dengan nama proyek
    function navigateToAddTask(projectName) {
      window.location.href = "{{ route('addTask', '') }}/" + encodeURIComponent(projectName);
    }

    function openModal() {
      document.getElementById('modal').classList.remove('hidden');
    }
    
    function closeModal() {
      document.getElementById('modal').classList.add('hidden');
      document.getElementById('projectForm').reset();
    }
    
    function openEditPopup(button) {
      editingCard = button.closest('.project-card');
      const name = editingCard.querySelector('h4').innerText;
      const start = editingCard.querySelectorAll('p')[0].innerText.replace(/Mulai: /, '');
      const end = editingCard.querySelectorAll('p')[1].innerText.replace(/Selesai: /, '');
      const members = editingCard.querySelectorAll('p')[2].innerText.replace(/Anggota: /, '');
      
      document.getElementById('editProjectName').value = name;
      document.getElementById('editStartDate').value = start;
      document.getElementById('editEndDate').value = end;
      document.getElementById('editMembers').value = members;
      
      document.getElementById('editModal').classList.remove('hidden');
    }
    
    function closeEditModal() {
      document.getElementById('editModal').classList.add('hidden');
      document.getElementById('editProjectForm').reset();
    }

    function saveEditedProject(event) {
      event.preventDefault();
      
      const name = document.getElementById('editProjectName').value;
      const start = document.getElementById('editStartDate').value;
      const end = document.getElementById('editEndDate').value;
      const members = document.getElementById('editMembers').value;
      
      editingCard.querySelector('h4').innerText = name;
      editingCard.querySelectorAll('p')[0].innerHTML = `<i class="far fa-calendar-alt mr-1"></i> Mulai: ${start}`;
      editingCard.querySelectorAll('p')[1].innerHTML = `<i class="far fa-calendar-check mr-1"></i> Selesai: ${end}`;
      editingCard.querySelectorAll('p')[2].innerHTML = `<i class="fas fa-users mr-1"></i> Anggota: ${members}`;
      
      // Update onclick attribute for navigation
      editingCard.onclick = function() { navigateToAddTask(name); };
      
      closeEditModal();
    }

    function confirmDelete(button) {
      deleteCard = button.closest('.project-card');
      document.getElementById('deleteConfirmModal').classList.remove('hidden');
      document.getElementById('confirmDeleteBtn').onclick = deleteProject;
    }
    
    function closeDeleteConfirmModal() {
      document.getElementById('deleteConfirmModal').classList.add('hidden');
    }
    
    function deleteProject() {
      deleteCard.remove();
      closeDeleteConfirmModal();
    }
    
    function addProject(event) {
      event.preventDefault();
      
      const name = document.getElementById('projectName').value;
      const start = document.getElementById('startDate').value;
      const end = document.getElementById('endDate').value;
      const members = document.getElementById('members').value;
      
      const card = document.createElement('div');
      card.className = "project-card bg-white p-4 rounded shadow relative";
      card.onclick = function() { navigateToAddTask(name); };
      card.innerHTML = `
        <h4 class="font-medium">${name}</h4>
        <div class="text-sm text-gray-600 mt-2">
          <p><i class="far fa-calendar-alt mr-1"></i> Mulai: ${start}</p>
          <p><i class="far fa-calendar-check mr-1"></i> Selesai: ${end}</p>
          <p><i class="fas fa-users mr-1"></i> Anggota: ${members}</p>
        </div>
        <div class="absolute top-2 right-2 flex space-x-2" onclick="event.stopPropagation()">
          <button class="text-black hover:text-blue-600" onclick="openEditPopup(this)" title="Edit">
            <i class="fas fa-edit"></i>
          </button>
          <button class="text-red-500 hover:text-red-700" onclick="confirmDelete(this)" title="Hapus">
            <i class="fas fa-trash"></i>
          </button>
        </div>
      `;
      
      document.getElementById('projectList').appendChild(card);
      closeModal();
    }
    
    // Close modal when clicking outside
    window.onclick = function(event) {
      const modal = document.getElementById('modal');
      const editModal = document.getElementById('editModal');
      const deleteModal = document.getElementById('deleteConfirmModal');
      
      if (event.target === modal) {
        closeModal();
      }
      if (event.target === editModal) {
        closeEditModal();
      }
      if (event.target === deleteModal) {
        closeDeleteConfirmModal();
      }
    }
  </script>
</body>
</html>