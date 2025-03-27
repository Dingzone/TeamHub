<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CollabThink - Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: 
                url("{{ asset('storage/images/bg1.png') }}") left center no-repeat,
                url("{{ asset('storage/images/bg2.png') }}") right center no-repeat;
            background-size: 50% 100%;
            background-attachment: fixed;
        }

        /* Pastikan kontennya tetap rapi */
        .content-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="content-container w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-700">CollabThink</h1>
        <p class="text-center text-gray-600">Daftar Untuk Melanjutkan</p>
        
        <form class="mt-4">
            <input type="email" placeholder="Masukkan Email" class="w-full p-3 border rounded-md focus:ring-2 focus:ring-blue-500 outline-none">
            
            <p class="text-xs text-gray-500 mt-2 text-center">
                Dengan mendaftar, saya menyetujui 
                <a href="#" class="text-blue-500">Ketentuan Layanan</a> dan 
                <a href="#" class="text-blue-500">Kebijakan Privasi</a> CollabThink.
            </p>
            
            <button class="w-full mt-4 bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Daftar</button>
        </form>
        
        <div class="relative my-4 flex items-center">
            <hr class="w-full border-gray-300">
            <span class="absolute left-1/2 transform -translate-x-1/2 bg-white px-2 text-gray-400 text-sm">
                Atau Lanjutkan Dengan:
            </span>
        </div>
        
        <button class="w-full flex items-center justify-center border py-2 rounded-md hover:bg-gray-100">
            <img src="{{ asset('storage/images/googlelogo.png') }}" class="w-5 h-5 mr-2" alt="Google Logo">
            Google
        </button>
        
        <p class="text-center text-gray-500 mt-4">Sudah punya akun CollabThink? 
        <a href="{{ route('login') }}" class="text-blue-500">Login di sini</a>

</p>


        <hr class="w-full border-gray-300">
        
        <div class="mt-6 text-center">
            <img src="{{ asset('storage/images/teamhublogo.png') }}" alt="TeamHub Logo" class="mx-auto w-13">
            <p class="text-gray-600 font-semibold">TeamHub</p>
            <p class="text-gray-500 text-sm">Bersama, Terhubung, Berkembang</p>
        </div>
    </div>
</body>
</html>