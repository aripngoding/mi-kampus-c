@extends('layouts.app')

@section('title', 'Visi & Misi - MI Kampus-C')

@section('content')
{{-- Header --}}
<section class="bg-gradient-to-r from-green-900 to-green-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl font-bold mb-3">Visi & Misi</h1>
        <p class="text-green-100 text-lg">Landasan dan arah perjuangan MI Kampus-C</p>
    </div>
</section>

{{-- Visi --}}
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="bg-green-50 border-l-8 border-green-600 rounded-2xl p-10 mb-12 shadow-md">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-14 h-14 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-inner">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h2 class="text-3xl font-bold text-green-700">Visi</h2>
            </div>
            <p class="text-xl text-gray-700 leading-relaxed font-medium italic">
                "Terwujudnya Madrasah Ibtidaiyah yang unggul dalam prestasi, berakhlak mulia, berwawasan luas, dan berlandaskan nilai-nilai keislaman untuk mencetak generasi penerus bangsa yang berkualitas."
            </p>
        </div>

        {{-- Misi --}}
        <div>
            <div class="flex items-center gap-4 mb-8">
                <div class="w-14 h-14 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-inner">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h2 class="text-3xl font-bold text-green-700">Misi</h2>
            </div>
            <div class="space-y-4">
                @php
                $misi = [
                    ['no' => '01', 'text' => 'Menyelenggarakan pendidikan yang berkualitas dengan memadukan kurikulum nasional dan pendidikan agama Islam secara terpadu dan seimbang.'],
                    ['no' => '02', 'text' => 'Membentuk karakter siswa yang berakhlak mulia, jujur, disiplin, dan bertanggung jawab berdasarkan nilai-nilai Al-Quran dan Hadits.'],
                    ['no' => '03', 'text' => 'Mengembangkan potensi akademik dan non-akademik siswa melalui pembelajaran yang inovatif, kreatif, dan menyenangkan.'],
                    ['no' => '04', 'text' => 'Meningkatkan kompetensi tenaga pendidik dan kependidikan secara berkelanjutan melalui pelatihan dan pengembangan profesional.'],
                    ['no' => '05', 'text' => 'Menciptakan lingkungan madrasah yang bersih, sehat, aman, dan kondusif untuk proses belajar mengajar.'],
                    ['no' => '06', 'text' => 'Menjalin kerjasama yang harmonis antara madrasah, orang tua, dan masyarakat dalam mendukung tumbuh kembang peserta didik.'],
                    ['no' => '07', 'text' => 'Mempersiapkan lulusan yang siap melanjutkan pendidikan ke jenjang yang lebih tinggi dengan bekal ilmu dan iman yang kuat.'],
                ];
                @endphp
                @foreach($misi as $item)
                <div class="flex gap-5 bg-white border border-green-100 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 bg-green-600 text-white rounded-xl flex items-center justify-center font-bold text-lg flex-shrink-0">
                        {{ $item['no'] }}
                    </div>
                    <p class="text-gray-700 leading-relaxed self-center">{{ $item['text'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Tujuan --}}
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-gray-800">Tujuan Madrasah</h2>
            <div class="w-16 h-1 bg-green-500 mx-auto mt-3"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-green-500 hover:shadow-lg transition group">
                <h3 class="font-bold text-gray-800 text-lg mb-3 flex items-center">
                    <svg class="w-6 h-6 text-green-600 inline-block mr-2 group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"></path></svg>
                    Akademik
                </h3>
                <p class="text-gray-600">Menghasilkan lulusan yang memiliki kemampuan akademik tinggi dan siap bersaing di tingkat nasional.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-green-500 hover:shadow-lg transition group">
                <h3 class="font-bold text-gray-800 text-lg mb-3 flex items-center">
                    <svg class="w-6 h-6 text-green-600 inline-block mr-2 group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    Keagamaan
                </h3>
                <p class="text-gray-600">Membentuk siswa yang taat beribadah, hafal Al-Quran juz 30, dan memiliki akhlak mulia.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-green-500 hover:shadow-lg transition group">
                <h3 class="font-bold text-gray-800 text-lg mb-3 flex items-center">
                    <svg class="w-6 h-6 text-green-600 inline-block mr-2 group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    Sosial
                </h3>
                <p class="text-gray-600">Menumbuhkan jiwa sosial, kepedulian, dan rasa tanggung jawab terhadap lingkungan sekitar.</p>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-green-500 hover:shadow-lg transition group">
                <h3 class="font-bold text-gray-800 text-lg mb-3 flex items-center">
                    <svg class="w-6 h-6 text-green-600 inline-block mr-2 group-hover:scale-110 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                    Inovasi
                </h3>
                <p class="text-gray-600">Mendorong kreativitas dan inovasi siswa melalui berbagai kegiatan ekstrakurikuler dan kompetisi.</p>
            </div>
        </div>
    </div>
</section>
@endsection

