@extends('layouts.app')

@section('title', 'Beranda - MI Kampus-C')

@section('content')
{{-- Hero Banner --}}
<section class="bg-gradient-to-br from-green-900 via-green-800 to-green-600 text-white py-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 30%, #d6b25c 0%, transparent 40%), radial-gradient(circle at 80% 70%, #54a682 0%, transparent 40%);"></div>
    <div class="container mx-auto px-4 relative">
        <div class="flex flex-col md:flex-row items-center gap-10">
            <div class="flex-1 text-center md:text-left">
                <span class="inline-block bg-white/20 text-white text-sm font-semibold px-4 py-1 rounded-full mb-4">Tahun Ajaran 2025/2026</span>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4">
                    Selamat Datang di<br>
                    <span class="text-gold-300">MI Kampus-C</span>
                </h1>
                <p class="text-lg text-green-100 mb-8 max-w-xl">
                    Madrasah Ibtidaiyah dengan pendidikan Islami berkualitas, membentuk generasi cerdas, berakhlak mulia, dan berprestasi.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ route('ppdb.index') }}" class="bg-gold-400 text-green-950 font-bold px-8 py-3 rounded-xl hover:bg-gold-300 transition shadow-luxury">
                        Daftar PPDB Sekarang
                    </a>
                    <a href="{{ route('about') }}" class="border-2 border-white text-white font-bold px-8 py-3 rounded-xl hover:bg-white hover:text-green-700 transition">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
            <div class="flex-1 flex justify-center">
                <div class="w-72 h-72 bg-white/20 rounded-full flex items-center justify-center shadow-2xl">
                    <div class="text-center flex flex-col items-center">
                        <svg class="w-24 h-24 text-white mb-4 drop-shadow-md" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        <p class="text-white font-bold text-xl">MI Kampus-C</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-white py-10 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <div class="p-4">
                <div class="text-4xl font-extrabold text-green-600">500+</div>
                <div class="text-gray-600 mt-1">Siswa Aktif</div>
            </div>
            <div class="p-4">
                <div class="text-4xl font-extrabold text-green-600">30+</div>
                <div class="text-gray-600 mt-1">Tenaga Pendidik</div>
            </div>
            <div class="p-4">
                <div class="text-4xl font-extrabold text-green-600">20+</div>
                <div class="text-gray-600 mt-1">Tahun Berdiri</div>
            </div>
            <div class="p-4">
                <div class="text-4xl font-extrabold text-green-600">100%</div>
                <div class="text-gray-600 mt-1">Kelulusan</div>
            </div>
        </div>
    </div>
</section>

{{-- Sambutan Kepala Sekolah --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-800">Sambutan Kepala Sekolah</h2>
                <div class="w-16 h-1 bg-green-500 mx-auto mt-3"></div>
            </div>
            <div class="bg-white rounded-2xl shadow-md p-8 flex flex-col md:flex-row gap-8 items-center">
                <div class="flex-shrink-0">
                    <div class="w-36 h-36 bg-green-100 rounded-full flex items-center justify-center shadow-inner">
                        <svg class="w-16 h-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    </div>
                </div>
                <div>
                    <p class="text-gray-600 text-lg leading-relaxed italic mb-4">
                        "Assalamu'alaikum Warahmatullahi Wabarakatuh. Selamat datang di website resmi MI Kampus-C. Kami berkomitmen untuk memberikan pendidikan terbaik yang memadukan ilmu pengetahuan umum dengan nilai-nilai keislaman. Bersama kami, anak-anak akan tumbuh menjadi generasi yang cerdas, berakhlak mulia, dan siap menghadapi tantangan masa depan."
                    </p>
                    <div>
                        <p class="font-bold text-green-700 text-lg">Bahtiaroni, S.Pd.I</p>
                        <p class="text-gray-500">Kepala Madrasah MI Kampus-C</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Keunggulan --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Keunggulan Kami</h2>
            <div class="w-16 h-1 bg-green-500 mx-auto mt-3"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6 rounded-2xl border border-green-100 hover:shadow-xl hover:border-green-300 transition group bg-white">
                <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Kurikulum Terpadu</h3>
                <p class="text-gray-600 leading-relaxed">Memadukan kurikulum nasional dengan pendidikan agama Islam yang komprehensif.</p>
            </div>
            <div class="text-center p-6 rounded-2xl border border-green-100 hover:shadow-xl hover:border-green-300 transition group bg-white">
                <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Prestasi Gemilang</h3>
                <p class="text-gray-600 leading-relaxed">Raih berbagai prestasi akademik dan non-akademik di tingkat kota hingga nasional.</p>
            </div>
            <div class="text-center p-6 rounded-2xl border border-green-100 hover:shadow-xl hover:border-green-300 transition group bg-white">
                <div class="w-16 h-16 bg-green-50 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:scale-110 transition duration-300">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-3">Guru Berpengalaman</h3>
                <p class="text-gray-600 leading-relaxed">Tenaga pendidik profesional dan berdedikasi dengan pengalaman bertahun-tahun.</p>
            </div>
        </div>
    </div>
</section>

{{-- Galeri Preview --}}
@if($galleries->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Galeri Kegiatan</h2>
            <div class="w-16 h-1 bg-green-500 mx-auto mt-3"></div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            @foreach($galleries as $gallery)
            <div class="overflow-hidden rounded-xl shadow-md hover:shadow-xl transition group">
                <img src="{{ Storage::url($gallery->image_path) }}" alt="{{ $gallery->title }}"
                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
                <div class="p-3 bg-white">
                    <p class="font-semibold text-gray-700 text-sm">{{ $gallery->title }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('gallery') }}" class="inline-block bg-green-600 text-white px-8 py-3 rounded-xl hover:bg-green-700 transition font-semibold">
                Lihat Semua Foto
            </a>
        </div>
    </div>
</section>
@endif

{{-- CTA PPDB --}}
<section class="py-16 bg-gradient-to-r from-green-900 to-green-700 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Penerimaan Peserta Didik Baru</h2>
        <p class="text-green-100 text-lg mb-8 max-w-2xl mx-auto">
            Daftarkan putra-putri Anda sekarang! Proses pendaftaran mudah, cepat, dan bisa dilakukan secara online.
        </p>
        <a href="{{ route('ppdb.index') }}" class="inline-block bg-gold-400 text-green-950 font-bold px-10 py-4 rounded-xl hover:bg-gold-300 transition text-lg shadow-luxury">
            Daftar PPDB Online Sekarang 
        </a>
    </div>
</section>
@endsection
