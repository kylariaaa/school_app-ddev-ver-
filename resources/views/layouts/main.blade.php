<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Aplikasi Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes fade-in-down {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
        .animate-fade-in-down { animation: fade-in-down 0.8s ease-out forwards; }
    </style>
</head>
<body class="bg-gray-900 text-gray-200 font-sans">

    <!-- Header -->
    <header class="bg-gray-800 shadow-lg border-b-2 border-sky-500 sticky top-0 z-50">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div>
                <a href="{{ route('home') }}" class="text-2xl font-bold text-white hover:text-sky-400">
                    SMK Plus Pelita Nusantara
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Beranda</a>
                <a href="{{ route('about') }}" class="text-gray-300 hover:text-white">Tentang</a>

                @guest
                    <a href="{{ route('login') }}" class="bg-sky-600 text-white px-4 py-2 rounded-full hover:bg-sky-700">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-sky-600 text-white px-4 py-2 rounded-full hover:bg-sky-700">Register</a>
                    @endif
                @else
                    <a href="{{ route('dashboard') }}" class="text-gray-300 hover:text-white">Dashboard</a>
                    <a href="{{ route('students.index') }}" class="text-gray-300 hover:text-white">Siswa</a>
                    <a href="{{ route('teachers.index') }}" class="text-gray-300 hover:text-white">Guru</a>
                    <a href="{{ route('school-classes.index') }}" class="text-gray-300 hover:text-white">Kelas</a>
                    <span class="text-white font-semibold">{{ Auth::user()->name }}</span>
                    <a href="{{ route('logout') }}"
                        class="bg-red-600 text-white px-4 py-2 rounded-full hover:bg-red-700"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                @endguest
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="py-10">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 mt-12 pt-12 pb-8 text-center border-t-2 border-sky-500">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-3 gap-8 text-left md:text-center">
                <!-- Kolom 1 -->
                <div class="mb-6 md:mb-0">
                    <h3 class="text-xl font-bold text-white mb-4">SMK Plus Pelita Nusantara</h3>
                    <p class="text-gray-400">
                        Menjadi Sekolah Menengah Kejuruan Unggulan yang menghasilkan sumber daya manusia
                        Terampil, Entrepreneur, dan Religius.
                    </p>
                </div>

                <!-- Kolom 2 -->
                <div class="mb-6 md:mb-0">
                    <h3 class="text-xl font-bold text-white mb-4">Kontak Kami</h3>
                    <ul class="text-gray-400 space-y-2">
                        <li><strong>Alamat:</strong> Jl. Golf RT06/08 Ciriung, Kec. Cibinong, Kab. Bogor</li>
                        <li><strong>No. Telp:</strong> 021 83713168</li>
                    </ul>
                </div>

                <!-- Kolom 3 -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-4">Let’s Connect!</h3>
                    <div class="flex justify-start md:justify-center space-x-4">
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/smkpluspelitanusantara" target="_blank"
                            class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <!-- YouTube -->
                        <a href="http://www.youtube.com/@smkpluspelitanusantara9719" target="_blank"
                            class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-youtube text-2xl"></i>
                        </a>
                        <!-- TikTok -->
                        <a href="https://www.tiktok.com/@smkppelitanusantaracbng" target="_blank"
                            class="text-gray-400 hover:text-white transition-colors duration-300">
                            <i class="fab fa-tiktok text-2xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-12 border-t border-gray-700 pt-6">
                <p class="text-gray-500 text-center">
                    &copy; {{ date('Y') }} SMK Plus Pelita Nusantara – Divisi RPL. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Tambahkan Font Awesome untuk ikon sosial -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>
</html>
