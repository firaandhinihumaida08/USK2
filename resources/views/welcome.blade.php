<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Website Sertifikasi Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <!-- Navbar Jadul / Standar -->
    <div style="background: #333; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center;">
        <h2 style="margin: 0; font-size: 18px; font-weight: bold;">Website Sertifikasi Mahasiswa</h2>
        <div>
            @auth
                <a href="{{ Auth::user()->role === 'mahasiswa' ? route('mahasiswa.dashboard') : route('dashboard') }}" style="color: white; text-decoration: none; margin-right: 15px;">Dashboard</a>
            @else
                <a href="{{ route('login') }}" style="color: white; text-decoration: none; margin-right: 15px;">Login</a>
                <a href="{{ route('register') }}" style="color: white; text-decoration: none;">Register</a>
            @endauth
        </div>
    </div>

    <!-- Konten Utama ala kadarnya -->
    <div style="width: 800px; margin: 50px auto; background: white; padding: 30px; border: 1px solid #ccc;">
        <h1 style="color: #333; margin-top: 0;">Selamat Datang di Sistem Informasi Sertifikasi</h1>
        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">
        
        <p style="line-height: 1.6; color: #555;">
            Website ini digunakan untuk mengelola data sertifikasi kompetensi mahasiswa. Silakan login menggunakan akun yang sudah didaftarkan oleh admin atau lakukan registrasi mandiri bagi peserta baru.
        </p>

    <!-- Footer -->
    <div style="text-align: center; margin-top: 100px; color: #777; font-size: 12px;">
        &copy; 2026 - Projek Ujian Sertifikasi Kompetensi
    </div>

</body>
</html>