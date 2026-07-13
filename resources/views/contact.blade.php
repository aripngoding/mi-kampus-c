@extends('layouts.app')

@section('title', 'Kontak - MI Kampus-C')

@section('content')
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-3">Hubungi Kami</h1>
        <p class="text-green-100 text-lg">Kami siap membantu dan menjawab pertanyaan Anda</p>
    </div>
</section>

<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 max-w-6xl mx-auto">
            {{-- Informasi Kontak --}}
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h2>
                <div class="space-y-5">
                    <div class="flex gap-4 bg-white p-5 rounded-xl shadow-md group hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                            <svg class="w-6 h-6 text-green-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Alamat</h3>
                            <p class="text-gray-600">Jl. Dermaga Timur RT 007/RW 004, Kelurahan Pulau Kelapa</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-white p-5 rounded-xl shadow-md group hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                            <svg class="w-6 h-6 text-green-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Telepon</h3>
                            <p class="text-gray-600">0878-6032-6141</p>
                            <p class="text-gray-600">0878-6032-6141 (WhatsApp)</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-white p-5 rounded-xl shadow-md group hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                            <svg class="w-6 h-6 text-green-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Email</h3>
                            <p class="text-gray-600">min17.pulaukelapa@gmail.com</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-white p-5 rounded-xl shadow-md group hover:shadow-lg transition">
                        <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 group-hover:bg-green-600 group-hover:text-white transition duration-300">
                            <svg class="w-6 h-6 text-green-600 group-hover:text-white transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-800 mb-1">Jam Operasional</h3>
                            <p class="text-gray-600">Senin - Jumat: 07:00 - 15:00 WIB</p>
                            <p class="text-gray-600">Sabtu: 07:00 - 12:00 WIB</p>
                            <p class="text-gray-600 text-sm mt-1 italic">Minggu & Hari Libur: Tutup</p>
                        </div>
                    </div>
                </div>

                {{-- Social Media --}}
                <div class="mt-8">
                    <h3 class="font-bold text-gray-800 mb-4">Media Sosial</h3>
                    <div class="flex gap-3">
                        <a href="#" class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </a>
                        <a href="#" class="w-12 h-12 bg-green-600 text-white rounded-full flex items-center justify-center hover:bg-green-700 transition hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Google Maps --}}
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Lokasi Kami</h2>
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.798464181358!2d107.60981131477394!3d-6.914744995006048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="mt-4">
                    <a href="https://maps.google.com/?q=MI+Kampus-C" target="_blank"
                       class="block text-center bg-green-600 text-white py-3 rounded-xl hover:bg-green-700 transition font-semibold">
                        Buka di Google Maps 
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 text-center max-w-3xl">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Ingin Berkunjung?</h2>
        <p class="text-gray-600 mb-8">
            Kami menyambut kunjungan Anda untuk melihat langsung fasilitas dan suasana belajar di MI Kampus-C. 
            Silakan hubungi kami terlebih dahulu untuk membuat janji kunjungan.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="https://wa.me/6287860326141?text=Halo,%20saya%20ingin%20bertanya%20tentang%20MI%20Kampus-C"
               target="_blank"
               class="bg-green-600 text-white px-8 py-3 rounded-xl hover:bg-green-700 transition font-semibold inline-flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg> Chat WhatsApp
            </a>
            <a href="{{ route('ppdb.index') }}"
               class="border-2 border-green-600 text-green-600 px-8 py-3 rounded-xl hover:bg-green-50 transition font-semibold">
                Daftar PPDB Online
            </a>
        </div>
    </div>
</section>
@endsection
