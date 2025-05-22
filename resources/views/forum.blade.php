<?php
// forum.php - Halaman utama forum diskusi
session_start();

// Simulasi data forum (pada implementasi sebenarnya, data akan diambil dari database)
$forums = [
    [
        'id' => 1,
        'icon' => '.',
        'title' => 'Kolaborasi PBL',
        'messages' => [
            ['sender' => 'Dini', 'content' => 'Ini adalah pesan pertama.', 'time' => '09:15'],
            ['sender' => 'Masnida', 'content' => 'Selamat bekerja sama', 'time' => '10:30'],
            ['sender' => 'Dini', 'content' => 'Mas, untuk proyek website Kolaborasi PBL, kita pakai metode apa ya?', 'time' => '10:45'],
            ['sender' => 'Masnida', 'content' => 'Kita coba pakai metode Waterfall saja biar lebih terstruktur.', 'time' => '10:47'],
            ['sender' => 'Dini', 'content' => 'Oke, berarti kita mulai dari tahap requirement dulu ya?', 'time' => '10:48'],
            ['sender' => 'Masnida', 'content' => 'Iya, setelah itu lanjut ke desain, implementasi, testing, dan terakhir deployment.', 'time' => '10:50'],
            ['sender' => 'Dini', 'content' => 'Sip, aku mulai kumpulkan kebutuhan fungsional dan non-fungsional dulu.', 'time' => '10:52'],
            ['sender' => 'Masnida', 'content' => 'Mantap! Nanti kalau sudah, aku bantu buat desain UI/UX-nya.', 'time' => '10:53'],
            ['sender' => 'Fresky', 'content' => 'Aku bisa bantu di bagian implementasi nanti, khususnya backend-nya.', 'time' => '10:55'],
            ['sender' => 'Yenisa', 'content' => 'Aku fokus ke dokumentasi dan pelaporan setiap fase ya.', 'time' => '10:56'],
            ['sender' => 'Exsaudi', 'content' => 'Testing aku yang handle, dari unit test sampai integrasi.', 'time' => '10:57'],
            ['sender' => 'Fanny', 'content' => 'Kalau begitu, aku bantu di bagian deployment dan monitoring setelah selesai.', 'time' => '10:58'],
            ['sender' => 'Anda', 'content' => 'Saya akan membantu fresky dalam implementasi', 'time' => '11:45']
        ]
    ],
];

// Mengambil forum yang dipilih jika ada
$selectedForumId = isset($_GET['forum_id']) ? (int)$_GET['forum_id'] : null;
$selectedForum = null;

if ($selectedForumId) {
    foreach ($forums as $forum) {
        if ($forum['id'] == $selectedForumId) {
            $selectedForum = $forum;
            break;
        }
    }
}

// Username untuk sesi saat ini (pada implementasi sebenarnya, ini akan diambil dari session)
$currentUser = "Nina Rey";
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CollabThink Proyek</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    .project-card-container {
      position: relative;
      cursor: pointer;
    }
    .project-card-container:hover {
      transform: translateY(-2px);
      transition: transform 0.2s ease;
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
            <a href="{{ route('rekap') }}" class="block p-2 hover:bg-gray-200 rounded">📊 Rekap</a>
            <a href="{{ route('datugas') }}" class="block p-2 hover:bg-gray-200 rounded">📅 Daftar Tugas Dan Deadline</a>
            <a href="{{ route('forum') }}" class="block p-2 hover:bg-gray-200 rounded">💬 Diskusi Tim</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-y-auto">
      <header class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Forum Diskusi</h2>
        <div class="flex items-center space-x-4">
          <span class="text-gray-600">Moni Roy</span>
          <img src="https://i.pravatar.cc/40" alt="Profile" class="rounded-full w-10 h-10" />
        </div>
      </header>

            <!-- Main Content Area -->
            <main class="flex-1 flex overflow-hidden p-4">
                <!-- Forum Topics Sidebar - Selalu ditampilkan -->
                <div id="forum-list" class="w-2/5 bg-white rounded-lg shadow-sm overflow-y-auto mr-4">
                    <div class="p-4 border-b border-gray-200">
                        <div class="relative">
                            <input type="text" class="w-full p-2 pl-8 border rounded" placeholder="Search...">
                            <svg class="w-4 h-4 absolute left-2 top-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-200">
                        <?php foreach ($forums as $forum): ?>
                            <a href="?forum_id=<?php echo $forum['id']; ?>" class="forum-topic block p-4 hover:bg-gray-50 <?php echo ($selectedForumId == $forum['id']) ? 'bg-blue-50' : ''; ?>">
                                <div class="flex items-center">
                                    <div class="icon-circle bg-blue-500 text-white mr-3 flex-shrink-0">
                                        <?php echo htmlspecialchars($forum['icon']); ?>
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-medium truncate"><?php echo htmlspecialchars($forum['title']); ?></p>
                                        <?php if (count($forum['messages']) > 0): ?>
                                            <div class="flex justify-between items-center">
                                                <p class="text-sm text-gray-500 truncate">
                                                    <?php 
                                                        // Cari pesan terakhir dari 'Anda' terlebih dahulu
                                                        $lastUserMsg = null;
                                                        for ($i = count($forum['messages']) - 1; $i >= 0; $i--) {
                                                            if ($forum['messages'][$i]['sender'] === 'Anda') {
                                                                $lastUserMsg = $forum['messages'][$i];
                                                                break;
                                                            }
                                                        }
                                                        
                                                        // Jika tidak ada pesan dari 'Anda', gunakan pesan terakhir
                                                        if ($lastUserMsg === null) {
                                                            $lastMsg = $forum['messages'][count($forum['messages'])-1];
                                                            echo htmlspecialchars($lastMsg['sender'] . ': ' . $lastMsg['content']);
                                                        } else {
                                                            echo htmlspecialchars('Anda: ' . $lastUserMsg['content']);
                                                        }
                                                    ?>
                                                </p>
                                                <p class="text-xs text-gray-400 ml-2">
                                                    <?php 
                                                        if ($lastUserMsg === null) {
                                                            echo htmlspecialchars($forum['messages'][count($forum['messages'])-1]['time']);
                                                        } else {
                                                            echo htmlspecialchars($lastUserMsg['time']);
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Chat Section -->
                <div id="chat-section" class="<?php echo $selectedForum ? 'w-3/5' : 'hidden md:block'; ?> flex-1 flex flex-col rounded-lg shadow-sm overflow-hidden">
                    <?php if ($selectedForum): ?>
                        <div class="bg-white p-4 border-b flex justify-between items-center">
                            <div class="flex items-center">
                                <div class="icon-circle bg-blue-500 text-white mr-3 flex-shrink-0">
                                    <?php echo htmlspecialchars($selectedForum['icon']); ?>
                                </div>
                                <h2 class="text-lg font-medium"><?php echo htmlspecialchars($selectedForum['title']); ?></h2>
                            </div>
                            <button onclick="toggleForumList()" class="md:hidden bg-gray-200 p-2 rounded">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Messages Container -->
                        <div id="chat-messages" class="flex-1 overflow-y-auto p-4 chat-container">
                            <?php foreach ($selectedForum['messages'] as $message): ?>
                                <?php if ($message['sender'] === 'Anda'): ?>
                                    <!-- Pesan dari pengguna saat ini -->
                                    <div class="flex flex-col items-end mb-4">
                                        <div class="bg-blue-50 p-3 rounded-lg shadow chat-bubble-right">
                                            <div class="flex justify-between items-center mb-1">
                                                <p class="font-semibold"><?php echo htmlspecialchars($message['sender']); ?></p>
                                            </div>
                                            <p class="text-gray-700"><?php echo htmlspecialchars($message['content']); ?></p>
                                            <p class="timestamp text-right"><?php echo htmlspecialchars($message['time']); ?></p>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="flex flex-col items-start mb-4">
                                        <div class="bg-white p-3 rounded-lg shadow chat-bubble-left">
                                            <div class="flex justify-between items-center mb-1">
                                                <p class="font-semibold"><?php echo htmlspecialchars($message['sender']); ?></p>
                                            </div>
                                            <p class="text-gray-700"><?php echo htmlspecialchars($message['content']); ?></p>
                                            <p class="timestamp"><?php echo htmlspecialchars($message['time']); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        
                        <!-- Form Input Pesan -->
                        <div class="bg-white p-3 border-t">
                            <div class="flex">
                                <input type="text" id="message" class="flex-1 p-3 border rounded-l-lg" placeholder="Tulis Pesan..." onkeypress="if(event.key === 'Enter') sendMessage()">
                                <button onclick="sendMessage()" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg">Kirim</button>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Forum Introduction -->
                        <div class="flex-1 flex items-center justify-center bg-white">
                            <div class="text-center max-w-md p-6">
                                <div class="text-6xl mb-4">💬</div>
                                <h2 class="text-xl font-semibold mb-2">Selamat datang di Forum Diskusi</h2>
                                <p class="text-gray-600">Pilih topik diskusi di panel kiri untuk memulai atau melanjutkan percakapan dengan tim Anda.</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>
</body>
</html>