<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabThink - Masuk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: 
                url("/storage/images/bg1.png") left bottom no-repeat,
                url("/storage/images/bg2.png") right bottom no-repeat;
            background-size: auto 75vh; /* 75% tinggi viewport */
            background-attachment: fixed;
            background-color: #f3f4f6; /* Warna fallback */
        }
        .content-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: white;
            border: 1px solid #d1d5db;
            padding: 10px 16px;
            border-radius: 6px;
            transition: all 0.3s;
        }
        .google-btn:hover {
            background: #f9fafb;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="content-container w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-700">CollabThink</h1>
        <p class="text-center text-gray-600">Masuk untuk melanjutkan</p>
        
        <form class="mt-6 space-y-4" method="POST" action="{{ route('login.submit') }}">
            @csrf
            <div>
                <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Masukkan username" 
                    class="w-full p-3 border rounded-md focus:ring-2 focus:ring-blue-500 outline-none" 
                    required>
                @error('username')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Masukkan password" 
                    class="w-full p-3 border rounded-md focus:ring-2 focus:ring-blue-500 outline-none" 
                    required>
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition">
                Masuk
            </button>
        </form>

        <div class="relative my-6 flex items-center">
            <hr class="w-full border-gray-300">
            <span class="absolute left-1/2 transform -translate-x-1/2 bg-white px-2 text-gray-400 text-sm">
                atau lanjutkan dengan
            </span>
        </div>

        <!-- Tombol Login Google -->
        <button class="google-btn w-full">
            <img src="/storage/images/googlelogo.png" alt="Google Logo" class="w-5 h-5">
            <span>Masuk dengan Google</span>
        </button>

        <hr class="my-6 border-gray-300">

        <div class="text-center">
            <img src="/storage/images/teamhublogo.png" alt="TeamHub Logo" class="mx-auto w-14 mb-2">
            <p class="text-gray-600 font-semibold">TeamHub</p>
            <p class="text-gray-500 text-sm">Bersama, Terhubung, Berkembang</p>
        </div>
    </div>
</body>
</html>