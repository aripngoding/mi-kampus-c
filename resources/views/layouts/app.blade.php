<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi Madrasah Ibtidaiyah Kampus-C - Pendidikan Islami Berkualitas">
    <title>@yield('title', 'MI Kampus-C - Madrasah Ibtidaiyah')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-700 to-green-900 rounded-full flex items-center justify-center ring-2 ring-gold-300/40">
                        <span class="text-gold-200 font-bold text-xl">MI</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-green-800">MI Kampus-C</h1>
                        <p class="text-xs text-gray-500">Madrasah Ibtidaiyah</p>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-green-600 font-medium {{ request()->routeIs('home') ? 'text-green-600' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-green-600 font-medium {{ request()->routeIs('about') ? 'text-green-600' : '' }}">Tentang Kami</a>
                    <a href="{{ route('visi-misi') }}" class="text-gray-700 hover:text-green-600 font-medium {{ request()->routeIs('visi-misi') ? 'text-green-600' : '' }}">Visi & Misi</a>
                    <a href="{{ route('gallery') }}" class="text-gray-700 hover:text-green-600 font-medium {{ request()->routeIs('gallery') ? 'text-green-600' : '' }}">Galeri</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-green-600 font-medium {{ request()->routeIs('contact') ? 'text-green-600' : '' }}">Kontak</a>
                    <a href="{{ route('ppdb.index') }}" class="bg-green-800 text-white px-5 py-2 rounded-lg hover:bg-green-900 font-medium shadow-sm transition">PPDB Online</a>
                </div>

                <!-- Mobile Menu Button -->
                <button type="button" id="mobile-menu-btn" class="md:hidden p-2 text-gray-700 focus:outline-none cursor-pointer relative z-50" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <svg class="w-6 h-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-green-600">Beranda</a>
                <a href="{{ route('about') }}" class="block py-2 text-gray-700 hover:text-green-600">Tentang Kami</a>
                <a href="{{ route('visi-misi') }}" class="block py-2 text-gray-700 hover:text-green-600">Visi & Misi</a>
                <a href="{{ route('gallery') }}" class="block py-2 text-gray-700 hover:text-green-600">Galeri</a>
                <a href="{{ route('contact') }}" class="block py-2 text-gray-700 hover:text-green-600">Kontak</a>
                <a href="{{ route('ppdb.index') }}" class="block py-2 text-green-600 font-medium">PPDB Online</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-green-950 text-white mt-16">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4 text-gold-200">MI Kampus-C</h3>
                    <p class="text-gray-300">Madrasah Ibtidaiyah dengan pendidikan Islami berkualitas untuk generasi masa depan.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-gold-200">Menu</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-gold-200 transition">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-gold-200 transition">Tentang Kami</a></li>
                        <li><a href="{{ route('visi-misi') }}" class="text-gray-300 hover:text-gold-200 transition">Visi & Misi</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-gray-300 hover:text-gold-200 transition">Galeri</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-gold-200 transition">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4 text-gold-200">Kontak</h3>
                    <ul class="space-y-3 text-gray-300">
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gold-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jl. Dermaga Timur RT 007/RW 004, Kelurahan Pulau Kelapa</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gold-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>0878-6032-6141</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gold-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>min17.pulaukelapa@gmail.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-gold-300 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>Senin - Jumat: 07:00 - 15:00</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-green-800 mt-8 pt-6 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} MI Kampus-C. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
