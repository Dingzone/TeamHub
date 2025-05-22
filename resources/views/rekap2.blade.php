<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekap Nilai - CollabThink</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }
        
        function showAddNilaiPopup(studentName) {
            document.getElementById('addStudentName').value = studentName;
            document.getElementById('addStudentDisplay').textContent = studentName;
            document.getElementById('addNilaiPopup').classList.remove('hidden');
        }
        
        function showEditNilaiPopup(studentName, currentScore) {
            document.getElementById('editStudentName').value = studentName;
            document.getElementById('editStudentDisplay').textContent = studentName;
            document.getElementById('editNilaiInput').value = currentScore;
            document.getElementById('editNilaiPopup').classList.remove('hidden');
        }
        
        function closePopup() {
            document.getElementById('addNilaiPopup').classList.add('hidden');
            document.getElementById('editNilaiPopup').classList.add('hidden');
            document.getElementById('deleteConfirmPopup').classList.add('hidden');
        }
        
        function showDeleteConfirm(studentName) {
            document.getElementById('deleteStudentName').value = studentName;
            document.getElementById('deleteStudentDisplay').textContent = studentName;
            document.getElementById('deleteConfirmPopup').classList.remove('hidden');
        }
        
        function showSuccessMessage(message) {
            const successMsg = document.getElementById('successMessage');
            document.getElementById('successText').textContent = message || 'Nilai Berhasil Ditambahkan';
            successMsg.classList.remove('hidden');
            setTimeout(() => {
                successMsg.classList.add('hidden');
            }, 3000);
        }
        
        // Student data with scores
        let studentScores = {
            'Fresky': 90,
            'John': null,
            'Exaudi': null,
            'Mike': null,
            'Lisa': null
        };
        
        function handleAddNilai(event) {
            event.preventDefault();
            const studentName = document.getElementById('addStudentName').value;
            const nilai = document.getElementById('addNilaiInput').value;
            
            studentScores[studentName] = parseInt(nilai);
            updateStudentRow(studentName);
            closePopup();
            showSuccessMessage('Nilai Berhasil Ditambahkan');
            return false;
        }
        
        function handleEditNilai(event) {
            event.preventDefault();
            const studentName = document.getElementById('editStudentName').value;
            const nilai = document.getElementById('editNilaiInput').value;
            
            studentScores[studentName] = parseInt(nilai);
            updateStudentRow(studentName);
            closePopup();
            showSuccessMessage('Nilai Berhasil Diperbarui');
            return false;
        }
        
        function handleDeleteNilai(event) {
            event.preventDefault();
            const studentName = document.getElementById('deleteStudentName').value;
            
            studentScores[studentName] = null;
            updateStudentRow(studentName);
            closePopup();
            showSuccessMessage('Nilai Berhasil Dihapus');
            return false;
        }
        
        function updateStudentRow(studentName) {
            const score = studentScores[studentName];
            const rowId = studentName.replace(/\s+/g, '_').replace(/\./g, '_');
            const scoreCell = document.getElementById('score_' + rowId);
            const actionCell = document.getElementById('action_' + rowId);
            
            if (score !== null) {
                scoreCell.innerHTML = `<span class="bg-blue-500 text-white px-3 py-1 rounded font-bold">${score}</span>`;
                actionCell.innerHTML = `
                    <button onclick="showEditNilaiPopup('${studentName}', ${score})" class="bg-blue-500 text-white px-3 py-1 rounded text-sm mr-1">Edit</button>
                    <button onclick="showDeleteConfirm('${studentName}')" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                `;
            } else {
                scoreCell.innerHTML = '<span class="text-gray-400">-</span>';
                actionCell.innerHTML = `
                    <button onclick="showAddNilaiPopup('${studentName}')" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Nilai</button>
                `;
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-white shadow-md p-4 hidden md:block">
            <h1 class="text-xl font-bold mb-6">CollabThink</h1>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}" class="block p-2 hover:bg-gray-200 rounded">🏠 Home</a>
                <a href="{{ route('proyek') }}" class="block p-2 hover:bg-gray-200 rounded">📁 Proyek</a>
                <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded font-bold">📊 Rekap</a>
                <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
                <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6 overflow-auto">
            <!-- Success Message (hidden by default) -->
            <div id="successMessage" class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span id="successText" class="block sm:inline">Nilai Berhasil Ditambahkan</span>
            </div>
            
            <h1 class="text-2xl font-bold mb-6">Rekap Nilai</h1>
            
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-lg font-bold mb-6">Proyek 1 - Pelaporan Bencana</h2>
                
                <!-- Students List -->
                <div class="space-y-4">
                    <!-- Student 1 - With Score -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <span class="font-medium">Fresky</span>
                        <div class="flex items-center space-x-2">
                            <div id="score_Fresky">
                                <span class="bg-blue-500 text-white px-3 py-1 rounded font-bold">90</span>
                            </div>
                            <div id="action_Fresky">
                                <button onclick="showEditNilaiPopup('Fresky', 90)" class="bg-blue-500 text-white px-3 py-1 rounded text-sm mr-1">Edit</button>
                                <button onclick="showDeleteConfirm('Fresky')" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Hapus</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Student 2 - Without Score -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <span class="font-medium">John</span>
                        <div class="flex items-center space-x-2">
                            <div id="score_John">
                                <span class="text-gray-400">-</span>
                            </div>
                            <div id="action_John">
                                <button onclick="showAddNilaiPopup('John')" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Nilai</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Student 3 - Without Score -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <span class="font-medium">Exaudi</span>
                        <div class="flex items-center space-x-2">
                            <div id="score_Exaudi">
                                <span class="text-gray-400">-</span>
                            </div>
                            <div id="action_Exaudi">
                                <button onclick="showAddNilaiPopup('Exaudi')" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Nilai</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Student 4 - Without Score -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <span class="font-medium">Mike</span>
                        <div class="flex items-center space-x-2">
                            <div id="score_Mike">
                                <span class="text-gray-400">-</span>
                            </div>
                            <div id="action_Mike">
                                <button onclick="showAddNilaiPopup('Mike')" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Nilai</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Student 5 - Without Score -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <span class="font-medium">Lisa</span>
                        <div class="flex items-center space-x-2">
                            <div id="score_Lisa">
                                <span class="text-gray-400">-</span>
                            </div>
                            <div id="action_Lisa">
                                <button onclick="showAddNilaiPopup('Lisa')" class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Nilai</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Add Nilai Popup -->
            <div id="addNilaiPopup" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                    <h3 class="text-lg font-bold mb-4">Tambah Nilai</h3>
                    
                    <form onsubmit="return handleAddNilai(event)">
                        <input type="hidden" id="addStudentName" value="">
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Mahasiswa</label>
                            <div id="addStudentDisplay" class="border rounded w-full p-2 bg-gray-100"></div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Nilai</label>
                            <input type="number" id="addNilaiInput" class="border rounded w-full p-2" min="0" max="100" required>
                        </div>
                        
                        <div class="flex justify-end space-x-2 mt-6">
                            <button type="button" onclick="closePopup()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Batal</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Edit Nilai Popup -->
            <div id="editNilaiPopup" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                    <h3 class="text-lg font-bold mb-4">Edit Nilai</h3>
                    
                    <form onsubmit="return handleEditNilai(event)">
                        <input type="hidden" id="editStudentName" value="">
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Mahasiswa</label>
                            <div id="editStudentDisplay" class="border rounded w-full p-2 bg-gray-100"></div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-1">Nilai</label>
                            <input type="number" id="editNilaiInput" class="border rounded w-full p-2" min="0" max="100" required>
                        </div>
                        
                        <div class="flex justify-end space-x-2 mt-6">
                            <button type="button" onclick="closePopup()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Batal</button>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Delete Confirmation Popup -->
            <div id="deleteConfirmPopup" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                    <h3 class="text-lg font-bold mb-4">Konfirmasi Hapus</h3>
                    <p class="mb-6">Apakah anda ingin menghapus nilai untuk <span id="deleteStudentDisplay" class="font-semibold"></span>?</p>
                    
                    <form onsubmit="return handleDeleteNilai(event)">
                        <input type="hidden" id="deleteStudentName" value="">
                        <div class="flex justify-end space-x-2">
                            <button type="button" onclick="closePopup()" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Batal</button>
                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>
</html>