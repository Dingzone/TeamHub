<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabThink Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleSidebar() {
            document.getElementById("sidebar").classList.toggle("hidden");
        }

        function sendMessage() {
            let messageInput = document.getElementById("message");
            let messageText = messageInput.value.trim();
            
            if (messageText !== "") {
                let chatContainer = document.getElementById("chat-container");

                // Membuat elemen chat baru
                let chatBubble = document.createElement("div");
                chatBubble.classList.add("flex", "items-start", "space-x-3");

                chatBubble.innerHTML = `
                    <div class="w-10 h-10 flex items-center justify-center bg-gray-300 rounded-full">💬</div>
                    <div class="bg-white p-3 rounded shadow">
                        <p class="font-semibold">Anda</p>
                        <p class="text-gray-700">${messageText}</p>
                    </div>
                `;

                // Menambahkan pesan ke dalam chat-container
                chatContainer.appendChild(chatBubble);

                // Scroll ke bawah agar pesan terbaru terlihat
                chatContainer.scrollTop = chatContainer.scrollHeight;

                // Mengosongkan input setelah mengirim
                messageInput.value = "";
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
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">📝 Notes</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">👥 Daftar Tim</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">🔔 Notifikasi</a>
                <a href="#" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
                <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Forum Diskusi -->
            <section class="bg-white p-6 rounded shadow-md">
                <h2 class="text-xl font-bold mb-4">💬 Forum Diskusi</h2>
                
                <!-- Chat Container -->
                <div class="h-96 overflow-y-auto bg-gray-100 p-4 rounded space-y-4" id="chat-container">
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 flex items-center justify-center bg-gray-300 rounded-full">💬</div>
                        <div class="bg-white p-3 rounded shadow">
                            <p class="font-semibold">User 1</p>
                            <p class="text-gray-700">Halo, ini adalah pesan pertama!</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="w-10 h-10 flex items-center justify-center bg-gray-300 rounded-full">💬</div>
                        <div class="bg-white p-3 rounded shadow">
                            <p class="font-semibold">User 2</p>
                            <p class="text-gray-700">Halo, saya baru bergabung!</p>
                        </div>
                    </div>
                </div>
                
                <!-- Form Input Pesan -->
                <div class="mt-4 flex">
                    <input type="text" id="message" class="flex-1 p-3 border rounded" placeholder="Tulis pesan..." onkeypress="if(event.key === 'Enter') sendMessage()">
                    <button onclick="sendMessage()" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">Kirim</button>
                </div>
            </section>
        </main>
    </div>
</body>
</html>