<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 | Tidak Diizinkan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <!-- Kaligrafi Bismillah -->
        <img src="{{ asset('img/bismillah.png') }}" alt="Bismillah" class="mx-auto w-48 mb-9">

        <!-- Kode Error -->
        <h1 class="text-9xl font-bold text-yellow-700 animate-bounce">401</h1>

        <!-- Pesan Utama -->
        <p class="text-2xl font-semibold text-gray-700 mt-4">Oops! Akses Tidak Diizinkan.</p>
        <p class="text-gray-500 mt-2">Anda tidak memiliki izin untuk mengakses halaman ini.</p>

        <!-- Kutipan Islami -->
        <blockquote class="mt-6 text-lg italic text-yellow-700">
            "Dan bertawakallah kepada Allah. Cukuplah Allah sebagai Pelindung." <br> (QS. Al-Ahzab: 3)
        </blockquote>

        <!-- Tombol Kembali -->
        <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>
