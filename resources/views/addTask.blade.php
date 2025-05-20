<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $projectName ?? 'Detail Proyek' }} | CollabThink</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .task-card {
      transition: all 0.2s ease;
      cursor: pointer;
    }
    .task-card:hover {
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
      <h2 class="text-2xl font-bold mb-4">Project Details: {{ $projectName ?? 'Sistem Informasi Manajemen Puskesmas' }}</h2>
      
      <!-- Project Details -->
      <section class="bg-white p-6 rounded-lg shadow-md mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <p class="mb-2"><span class="font-semibold">Durasi:</span> {{ $startDate ?? '11/03/2025' }} - {{ $endDate ?? '11/06/2025' }}</p>
            <p class="mb-2"><span class="font-semibold">Anggota Tim:</span> {{ $members ?? 'Fresky,John,Exaudi,Mike,Lisa' }}</p>
            <p class="mb-2"><span class="font-semibold">Status:</span> <span class="text-blue-600">{{ $status ?? 'In Progress' }}</span></p>
          </div>
          <div>
            <p class="mb-2"><span class="font-semibold">Deskripsi:</span></p>
            <p class="text-gray-700">{{ $description ?? 'Sistem Informasi Manajemen Bencana (SIMBENCANA) adalah sebuah aplikasi berbasis web yang dirancang untuk mendukung operasional penanganan bencana, mulai dari pendataan korban, manajemen logistik bantuan, hingga pemantauan dampak bencana.' }}</p>
          </div>
        </div>
      </section>
      
      <!-- Task Section with Add Task Button -->
      <section class="mb-6 flex justify-between items-center">
        <h3 class="text-xl font-semibold">Deskripsi Tugas {{ $projectName ?? 'Empathize' }}</h3>
        <button onclick="openTaskModal()" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 flex items-center">
          <i class="fas fa-plus mr-2"></i> Tambah Tugas
        </button>
      </section>

      <!-- Task Cards -->
      <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Empathize Card -->
        <div class="task-card bg-white p-4 rounded shadow" onclick="redirectToTaskPlanning('Empathize')">
          <div class="flex justify-between items-start mb-2">
            <h4 class="font-semibold">Empathize</h4>
            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">In Progress</span>
          </div>
          <p class="text-sm text-gray-600">Mulai: 11/03/2025 | Deadline: 11/05/2025</p>
          <div class="mt-3 flex justify-end">
            <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="openEditTaskModal(event, 'Empathize')">
              <i class="fas fa-edit"></i>
            </button>
          </div>
        </div>

        <!-- Define Card -->
        <div class="task-card bg-white p-4 rounded shadow" onclick="redirectToTaskPlanning('Define')">
          <div class="flex justify-between items-start mb-2">
            <h4 class="font-semibold">Define</h4>
            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">In Progress</span>
          </div>
          <p class="text-sm text-gray-600">Mulai: 11/03/2025 | Deadline: 11/05/2025</p>
          <div class="mt-3 flex justify-end">
            <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="openEditTaskModal(event, 'Define')">
              <i class="fas fa-edit"></i>
            </button>
          </div>
        </div>

        <!-- Ideate Card -->
        <div class="task-card bg-white p-4 rounded shadow" onclick="redirectToTaskPlanning('Ideate')">
          <div class="flex justify-between items-start mb-2">
            <h4 class="font-semibold">Ideate</h4>
            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">In Progress</span>
          </div>
          <p class="text-sm text-gray-600">Mulai: 11/03/2025 | Deadline: 11/05/2025</p>
          <div class="mt-3 flex justify-end">
            <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="openEditTaskModal(event, 'Ideate')">
              <i class="fas fa-edit"></i>
            </button>
          </div>
        </div>

        <!-- Prototype Card -->
        <div class="task-card bg-white p-4 rounded shadow" onclick="redirectToTaskPlanning('Prototype')">
          <div class="flex justify-between items-start mb-2">
            <h4 class="font-semibold">Prototype</h4>
            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">In Progress</span>
          </div>
          <p class="text-sm text-gray-600">Mulai: 11/03/2025 | Deadline: 11/05/2025</p>
          <div class="mt-3 flex justify-end">
            <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="openEditTaskModal(event, 'Prototype')">
              <i class="fas fa-edit"></i>
            </button>
          </div>
        </div>

        <!-- Test Card -->
        <div class="task-card bg-white p-4 rounded shadow" onclick="redirectToTaskPlanning('Test')">
          <div class="flex justify-between items-start mb-2">
            <h4 class="font-semibold">Test</h4>
            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">In Progress</span>
          </div>
          <p class="text-sm text-gray-600">Mulai: 11/03/2025 | Deadline: 11/05/2025</p>
          <div class="mt-3 flex justify-end">
            <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="openEditTaskModal(event, 'Test')">
              <i class="fas fa-edit"></i>
            </button>
          </div>
        </div>
      </section>
    </main>
  </div>

  <!-- Modal Tambah Tugas -->
  <div id="taskModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-md">
      <h3 class="text-xl font-semibold mb-4">Tambah Tugas</h3>
      <form id="taskForm" onsubmit="addTask(event)">
        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Nama Tugas</label>
            <input id="taskName" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Mulai</label>
              <input id="taskStartDate" type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Deadline</label>
              <input id="taskEndDate" type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select id="taskStatus" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
              <option value="Not Started">Not Started</option>
              <option value="In Progress">In Progress</option>
              <option value="Completed">Completed</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi Tugas</label>
            <textarea id="taskDescription" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"></textarea>
          </div>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
          <button type="button" onclick="closeTaskModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            Batal
          </button>
          <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
            Tambah Tugas
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Edit Tugas -->
  <div id="editTaskModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg w-full max-w-md">
      <h3 class="text-xl font-semibold mb-4">Edit Tugas</h3>
      <form id="editTaskForm" onsubmit="saveEditedTask(event)">
        <div class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700">Nama Tugas</label>
            <input id="editTaskName" type="text" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Mulai</label>
              <input id="editTaskStartDate" type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Deadline</label>
              <input id="editTaskEndDate" type="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
            </div>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Status</label>
            <select id="editTaskStatus" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3">
              <option value="Not Started">Not Started</option>
              <option value="In Progress">In Progress</option>
              <option value="Completed">Completed</option>
            </select>
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-700">Deskripsi Tugas</label>
            <textarea id="editTaskDescription" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3"></textarea>
          </div>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
          <button type="button" onclick="closeEditTaskModal()" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            Batal
          </button>
          <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // Get project name from URL path or route parameters
    const pathParts = window.location.pathname.split('/');
    const projectName = pathParts[pathParts.length - 1] !== 'addTask' 
                       ? decodeURIComponent(pathParts[pathParts.length - 1]) 
                       : 'Sistem Informasi Manajemen Puskesmas';
    
    // Update title and heading with project name
    document.title = `${projectName} | CollabThink`;
    
    // Variables for editing
    let editingTask = null;
    
    // Function to redirect to task planning page with task name
    function redirectToTaskPlanning(taskName) {
      window.location.href = `/task-planning/${encodeURIComponent(taskName)}`;
    }
    
    // Prevent event bubbling for edit buttons
    function openEditTaskModal(event, taskName) {
      event.stopPropagation();
      editingTask = taskName;
      
      // Fill form with task data
      document.getElementById('editTaskName').value = taskName;
      document.getElementById('editTaskStartDate').value = '2025-03-11'; // Example date
      document.getElementById('editTaskEndDate').value = '2025-05-11'; // Example date
      document.getElementById('editTaskStatus').value = 'In Progress';
      document.getElementById('editTaskDescription').value = `Description for ${taskName} task`;
      
      document.getElementById('editTaskModal').classList.remove('hidden');
    }
    
    function openTaskModal() {
      document.getElementById('taskModal').classList.remove('hidden');
      // Set default dates
      const today = new Date().toISOString().split('T')[0];
      document.getElementById('taskStartDate').value = today;
      
      // Set default end date (today + 7 days)
      const nextWeek = new Date();
      nextWeek.setDate(nextWeek.getDate() + 7);
      document.getElementById('taskEndDate').value = nextWeek.toISOString().split('T')[0];
    }
    
    function closeTaskModal() {
      document.getElementById('taskModal').classList.add('hidden');
      document.getElementById('taskForm').reset();
    }
    
    function closeEditTaskModal() {
      document.getElementById('editTaskModal').classList.add('hidden');
      document.getElementById('editTaskForm').reset();
    }
    
    function addTask(event) {
      event.preventDefault();
      
      const name = document.getElementById('taskName').value;
      const start = document.getElementById('taskStartDate').value;
      const end = document.getElementById('taskEndDate').value;
      const status = document.getElementById('taskStatus').value;
      
      // Format dates for display
      const startFormatted = formatDate(start);
      const endFormatted = formatDate(end);
      
      // Create new task card
      const taskCard = document.createElement('div');
      taskCard.className = "task-card bg-white p-4 rounded shadow";
      taskCard.setAttribute('onclick', `redirectToTaskPlanning('${name}')`);
      taskCard.innerHTML = `
        <div class="flex justify-between items-start mb-2">
          <h4 class="font-semibold">${name}</h4>
          <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">${status}</span>
        </div>
        <p class="text-sm text-gray-600">Mulai: ${startFormatted} | Deadline: ${endFormatted}</p>
        <div class="mt-3 flex justify-end">
          <button class="text-blue-500 hover:text-blue-700 mr-2" onclick="openEditTaskModal(event, '${name}')">
            <i class="fas fa-edit"></i>
          </button>
        </div>
      `;
      
      // Add to task section
      document.querySelector('section.grid').appendChild(taskCard);
      closeTaskModal();
    }
    
    function saveEditedTask(event) {
      event.preventDefault();
      
      const name = document.getElementById('editTaskName').value;
      const start = document.getElementById('editTaskStartDate').value;
      const end = document.getElementById('editTaskEndDate').value;
      const status = document.getElementById('editTaskStatus').value;
      
      // Find and update task card
      const taskCards = document.querySelectorAll('.task-card');
      for (let card of taskCards) {
        const taskTitle = card.querySelector('h4').innerText;
        if (taskTitle === editingTask) {
          // Update task details
          card.querySelector('h4').innerText = name;
          card.querySelector('span').innerText = status;
          
          // Format dates for display
          const startFormatted = formatDate(start);
          const endFormatted = formatDate(end);
          card.querySelector('p').innerHTML = `Mulai: ${startFormatted} | Deadline: ${endFormatted}`;
          
          // Update onclick attribute for the card
          card.setAttribute('onclick', `redirectToTaskPlanning('${name}')`);
          
          // Update edit button onclick
          const editButton = card.querySelector('button');
          editButton.setAttribute('onclick', `openEditTaskModal(event, '${name}')`);
          break;
        }
      }
      
      closeEditTaskModal();
    }
    
    // Format date from YYYY-MM-DD to DD/MM/YYYY
    function formatDate(dateString) {
      if (!dateString) return '';
      const parts = dateString.split('-');
      if (parts.length !== 3) return dateString;
      return `${parts[1]}/${parts[2]}/${parts[0]}`;
    }
    
    // Close modals when clicking outside
    window.onclick = function(event) {
      const taskModal = document.getElementById('taskModal');
      const editTaskModal = document.getElementById('editTaskModal');
      
      if (event.target === taskModal) {
        closeTaskModal();
      }
      if (event.target === editTaskModal) {
        closeEditTaskModal();
      }
    }
  </script>
</body>
</html>