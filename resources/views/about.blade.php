@extends('layouts.app')

@section('title', 'Tentang Kami - MI Kampus-C')

@section('content')
{{-- Header --}}
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-3">Tentang Kami</h1>
        <p class="text-green-100 text-lg">Mengenal lebih dekat MI Kampus-C</p>
    </div>
</section>

{{-- Sejarah --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Sejarah Singkat</h2>
            <div class="prose prose-lg text-gray-600">
                <p class="mb-4">
                    Madrasah Ibtidaiyah (MI) Kampus-C didirikan pada tahun 2005 dengan tujuan memberikan pendidikan dasar yang berkualitas dengan landasan nilai-nilai keislaman yang kuat. Berawal dari sebuah ruang kelas sederhana dengan 30 siswa, kini MI Kampus-C telah berkembang menjadi lembaga pendidikan yang dipercaya oleh lebih dari 500 keluarga.
                </p>
                <p class="mb-4">
                    Dengan komitmen untuk terus berinovasi dalam metode pembelajaran, MI Kampus-C telah menghasilkan ribuan alumni yang sukses melanjutkan pendidikan ke jenjang yang lebih tinggi dan berkontribusi positif bagi masyarakat.
                </p>
                <p>
                    Kami percaya bahwa pendidikan bukan hanya tentang transfer ilmu pengetahuan, tetapi juga pembentukan karakter dan akhlak mulia yang akan menjadi bekal anak-anak menghadapi kehidupan di masa depan.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Fasilitas --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Fasilitas Sekolah</h2>
            <div class="w-16 h-1 bg-green-500 mx-auto mt-3"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl transition group">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Ruang Kelas Nyaman</h3>
                <p class="text-gray-600 text-sm">18 ruang kelas ber-AC dengan fasilitas multimedia</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl transition group">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Perpustakaan</h3>
                <p class="text-gray-600 text-sm">Koleksi buku lengkap dan ruang baca yang nyaman</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl transition group">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Lab Komputer</h3>
                <p class="text-gray-600 text-sm">30 unit komputer dengan akses internet</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl transition group">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Musholla</h3>
                <p class="text-gray-600 text-sm">Tempat ibadah yang luas dan bersih</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl transition group">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Lapangan Olahraga</h3>
                <p class="text-gray-600 text-sm">Lapangan futsal dan basket</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl transition group">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Kantin Sehat</h3>
                <p class="text-gray-600 text-sm">Menyediakan makanan bergizi dan halal</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl transition group">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">Antar Jemput</h3>
                <p class="text-gray-600 text-sm">Layanan transportasi yang aman</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md text-center hover:shadow-xl transition group">
                <div class="w-16 h-16 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">UKS</h3>
                <p class="text-gray-600 text-sm">Unit Kesehatan Sekolah dengan tenaga medis</p>
            </div>
        </div>
    </div>
</section>

{{-- Tenaga Pendidik --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Tenaga Pendidik</h2>
            <div class="w-16 h-1 bg-green-500 mx-auto mt-3"></div>
            <p class="text-gray-600 mt-4">Guru-guru berpengalaman dan berdedikasi tinggi</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="text-center group">
                <div class="w-32 h-32 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center group-hover:shadow-lg transition duration-300">
                    <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 text-lg">Bahtiaroni, S.Pd.I</h3>
                <p class="text-green-600 font-medium">Kepala Madrasah</p>
            </div>
            <div class="text-center group">
                <div class="w-32 h-32 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center group-hover:shadow-lg transition duration-300">
                    <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 text-lg">Siti Nurhaliza, S.Pd</h3>
                <p class="text-green-600 font-medium">Wakil Kepala Madrasah</p>
            </div>
            <div class="text-center group">
                <div class="w-32 h-32 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center group-hover:shadow-lg transition duration-300">
                    <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </div>
                <h3 class="font-bold text-gray-800 text-lg">Muhammad Rizki, S.Pd.I</h3>
                <p class="text-green-600 font-medium">Koordinator Kurikulum</p>
            </div>
        </div>
        <div class="text-center mt-8">
            <p class="text-gray-600">Dan 27+ guru profesional lainnya</p>
        </div>
    </div>
</section>
@endsection
