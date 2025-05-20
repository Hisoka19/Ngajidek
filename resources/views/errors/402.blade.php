<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>402 | Pembayaran Diperlukan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-100 flex items-center justify-center h-screen">
    <div class="text-center">
        <!-- Kaligrafi Bismillah -->
        <img src="{{ asset('img/bismillah.png') }}" alt="Bismillah" class="mx-auto w-48 mb-9">

        <!-- Kode Error -->
        <h1 class="text-9xl font-bold text-green-700 animate-bounce">402</h1>

        <!-- Pesan Utama -->
        <p class="text-2xl font-semibold text-gray-700 mt-4">Oops! Pembayaran Diperlukan.</p>
        <p class="text-gray-500 mt-2">Untuk mengakses halaman ini, silakan lakukan pembayaran terlebih dahulu.</p>

        <!-- Kutipan Islami -->
        <blockquote class="mt-6 text-lg italic text-green-700">
            "Dan janganlah kamu makan harta di antara kamu dengan jalan yang batil..." <br> (QS. Al-Baqarah: 188)
        </blockquote>

        <!-- Tombol Kembali -->
        <a href="{{ url('/') }}" class="mt-6 inline-block px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
            Kembali ke Beranda
        </a>
        <a href="{{ url('/pembayaran') }}" class="mt-6 inline-block px-6 py-3 bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition">
            Lakukan Pembayaran
        </a>
    </div>
</body>
</html>
