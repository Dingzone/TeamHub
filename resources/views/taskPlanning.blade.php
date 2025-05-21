<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning Detail - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            <div class="flex justify-between items-center mb-4">
                <button onclick="toggleSidebar()" class="md:hidden bg-blue-500 text-white px-4 py-2 rounded">☰</button>
                <h2 class="font-bold text-lg">Define Detail</h2>
                <a href="proyekDetail.html" class="bg-gray-500 text-white px-4 py-2 rounded">Back</a>
            </div>

            <!-- Planning Overview -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Define Overview</h3>
                <p><strong>Duration:</strong> 5 days</p>
                <p><strong>Status:</strong> In Progress</p>
            </section>

            <!-- Task Description -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Task Description</h3>
                <p>Pembuatan perencanaan proyek termasuk timeline, pembagian tugas, dan alur kerja.</p>
            </section>

            <!-- Sub Tasks -->
            <section class="mb-6 p-4 bg-white shadow rounded-lg">
                <h3 class="font-semibold text-lg text-gray-600 mb-2">Sub Task Planning</h3>
                <div class="mb-4">
                    <input type="text" id="subTaskInput" class="w-full p-2 border rounded" placeholder="Tambahkan sub task...">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Mulai</label>
                            <input type="datetime-local" id="startTimeInput" class="w-full p-2 border rounded">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Berakhir</label>
                            <input type="datetime-local" id="endTimeInput" class="w-full p-2 border rounded">
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm font-medium text-gray-700">Diberikan kepada (max 3 orang)</label>
                        <div class="flex flex-wrap gap-2 mt-1">
                            <select class="p-2 border rounded">
                                <option value="">Pilih anggota</option>
                                <option value="Fresky">Fresky</option>
                                <option value="john">John</option>
                                <option value="Exaudi">Exaudi</option>
                                <option value="mike">Mike</option>
                                <option value="lisa">Lisa</option>
                            </select>
                            <select class="p-2 border rounded">
                                <option value="">Pilih anggota</option>
                                <option value="Fresky">Fresky</option>
                                <option value="john">John</option>
                                <option value="Exaudi">Exaudi</option>
                                <option value="mike">Mike</option>
                                <option value="lisa">Lisa</option>
                            </select>
                            <select class="p-2 border rounded">
                                <option value="">Pilih anggota</option>
                                <option value="Fresky">Fresky</option>
                                <option value="john">John</option>
                                <option value="Exaudi">Exaudi</option>
                                <option value="mike">Mike</option>
                                <option value="lisa">Lisa</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm font-medium text-gray-700">Prioritas</label>
                        <select id="priorityInput" class="w-full p-2 border rounded">
                            <option value="rendah">Rendah</option>
                            <option value="sedang">Sedang</option>
                            <option value="tinggi">Tinggi</option>
                        </select>
                    </div>
                    <div class="mt-2">
                        <label class="block text-sm font-medium text-gray-700">Lampiran</label>
                        <input type="file" id="fileInput" class="w-full p-2 border rounded">
                    </div>
                    <button onclick="addSubTask()" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">+ Add Sub Task</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">Sub Task</th>
                                <th class="border border-gray-300 px-4 py-2">Mulai</th>
                                <th class="border border-gray-300 px-4 py-2">Berakhir</th>
                                <th class="border border-gray-300 px-4 py-2">Diberikan</th>
                                <th class="border border-gray-300 px-4 py-2">Prioritas</th>
                                <th class="border border-gray-300 px-4 py-2">Lampiran</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="subTaskTable">
                            <!-- Example row -->
                            <tr class="border border-gray-300" id="task1">
                                <td class="border border-gray-300 px-4 py-2">Requirement Gathering</td>
                                <td class="border border-gray-300 px-4 py-2">11/03/2025</td>
                                <td class="border border-gray-300 px-4 py-2">11/06/2025</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <div class="flex flex-col">
                                        <span>Fresky</span>
                                        <span>John</span>
                                    </div>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs">Sedang</span>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="#" class="text-blue-500 hover:underline">
                                        <i class="fas fa-paperclip"></i> dokumen.pdf
                                    </a>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600">
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <div class="flex space-x-2">
                                        <button onclick="showComments('task1')" class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                        <button onclick="deleteTask('task1')" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Another example row -->
                            <tr class="border border-gray-300" id="task2">
                                <td class="border border-gray-300 px-4 py-2">Wireframe Design</td>
                                <td class="border border-gray-300 px-4 py-2">11/07/2025</td>
                                <td class="border border-gray-300 px-4 py-2">11/10/2025</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <div class="flex flex-col">
                                        <span>Exaudi</span>
                                        <span>Lisa</span>
                                    </div>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded-full text-xs">Tinggi</span>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="#" class="text-blue-500 hover:underline">
                                        <i class="fas fa-paperclip"></i> wireframe.png
                                    </a>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" checked>
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <div class="flex space-x-2">
                                        <button onclick="showComments('task2')" class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-comment"></i>
                                        </button>
                                        <button onclick="deleteTask('task2')" class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

    <!-- Comments Modal -->
    <div id="commentsModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-2xl max-h-[80vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Komentar Tugas</h3>
                <button onclick="closeCommentsModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div id="commentsContent">
                <!-- Comments will be loaded here -->
            </div>
            <div class="mt-4">
                <textarea id="newComment" class="w-full p-2 border rounded" rows="3" placeholder="Tulis komentar..."></textarea>
                <button onclick="addComment()" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Kirim Komentar</button>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-semibold">Konfirmasi Hapus</h3>
                <button onclick="closeDeleteModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <p class="mb-4">Apakah Anda yakin ingin menghapus tugas ini?</p>
            <div class="flex justify-end space-x-2">
                <button onclick="closeDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                <button onclick="confirmDelete()" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
            </div>
        </div>
    </div>

    <script>
        // Sample comments data
        const commentsData = {
            'task1': [
                { user: 'Exaudi', text: 'Saya sudah menyelesaikan bagian requirement untuk modul login', time: '2 jam yang lalu' },
                { user: 'John', text: 'Baik, saya akan review terlebih dahulu', time: '1 jam yang lalu' },
                { user: 'Sarah', text: 'Jangan lupa sertakan contoh kasus untuk error handling', time: '30 menit yang lalu' }
            ],
            'task2': [
                { user: 'Lisa', text: 'Wireframe sudah selesai untuk halaman utama', time: '3 jam yang lalu' },
                { user: 'Mike', text: 'Bagus, tapi mungkin perlu penyesuaian spacing', time: '2 jam yang lalu' }
            ]
        };

        let currentTaskId = '';
        let taskToDelete = '';

        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }

        function addSubTask() {
            const taskInput = document.getElementById("subTaskInput");
            const startTimeInput = document.getElementById("startTimeInput");
            const endTimeInput = document.getElementById("endTimeInput");
            const priorityInput = document.getElementById("priorityInput");
            const fileInput = document.getElementById("fileInput");
            const table = document.getElementById("subTaskTable");
            
            if (taskInput.value.trim() !== "" && startTimeInput.value && endTimeInput.value) {
                const row = table.insertRow();
                const taskId = 'task' + (table.rows.length + 1);
                row.id = taskId;
                
                // Format date for display
                const startDate = new Date(startTimeInput.value);
                const endDate = new Date(endTimeInput.value);
                const formattedStart = `${startDate.getDate()}/${startDate.getMonth()+1}/${startDate.getFullYear()}`;
                const formattedEnd = `${endDate.getDate()}/${endDate.getMonth()+1}/${endDate.getFullYear()}`;
                
                // Priority badge
                let priorityClass = '';
                let priorityText = '';
                switch(priorityInput.value) {
                    case 'tinggi':
                        priorityClass = 'bg-red-100 text-red-800';
                        priorityText = 'Tinggi';
                        break;
                    case 'sedang':
                        priorityClass = 'bg-yellow-100 text-yellow-800';
                        priorityText = 'Sedang';
                        break;
                    default:
                        priorityClass = 'bg-green-100 text-green-800';
                        priorityText = 'Rendah';
                }
                
                // File attachment display
                let fileDisplay = 'Tidak ada';
                if (fileInput.files.length > 0) {
                    fileDisplay = `<a href="#" class="text-blue-500 hover:underline">
                        <i class="fas fa-paperclip"></i> ${fileInput.files[0].name}
                    </a>`;
                }
                
                row.innerHTML = `
                    <td class="border border-gray-300 px-4 py-2">${taskInput.value}</td>
                    <td class="border border-gray-300 px-4 py-2">${formattedStart}</td>
                    <td class="border border-gray-300 px-4 py-2">${formattedEnd}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex flex-col">
                            <span>Exaudi</span>
                            <span>John</span>
                        </div>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <span class="px-2 py-1 ${priorityClass} rounded-full text-xs">${priorityText}</span>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">${fileDisplay}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600">
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <div class="flex space-x-2">
                            <button onclick="showComments('${taskId}')" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-comment"></i>
                            </button>
                            <button onclick="deleteTask('${taskId}')" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                `;
                
                // Reset form
                taskInput.value = "";
                startTimeInput.value = "";
                endTimeInput.value = "";
                fileInput.value = "";
            }
        }

        function saveNote() {
            const input = document.getElementById("noteInput");
            const list = document.getElementById("noteList");
            
            if (input.value.trim() !== "") {
                const li = document.createElement("li");
                li.className = "mb-2";
                li.textContent = input.value;
                list.appendChild(li);
                input.value = "";
            }
        }

        function showComments(taskId) {
            currentTaskId = taskId;
            const modal = document.getElementById("commentsModal");
            const content = document.getElementById("commentsContent");
            
            // Load comments
            content.innerHTML = '';
            if (commentsData[taskId]) {
                commentsData[taskId].forEach(comment => {
                    const commentDiv = document.createElement("div");
                    commentDiv.className = "mb-4 pb-4 border-b border-gray-200";
                    commentDiv.innerHTML = `
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="font-semibold">${comment.user}</span>
                                <span class="text-gray-500 text-sm ml-2">${comment.time}</span>
                            </div>
                        </div>
                        <p class="mt-1 text-gray-700">${comment.text}</p>
                    `;
                    content.appendChild(commentDiv);
                });
            } else {
                content.innerHTML = '<p class="text-gray-500">Belum ada komentar</p>';
            }
            
            modal.classList.remove("hidden");
        }

        function closeCommentsModal() {
            document.getElementById("commentsModal").classList.add("hidden");
        }

        function addComment() {
            const commentInput = document.getElementById("newComment");
            const content = document.getElementById("commentsContent");
            
            if (commentInput.value.trim() !== "") {
                // In a real app, this would be sent to the server
                if (!commentsData[currentTaskId]) {
                    commentsData[currentTaskId] = [];
                }
                
                const newComment = {
                    user: 'Anda',
                    text: commentInput.value,
                    time: 'Baru saja'
                };
                
                commentsData[currentTaskId].push(newComment);
                
                // Add to UI
                const commentDiv = document.createElement("div");
                commentDiv.className = "mb-4 pb-4 border-b border-gray-200";
                commentDiv.innerHTML = `
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="font-semibold">${newComment.user}</span>
                            <span class="text-gray-500 text-sm ml-2">${newComment.time}</span>
                        </div>
                    </div>
                    <p class="mt-1 text-gray-700">${newComment.text}</p>
                `;
                content.appendChild(commentDiv);
                
                commentInput.value = "";
            }
        }

        function deleteTask(taskId) {
            taskToDelete = taskId;
            document.getElementById("deleteModal").classList.remove("hidden");
        }

        function closeDeleteModal() {
            document.getElementById("deleteModal").classList.add("hidden");
        }

        function confirmDelete() {
            if (taskToDelete) {
                const row = document.getElementById(taskToDelete);
                if (row) {
                    row.remove();
                }
                closeDeleteModal();
            }
        }
    </script>
</body>
</html>