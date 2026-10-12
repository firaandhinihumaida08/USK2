<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | Sertifikasi</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 text-slate-800">

    <nav class="border-b bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <a href="/" class="text-xl font-bold text-blue-700">
                Sertifikasi
            </a>

            <div class="flex gap-3">
                <a href="{{ route('login') }}" class="rounded-lg border border-blue-600 px-4 py-2
                          text-sm font-semibold text-blue-600 hover:bg-blue-50">
                    Login
                </a>

                <a href="{{ route('register') }}" class="rounded-lg bg-blue-600 px-4 py-2
                          text-sm font-semibold text-white hover:bg-blue-700">
                    Registrasi
                </a>
            </div>
        </div>
    </nav>

    <main class="mx-auto grid min-h-[80vh] max-w-7xl
                 items-center gap-12 px-6 py-16 md:grid-cols-2">

        <section>
            <span class="rounded-full bg-blue-100 px-4 py-2
                         text-sm font-medium text-blue-700">
                Portal Sertifikasi Kompetensi
            </span>

            <h1 class="mt-6 text-4xl font-bold leading-tight md:text-5xl">
                Selamat Datang di
                <span class="text-blue-600">
                    Sistem Informasi Sertifikasi
                </span>
            </h1>

            <p class="mt-6 leading-7 text-slate-600">
                Platform untuk membantu peserta mengakses informasi
                sertifikasi kompetensi dan memantau proses sertifikasi
                melalui satu sistem yang mudah digunakan.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('login') }}" class="rounded-xl bg-blue-600 px-6 py-3
                          font-semibold text-white shadow hover:bg-blue-700">
                    Masuk ke Akun
                </a>

                <a href="{{ route('register') }}" class="rounded-xl border border-slate-300 bg-white
                          px-6 py-3 font-semibold hover:bg-slate-100">
                    Daftar sebagai Peserta
                </a>
            </div>
        </section>

        <section class="rounded-3xl border border-blue-100
                        bg-white p-8 shadow-lg md:p-12">
            <div class="mb-6 flex h-16 w-16 items-center justify-center
                        rounded-2xl bg-blue-100 text-3xl">
                🎓
            </div>

            <h2 class="text-2xl font-bold">
                Mulai Perjalanan Sertifikasimu
            </h2>

            <p class="mt-3 leading-7 text-slate-600">
                Buat akun peserta untuk mulai menggunakan layanan
                sertifikasi kompetensi.
            </p>

            <ul class="mt-6 space-y-4 text-slate-700">
                <li class="flex gap-3">
                    <span class="font-bold text-blue-600">✓</span>
                    Akun peserta pribadi
                </li>
                <li class="flex gap-3">
                    <span class="font-bold text-blue-600">✓</span>
                    Dashboard khusus peserta
                </li>
                <li class="flex gap-3">
                    <span class="font-bold text-blue-600">✓</span>
                    Akses informasi sertifikasi
                </li>
            </ul>
        </section>

    </main>

    <footer class="border-t bg-white px-6 py-5 text-center
                   text-sm text-slate-500">
        © {{ date('Y') }} Sistem Informasi Sertifikasi
    </footer>

</body>
</html>
